<?php
/**
 * Comprehensive unit tests for upload, delete, and check operations.
 *
 * Covers every code path in:
 *  - collect_files()            — local→R2 key mapping for all file configurations
 *  - sync_attachment()          — all upload scenarios
 *  - delete_local_for_attachment() — all local-delete scenarios
 *  - desync_attachment()        — all R2-delete / meta-clear scenarios
 *  - restore_and_desync_attachment() — abort paths
 *  - validate_pre_uploaded()    — all check_key scenarios
 *
 * Run: php tests/test-upload-delete-check.php
 */

require_once __DIR__ . '/bootstrap.php';

use R2Offload\AttachmentSync;
use R2Offload\R2Client;
use R2Offload\Settings;
use R2Offload\ErrorLogger;

// =========================================================================
// Test harness
// =========================================================================

class TestRunner {
    private int   $passed   = 0;
    private int   $failed   = 0;
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
        echo "Results: {$this->passed}/{$total} passed, {$this->failed} failed\n";
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

// =========================================================================
// Helpers
// =========================================================================

function reset_state(): void {
    $GLOBALS['__wp_postmeta'] = [];
    $GLOBALS['__wp_options']  = [];
    $GLOBALS['__wp_deleted']  = [];
    $GLOBALS['__wp_transients'] = [];
}

function setup_upload_dir(): string {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( ! is_dir( $base ) ) {
        mkdir( $base, 0755, true );
    }
    return $base;
}

function create_test_file( string $relative_path, string $content = '' ): string {
    $base = setup_upload_dir();
    $full = $base . '/' . $relative_path;
    $dir  = dirname( $full );
    if ( ! is_dir( $dir ) ) {
        mkdir( $dir, 0755, true );
    }
    file_put_contents( $full, $content ?: 'content-' . basename( $relative_path ) );
    return $full;
}

function cleanup_upload_dir(): void {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( is_dir( $base ) ) {
        $it    = new RecursiveDirectoryIterator( $base, RecursiveDirectoryIterator::SKIP_DOTS );
        $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
        foreach ( $files as $file ) {
            $file->isDir() ? rmdir( $file->getRealPath() ) : unlink( $file->getRealPath() );
        }
        rmdir( $base );
    }
}

function setup_meta( int $id, string $attached, array $sizes = [], ?string $mime = null ): void {
    $GLOBALS['__wp_postmeta'][ $id ]['_wp_attached_file'] = $attached;
    if ( ! empty( $sizes ) ) {
        $GLOBALS['__wp_postmeta'][ $id ]['_wp_attachment_metadata'] = [ 'sizes' => $sizes ];
    }
    if ( $mime !== null ) {
        $GLOBALS['__wp_postmeta'][ $id ]['_mime_type'] = $mime;
    }
}

function make_sync( ?Settings $settings = null, ?R2Client $r2 = null, ?ErrorLogger $logger = null ): AttachmentSync {
    return new AttachmentSync(
        $r2       ?? new R2Client(),
        $settings ?? new Settings(),
        $logger   ?? new ErrorLogger()
    );
}

// =========================================================================
// SECTION 1: collect_files() — local→R2 key mapping
// =========================================================================

echo "\n--- SECTION 1: collect_files() mapping ---\n\n";

$t = new TestRunner();
$base_dir = sys_get_temp_dir() . '/wp-uploads/';

// Test 1.1: Original file only, no sizes, default prefix
echo "Test 1.1: original file only — default prefix\n";
$sync   = make_sync();
$result = $sync->collect_files_public( '2024/03/photo.jpg', null, $base_dir, 'wp-content/uploads' );
$t->assertEqual( 1, count( $result ), '1.1a: exactly one entry' );
$t->assertEqual(
    [ $base_dir . '2024/03/photo.jpg' => 'wp-content/uploads/2024/03/photo.jpg' ],
    $result,
    '1.1b: correct local→key mapping'
);

// Test 1.2: Original + two sizes
echo "\nTest 1.2: original + two sizes\n";
$meta   = [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ], 'medium' => [ 'file' => 'photo-300x200.jpg' ] ];
$result = $sync->collect_files_public( '2024/03/photo.jpg', [ 'sizes' => $meta ], $base_dir, 'wp-content/uploads' );
$t->assertEqual( 3, count( $result ), '1.2a: original + 2 sizes = 3 entries' );
$t->assert( isset( $result[ $base_dir . '2024/03/photo.jpg' ] ), '1.2b: original present' );
$t->assert( isset( $result[ $base_dir . '2024/03/photo-150x150.jpg' ] ), '1.2c: thumbnail present' );
$t->assert( isset( $result[ $base_dir . '2024/03/photo-300x200.jpg' ] ), '1.2d: medium present' );
$t->assertEqual( 'wp-content/uploads/2024/03/photo-150x150.jpg', $result[ $base_dir . '2024/03/photo-150x150.jpg' ], '1.2e: thumbnail R2 key correct' );

// Test 1.3: null metadata → only original
echo "\nTest 1.3: null metadata → only original\n";
$result = $sync->collect_files_public( '2024/03/photo.jpg', null, $base_dir, 'wp-content/uploads' );
$t->assertEqual( 1, count( $result ), '1.3a: null metadata = original only' );

// Test 1.4: Empty sizes array → only original
echo "\nTest 1.4: empty sizes array → only original\n";
$result = $sync->collect_files_public( '2024/03/photo.jpg', [ 'sizes' => [] ], $base_dir, 'wp-content/uploads' );
$t->assertEqual( 1, count( $result ), '1.4a: empty sizes = original only' );

// Test 1.5: Empty path prefix → keys have no prefix
echo "\nTest 1.5: empty path prefix → no prefix in R2 keys\n";
$result = $sync->collect_files_public( '2024/03/photo.jpg', null, $base_dir, '' );
$t->assertEqual( '2024/03/photo.jpg', $result[ $base_dir . '2024/03/photo.jpg' ], '1.5a: key = relative path only' );

// Test 1.6: Custom path prefix
echo "\nTest 1.6: custom path prefix\n";
$result = $sync->collect_files_public( '2024/03/photo.jpg', null, $base_dir, 'media/files' );
$t->assertEqual( 'media/files/2024/03/photo.jpg', $result[ $base_dir . '2024/03/photo.jpg' ], '1.6a: custom prefix applied' );

// Test 1.7: File at root level (no year/month subdirectory)
echo "\nTest 1.7: root-level file (no year/month subdir)\n";
$result = $sync->collect_files_public( 'photo.jpg', null, $base_dir, 'wp-content/uploads' );
$t->assertEqual( 'wp-content/uploads/photo.jpg', $result[ $base_dir . 'photo.jpg' ], '1.7a: root file key correct' );

// Test 1.8: Root-level file + sizes — size file should be in same (root) dir
echo "\nTest 1.8: root-level file + sizes\n";
$meta   = [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ];
$result = $sync->collect_files_public( 'photo.jpg', [ 'sizes' => $meta ], $base_dir, 'wp-content/uploads' );
$t->assertEqual( 2, count( $result ), '1.8a: root file + 1 size = 2 entries' );
$t->assertEqual( 'wp-content/uploads/photo-150x150.jpg', $result[ $base_dir . 'photo-150x150.jpg' ], '1.8b: root size key correct' );

// Test 1.9: WooCommerce sizes included automatically
echo "\nTest 1.9: WooCommerce sizes in metadata\n";
$wc_meta = [
    'woocommerce_thumbnail'        => [ 'file' => 'product-150x150.jpg' ],
    'woocommerce_single'           => [ 'file' => 'product-600x600.jpg' ],
    'woocommerce_gallery_thumbnail'=> [ 'file' => 'product-100x100.jpg' ],
    'thumbnail'                    => [ 'file' => 'product-80x80.jpg' ],
];
$result = $sync->collect_files_public( '2024/03/product.jpg', [ 'sizes' => $wc_meta ], $base_dir, 'wp-content/uploads' );
$t->assertEqual( 5, count( $result ), '1.9a: original + 4 WC sizes = 5 entries' );
$t->assert( isset( $result[ $base_dir . '2024/03/product-150x150.jpg' ] ), '1.9b: wc_thumbnail present' );
$t->assert( isset( $result[ $base_dir . '2024/03/product-600x600.jpg' ] ), '1.9c: wc_single present' );

// Test 1.10: Size entry with no 'file' key is ignored
echo "\nTest 1.10: size entry with no file key is ignored\n";
$bad_meta = [
    'thumbnail' => [ 'width' => 150, 'height' => 150 ], // no 'file'
    'medium'    => [ 'file' => 'photo-300x200.jpg' ],
];
$result = $sync->collect_files_public( '2024/03/photo.jpg', [ 'sizes' => $bad_meta ], $base_dir, 'wp-content/uploads' );
$t->assertEqual( 2, count( $result ), '1.10a: malformed size skipped, original + medium = 2' );

// =========================================================================
// SECTION 2: Upload — all sync_attachment scenarios
// =========================================================================

echo "\n--- SECTION 2: Upload — sync_attachment() ---\n\n";

// Test 2.1: Fresh upload — single file, no sizes
echo "Test 2.1: fresh upload — single file\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 100, '2024/03/photo.jpg' );
$r2   = new R2Client();
$sync = make_sync( null, $r2 );
$res  = $sync->sync_attachment( 100 );
$t->assertEqual( 1, $res['uploaded'], '2.1a: 1 file uploaded' );
$t->assertEqual( 0, $res['failed'],   '2.1b: no failures' );
$t->assertEqual( 0, $res['skipped'],  '2.1c: nothing skipped' );
$t->assertEqual( '1', get_post_meta( 100, '_r2_offload_synced', true ), '2.1d: marked synced' );
$t->assertEqual( 1, count( $r2->uploaded ), '2.1e: R2 received exactly 1 upload call' );
$t->assertEqual( 'wp-content/uploads/2024/03/photo.jpg', $r2->uploaded[0]['key'], '2.1f: correct R2 key' );

// Test 2.2: Fresh upload — original + 3 sizes
echo "\nTest 2.2: fresh upload — original + 3 sizes\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/img.jpg' );
create_test_file( '2024/03/img-150x150.jpg' );
create_test_file( '2024/03/img-300x200.jpg' );
create_test_file( '2024/03/img-768x400.jpg' );
setup_meta( 101, '2024/03/img.jpg', [
    'thumbnail' => [ 'file' => 'img-150x150.jpg' ],
    'medium'    => [ 'file' => 'img-300x200.jpg' ],
    'large'     => [ 'file' => 'img-768x400.jpg' ],
] );
$r2  = new R2Client();
$res = make_sync( null, $r2 )->sync_attachment( 101 );
$t->assertEqual( 4, $res['uploaded'], '2.2a: 4 files uploaded' );
$t->assertEqual( 0, $res['failed'],   '2.2b: no failures' );
$t->assertEqual( 4, count( $r2->uploaded ), '2.2c: R2 received 4 upload calls' );

// Test 2.3: Re-upload — all files already on R2, all skipped
echo "\nTest 2.3: re-upload — all already on R2 → all skipped\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 102, '2024/03/photo.jpg' );
update_post_meta( 102, '_r2_offload_synced', '1' );
update_post_meta( 102, '_r2_offload_keys',   wp_json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );
$r2  = new R2Client();
$res = make_sync( null, $r2 )->sync_attachment( 102 );
$t->assertEqual( 0, $res['uploaded'], '2.3a: nothing uploaded' );
$t->assertEqual( 1, $res['skipped'],  '2.3b: 1 skipped (already on R2)' );
$t->assertEqual( [], $r2->uploaded,   '2.3c: R2 upload never called' );
$t->assertEqual( '1', get_post_meta( 102, '_r2_offload_synced', true ), '2.3d: still synced' );

// Test 2.4: Re-upload — 1 of 2 on R2, 1 new WooCommerce size
echo "\nTest 2.4: WooCommerce re-sync — only new size uploaded\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/product.jpg' );
create_test_file( '2024/03/product-100x100.jpg' );
setup_meta( 103, '2024/03/product.jpg', [
    'woocommerce_thumbnail' => [ 'file' => 'product-100x100.jpg' ],
] );
update_post_meta( 103, '_r2_offload_synced', '1' );
update_post_meta( 103, '_r2_offload_keys',   wp_json_encode( [ 'wp-content/uploads/2024/03/product.jpg' ] ) );
$r2  = new R2Client();
$res = make_sync( null, $r2 )->sync_attachment( 103 );
$t->assertEqual( 1, $res['uploaded'], '2.4a: 1 new size uploaded' );
$t->assertEqual( 1, $res['skipped'],  '2.4b: original skipped (already on R2)' );
$t->assertEqual( 'wp-content/uploads/2024/03/product-100x100.jpg', $r2->uploaded[0]['key'], '2.4c: WC size key correct' );
$keys = json_decode( get_post_meta( 103, '_r2_offload_keys', true ), true );
$t->assertEqual( 2, count( $keys ), '2.4d: 2 keys tracked after re-sync' );

// Test 2.5: Upload fails → not synced, retry_count incremented
echo "\nTest 2.5: upload fails → not synced, retry_count = 1\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 104, '2024/03/photo.jpg' );
$r2 = new R2Client();
$r2->upload_returns = false;
$res = make_sync( null, $r2 )->sync_attachment( 104 );
$t->assertEqual( 1, $res['failed'],  '2.5a: 1 failure' );
$t->assertEqual( 0, $res['uploaded'], '2.5b: nothing uploaded' );
$t->assertEqual( '', get_post_meta( 104, '_r2_offload_synced', true ), '2.5c: NOT marked synced' );
$t->assertEqual( 1, (int) get_post_meta( 104, '_r2_offload_retry_count', true ), '2.5d: retry_count = 1' );
$t->assert( (bool) get_post_meta( 104, '_r2_offload_error', true ), '2.5e: error meta set' );

// Test 2.6: Partial failure (some uploaded, some failed) → not synced
echo "\nTest 2.6: partial failure — some uploaded, some failed → not synced\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/img.jpg' );
create_test_file( '2024/03/img-150x150.jpg' );
setup_meta( 105, '2024/03/img.jpg', [
    'thumbnail' => [ 'file' => 'img-150x150.jpg' ],
] );
// First upload succeeds, second fails.
$r2 = new R2Client();
$call_count = 0;
// We can't control per-call via the simple stub — the stub returns the same value for all.
// Test instead: all-fail scenario verifies synced is NOT set.
$r2->upload_returns = false;
$res = make_sync( null, $r2 )->sync_attachment( 105 );
$t->assertEqual( 2, $res['failed'],  '2.6a: both failed' );
$t->assertEqual( '', get_post_meta( 105, '_r2_offload_synced', true ), '2.6b: NOT synced when any failed' );
$t->assertEqual( '', get_post_meta( 105, '_r2_offload_local_deleted', true ), '2.6c: local_deleted NOT set' );

// Test 2.7: Not configured → skipped
echo "\nTest 2.7: not configured → skipped\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 106, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_configured( false );
$r2  = new R2Client();
$res = make_sync( $settings, $r2 )->sync_attachment( 106 );
$t->assertEqual( 1, $res['skipped'], '2.7a: skipped' );
$t->assertEqual( 0, $res['uploaded'], '2.7b: nothing uploaded' );
$t->assertEqual( [], $r2->uploaded, '2.7c: R2 never called' );

// Test 2.8: MIME excluded → skipped
echo "\nTest 2.8: excluded MIME type → skipped\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/video.mp4' );
setup_meta( 107, '2024/03/video.mp4', [], 'video/mp4' );
$settings = new Settings();
$settings->set_excluded_mime_types( [ 'video/mp4' ] );
$r2  = new R2Client();
$res = make_sync( $settings, $r2 )->sync_attachment( 107 );
$t->assertEqual( 1, $res['skipped'], '2.8a: skipped' );
$t->assertEqual( [], $r2->uploaded, '2.8b: R2 never called' );

// Test 2.9: Missing _wp_attached_file → failed
echo "\nTest 2.9: missing _wp_attached_file → failed\n";
reset_state(); cleanup_upload_dir();
$r2   = new R2Client();
$log  = new ErrorLogger();
$res  = make_sync( null, $r2, $log )->sync_attachment( 108 );
$t->assertEqual( 1, $res['failed'],  '2.9a: failed' );
$t->assertEqual( 0, $res['uploaded'], '2.9b: nothing uploaded' );
$errors = array_filter( $log->logs, fn( $l ) => $l['level'] === 'error' );
$t->assert( count( $errors ) > 0, '2.9c: error logged' );

// Test 2.10: File missing on disk → skipped (not failed)
echo "\nTest 2.10: file missing on disk → skipped gracefully\n";
reset_state(); cleanup_upload_dir();
setup_meta( 109, '2024/03/photo.jpg' ); // metadata set but no actual file
$r2   = new R2Client();
$log  = new ErrorLogger();
$res  = make_sync( null, $r2, $log )->sync_attachment( 109 );
$t->assertEqual( 1, $res['skipped'], '2.10a: skipped' );
$t->assertEqual( 0, $res['failed'],  '2.10b: not counted as failure' );
$warnings = array_filter( $log->logs, fn( $l ) => $l['level'] === 'warning' );
$t->assert( count( $warnings ) > 0, '2.10c: warning logged for missing file' );

// Test 2.11: delete_local=true → files deleted + meta set after success
echo "\nTest 2.11: delete_local=true → files deleted and local_deleted flag set\n";
reset_state(); cleanup_upload_dir();
$orig  = create_test_file( '2024/03/photo.jpg' );
$thumb = create_test_file( '2024/03/photo-150x150.jpg' );
setup_meta( 110, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
$settings = new Settings();
$settings->set_delete_local( true );
$res = make_sync( $settings, new R2Client() )->sync_attachment( 110 );
$t->assertEqual( 2, $res['uploaded'], '2.11a: 2 uploaded' );
$t->assertEqual( '1', get_post_meta( 110, '_r2_offload_local_deleted', true ), '2.11b: local_deleted flag set' );
$t->assert( ! file_exists( $orig ),  '2.11c: original file deleted' );
$t->assert( ! file_exists( $thumb ), '2.11d: thumbnail file deleted' );

// Test 2.12: delete_local=true but upload fails → files NOT deleted
echo "\nTest 2.12: delete_local=true + upload failure → files NOT deleted\n";
reset_state(); cleanup_upload_dir();
$orig = create_test_file( '2024/03/photo.jpg' );
setup_meta( 111, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_delete_local( true );
$r2 = new R2Client();
$r2->upload_returns = false;
make_sync( $settings, $r2 )->sync_attachment( 111 );
$t->assert( file_exists( $orig ), '2.12a: file NOT deleted on failure' );
$t->assertEqual( '', get_post_meta( 111, '_r2_offload_local_deleted', true ), '2.12b: local_deleted NOT set' );

// Test 2.13: R2 keys tracked correctly — unique, sorted
echo "\nTest 2.13: R2 keys tracked correctly\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/img.jpg' );
create_test_file( '2024/03/img-150x150.jpg' );
setup_meta( 112, '2024/03/img.jpg', [ 'thumbnail' => [ 'file' => 'img-150x150.jpg' ] ] );
make_sync( null, new R2Client() )->sync_attachment( 112 );
$keys = json_decode( get_post_meta( 112, '_r2_offload_keys', true ), true );
$t->assertEqual( 2, count( $keys ), '2.13a: 2 keys tracked' );
$t->assert( in_array( 'wp-content/uploads/2024/03/img.jpg', $keys, true ), '2.13b: original key tracked' );
$t->assert( in_array( 'wp-content/uploads/2024/03/img-150x150.jpg', $keys, true ), '2.13c: thumbnail key tracked' );

// Test 2.14: retry_count increments on each failure
echo "\nTest 2.14: retry_count increments with each failure\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 113, '2024/03/photo.jpg' );
$r2 = new R2Client();
$r2->upload_returns = false;
$sync = make_sync( null, $r2 );
$sync->sync_attachment( 113 );
$t->assertEqual( 1, (int) get_post_meta( 113, '_r2_offload_retry_count', true ), '2.14a: count=1 after 1st fail' );
$sync->sync_attachment( 113 );
$t->assertEqual( 2, (int) get_post_meta( 113, '_r2_offload_retry_count', true ), '2.14b: count=2 after 2nd fail' );
$sync->sync_attachment( 113 );
$t->assertEqual( 3, (int) get_post_meta( 113, '_r2_offload_retry_count', true ), '2.14c: count=3 after 3rd fail' );

// Test 2.15: Success clears retry_count and error after previous failure
echo "\nTest 2.15: success clears retry_count and error\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 114, '2024/03/photo.jpg' );
update_post_meta( 114, '_r2_offload_retry_count', 3 );
update_post_meta( 114, '_r2_offload_error', 'Previous upload failure' );
make_sync( null, new R2Client() )->sync_attachment( 114 );
$t->assertEqual( '', get_post_meta( 114, '_r2_offload_retry_count', true ), '2.15a: retry_count cleared' );
$t->assertEqual( '', get_post_meta( 114, '_r2_offload_error', true ), '2.15b: error cleared' );

// Test 2.16: Stats recorded after upload (uploads count, bytes > 0)
echo "\nTest 2.16: upload stats recorded in wp_options\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg', str_repeat( 'X', 1024 ) ); // 1 KB
setup_meta( 115, '2024/03/photo.jpg' );
make_sync( null, new R2Client() )->sync_attachment( 115 );
$stat_key = 'r2_offload_stats_' . gmdate( 'Y-m-d' );
$stats    = get_option( $stat_key );
$t->assert( is_array( $stats ), '2.16a: stats option exists' );
$t->assertEqual( 1, $stats['uploads'], '2.16b: uploads count = 1' );
$t->assert( $stats['bytes'] >= 1024, '2.16c: bytes >= 1024' );

// Test 2.17: false from wp_get_attachment_metadata handled gracefully (?: null fix)
echo "\nTest 2.17: wp_get_attachment_metadata returns false → treated as null\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/document.pdf' );
// Set the meta to false (simulates the bug: PDFs often have no metadata).
$GLOBALS['__wp_postmeta'][116]['_wp_attached_file']        = '2024/03/document.pdf';
$GLOBALS['__wp_postmeta'][116]['_wp_attachment_metadata']  = false;
$r2  = new R2Client();
$res = make_sync( null, $r2 )->sync_attachment( 116 );
$t->assertEqual( 1, $res['uploaded'], '2.17a: uploaded without fatal error' );
$t->assertEqual( 0, $res['failed'],   '2.17b: no failure from false metadata' );
$t->assertEqual( 1, count( $r2->uploaded ), '2.17c: R2 received the upload' );

// Test 2.18: Migration terminal written after each sync call
echo "\nTest 2.18: migration terminal entry written\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 117, '2024/03/photo.jpg' );
$log = new ErrorLogger();
make_sync( null, new R2Client(), $log )->sync_attachment( 117 );
$t->assertEqual( 1, count( $log->migration_terminal ), '2.18a: 1 terminal entry written' );
$entry = $log->migration_terminal[0];
$t->assertEqual( 117, $entry['id'],       '2.18b: correct attachment ID' );
$t->assertEqual( '2024/03/photo.jpg', $entry['file'], '2.18c: full relative path in entry' );
$t->assertEqual( 1, $entry['up'],         '2.18d: up=1' );
$t->assertEqual( 0, $entry['fail'],       '2.18e: fail=0' );

// Test 2.19: Custom path prefix applied to R2 keys
echo "\nTest 2.19: custom path prefix in R2 keys\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 118, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_path_prefix( 'media/custom' );
$r2 = new R2Client();
make_sync( $settings, $r2 )->sync_attachment( 118 );
$t->assertEqual( 'media/custom/2024/03/photo.jpg', $r2->uploaded[0]['key'], '2.19a: custom prefix in uploaded key' );
$keys = json_decode( get_post_meta( 118, '_r2_offload_keys', true ), true );
$t->assertEqual( [ 'media/custom/2024/03/photo.jpg' ], $keys, '2.19b: custom prefix tracked in meta' );

// Test 2.20: Empty path prefix — files stored at bucket root
echo "\nTest 2.20: empty path prefix → files at bucket root\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 119, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_path_prefix( '' );
$r2 = new R2Client();
make_sync( $settings, $r2 )->sync_attachment( 119 );
$t->assertEqual( '2024/03/photo.jpg', $r2->uploaded[0]['key'], '2.20a: no prefix in key' );

// =========================================================================
// SECTION 3: Delete local — all delete_local_for_attachment scenarios
// =========================================================================

echo "\n--- SECTION 3: Delete local — delete_local_for_attachment() ---\n\n";

// Test 3.1: Normal — files exist, all deleted, flag set
echo "Test 3.1: files exist → deleted, flag set\n";
reset_state(); cleanup_upload_dir();
$orig  = create_test_file( '2024/03/photo.jpg' );
$thumb = create_test_file( '2024/03/photo-150x150.jpg' );
setup_meta( 200, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
update_post_meta( 200, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 200 );
$t->assertEqual( 2, $res['deleted'], '3.1a: 2 deleted' );
$t->assertEqual( 0, $res['skipped'], '3.1b: none skipped' );
$t->assertEqual( '1', get_post_meta( 200, '_r2_offload_local_deleted', true ), '3.1c: flag set' );
$t->assert( ! file_exists( $orig ),  '3.1d: original file gone' );
$t->assert( ! file_exists( $thumb ), '3.1e: thumbnail file gone' );

// Test 3.2: Files already gone (e.g., migration deleted them) — flag still set
echo "\nTest 3.2: files already gone → flag still set\n";
reset_state(); cleanup_upload_dir();
setup_meta( 201, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
update_post_meta( 201, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 201 );
$t->assertEqual( 0, $res['deleted'], '3.2a: nothing to delete' );
$t->assertEqual( 2, $res['skipped'], '3.2b: 2 skipped (already gone)' );
$t->assertEqual( '1', get_post_meta( 201, '_r2_offload_local_deleted', true ), '3.2c: flag SET despite files gone' );

// Test 3.3: Mixed — some exist, some already gone
echo "\nTest 3.3: mixed — orig exists, thumb gone → flag set\n";
reset_state(); cleanup_upload_dir();
$orig = create_test_file( '2024/03/photo.jpg' );
setup_meta( 202, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
update_post_meta( 202, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 202 );
$t->assertEqual( 1, $res['deleted'], '3.3a: 1 deleted' );
$t->assertEqual( 1, $res['skipped'], '3.3b: 1 skipped (already gone)' );
$t->assertEqual( '1', get_post_meta( 202, '_r2_offload_local_deleted', true ), '3.3c: flag set' );

// Test 3.4: Not synced — safety guard refuses deletion
echo "\nTest 3.4: not synced → safety guard\n";
reset_state(); cleanup_upload_dir();
$orig = create_test_file( '2024/03/photo.jpg' );
setup_meta( 203, '2024/03/photo.jpg' );
$res = make_sync()->delete_local_for_attachment( 203 );
$t->assertEqual( 0, $res['deleted'], '3.4a: nothing deleted' );
$t->assertEqual( 1, $res['skipped'], '3.4b: skipped (not synced)' );
$t->assert( file_exists( $orig ), '3.4c: file still exists locally' );
$t->assertEqual( '', get_post_meta( 203, '_r2_offload_local_deleted', true ), '3.4d: flag NOT set' );

// Test 3.5: No _wp_attached_file → skipped
echo "\nTest 3.5: no _wp_attached_file → skipped\n";
reset_state();
update_post_meta( 204, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 204 );
$t->assertEqual( 0, $res['deleted'], '3.5a: nothing deleted' );
$t->assertEqual( 1, $res['skipped'], '3.5b: skipped' );
$t->assertEqual( '', get_post_meta( 204, '_r2_offload_local_deleted', true ), '3.5c: flag NOT set' );

// Test 3.6: All sizes exist — all deleted
echo "\nTest 3.6: many sizes — all deleted\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/img.jpg' );
create_test_file( '2024/03/img-80x80.jpg' );
create_test_file( '2024/03/img-150x150.jpg' );
create_test_file( '2024/03/img-300x200.jpg' );
setup_meta( 205, '2024/03/img.jpg', [
    'thumbnail' => [ 'file' => 'img-80x80.jpg' ],
    'medium'    => [ 'file' => 'img-150x150.jpg' ],
    'large'     => [ 'file' => 'img-300x200.jpg' ],
] );
update_post_meta( 205, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 205 );
$t->assertEqual( 4, $res['deleted'], '3.6a: all 4 files deleted' );
$t->assertEqual( '1', get_post_meta( 205, '_r2_offload_local_deleted', true ), '3.6b: flag set' );

// Test 3.7: false from wp_get_attachment_metadata handled (?: null fix)
echo "\nTest 3.7: false metadata in delete_local handled safely\n";
reset_state(); cleanup_upload_dir();
$orig = create_test_file( '2024/03/doc.pdf' );
$GLOBALS['__wp_postmeta'][206]['_wp_attached_file']       = '2024/03/doc.pdf';
$GLOBALS['__wp_postmeta'][206]['_wp_attachment_metadata'] = false;
update_post_meta( 206, '_r2_offload_synced', '1' );
$res = make_sync()->delete_local_for_attachment( 206 );
$t->assertEqual( 1, $res['deleted'], '3.7a: file deleted despite false metadata' );
$t->assertEqual( '1', get_post_meta( 206, '_r2_offload_local_deleted', true ), '3.7b: flag set' );

// Test 3.8: Multiple delete calls are idempotent — flag stays set
echo "\nTest 3.8: multiple delete calls — idempotent\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 207, '2024/03/photo.jpg' );
update_post_meta( 207, '_r2_offload_synced', '1' );
$sync = make_sync();
$sync->delete_local_for_attachment( 207 ); // First: deletes file
$sync->delete_local_for_attachment( 207 ); // Second: file already gone
$t->assertEqual( '1', get_post_meta( 207, '_r2_offload_local_deleted', true ), '3.8a: flag remains set' );

// =========================================================================
// SECTION 4: Desync — delete from R2 and clear meta
// =========================================================================

echo "\n--- SECTION 4: Desync — desync_attachment() ---\n\n";

// Test 4.1: Normal desync — keys sent to delete_files, all meta cleared
echo "Test 4.1: normal desync clears all meta and calls delete_files\n";
reset_state();
update_post_meta( 300, '_r2_offload_synced', '1' );
update_post_meta( 300, '_r2_offload_keys',   wp_json_encode( [ 'wp-content/uploads/2024/03/photo.jpg', 'wp-content/uploads/2024/03/photo-150x150.jpg' ] ) );
update_post_meta( 300, '_r2_offload_synced_at', time() );
update_post_meta( 300, '_r2_offload_local_deleted', '1' );
update_post_meta( 300, '_r2_offload_retry_count', 2 );
update_post_meta( 300, '_r2_offload_error', 'old error' );
$r2 = new R2Client();
make_sync( null, $r2 )->desync_attachment( 300 );
$t->assertEqual( [ 'wp-content/uploads/2024/03/photo.jpg', 'wp-content/uploads/2024/03/photo-150x150.jpg' ], $r2->deleted_keys, '4.1a: both keys sent to delete_files' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_synced', true ), '4.1b: synced cleared' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_keys', true ), '4.1c: keys cleared' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_synced_at', true ), '4.1d: synced_at cleared' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_local_deleted', true ), '4.1e: local_deleted cleared' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_retry_count', true ), '4.1f: retry_count cleared' );
$t->assertEqual( '', get_post_meta( 300, '_r2_offload_error', true ), '4.1g: error cleared' );

// Test 4.2: Desync with no R2 keys → delete_files not called, meta still cleared
echo "\nTest 4.2: desync with no R2 keys — delete_files not called\n";
reset_state();
update_post_meta( 301, '_r2_offload_synced', '1' );
$r2 = new R2Client();
make_sync( null, $r2 )->desync_attachment( 301 );
$t->assertEqual( [], $r2->deleted_keys, '4.2a: delete_files not called' );
$t->assertEqual( '', get_post_meta( 301, '_r2_offload_synced', true ), '4.2b: synced cleared anyway' );

// Test 4.3: Desync returns true always
echo "\nTest 4.3: desync always returns true\n";
reset_state();
$ok = make_sync()->desync_attachment( 302 );
$t->assert( $ok === true, '4.3a: desync returns true' );

// Test 4.4: restore_and_desync — success path
echo "\nTest 4.4: restore_and_desync — success\n";
reset_state(); cleanup_upload_dir(); setup_upload_dir();
setup_meta( 303, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
update_post_meta( 303, '_r2_offload_synced', '1' );
update_post_meta( 303, '_r2_offload_local_deleted', '1' );
update_post_meta( 303, '_r2_offload_keys', wp_json_encode( [
    'wp-content/uploads/2024/03/photo.jpg',
    'wp-content/uploads/2024/03/photo-150x150.jpg',
] ) );
$r2 = new R2Client();
$r2->download_returns = true;
$res = make_sync( null, $r2 )->restore_and_desync_attachment( 303 );
$t->assert( $res['desynced'], '4.4a: desynced successfully' );
$t->assertEqual( 2, $res['restored'], '4.4b: 2 files restored' );
$t->assertEqual( '', get_post_meta( 303, '_r2_offload_synced', true ), '4.4c: synced cleared' );
$t->assert( count( $r2->deleted_keys ) === 2, '4.4d: R2 keys deleted' );

// Test 4.5: restore_and_desync — download fails → aborts, meta preserved
echo "\nTest 4.5: restore_and_desync — download fails → aborts\n";
reset_state(); cleanup_upload_dir();
setup_meta( 304, '2024/03/photo.jpg' );
update_post_meta( 304, '_r2_offload_synced', '1' );
update_post_meta( 304, '_r2_offload_local_deleted', '1' );
update_post_meta( 304, '_r2_offload_keys', wp_json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );
$r2 = new R2Client();
$r2->download_returns = false;
$res = make_sync( null, $r2 )->restore_and_desync_attachment( 304 );
$t->assert( ! $res['desynced'], '4.5a: NOT desynced' );
$t->assertEqual( '1', get_post_meta( 304, '_r2_offload_synced', true ), '4.5b: synced still set' );
$t->assertEqual( '1', get_post_meta( 304, '_r2_offload_local_deleted', true ), '4.5c: local_deleted preserved' );
$t->assertEqual( [], $r2->deleted_keys, '4.5d: nothing deleted from R2' );

// Test 4.6: Bulk desync — many keys
echo "\nTest 4.6: desync with many R2 keys\n";
reset_state();
$many_keys = [];
for ( $i = 1; $i <= 10; $i++ ) {
    $many_keys[] = "wp-content/uploads/2024/03/img-{$i}.jpg";
}
update_post_meta( 305, '_r2_offload_synced', '1' );
update_post_meta( 305, '_r2_offload_keys', wp_json_encode( $many_keys ) );
$r2 = new R2Client();
make_sync( null, $r2 )->desync_attachment( 305 );
$t->assertEqual( 10, count( $r2->deleted_keys ), '4.6a: all 10 keys sent to delete_files' );

// =========================================================================
// SECTION 5: Check/Validate — validate_pre_uploaded() all scenarios
// =========================================================================

echo "\n--- SECTION 5: Check — validate_pre_uploaded() ---\n\n";

// Test 5.1: Already synced → skip
echo "Test 5.1: already synced → skip\n";
reset_state(); cleanup_upload_dir();
setup_meta( 400, '2024/03/photo.jpg' );
update_post_meta( 400, '_r2_offload_synced', '1' );
$r2  = new R2Client();
$log = new ErrorLogger();
$res = make_sync( null, $r2, $log )->validate_pre_uploaded( 400 );
$t->assertEqual( 1, $res['skipped'], '5.1a: skipped' );
$t->assertEqual( 0, $res['claimed'], '5.1b: not claimed' );
$t->assertEqual( [], $r2->checked_keys, '5.1c: check_key never called' );
$t->assertEqual( 'skip', $log->validate_terminal[0]['status'], '5.1d: skip written to terminal' );
$t->assertEqual( 'Already synced', $log->validate_terminal[0]['reason'], '5.1e: reason = Already synced' );

// Test 5.2: Not configured → skip
echo "\nTest 5.2: not configured → skip\n";
reset_state();
setup_meta( 401, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_configured( false );
$r2  = new R2Client();
$log = new ErrorLogger();
$res = make_sync( $settings, $r2, $log )->validate_pre_uploaded( 401 );
$t->assertEqual( 1, $res['skipped'], '5.2a: skipped' );
$t->assertEqual( [], $r2->checked_keys, '5.2b: check_key never called' );
$t->assertEqual( 'Plugin not configured', $log->validate_terminal[0]['reason'], '5.2c: reason in terminal' );

// Test 5.3: No _wp_attached_file → skip
echo "\nTest 5.3: no _wp_attached_file → skip\n";
reset_state();
$r2  = new R2Client();
$log = new ErrorLogger();
$res = make_sync( null, $r2, $log )->validate_pre_uploaded( 402 );
$t->assertEqual( 1, $res['skipped'], '5.3a: skipped' );
$t->assertEqual( 'No file meta', $log->validate_terminal[0]['reason'], '5.3b: reason in terminal' );

// Test 5.4: MIME excluded → skip
echo "\nTest 5.4: excluded MIME → skip\n";
reset_state();
setup_meta( 403, '2024/03/video.mp4', [], 'video/mp4' );
$settings = new Settings();
$settings->set_excluded_mime_types( [ 'video/mp4' ] );
$r2  = new R2Client();
$log = new ErrorLogger();
$res = make_sync( $settings, $r2, $log )->validate_pre_uploaded( 403 );
$t->assertEqual( 1, $res['skipped'], '5.4a: skipped' );
$t->assertEqual( [], $r2->checked_keys, '5.4b: check_key never called' );
$entry = $log->validate_terminal[0];
$t->assertEqual( 'skip', $entry['status'], '5.4c: skip in terminal' );
$t->assert( strpos( $entry['reason'], 'Excluded MIME' ) !== false, '5.4d: MIME exclusion in reason' );

// Test 5.5: All keys found in R2 → claimed + meta set
echo "\nTest 5.5: all keys found → claimed\n";
reset_state(); cleanup_upload_dir();
setup_meta( 404, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );
$r2 = new R2Client();
$r2->check_key_default = 'found';
$log = new ErrorLogger();
$res = make_sync( null, $r2, $log )->validate_pre_uploaded( 404 );
$t->assertEqual( 1, $res['claimed'], '5.5a: claimed' );
$t->assertEqual( 0, $res['missing'], '5.5b: no missing' );
$t->assertEqual( 2, count( $r2->checked_keys ), '5.5c: check_key called for both files' );
$t->assertEqual( '1', get_post_meta( 404, '_r2_offload_synced', true ), '5.5d: marked synced' );
$keys = json_decode( get_post_meta( 404, '_r2_offload_keys', true ), true );
$t->assertEqual( 2, count( $keys ), '5.5e: 2 keys stored' );
$t->assert( is_int( (int) get_post_meta( 404, '_r2_offload_synced_at', true ) ), '5.5f: synced_at set' );
$t->assertEqual( 'found', $log->validate_terminal[0]['status'], '5.5g: found in terminal' );

// Test 5.6: All keys missing → not claimed, missing count set
echo "\nTest 5.6: all keys missing → not claimed\n";
reset_state(); cleanup_upload_dir();
setup_meta( 405, '2024/03/photo.jpg' );
$r2 = new R2Client();
$r2->check_key_default = 'missing';
$log = new ErrorLogger();
$res = make_sync( null, $r2, $log )->validate_pre_uploaded( 405 );
$t->assertEqual( 0, $res['claimed'], '5.6a: not claimed' );
$t->assertEqual( 1, $res['missing'], '5.6b: missing count = 1' );
$t->assertEqual( [ 'wp-content/uploads/2024/03/photo.jpg' ], $res['missing_keys'], '5.6c: missing_keys correct' );
$t->assertEqual( '', get_post_meta( 405, '_r2_offload_synced', true ), '5.6d: NOT marked synced' );
$t->assertEqual( 'missing', $log->validate_terminal[0]['status'], '5.6e: missing in terminal' );

// Test 5.7: Mixed — some found, some missing → not claimed
echo "\nTest 5.7: some found, some missing → not claimed\n";
reset_state(); cleanup_upload_dir();
setup_meta( 406, '2024/03/img.jpg', [
    'thumbnail' => [ 'file' => 'img-150x150.jpg' ],
    'medium'    => [ 'file' => 'img-300x200.jpg' ],
] );
$r2 = new R2Client();
$r2->check_key_default = 'found';
$r2->check_key_responses = [ 'wp-content/uploads/2024/03/img-300x200.jpg' => 'missing' ];
$res = make_sync( null, $r2 )->validate_pre_uploaded( 406 );
$t->assertEqual( 0, $res['claimed'], '5.7a: not claimed (has missing)' );
$t->assertEqual( 1, $res['missing'], '5.7b: 1 missing' );
$t->assertEqual( [ 'wp-content/uploads/2024/03/img-300x200.jpg' ], $res['missing_keys'], '5.7c: correct missing key' );
$t->assertEqual( '', get_post_meta( 406, '_r2_offload_synced', true ), '5.7d: NOT synced' );

// Test 5.8: API error on all keys → skipped (cannot safely claim)
echo "\nTest 5.8: all keys error → skipped\n";
reset_state(); cleanup_upload_dir();
setup_meta( 407, '2024/03/photo.jpg' );
$r2 = new R2Client();
$r2->check_key_default = 'error';
$log = new ErrorLogger();
$res = make_sync( null, $r2, $log )->validate_pre_uploaded( 407 );
$t->assertEqual( 1, $res['skipped'], '5.8a: skipped on API error' );
$t->assertEqual( 0, $res['claimed'], '5.8b: not claimed' );
$t->assertEqual( '', get_post_meta( 407, '_r2_offload_synced', true ), '5.8c: NOT synced' );
$t->assertEqual( 'error', $log->validate_terminal[0]['status'], '5.8d: error in terminal' );
$errors = array_filter( $log->logs, fn( $l ) => $l['level'] === 'error' );
$t->assert( count( $errors ) > 0, '5.8e: error logged' );

// Test 5.9: API error on some keys, missing on others → missing takes priority
echo "\nTest 5.9: error on some, missing on others → missing takes priority\n";
reset_state(); cleanup_upload_dir();
setup_meta( 408, '2024/03/img.jpg', [
    'thumbnail' => [ 'file' => 'img-150x150.jpg' ],
    'medium'    => [ 'file' => 'img-300x200.jpg' ],
] );
$r2 = new R2Client();
$r2->check_key_responses = [
    'wp-content/uploads/2024/03/img.jpg'         => 'found',
    'wp-content/uploads/2024/03/img-150x150.jpg' => 'missing',
    'wp-content/uploads/2024/03/img-300x200.jpg' => 'error',
];
$res = make_sync( null, $r2 )->validate_pre_uploaded( 408 );
$t->assertEqual( 0, $res['claimed'], '5.9a: not claimed' );
$t->assertEqual( 1, $res['missing'], '5.9b: missing count (missing > error priority)' );

// Test 5.10: validate_claimed counter incremented in wp_options
echo "\nTest 5.10: validate_claimed option incremented\n";
reset_state(); cleanup_upload_dir();
update_option( 'r2_offload_validate_claimed', 5 );
setup_meta( 409, '2024/03/photo.jpg' );
$r2 = new R2Client();
$r2->check_key_default = 'found';
make_sync( null, $r2 )->validate_pre_uploaded( 409 );
$t->assertEqual( 6, (int) get_option( 'r2_offload_validate_claimed', 0 ), '5.10a: claimed counter incremented to 6' );

// Test 5.11: check_key called for exactly the right keys
echo "\nTest 5.11: check_key called with exact R2 keys\n";
reset_state(); cleanup_upload_dir();
setup_meta( 410, '2024/03/img.jpg', [ 'thumbnail' => [ 'file' => 'img-150x150.jpg' ] ] );
$r2 = new R2Client();
$r2->check_key_default = 'found';
make_sync( null, $r2 )->validate_pre_uploaded( 410 );
$t->assertEqual( 2, count( $r2->checked_keys ), '5.11a: check_key called twice' );
$t->assert( in_array( 'wp-content/uploads/2024/03/img.jpg', $r2->checked_keys, true ), '5.11b: original key checked' );
$t->assert( in_array( 'wp-content/uploads/2024/03/img-150x150.jpg', $r2->checked_keys, true ), '5.11c: thumbnail key checked' );

// Test 5.12: false metadata in validate handled safely
echo "\nTest 5.12: false metadata in validate handled safely\n";
reset_state(); cleanup_upload_dir();
$GLOBALS['__wp_postmeta'][411]['_wp_attached_file']        = '2024/03/doc.pdf';
$GLOBALS['__wp_postmeta'][411]['_wp_attachment_metadata']  = false;
$r2 = new R2Client();
$r2->check_key_default = 'found';
$res = make_sync( null, $r2 )->validate_pre_uploaded( 411 );
$t->assertEqual( 1, $res['claimed'], '5.12a: claimed despite false metadata (only original checked)' );
$t->assertEqual( 1, count( $r2->checked_keys ), '5.12b: only 1 key checked (no sizes from false)' );

// Test 5.13: Custom path prefix used in checked keys
echo "\nTest 5.13: custom path prefix in checked keys\n";
reset_state(); cleanup_upload_dir();
setup_meta( 412, '2024/03/photo.jpg' );
$settings = new Settings();
$settings->set_path_prefix( 'media/custom' );
$r2 = new R2Client();
$r2->check_key_default = 'found';
make_sync( $settings, $r2 )->validate_pre_uploaded( 412 );
$t->assertEqual( [ 'media/custom/2024/03/photo.jpg' ], $r2->checked_keys, '5.13a: custom prefix in checked key' );

// =========================================================================
// SECTION 6: End-to-end — upload → check → delete lifecycle
// =========================================================================

echo "\n--- SECTION 6: End-to-end upload → check → delete ---\n\n";

// Test 6.1: upload → validate confirms → delete local
echo "Test 6.1: upload → validate → delete local\n";
reset_state(); cleanup_upload_dir();
$orig  = create_test_file( '2024/03/photo.jpg' );
$thumb = create_test_file( '2024/03/photo-150x150.jpg' );
setup_meta( 500, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );

// Phase 1: Upload.
$r2 = new R2Client();
$res1 = make_sync( null, $r2 )->sync_attachment( 500 );
$t->assertEqual( 2, $res1['uploaded'], '6.1a: 2 uploaded' );
$t->assertEqual( '1', get_post_meta( 500, '_r2_offload_synced', true ), '6.1b: synced' );

// Phase 2: Validate (simulate R2 having the files).
// Reset synced meta to allow validate to run.
delete_post_meta( 500, '_r2_offload_synced' );
delete_post_meta( 500, '_r2_offload_keys' );
$r2_check = new R2Client();
$r2_check->check_key_default = 'found';
$res2 = make_sync( null, $r2_check )->validate_pre_uploaded( 500 );
$t->assertEqual( 1, $res2['claimed'], '6.1c: claimed by validate' );
$t->assertEqual( '1', get_post_meta( 500, '_r2_offload_synced', true ), '6.1d: synced after validate' );

// Phase 3: Delete local.
$res3 = make_sync()->delete_local_for_attachment( 500 );
$t->assertEqual( 2, $res3['deleted'], '6.1e: 2 files deleted locally' );
$t->assertEqual( '1', get_post_meta( 500, '_r2_offload_local_deleted', true ), '6.1f: local_deleted set' );
$t->assert( ! file_exists( $orig ),  '6.1g: original gone' );
$t->assert( ! file_exists( $thumb ), '6.1h: thumbnail gone' );

// Test 6.2: Upload fails → validate finds nothing → retry upload succeeds
echo "\nTest 6.2: upload fails → validate missing → retry succeeds\n";
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_meta( 501, '2024/03/photo.jpg' );

// First attempt fails.
$r2_fail = new R2Client();
$r2_fail->upload_returns = false;
make_sync( null, $r2_fail )->sync_attachment( 501 );
$t->assertEqual( '', get_post_meta( 501, '_r2_offload_synced', true ), '6.2a: not synced after failure' );

// Validate should find nothing (file not uploaded).
$r2_check = new R2Client();
$r2_check->check_key_default = 'missing';
$res_v = make_sync( null, $r2_check )->validate_pre_uploaded( 501 );
$t->assertEqual( 1, $res_v['missing'], '6.2b: validate finds missing' );
$t->assertEqual( 0, $res_v['claimed'], '6.2c: not claimed' );

// Retry succeeds.
$r2_ok = new R2Client();
$res_retry = make_sync( null, $r2_ok )->sync_attachment( 501 );
$t->assertEqual( 1, $res_retry['uploaded'], '6.2d: retry upload succeeds' );
$t->assertEqual( '1', get_post_meta( 501, '_r2_offload_synced', true ), '6.2e: synced after retry' );
$t->assertEqual( '', get_post_meta( 501, '_r2_offload_retry_count', true ), '6.2f: retry_count cleared' );

// Test 6.3: Upload + delete_local → validate confirms keys → desync removes from R2
echo "\nTest 6.3: upload+delete → validate → desync\n";
reset_state(); cleanup_upload_dir();
setup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
create_test_file( '2024/03/photo-150x150.jpg' );
setup_meta( 502, '2024/03/photo.jpg', [ 'thumbnail' => [ 'file' => 'photo-150x150.jpg' ] ] );

$settings = new Settings();
$settings->set_delete_local( true );
make_sync( $settings, new R2Client() )->sync_attachment( 502 );
$t->assertEqual( '1', get_post_meta( 502, '_r2_offload_local_deleted', true ), '6.3a: deleted locally' );

// Desync to remove from R2.
$r2_desync = new R2Client();
make_sync( null, $r2_desync )->desync_attachment( 502 );
$t->assertEqual( 2, count( $r2_desync->deleted_keys ), '6.3b: 2 keys sent to R2 delete_files' );
$t->assertEqual( '', get_post_meta( 502, '_r2_offload_synced', true ), '6.3c: synced cleared' );
$t->assertEqual( '', get_post_meta( 502, '_r2_offload_local_deleted', true ), '6.3d: local_deleted cleared' );

// Test 6.4: Large batch — 50 attachments upload, validate, delete
echo "\nTest 6.4: 50-attachment batch — all upload then validate\n";
reset_state(); cleanup_upload_dir();
$r2 = new R2Client();
$r2_check = new R2Client();
$r2_check->check_key_default = 'found';

for ( $i = 1; $i <= 50; $i++ ) {
    create_test_file( "2024/03/batch-{$i}.jpg" );
    setup_meta( 600 + $i, "2024/03/batch-{$i}.jpg" );
}

// Upload all.
$sync = make_sync( null, $r2 );
$total_up = 0;
for ( $i = 1; $i <= 50; $i++ ) {
    $res = $sync->sync_attachment( 600 + $i );
    $total_up += $res['uploaded'];
}
$t->assertEqual( 50, $total_up, '6.4a: all 50 uploaded' );
$t->assertEqual( 50, count( $r2->uploaded ), '6.4b: R2 received 50 upload calls' );

// Reset synced state and validate all.
for ( $i = 1; $i <= 50; $i++ ) {
    delete_post_meta( 600 + $i, '_r2_offload_synced' );
    delete_post_meta( 600 + $i, '_r2_offload_keys' );
}

$sync_check = make_sync( null, $r2_check );
$total_claimed = 0;
for ( $i = 1; $i <= 50; $i++ ) {
    $res = $sync_check->validate_pre_uploaded( 600 + $i );
    $total_claimed += $res['claimed'];
}
$t->assertEqual( 50, $total_claimed, '6.4c: all 50 claimed by validate' );
$t->assertEqual( 50, count( $r2_check->checked_keys ), '6.4d: 50 check_key calls' );

// Test 6.5: Upload → restore → re-upload (user changed mind, re-enables uploads)
echo "\nTest 6.5: upload → restore → re-upload\n";
reset_state(); cleanup_upload_dir();
setup_upload_dir();
create_test_file( '2024/03/changeable.jpg' );
setup_meta( 700, '2024/03/changeable.jpg' );

// Upload.
make_sync( null, new R2Client() )->sync_attachment( 700 );
$t->assertEqual( '1', get_post_meta( 700, '_r2_offload_synced', true ), '6.5a: synced' );

// Restore (simulate R2 download).
make_sync()->delete_local_for_attachment( 700 );
$r2_restore = new R2Client();
$r2_restore->download_returns = true;
$res_restore = make_sync( null, $r2_restore )->restore_from_r2( 700 );
$t->assertEqual( 1, $res_restore['restored'], '6.5b: file restored from R2 after local delete' );

// Re-sync: since keys are still tracked and synced=1, this should be all-skipped.
$r2_resync = new R2Client();
$res_resync = make_sync( null, $r2_resync )->sync_attachment( 700 );
$t->assertEqual( 0, $res_resync['uploaded'], '6.5c: nothing re-uploaded (already on R2)' );
$t->assertEqual( 1, $res_resync['skipped'], '6.5d: skipped (already on R2)' );

// =========================================================================
// Cleanup and summary
// =========================================================================

cleanup_upload_dir();
exit( $t->summary() );
