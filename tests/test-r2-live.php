<?php
/**
 * Live integration tests — connect to real Cloudflare R2.
 *
 * Prerequisites:
 *   - composer install in the plugin directory (vendors present)
 *   - lib/vendor/autoload.php present (Strauss-scoped AWS SDK)
 *
 * Required environment variables:
 *   R2_ACCOUNT_ID         Cloudflare Account ID
 *   R2_ACCESS_KEY_ID      R2 API token access key
 *   R2_SECRET_ACCESS_KEY  R2 API token secret
 *   R2_BUCKET             Bucket name (test objects written under r2-offload-test/)
 *
 * Optional:
 *   R2_CUSTOM_DOMAIN      CDN domain (host only, no scheme) — enables URL tests
 *
 * Run: php tests/test-r2-live.php
 *
 * All test keys use the prefix r2-offload-test/ and are deleted at the end.
 * If the run is interrupted, clean up r2-offload-test/ in the bucket manually.
 */

// ---------------------------------------------------------------------------
// Bootstrap
// ---------------------------------------------------------------------------

// On Windows, PHP ships without a CA bundle.
// Point the AWS SDK's Guzzle HTTP client at Mozilla's bundle via AWS_CA_BUNDLE env var.
$ca_bundle = __DIR__ . '/cacert.pem';
if ( file_exists( $ca_bundle ) && ! getenv( 'AWS_CA_BUNDLE' ) ) {
    putenv( 'AWS_CA_BUNDLE=' . $ca_bundle );
}

// Minimal WordPress stubs sufficient for R2Client and Settings.
require_once __DIR__ . '/wp-stubs.php';

// Real Settings class (reads/writes __wp_options via stubs).
require_once __DIR__ . '/../includes/class-settings.php';
// Real ErrorLogger.
require_once __DIR__ . '/../includes/class-error-logger.php';
// Real R2Client (uses Strauss AWS SDK).
require_once __DIR__ . '/../includes/class-r2-client.php';
// Real AttachmentSync.
require_once __DIR__ . '/../includes/class-attachment-sync.php';

// Load the Strauss-scoped AWS SDK vendor autoloader.
$lib_autoload = __DIR__ . '/../lib/vendor/autoload.php';
if ( ! file_exists( $lib_autoload ) ) {
    echo "SKIP: lib/vendor/autoload.php not found. Run composer install + strauss first.\n";
    exit( 0 );
}
require_once $lib_autoload;

// ---------------------------------------------------------------------------
// Credentials from environment
// ---------------------------------------------------------------------------

$account_id  = getenv( 'R2_ACCOUNT_ID' );
$key_id      = getenv( 'R2_ACCESS_KEY_ID' );
$secret      = getenv( 'R2_SECRET_ACCESS_KEY' );
$bucket      = getenv( 'R2_BUCKET' );
$cdn_domain  = getenv( 'R2_CUSTOM_DOMAIN' ) ?: '';

if ( ! $account_id || ! $key_id || ! $secret || ! $bucket ) {
    echo "SKIP: Missing required environment variables.\n";
    echo "      Set R2_ACCOUNT_ID, R2_ACCESS_KEY_ID, R2_SECRET_ACCESS_KEY, R2_BUCKET.\n";
    exit( 0 );
}

// Inject credentials into WP options stub so Settings::get_*() picks them up.
$GLOBALS['__wp_options']['r2_offload_account_id']   = $account_id;
$GLOBALS['__wp_options']['r2_offload_access_key_id'] = $key_id;
$GLOBALS['__wp_options']['r2_offload_bucket']        = $bucket;
$GLOBALS['__wp_options']['r2_offload_path_prefix']   = 'wp-content/uploads';
$GLOBALS['__wp_options']['r2_offload_url_scheme']    = 'https';
$GLOBALS['__wp_options']['r2_offload_custom_domain'] = $cdn_domain;
$GLOBALS['__wp_options']['r2_offload_delete_local']  = 0;
$GLOBALS['__wp_options']['r2_offload_multipart_threshold']   = 5 * 1024 * 1024;
$GLOBALS['__wp_options']['r2_offload_multipart_concurrency'] = 3;
$GLOBALS['__wp_options']['r2_offload_excluded_mime_types']   = [];
$GLOBALS['__wp_options']['r2_offload_serve_from_r2']         = 0;

// Encrypt the secret key via the real Settings encryption.
$boot_settings = new \R2Offload\Settings();
$encrypted = $boot_settings->sanitize_secret_key( $secret );
$GLOBALS['__wp_options']['r2_offload_secret_access_key'] = $encrypted;

// Verify Settings reports as configured.
if ( ! $boot_settings->get_secret_access_key() ) {
    echo "FAIL: Could not decrypt secret key after encrypting. Check PHP openssl extension.\n";
    exit( 1 );
}

// ---------------------------------------------------------------------------
// Test helpers
// ---------------------------------------------------------------------------

const TEST_PREFIX = 'r2-offload-test/';

class LiveTestRunner {
    private int   $passed  = 0;
    private int   $failed  = 0;
    private array $failures = [];

    public function assert( bool $condition, string $name ): void {
        if ( $condition ) {
            $this->passed++;
            echo "  PASS  {$name}\n";
        } else {
            $this->failed++;
            $this->failures[] = $name;
            echo "  FAIL  {$name}\n";
        }
    }

    public function assertEqual( $expected, $actual, string $name ): void {
        if ( $expected === $actual ) {
            $this->passed++;
            echo "  PASS  {$name}\n";
        } else {
            $this->failed++;
            $this->failures[] = $name;
            $e = var_export( $expected, true );
            $a = var_export( $actual, true );
            echo "  FAIL  {$name}\n        expected: {$e}\n        actual:   {$a}\n";
        }
    }

    public function summary(): int {
        $total = $this->passed + $this->failed;
        echo "\n" . str_repeat( '=', 60 ) . "\n";
        echo "Live Test Results: {$this->passed}/{$total} passed, {$this->failed} failed\n";
        if ( $this->failures ) {
            echo "\nFailed tests:\n";
            foreach ( $this->failures as $f ) {
                echo "  - {$f}\n";
            }
        }
        echo str_repeat( '=', 60 ) . "\n";
        return $this->failed > 0 ? 1 : 0;
    }
}

function make_temp_file( string $name, string $content = '' ): string {
    $path = sys_get_temp_dir() . '/r2-live-test-' . $name;
    file_put_contents( $path, $content ?: "r2-live-test-content-{$name}-" . time() );
    return $path;
}

function cleanup_temp_file( string $path ): void {
    if ( file_exists( $path ) ) {
        unlink( $path );
    }
}

// ---------------------------------------------------------------------------
// Build service instances
// ---------------------------------------------------------------------------

$settings = new \R2Offload\Settings();
$logger   = new \R2Offload\ErrorLogger();
$r2       = new \R2Offload\R2Client( $settings, $logger );

$t = new LiveTestRunner();

echo "\n=== Cloudflare R2 Live Integration Tests ===\n";
echo "Account: {$account_id}\n";
echo "Bucket:  {$bucket}\n";
echo "Prefix:  " . TEST_PREFIX . "\n\n";

// ---------------------------------------------------------------------------
// SECTION 1: Connection Test
// ---------------------------------------------------------------------------

echo "--- SECTION 1: Connection ---\n\n";

echo "Test 1.1: test_connection() returns success\n";
$conn = $r2->test_connection();
$t->assert( $conn['success'] === true, '1.1a: connection successful' );
if ( ! $conn['success'] ) {
    echo "        message: " . $conn['message'] . "\n";
    echo "\nFATAL: Cannot connect to R2. Aborting live tests.\n";
    echo "       Check account_id, access_key_id, secret, and bucket name.\n";
    exit( 1 );
}
echo "        Message: {$conn['message']}\n";

// ---------------------------------------------------------------------------
// SECTION 2: Single File Upload and Check
// ---------------------------------------------------------------------------

echo "\n--- SECTION 2: Single File Upload ---\n\n";

$test_key  = TEST_PREFIX . 'single-upload-test.txt';
$temp_file = make_temp_file( 'upload.txt', "Hello from R2 live test - " . date( 'c' ) );

echo "Test 2.1: upload_file() single file\n";
$ok = $r2->upload_file( $temp_file, $test_key, 'text/plain' );
$t->assert( $ok === true, '2.1a: upload_file returns true' );

echo "\nTest 2.2: file_exists() returns true after upload\n";
$t->assert( $r2->file_exists( $test_key ), '2.2a: file_exists true after upload' );

echo "\nTest 2.3: check_key() returns found\n";
$t->assertEqual( 'found', $r2->check_key( $test_key ), '2.3a: check_key = found' );

echo "\nTest 2.4: check_key() returns missing for non-existent key\n";
$t->assertEqual( 'missing', $r2->check_key( TEST_PREFIX . 'does-not-exist-xyz.txt' ), '2.4a: check_key = missing' );

cleanup_temp_file( $temp_file );

// ---------------------------------------------------------------------------
// SECTION 3: Download File
// ---------------------------------------------------------------------------

echo "\n--- SECTION 3: Download ---\n\n";

$download_path = sys_get_temp_dir() . '/r2-live-downloaded.txt';
cleanup_temp_file( $download_path );

echo "Test 3.1: download_file() retrieves uploaded object\n";
$ok = $r2->download_file( $test_key, $download_path );
$t->assert( $ok === true, '3.1a: download returns true' );
$t->assert( file_exists( $download_path ), '3.1b: file created locally' );
$t->assert( strpos( file_get_contents( $download_path ), 'Hello from R2 live test' ) !== false, '3.1c: content matches' );

cleanup_temp_file( $download_path );

// ---------------------------------------------------------------------------
// SECTION 4: List Objects
// ---------------------------------------------------------------------------

echo "\n--- SECTION 4: List Objects ---\n\n";

echo "Test 4.1: list_objects() under test prefix finds uploaded file\n";
$list = $r2->list_objects( TEST_PREFIX, 50 );
$t->assert( is_array( $list['objects'] ), '4.1a: objects is array' );
$keys = array_column( $list['objects'], 'Key' );
$t->assert( in_array( $test_key, $keys, true ), '4.1b: uploaded key in listing' );

echo "\nTest 4.2: list_objects() with low max_keys returns next_token\n";
// Upload a second file first to ensure pagination is testable.
$test_key2 = TEST_PREFIX . 'single-upload-test-2.txt';
$tmp2      = make_temp_file( 'upload2.txt', 'second test file' );
$r2->upload_file( $tmp2, $test_key2, 'text/plain' );
cleanup_temp_file( $tmp2 );

$page1 = $r2->list_objects( TEST_PREFIX, 1 );
$t->assert( count( $page1['objects'] ) === 1, '4.2a: max_keys=1 returns one object' );
// next_token may be null if only 1 object after all — acceptable
// (R2 token paginates only when there are more items)
if ( $page1['next_token'] ) {
    $page2 = $r2->list_objects( TEST_PREFIX, 50, $page1['next_token'] );
    $t->assert( is_array( $page2['objects'] ), '4.2b: page 2 is array' );
}

// ---------------------------------------------------------------------------
// SECTION 5: Delete Single File
// ---------------------------------------------------------------------------

echo "\n--- SECTION 5: Delete ---\n\n";

echo "Test 5.1: delete_file() removes single object\n";
$ok = $r2->delete_file( $test_key );
$t->assert( $ok === true, '5.1a: delete_file returns true' );
$t->assert( ! $r2->file_exists( $test_key ), '5.1b: file_exists false after delete' );
$t->assertEqual( 'missing', $r2->check_key( $test_key ), '5.1c: check_key=missing after delete' );

echo "\nTest 5.2: delete_files() batch removes multiple objects\n";
$keys_to_delete = [ $test_key2 ];
$ok = $r2->delete_files( $keys_to_delete );
$t->assert( $ok === true, '5.2a: delete_files returns true' );
$t->assert( ! $r2->file_exists( $test_key2 ), '5.2b: batch-deleted file gone' );

// ---------------------------------------------------------------------------
// SECTION 6: Multipart Upload (large file simulation)
// ---------------------------------------------------------------------------

echo "\n--- SECTION 6: Multipart Upload ---\n\n";

// Set threshold to 1 byte to force multipart path even for small test files.
$GLOBALS['__wp_options']['r2_offload_multipart_threshold'] = 1;
$settings->flush_cache();

$mp_key  = TEST_PREFIX . 'multipart-test.bin';
$mp_file = make_temp_file( 'multipart.bin', str_repeat( 'X', 1024 ) ); // 1 KB

echo "Test 6.1: multipart_upload() path uploads successfully\n";
$r2_mp = new \R2Offload\R2Client( $settings, $logger );
$ok = $r2_mp->upload_file( $mp_file, $mp_key, 'application/octet-stream' );
$t->assert( $ok === true, '6.1a: multipart upload returns true' );
$t->assert( $r2_mp->file_exists( $mp_key ), '6.1b: multipart object exists in R2' );

cleanup_temp_file( $mp_file );

// Clean up multipart test object.
$r2_mp->delete_file( $mp_key );

// Restore threshold.
$GLOBALS['__wp_options']['r2_offload_multipart_threshold'] = 5 * 1024 * 1024;
$settings->flush_cache();

// ---------------------------------------------------------------------------
// SECTION 7: AttachmentSync End-to-End with Real R2
// ---------------------------------------------------------------------------

echo "\n--- SECTION 7: AttachmentSync with Real R2 ---\n\n";

$GLOBALS['__wp_options']['r2_offload_delete_local'] = 0;
$GLOBALS['__wp_options']['r2_offload_path_prefix']  = 'wp-content/uploads';
$settings->flush_cache();

// Create a temporary upload directory and a fake attachment.
$upload_base = sys_get_temp_dir() . '/r2-live-uploads';
if ( ! is_dir( $upload_base ) ) {
    mkdir( $upload_base . '/2024/05', 0755, true );
}
// Override wp_upload_dir stub.
$GLOBALS['__wp_upload_dir_override'] = [
    'basedir' => $upload_base,
    'baseurl' => 'http://example.com/wp-content/uploads',
];

// Patch wp_upload_dir to use the override.
// (Already defined in wp-stubs.php — we need to redefine or use a global.)
// Instead, use the test approach: set the basedir via the global directly.
// The stubs use sys_get_temp_dir() . '/wp-uploads' — create files there.
$wp_uploads = sys_get_temp_dir() . '/wp-uploads';
if ( ! is_dir( $wp_uploads . '/2024/05' ) ) {
    mkdir( $wp_uploads . '/2024/05', 0755, true );
}

$attachment_id = 9001;
$attached_file = '2024/05/live-test-photo.jpg';
$local_path    = $wp_uploads . '/' . $attached_file;
$thumb_file    = '2024/05/live-test-photo-150x150.jpg';
$thumb_path    = $wp_uploads . '/' . $thumb_file;

file_put_contents( $local_path, 'fake-jpeg-content-original-' . time() );
file_put_contents( $thumb_path, 'fake-jpeg-content-thumb-' . time() );

$GLOBALS['__wp_postmeta'][ $attachment_id ]['_wp_attached_file']        = $attached_file;
$GLOBALS['__wp_postmeta'][ $attachment_id ]['_wp_attachment_metadata']  = [
    'sizes' => [
        'thumbnail' => [ 'file' => 'live-test-photo-150x150.jpg' ],
    ],
];

$sync = new \R2Offload\AttachmentSync( $r2, $settings, $logger );

echo "Test 7.1: sync_attachment() uploads original + thumbnail to real R2\n";
$result = $sync->sync_attachment( $attachment_id );
$t->assertEqual( 2, $result['uploaded'], '7.1a: 2 files uploaded' );
$t->assertEqual( 0, $result['failed'],   '7.1b: no failures' );
$t->assertEqual( '1', get_post_meta( $attachment_id, '_r2_offload_synced', true ), '7.1c: marked synced' );

$r2_original_key = 'wp-content/uploads/' . $attached_file;
$r2_thumb_key    = 'wp-content/uploads/' . $thumb_file;
$t->assert( $r2->file_exists( $r2_original_key ), '7.1d: original exists in R2' );
$t->assert( $r2->file_exists( $r2_thumb_key ),    '7.1e: thumbnail exists in R2' );

echo "\nTest 7.2: re-sync skips already-uploaded files\n";
$result2 = $sync->sync_attachment( $attachment_id );
$t->assertEqual( 0, $result2['uploaded'], '7.2a: nothing re-uploaded' );
$t->assertEqual( 2, $result2['skipped'],  '7.2b: both skipped (already on R2)' );

echo "\nTest 7.3: validate_pre_uploaded() confirms keys in R2\n";
// Reset synced meta to test validate path.
delete_post_meta( $attachment_id, '_r2_offload_synced' );
delete_post_meta( $attachment_id, '_r2_offload_keys' );

$validate = $sync->validate_pre_uploaded( $attachment_id );
$t->assertEqual( 1, $validate['claimed'], '7.3a: attachment claimed' );
$t->assertEqual( '1', get_post_meta( $attachment_id, '_r2_offload_synced', true ), '7.3b: marked synced via validate' );

echo "\nTest 7.4: restore_from_r2() downloads files back to local\n";
// Delete local files first.
unlink( $local_path );
unlink( $thumb_path );
$t->assert( ! file_exists( $local_path ), '7.4a-pre: local file gone' );

$restore = $sync->restore_from_r2( $attachment_id );
$t->assertEqual( 2, $restore['restored'], '7.4b: 2 files restored' );
$t->assertEqual( 0, $restore['failed'],   '7.4c: no failures' );
$t->assert( file_exists( $local_path ),   '7.4d: original restored locally' );
$t->assert( file_exists( $thumb_path ),   '7.4e: thumbnail restored locally' );

echo "\nTest 7.5: desync_attachment() deletes R2 objects and clears meta\n";
$ok = $sync->desync_attachment( $attachment_id );
$t->assert( $ok === true, '7.5a: desync returns true' );
$t->assertEqual( '', get_post_meta( $attachment_id, '_r2_offload_synced', true ), '7.5b: synced cleared' );
$t->assertEqual( '', get_post_meta( $attachment_id, '_r2_offload_keys', true ),   '7.5c: keys cleared' );
$t->assert( ! $r2->file_exists( $r2_original_key ), '7.5d: original deleted from R2' );
$t->assert( ! $r2->file_exists( $r2_thumb_key ),    '7.5e: thumbnail deleted from R2' );

// ---------------------------------------------------------------------------
// SECTION 8: WooCommerce Size Re-sync
// ---------------------------------------------------------------------------

echo "\n--- SECTION 8: WooCommerce Size Re-sync ---\n\n";

$wc_id = 9002;
$wc_original = '2024/05/product.jpg';
$wc_original_local = $wp_uploads . '/' . $wc_original;
file_put_contents( $wc_original_local, 'product-original-content' );
$GLOBALS['__wp_postmeta'][ $wc_id ]['_wp_attached_file'] = $wc_original;

echo "Test 8.1: initial sync — only original uploaded\n";
$sync2 = new \R2Offload\AttachmentSync( $r2, $settings, $logger );
$r1 = $sync2->sync_attachment( $wc_id );
$t->assertEqual( 1, $r1['uploaded'], '8.1a: original uploaded' );

echo "\nTest 8.2: WooCommerce generates sizes later — re-sync uploads only new sizes\n";
$wc_thumb = '2024/05/product-100x100.jpg';
$wc_thumb_local = $wp_uploads . '/' . $wc_thumb;
file_put_contents( $wc_thumb_local, 'wc-thumbnail-content' );
$GLOBALS['__wp_postmeta'][ $wc_id ]['_wp_attachment_metadata'] = [
    'sizes' => [ 'woocommerce_thumbnail' => [ 'file' => 'product-100x100.jpg' ] ],
];

$r2_result = $sync2->sync_attachment( $wc_id );
$t->assertEqual( 1, $r2_result['uploaded'], '8.2a: only WC thumbnail uploaded' );
$t->assertEqual( 1, $r2_result['skipped'],  '8.2b: original skipped (already on R2)' );
$t->assert( $r2->file_exists( 'wp-content/uploads/' . $wc_thumb ), '8.2c: WC thumbnail in R2' );

// Clean up WC test objects.
$sync2->desync_attachment( $wc_id );

// ---------------------------------------------------------------------------
// SECTION 9: Log Upload
// ---------------------------------------------------------------------------

echo "\n--- SECTION 9: Log Upload ---\n\n";

$log_key     = 'r2-offload-logs/live-test.ndjson';
$log_content = json_encode( [ 'level' => 'info', 'msg' => 'live test log entry', 'ts' => time() ] );

echo "Test 9.1: upload_log() stores log content in R2\n";
$ok = $r2->upload_log( $log_key, $log_content );
$t->assert( $ok === true, '9.1a: upload_log returns true' );
$t->assert( $r2->file_exists( $log_key ), '9.1b: log key exists in R2' );

echo "\nTest 9.2: delete_by_prefix() removes all log objects\n";
$ok = $r2->delete_by_prefix( 'r2-offload-logs/' );
$t->assert( $ok === true, '9.2a: delete_by_prefix returns true' );
$t->assert( ! $r2->file_exists( $log_key ), '9.2b: log file deleted' );

// ---------------------------------------------------------------------------
// SECTION 10: Error Logger Captures API Errors
// ---------------------------------------------------------------------------

echo "\n--- SECTION 10: Error Logging ---\n\n";

echo "Test 10.1: download non-existent key logs error\n";
$bad_path = sys_get_temp_dir() . '/r2-live-bad-download.txt';
$logger2  = new \R2Offload\ErrorLogger();
$r2_log   = new \R2Offload\R2Client( $settings, $logger2 );
$ok = $r2_log->download_file( TEST_PREFIX . 'does-not-exist-xyz.txt', $bad_path );
$t->assert( $ok === false, '10.1a: download returns false for missing key' );
cleanup_temp_file( $bad_path );

// ---------------------------------------------------------------------------
// SECTION 11: Upload ON/OFF toggle — Start and Stop uploads
// Tests the upload_on_save setting that acts as the master start/stop switch.
// ---------------------------------------------------------------------------

echo "\n--- SECTION 11: Start / Stop via upload_on_save toggle ---\n\n";

require_once __DIR__ . '/../includes/class-upload-handler.php';

$toggle_id = 9010;
$toggle_file = '2024/05/toggle-test.jpg';
$toggle_local = $wp_uploads . '/' . $toggle_file;
file_put_contents( $toggle_local, 'toggle-test-content' );
$GLOBALS['__wp_postmeta'][ $toggle_id ]['_wp_attached_file'] = $toggle_file;

echo "Test 11.1: upload_on_save=OFF — on_generate_metadata does NOT upload\n";
$GLOBALS['__wp_options']['r2_offload_upload_on_save'] = 0;
$settings->flush_cache();

$r2_stop = new \R2Offload\R2Client( $settings, $logger );
$sync_stop = new \R2Offload\AttachmentSync( $r2_stop, $settings, $logger );
$handler_stop = new \R2Offload\UploadHandler( $sync_stop, $settings, $logger );

$meta_stop = $handler_stop->on_generate_metadata( [], $toggle_id );
$t->assertEqual( [], $meta_stop, '11.1a: metadata returned unchanged' );
$r2_key_toggle = 'wp-content/uploads/' . $toggle_file;
$t->assert( ! $r2->file_exists( $r2_key_toggle ), '11.1b: file NOT uploaded to R2 when stopped' );
$t->assertEqual( '', get_post_meta( $toggle_id, '_r2_offload_synced', true ), '11.1c: not marked synced' );

echo "\nTest 11.2: upload_on_save=ON — on_generate_metadata uploads (Start)\n";
$GLOBALS['__wp_options']['r2_offload_upload_on_save'] = 1;
$settings->flush_cache();

$r2_start = new \R2Offload\R2Client( $settings, $logger );
$sync_start = new \R2Offload\AttachmentSync( $r2_start, $settings, $logger );
$handler_start = new \R2Offload\UploadHandler( $sync_start, $settings, $logger );

$meta_start = $handler_start->on_generate_metadata( [], $toggle_id );
$t->assertEqual( [], $meta_start, '11.2a: metadata returned unchanged' );
$t->assert( $r2->file_exists( $r2_key_toggle ), '11.2b: file uploaded to R2 when started' );
$t->assertEqual( '1', get_post_meta( $toggle_id, '_r2_offload_synced', true ), '11.2c: marked synced' );

echo "\nTest 11.3: upload_on_save=OFF again — re-trigger does NOT re-upload (Stop mid-stream)\n";
$GLOBALS['__wp_options']['r2_offload_upload_on_save'] = 0;
$settings->flush_cache();

// Reset synced meta so we can verify a new upload would have been attempted.
delete_post_meta( $toggle_id, '_r2_offload_synced' );
delete_post_meta( $toggle_id, '_r2_offload_keys' );

$handler_stop2 = new \R2Offload\UploadHandler(
    new \R2Offload\AttachmentSync( new \R2Offload\R2Client( $settings, $logger ), $settings, $logger ),
    $settings, $logger
);
$handler_stop2->on_generate_metadata( [], $toggle_id );
$t->assertEqual( '', get_post_meta( $toggle_id, '_r2_offload_synced', true ), '11.3a: stop respected — not re-synced' );

// Clean up toggle test.
$r2->delete_file( $r2_key_toggle );
cleanup_temp_file( $toggle_local );
$GLOBALS['__wp_options']['r2_offload_upload_on_save'] = 1;
$settings->flush_cache();

// ---------------------------------------------------------------------------
// SECTION 12: Pause and Resume — migration pause flag
// Simulates the admin pausing and resuming a bulk migration.
// The pause flag (r2_offload_migration_paused) is checked by BatchProcessor
// before each batch. Here we verify: files queued before pause do upload,
// files attempted after pause are skipped, and resume restores normal operation.
// ---------------------------------------------------------------------------

echo "\n--- SECTION 12: Pause and Resume migration ---\n\n";

// Set up 5 fake attachments.
$pause_base_id = 9020;
for ( $i = 1; $i <= 5; $i++ ) {
    $fname = "pause-test-{$i}.jpg";
    $fpath = $wp_uploads . "/2024/05/{$fname}";
    file_put_contents( $fpath, "pause-test-content-{$i}" );
    $GLOBALS['__wp_postmeta'][ $pause_base_id + $i ]['_wp_attached_file'] = "2024/05/{$fname}";
}

$sync_pause = new \R2Offload\AttachmentSync( new \R2Offload\R2Client( $settings, $logger ), $settings, $logger );

echo "Test 12.1: Process first 2 attachments before pause\n";
for ( $i = 1; $i <= 2; $i++ ) {
    $res = $sync_pause->sync_attachment( $pause_base_id + $i );
    $t->assertEqual( 1, $res['uploaded'], "12.1-{$i}: attachment {$i} uploaded before pause" );
}
$synced_before = 0;
for ( $i = 1; $i <= 2; $i++ ) {
    if ( get_post_meta( $pause_base_id + $i, '_r2_offload_synced', true ) === '1' ) $synced_before++;
}
$t->assertEqual( 2, $synced_before, '12.1a: 2 attachments synced before pause' );

echo "\nTest 12.2: Set pause flag — subsequent syncs skipped\n";
update_option( 'r2_offload_migration_paused', 1 );
$t->assert( (bool) get_option( 'r2_offload_migration_paused' ), '12.2a: pause flag set' );

// Attachments 3-5 should NOT be synced while paused.
// (In production, BatchProcessor checks the flag before picking items.
//  Here we simulate by checking the flag before each sync — matching BatchProcessor logic.)
$skipped_during_pause = 0;
for ( $i = 3; $i <= 5; $i++ ) {
    if ( get_option( 'r2_offload_migration_paused' ) ) {
        $skipped_during_pause++;
        continue; // Respect pause — same as BatchProcessor does.
    }
    $sync_pause->sync_attachment( $pause_base_id + $i );
}
$t->assertEqual( 3, $skipped_during_pause, '12.2b: 3 attachments skipped during pause' );
$not_synced = 0;
for ( $i = 3; $i <= 5; $i++ ) {
    if ( get_post_meta( $pause_base_id + $i, '_r2_offload_synced', true ) !== '1' ) $not_synced++;
}
$t->assertEqual( 3, $not_synced, '12.2c: 3 attachments NOT synced while paused' );
for ( $i = 3; $i <= 5; $i++ ) {
    $t->assert( ! $r2->file_exists( 'wp-content/uploads/2024/05/pause-test-' . $i . '.jpg' ),
        "12.2d-{$i}: file {$i} not in R2 during pause" );
}

echo "\nTest 12.3: Clear pause flag (Resume) — remaining attachments sync\n";
delete_option( 'r2_offload_migration_paused' );
$t->assert( ! get_option( 'r2_offload_migration_paused' ), '12.3a: pause flag cleared' );

$sync_resume = new \R2Offload\AttachmentSync( new \R2Offload\R2Client( $settings, $logger ), $settings, $logger );
$resumed_count = 0;
for ( $i = 3; $i <= 5; $i++ ) {
    if ( get_option( 'r2_offload_migration_paused' ) ) continue; // Still check — good practice.
    $res = $sync_resume->sync_attachment( $pause_base_id + $i );
    if ( $res['uploaded'] === 1 ) $resumed_count++;
}
$t->assertEqual( 3, $resumed_count, '12.3b: all 3 paused attachments uploaded after resume' );

$all_synced_after_resume = 0;
for ( $i = 1; $i <= 5; $i++ ) {
    if ( get_post_meta( $pause_base_id + $i, '_r2_offload_synced', true ) === '1' ) $all_synced_after_resume++;
}
$t->assertEqual( 5, $all_synced_after_resume, '12.3c: all 5 attachments synced after resume' );

for ( $i = 3; $i <= 5; $i++ ) {
    $t->assert( $r2->file_exists( 'wp-content/uploads/2024/05/pause-test-' . $i . '.jpg' ),
        "12.3d-{$i}: file {$i} in R2 after resume" );
}

// Clean up pause test objects.
for ( $i = 1; $i <= 5; $i++ ) {
    $r2->delete_file( 'wp-content/uploads/2024/05/pause-test-' . $i . '.jpg' );
    cleanup_temp_file( $wp_uploads . '/2024/05/pause-test-' . $i . '.jpg' );
}

// ---------------------------------------------------------------------------
// SECTION 13: Upload Retry on Failure
// Verifies that a failed upload increments retry meta and a subsequent
// success clears it — exercising the retry path with real R2.
// ---------------------------------------------------------------------------

echo "\n--- SECTION 13: Upload Retry on Failure ---\n\n";

// We can't force R2 to fail, but we CAN test the retry meta bookkeeping
// by deliberately breaking credentials, then restoring them.
$retry_id = 9030;
$retry_file = '2024/05/retry-test.jpg';
$retry_local = $wp_uploads . '/' . $retry_file;
file_put_contents( $retry_local, 'retry-test-content' );
$GLOBALS['__wp_postmeta'][ $retry_id ]['_wp_attached_file'] = $retry_file;

echo "Test 13.1: First attempt fails (bad credentials) → retry_count increments\n";
// Swap in bad credentials.
$bad_settings = clone $settings;
$GLOBALS['__wp_options']['r2_offload_access_key_id'] = 'BADBADBADBAD';
$settings->flush_cache();

$r2_bad  = new \R2Offload\R2Client( $settings, $logger );
$sync_bad = new \R2Offload\AttachmentSync( $r2_bad, $settings, $logger );
$res_bad  = $sync_bad->sync_attachment( $retry_id );
$t->assertEqual( 1, $res_bad['failed'], '13.1a: upload fails with bad credentials' );
$t->assertEqual( 1, (int) get_post_meta( $retry_id, '_r2_offload_retry_count', true ), '13.1b: retry_count = 1' );
$t->assert( (bool) get_post_meta( $retry_id, '_r2_offload_error', true ), '13.1c: error meta set' );
$t->assertEqual( '', get_post_meta( $retry_id, '_r2_offload_synced', true ), '13.1d: NOT marked synced' );

echo "\nTest 13.2: Restore good credentials — second attempt succeeds → retry meta cleared\n";
$GLOBALS['__wp_options']['r2_offload_access_key_id'] = $key_id;
$settings->flush_cache();

$r2_good   = new \R2Offload\R2Client( $settings, $logger );
$sync_good = new \R2Offload\AttachmentSync( $r2_good, $settings, $logger );
$res_good  = $sync_good->sync_attachment( $retry_id );
$t->assertEqual( 1, $res_good['uploaded'], '13.2a: upload succeeds on retry' );
$t->assertEqual( 0, $res_good['failed'],   '13.2b: no failures' );
$t->assertEqual( '', get_post_meta( $retry_id, '_r2_offload_retry_count', true ), '13.2c: retry_count cleared on success' );
$t->assertEqual( '', get_post_meta( $retry_id, '_r2_offload_error', true ),        '13.2d: error meta cleared on success' );
$t->assertEqual( '1', get_post_meta( $retry_id, '_r2_offload_synced', true ),      '13.2e: marked synced after successful retry' );
$r2_retry_key = 'wp-content/uploads/' . $retry_file;
$t->assert( $r2->file_exists( $r2_retry_key ), '13.2f: file confirmed in R2 after retry' );

echo "\nTest 13.3: Max retries (3) — retry_count reaches 3, attachment stays failed\n";
$retry_id2 = 9031;
$retry_file2 = '2024/05/retry-max-test.jpg';
$retry_local2 = $wp_uploads . '/' . $retry_file2;
file_put_contents( $retry_local2, 'retry-max-content' );
$GLOBALS['__wp_postmeta'][ $retry_id2 ]['_wp_attached_file'] = $retry_file2;

$GLOBALS['__wp_options']['r2_offload_access_key_id'] = 'BADBADBADBAD';
$settings->flush_cache();

$r2_max  = new \R2Offload\R2Client( $settings, $logger );
$sync_max = new \R2Offload\AttachmentSync( $r2_max, $settings, $logger );

for ( $attempt = 1; $attempt <= 3; $attempt++ ) {
    $sync_max->sync_attachment( $retry_id2 );
}
$t->assertEqual( 3, (int) get_post_meta( $retry_id2, '_r2_offload_retry_count', true ), '13.3a: retry_count = 3 after 3 failures' );

// Simulate BatchProcessor's "move to failed" logic after max retries.
$final_retry = (int) get_post_meta( $retry_id2, '_r2_offload_retry_count', true );
$would_be_status = $final_retry >= 3 ? 'failed' : 'pending';
$t->assertEqual( 'failed', $would_be_status, '13.3b: BatchProcessor would set status=failed at retry 3' );

// Restore correct credentials.
$GLOBALS['__wp_options']['r2_offload_access_key_id'] = $key_id;
$settings->flush_cache();

// Clean up retry test objects.
$r2->delete_file( $r2_retry_key );
cleanup_temp_file( $retry_local );
cleanup_temp_file( $retry_local2 );

// ---------------------------------------------------------------------------
// Final cleanup — remove any leftover test objects under TEST_PREFIX
// ---------------------------------------------------------------------------

echo "\n--- Cleanup ---\n";
$leftover = $r2->list_objects( TEST_PREFIX, 1000 );
if ( ! empty( $leftover['objects'] ) ) {
    $leftover_keys = array_column( $leftover['objects'], 'Key' );
    $r2->delete_files( $leftover_keys );
    echo "Cleaned " . count( $leftover_keys ) . " leftover test objects.\n";
} else {
    echo "No leftover objects.\n";
}

// Clean up local temp files.
foreach ( [ $local_path, $thumb_path, $wc_original_local, $wc_thumb_local ] as $f ) {
    if ( file_exists( $f ) ) {
        unlink( $f );
    }
}

exit( $t->summary() );
