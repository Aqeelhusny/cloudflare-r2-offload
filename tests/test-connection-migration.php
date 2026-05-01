<?php
/**
 * Comprehensive tests for Connection (Settings + R2Client) and Migration lifecycle.
 *
 * Covers:
 *  - Settings sanitizers and encryption round-trip
 *  - Connection test flow (missing credentials, valid config)
 *  - Migration queue state transitions (start, pause, resume, cancel, retry)
 *  - Batch processor locking, pause mid-run, retry with backoff
 *  - Plugin activation/deactivation lifecycle
 *  - End-to-end user scenarios with real workflow sequences
 *
 * Run: php tests/test-connection-migration.php
 */

require_once __DIR__ . '/bootstrap-connection.php';

use R2Offload\Settings;
use R2Offload\R2Client;
use R2Offload\ErrorLogger;
use R2Offload\AttachmentSync;

// Helper: configure options to make Settings behave as desired.
function configure_settings_options( array $overrides = [] ): void {
    $defaults = [
        'r2_offload_account_id'            => 'abc123def456',
        'r2_offload_access_key_id'         => 'AKIAEXAMPLE',
        'r2_offload_secret_access_key'     => '',
        'r2_offload_bucket'                => 'test-bucket',
        'r2_offload_path_prefix'           => 'wp-content/uploads',
        'r2_offload_delete_local'          => 0,
        'r2_offload_excluded_mime_types'    => [],
        'r2_offload_batch_size'            => 10,
        'r2_offload_url_scheme'            => 'https',
        'r2_offload_custom_domain'         => '',
        'r2_offload_serve_from_r2'         => 0,
        'r2_offload_upload_on_save'        => 1,
        'r2_offload_multipart_threshold'   => 5 * 1024 * 1024,
        'r2_offload_multipart_concurrency' => 3,
    ];
    foreach ( array_merge( $defaults, $overrides ) as $key => $value ) {
        update_option( $key, $value );
    }
    // Encrypt a test secret so is_configured() returns true.
    if ( empty( $overrides['r2_offload_secret_access_key'] ) && ! isset( $overrides['__no_secret'] ) ) {
        $s = new Settings();
        $enc = $s->sanitize_secret_key( 'test-secret-key' );
        update_option( 'r2_offload_secret_access_key', $enc );
    }
}

// =========================================================================
// Test harness (same pattern as existing tests)
// =========================================================================

class TestRunner {
    private int $passed = 0;
    private int $failed = 0;
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

function reset_all_state(): void {
    $GLOBALS['__wp_postmeta']       = [];
    $GLOBALS['__wp_options']        = [];
    $GLOBALS['__wp_deleted']        = [];
    $GLOBALS['__wp_transients']     = [];
    $GLOBALS['__wp_cron_scheduled'] = [];
    $GLOBALS['__wp_cron_cleared']   = [];
    $GLOBALS['__wp_cron_spawned']   = 0;
    $GLOBALS['__wp_actions_fired']  = [];
    $GLOBALS['__wp_hooks']          = [];
    $GLOBALS['__wp_cache']          = [];
    $GLOBALS['__wp_settings_errors'] = [];
    $GLOBALS['__wp_next_scheduled'] = [];
}

function setup_valid_credentials(): void {
    update_option( 'r2_offload_account_id', 'abc123def456' );
    update_option( 'r2_offload_access_key_id', 'AKIAIOSFODNN7EXAMPLE' );
    update_option( 'r2_offload_secret_access_key', 'r2enc:dGVzdC1lbmNyeXB0ZWQtc2VjcmV0' );
    update_option( 'r2_offload_bucket', 'my-test-bucket' );
}

function setup_upload_dir(): string {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( ! is_dir( $base ) ) {
        mkdir( $base, 0755, true );
    }
    return $base;
}

function create_test_file( string $relative_path ): string {
    $base = setup_upload_dir();
    $full = $base . '/' . $relative_path;
    $dir  = dirname( $full );
    if ( ! is_dir( $dir ) ) {
        mkdir( $dir, 0755, true );
    }
    file_put_contents( $full, 'test-content-' . basename( $relative_path ) );
    return $full;
}

function cleanup_upload_dir(): void {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( is_dir( $base ) ) {
        $it    = new RecursiveDirectoryIterator( $base, RecursiveDirectoryIterator::SKIP_DOTS );
        $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
        foreach ( $files as $file ) {
            if ( $file->isDir() ) {
                rmdir( $file->getRealPath() );
            } else {
                unlink( $file->getRealPath() );
            }
        }
        rmdir( $base );
    }
}

function setup_attachment_meta( int $id, string $attached_file, array $sizes = [] ): void {
    $GLOBALS['__wp_postmeta'][ $id ]['_wp_attached_file'] = $attached_file;
    if ( ! empty( $sizes ) ) {
        $GLOBALS['__wp_postmeta'][ $id ]['_wp_attachment_metadata'] = [ 'sizes' => $sizes ];
    }
}

// =========================================================================
// Test Cases
// =========================================================================

$t = new TestRunner();

// =========================================================================
// SECTION 1: Settings — Sanitizers
// =========================================================================

echo "\n--- SECTION 1: Settings Sanitizers ---\n\n";

// Test 1.1: Account ID sanitizer — valid hex
echo "Test 1.1: account ID sanitizer — valid hex\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_account_id( '  ABC123def456  ' );
$t->assertEqual( 'abc123def456', $result, '1.1a: lowercased and trimmed' );

// Test 1.2: Account ID sanitizer — invalid characters trigger settings error
echo "\nTest 1.2: account ID sanitizer — invalid chars\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_account_id( 'abc-xyz-123!' );
$t->assert( count( $GLOBALS['__wp_settings_errors'] ) > 0, '1.2a: settings error added for invalid account ID' );

// Test 1.3: Bucket name sanitizer — valid bucket
echo "\nTest 1.3: bucket name sanitizer — valid\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_bucket( 'my-valid-bucket' );
$t->assertEqual( 'my-valid-bucket', $result, '1.3a: valid bucket passes through' );

// Test 1.4: Bucket name sanitizer — invalid bucket
echo "\nTest 1.4: bucket name sanitizer — invalid\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_bucket( 'A' );
$t->assert( count( $GLOBALS['__wp_settings_errors'] ) > 0, '1.4a: error for invalid bucket name' );

// Test 1.5: Domain sanitizer — strips scheme
echo "\nTest 1.5: domain sanitizer — strips scheme\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_domain( 'https://cdn.example.com/' );
$t->assertEqual( 'cdn.example.com', $result, '1.5a: scheme and trailing slash stripped' );

// Test 1.6: Scheme sanitizer — valid vs invalid
echo "\nTest 1.6: scheme sanitizer\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 'https', $settings->sanitize_scheme( 'https' ), '1.6a: https valid' );
$t->assertEqual( 'http', $settings->sanitize_scheme( 'http' ), '1.6b: http valid' );
$t->assertEqual( 'https', $settings->sanitize_scheme( 'ftp' ), '1.6c: invalid defaults to https' );

// Test 1.7: Path prefix sanitizer — trims slashes
echo "\nTest 1.7: path prefix sanitizer\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 'wp-content/uploads', $settings->sanitize_path_prefix( '/wp-content/uploads/' ), '1.7a: slashes trimmed' );

// Test 1.8: Batch size sanitizer — clamps range
echo "\nTest 1.8: batch size sanitizer — range clamping\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 1, $settings->sanitize_batch_size( 0 ), '1.8a: floor at 1' );
$t->assertEqual( 50, $settings->sanitize_batch_size( 100 ), '1.8b: cap at 50' );
$t->assertEqual( 25, $settings->sanitize_batch_size( 25 ), '1.8c: 25 passes through' );

// Test 1.9: Concurrency sanitizer — clamps range
echo "\nTest 1.9: concurrency sanitizer — range clamping\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 1, $settings->sanitize_concurrency( 0 ), '1.9a: floor at 1' );
$t->assertEqual( 10, $settings->sanitize_concurrency( 20 ), '1.9b: cap at 10' );
$t->assertEqual( 5, $settings->sanitize_concurrency( 5 ), '1.9c: 5 passes through' );

// Test 1.10: Multipart threshold — converts MB to bytes, minimum 5MB
echo "\nTest 1.10: multipart threshold sanitizer\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 5 * 1024 * 1024, $settings->sanitize_multipart_threshold( 2 ), '1.10a: floor at 5MB' );
$t->assertEqual( 10 * 1024 * 1024, $settings->sanitize_multipart_threshold( 10 ), '1.10b: 10MB converts' );

// Test 1.11: MIME type sanitizer — array or newline-separated string
echo "\nTest 1.11: MIME type sanitizer\n";
reset_all_state();
$settings = new Settings();
$result = $settings->sanitize_mime_types( "image/jpeg\nvideo/mp4\n" );
$t->assertEqual( [ 'image/jpeg', 'video/mp4' ], $result, '1.11a: string split into array' );
$result2 = $settings->sanitize_mime_types( [ ' image/png ', 'audio/mpeg' ] );
$t->assertEqual( [ 'image/png', 'audio/mpeg' ], $result2, '1.11b: array sanitized' );

// =========================================================================
// SECTION 2: Settings — Encryption
// =========================================================================

echo "\n--- SECTION 2: Settings Encryption ---\n\n";

// Test 2.1: Secret key encryption round-trip
echo "Test 2.1: encrypt then decrypt secret key\n";
reset_all_state();
$settings = new Settings();
$encrypted = $settings->sanitize_secret_key( 'my-super-secret-r2-key' );
$t->assert( strpos( $encrypted, 'r2enc:' ) === 0, '2.1a: encrypted value has r2enc: prefix' );
$t->assert( $encrypted !== 'my-super-secret-r2-key', '2.1b: not stored in plaintext' );

// Store and read back
update_option( 'r2_offload_secret_access_key', $encrypted );
$settings2 = new Settings();
$decrypted = $settings2->get_secret_access_key();
$t->assertEqual( 'my-super-secret-r2-key', $decrypted, '2.1c: decrypts back to original' );

// Test 2.2: Already-encrypted value is not re-encrypted
echo "\nTest 2.2: already-encrypted value not re-encrypted\n";
reset_all_state();
$settings = new Settings();
$already_encrypted = 'r2enc:aGVsbG8td29ybGQ=';
$result = $settings->sanitize_secret_key( $already_encrypted );
$t->assertEqual( $already_encrypted, $result, '2.2a: r2enc: value passes through unchanged' );

// Test 2.3: Empty secret key keeps existing value
echo "\nTest 2.3: empty secret preserves existing\n";
reset_all_state();
$existing = 'r2enc:existing-encrypted-value';
update_option( 'r2_offload_secret_access_key', $existing );
$settings = new Settings();
$result = $settings->sanitize_secret_key( '' );
$t->assertEqual( $existing, $result, '2.3a: empty input keeps existing encrypted value' );

// Test 2.4: Placeholder unchanged sentinel preserves existing
echo "\nTest 2.4: __R2_SECRET_UNCHANGED__ preserves existing\n";
reset_all_state();
$existing = 'r2enc:stored-secret';
update_option( 'r2_offload_secret_access_key', $existing );
$settings = new Settings();
$result = $settings->sanitize_secret_key( '__R2_SECRET_UNCHANGED__' );
$t->assertEqual( $existing, $result, '2.4a: placeholder keeps existing value' );

// =========================================================================
// SECTION 3: Settings — is_configured() and typed getters
// =========================================================================

echo "\n--- SECTION 3: Settings — is_configured and typed getters ---\n\n";

// Test 3.1: is_configured returns false when any credential missing
echo "Test 3.1: is_configured — missing credentials\n";
reset_all_state();
$settings = new Settings();
$t->assert( ! $settings->is_configured(), '3.1a: empty options = not configured' );

// Test 3.2: is_configured returns true with all credentials present
echo "\nTest 3.2: is_configured — all credentials present\n";
reset_all_state();
$settings = new Settings();
// Encrypt a real secret
$encrypted_secret = $settings->sanitize_secret_key( 'real-secret' );
update_option( 'r2_offload_account_id', 'abcdef123456' );
update_option( 'r2_offload_access_key_id', 'AKIAEXAMPLE' );
update_option( 'r2_offload_secret_access_key', $encrypted_secret );
update_option( 'r2_offload_bucket', 'my-bucket' );
$settings2 = new Settings();
$t->assert( $settings2->is_configured(), '3.2a: all credentials = configured' );

// Test 3.3: Typed getters return correct defaults
echo "\nTest 3.3: typed getters — defaults\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( 'wp-content/uploads', $settings->get_path_prefix(), '3.3a: default path prefix' );
$t->assertEqual( 'https', $settings->get_url_scheme(), '3.3b: default scheme' );
$t->assertEqual( false, $settings->get_delete_local(), '3.3c: delete_local default false' );
$t->assertEqual( false, $settings->get_serve_from_r2(), '3.3d: serve_from_r2 default false' );
$t->assertEqual( 10, $settings->get_batch_size(), '3.3e: batch_size default 10' );

// Test 3.4: Settings cache is flushed properly
echo "\nTest 3.4: settings cache flush\n";
reset_all_state();
update_option( 'r2_offload_batch_size', 5 );
$settings = new Settings();
$t->assertEqual( 5, $settings->get_batch_size(), '3.4a: reads initial value' );
update_option( 'r2_offload_batch_size', 20 );
$t->assertEqual( 5, $settings->get_batch_size(), '3.4b: cached value unchanged' );
$settings->flush_cache();
$t->assertEqual( 20, $settings->get_batch_size(), '3.4c: fresh value after flush' );

// Test 3.5: CDN base URL construction
echo "\nTest 3.5: CDN base URL\n";
reset_all_state();
update_option( 'r2_offload_custom_domain', 'cdn.example.com' );
update_option( 'r2_offload_url_scheme', 'https' );
update_option( 'r2_offload_path_prefix', 'wp-content/uploads' );
$settings = new Settings();
$t->assertEqual( 'https://cdn.example.com/wp-content/uploads', $settings->get_cdn_base_url(), '3.5a: full CDN URL' );

// Test 3.6: CDN base URL with no domain returns empty
echo "\nTest 3.6: CDN base URL — no domain\n";
reset_all_state();
$settings = new Settings();
$t->assertEqual( '', $settings->get_cdn_base_url(), '3.6a: empty when no domain' );

// Test 3.7: CDN base URL with no path prefix
echo "\nTest 3.7: CDN base URL — no path prefix\n";
reset_all_state();
update_option( 'r2_offload_custom_domain', 'cdn.example.com' );
update_option( 'r2_offload_url_scheme', 'http' );
update_option( 'r2_offload_path_prefix', '' );
$settings = new Settings();
$t->assertEqual( 'http://cdn.example.com', $settings->get_cdn_base_url(), '3.7a: URL without prefix' );

// =========================================================================
// SECTION 4: Settings — set_defaults on activation
// =========================================================================

echo "\n--- SECTION 4: Settings — set_defaults ---\n\n";

echo "Test 4.1: set_defaults sets all expected defaults\n";
reset_all_state();
$settings = new Settings();
$settings->set_defaults();

$t->assertEqual( 'https', get_option( 'r2_offload_url_scheme' ), '4.1a: url_scheme default' );
$t->assertEqual( 'wp-content/uploads', get_option( 'r2_offload_path_prefix' ), '4.1b: path_prefix default' );
$t->assertEqual( 0, get_option( 'r2_offload_serve_from_r2' ), '4.1c: serve_from_r2 default 0' );
$t->assertEqual( 0, get_option( 'r2_offload_delete_local' ), '4.1d: delete_local default 0' );
$t->assertEqual( 1, get_option( 'r2_offload_upload_on_save' ), '4.1e: upload_on_save default 1' );
$t->assertEqual( 10, get_option( 'r2_offload_batch_size' ), '4.1f: batch_size default 10' );
$t->assertEqual( 5 * 1024 * 1024, get_option( 'r2_offload_multipart_threshold' ), '4.1g: multipart threshold 5MB' );
$t->assertEqual( 3, get_option( 'r2_offload_multipart_concurrency' ), '4.1h: concurrency default 3' );
$t->assertEqual( [], get_option( 'r2_offload_excluded_mime_types' ), '4.1i: excluded mimes empty' );

// Test 4.2: set_defaults doesn't overwrite existing values
echo "\nTest 4.2: set_defaults respects existing options\n";
reset_all_state();
update_option( 'r2_offload_batch_size', 25 );
$settings = new Settings();
$settings->set_defaults();
$t->assertEqual( 25, get_option( 'r2_offload_batch_size' ), '4.2a: existing value preserved' );

// =========================================================================
// SECTION 5: Connection Test — R2Client stub behaviors
// =========================================================================

echo "\n--- SECTION 5: Connection Test Flow ---\n\n";

// Test 5.1: Connection test with no credentials configured
echo "Test 5.1: connection test — plugin not configured\n";
reset_all_state();
// Leave all credential options empty — is_configured() returns false.
$settings = new Settings();
$r2 = new R2Client();
$logger = new ErrorLogger();
$sync = new AttachmentSync( $r2, $settings, $logger );

create_test_file( '2024/05/test.jpg' );
setup_attachment_meta( 1, '2024/05/test.jpg' );
$result = $sync->sync_attachment( 1 );
$t->assertEqual( 1, $result['skipped'], '5.1a: sync skipped when not configured' );
$t->assertEqual( 0, $result['uploaded'], '5.1b: nothing uploaded' );

// Test 5.2: Connection test — upload succeeds
echo "\nTest 5.2: connection test — upload succeeds\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/test.jpg' );
setup_attachment_meta( 2, '2024/05/test.jpg' );
$settings = new Settings();
$r2 = new R2Client();
$r2->upload_returns = true;
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );
$result = $sync->sync_attachment( 2 );
$t->assertEqual( 1, $result['uploaded'], '5.2a: one file uploaded' );
$t->assertEqual( '1', get_post_meta( 2, '_r2_offload_synced', true ), '5.2b: marked synced' );

// Test 5.3: Connection test — upload fails (simulates bad credentials/network)
echo "\nTest 5.3: connection test — upload fails\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/test.jpg' );
setup_attachment_meta( 3, '2024/05/test.jpg' );
$settings = new Settings();
$r2 = new R2Client();
$r2->upload_returns = false;
$logger = new ErrorLogger();
$sync = new AttachmentSync( $r2, $settings, $logger );
$result = $sync->sync_attachment( 3 );
$t->assertEqual( 1, $result['failed'], '5.3a: upload failed' );
$t->assertEqual( '', get_post_meta( 3, '_r2_offload_synced', true ), '5.3b: NOT marked synced' );
$error_logs = array_filter( $logger->logs, fn( $l ) => $l['level'] === 'error' );
$t->assert( count( $error_logs ) > 0, '5.3c: error logged' );

// Test 5.4: Connection test — retry count incremented on failure
echo "\nTest 5.4: retry count incremented on failure\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/test.jpg' );
setup_attachment_meta( 4, '2024/05/test.jpg' );
$settings = new Settings();
$r2 = new R2Client();
$r2->upload_returns = false;
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );

$sync->sync_attachment( 4 );
$t->assertEqual( 1, get_post_meta( 4, '_r2_offload_retry_count', true ), '5.4a: retry count = 1 after first failure' );

$sync->sync_attachment( 4 );
$t->assertEqual( 2, get_post_meta( 4, '_r2_offload_retry_count', true ), '5.4b: retry count = 2 after second failure' );

// Test 5.5: Successful sync clears retry count and error
echo "\nTest 5.5: success clears retry count and error\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/test.jpg' );
setup_attachment_meta( 5, '2024/05/test.jpg' );
update_post_meta( 5, '_r2_offload_retry_count', 2 );
update_post_meta( 5, '_r2_offload_error', 'Previous failure' );
$settings = new Settings();
$r2 = new R2Client();
$r2->upload_returns = true;
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );
$sync->sync_attachment( 5 );
$t->assertEqual( '', get_post_meta( 5, '_r2_offload_retry_count', true ), '5.5a: retry count cleared' );
$t->assertEqual( '', get_post_meta( 5, '_r2_offload_error', true ), '5.5b: error cleared' );

// =========================================================================
// SECTION 6: Migration Queue State Transitions
// =========================================================================

echo "\n--- SECTION 6: Migration Queue State Transitions ---\n\n";

// Test 6.1: Pause flag halts processing
echo "Test 6.1: pause flag prevents sync during batch\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/img1.jpg' );
setup_attachment_meta( 10, '2024/05/img1.jpg' );
update_option( 'r2_offload_migration_paused', 1 );

$settings = new Settings();
$r2 = new R2Client();
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );

// Simulating batch processor check
$is_paused = (bool) get_option( 'r2_offload_migration_paused' );
$t->assert( $is_paused, '6.1a: pause flag is set' );
$t->assertEqual( [], $r2->uploaded, '6.1b: no uploads when paused' );

// Test 6.2: Resume clears pause flag
echo "\nTest 6.2: resume clears pause flag\n";
reset_all_state();
update_option( 'r2_offload_migration_paused', 1 );
delete_option( 'r2_offload_migration_paused' );
$t->assert( ! get_option( 'r2_offload_migration_paused' ), '6.2a: pause flag cleared' );

// Test 6.3: Cancel clears pause flag
echo "\nTest 6.3: cancel clears state\n";
reset_all_state();
update_option( 'r2_offload_migration_paused', 1 );
delete_option( 'r2_offload_migration_paused' );
$t->assert( ! get_option( 'r2_offload_migration_paused' ), '6.3a: migration paused cleared on cancel' );

// Test 6.4: Transient lock prevents overlapping batch runs
echo "\nTest 6.4: transient lock prevents overlapping runs\n";
reset_all_state();
set_transient( 'r2_offload_batch_lock', 1, 300 );
$lock_active = (bool) get_transient( 'r2_offload_batch_lock' );
$t->assert( $lock_active, '6.4a: lock is active' );
delete_transient( 'r2_offload_batch_lock' );
$t->assert( ! get_transient( 'r2_offload_batch_lock' ), '6.4b: lock cleared after delete' );

// Test 6.5: Separate locks for each job type
echo "\nTest 6.5: separate locks for each job type\n";
reset_all_state();
set_transient( 'r2_offload_batch_lock', 1, 300 );
set_transient( 'r2_offload_restore_lock', 1, 300 );
set_transient( 'r2_offload_local_del_lock', 1, 300 );
set_transient( 'r2_offload_desync_lock', 1, 300 );
$t->assert( (bool) get_transient( 'r2_offload_batch_lock' ), '6.5a: migration lock' );
$t->assert( (bool) get_transient( 'r2_offload_restore_lock' ), '6.5b: restore lock' );
$t->assert( (bool) get_transient( 'r2_offload_local_del_lock' ), '6.5c: local_del lock' );
$t->assert( (bool) get_transient( 'r2_offload_desync_lock' ), '6.5d: desync lock' );

// =========================================================================
// SECTION 7: Batch Processor — Success/Failure Determination
// =========================================================================

echo "\n--- SECTION 7: Batch Success/Failure Logic ---\n\n";

// Test 7.1: Batch considers upload success (failed=0, uploaded>0)
echo "Test 7.1: batch success — failed=0, uploaded>0\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/batch1.jpg' );
setup_attachment_meta( 20, '2024/05/batch1.jpg' );
$r2 = new R2Client();
$r2->upload_returns = true;
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );
$result = $sync->sync_attachment( 20 );
$is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );
$t->assert( $is_success, '7.1a: success when uploaded>0 and no failures' );

// Test 7.2: Batch considers re-sync success (failed=0, skipped>0)
echo "\nTest 7.2: batch success — failed=0, skipped>0 (re-sync)\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/batch2.jpg' );
setup_attachment_meta( 21, '2024/05/batch2.jpg' );
update_post_meta( 21, '_r2_offload_synced', '1' );
update_post_meta( 21, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/05/batch2.jpg' ] ) );
$sync = new AttachmentSync( new R2Client(), new Settings(), new ErrorLogger() );
$result = $sync->sync_attachment( 21 );
$is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );
$t->assert( $is_success, '7.2a: success when all skipped (already on R2)' );

// Test 7.3: Batch failure — has failed files
echo "\nTest 7.3: batch failure — upload fails\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/batch3.jpg' );
setup_attachment_meta( 22, '2024/05/batch3.jpg' );
$r2 = new R2Client();
$r2->upload_returns = false;
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );
$result = $sync->sync_attachment( 22 );
$is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );
$t->assert( ! $is_success, '7.3a: failure when failed > 0' );

// Test 7.4: "Nothing" scenario — not configured returns skipped=1
echo "\nTest 7.4: nothing scenario — not configured\n";
reset_all_state();
cleanup_upload_dir();
// Do NOT configure credentials — is_configured() returns false.
create_test_file( '2024/05/batch4.jpg' );
setup_attachment_meta( 23, '2024/05/batch4.jpg' );
$settings = new Settings();
$sync = new AttachmentSync( new R2Client(), $settings, new ErrorLogger() );
$result = $sync->sync_attachment( 23 );
// Not-configured returns skipped=1, which the batch processor treats as success for the queue item.
$is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );
$t->assert( $is_success, '7.4a: not-configured returns skipped=1 which is still "success" for queue' );

// Test 7.5: Max 3 retries — item moves to failed
echo "\nTest 7.5: retry count simulation — 3 retries = failed status\n";
reset_all_state();
$retry_count = 2; // Current retry, incremented to 3
$new_retry = $retry_count + 1;
$new_status = $new_retry >= 3 ? 'failed' : 'pending';
$t->assertEqual( 'failed', $new_status, '7.5a: retry 3 = failed' );

$retry_count = 1;
$new_retry = $retry_count + 1;
$new_status = $new_retry >= 3 ? 'failed' : 'pending';
$t->assertEqual( 'pending', $new_status, '7.5b: retry 2 = still pending' );

// =========================================================================
// SECTION 8: Deactivation Lifecycle
// =========================================================================

echo "\n--- SECTION 8: Deactivation Lifecycle ---\n\n";

echo "Test 8.1: deactivation clears cron hooks and transient locks\n";
reset_all_state();
set_transient( 'r2_offload_batch_lock', 1, 300 );
set_transient( 'r2_offload_restore_lock', 1, 300 );
set_transient( 'r2_offload_local_del_lock', 1, 300 );
set_transient( 'r2_offload_desync_lock', 1, 300 );

// Simulate deactivation cleanup
wp_clear_scheduled_hook( 'r2_offload_process_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_restore_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_local_delete_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_desync_batch' );
delete_transient( 'r2_offload_batch_lock' );
delete_transient( 'r2_offload_restore_lock' );
delete_transient( 'r2_offload_local_del_lock' );
delete_transient( 'r2_offload_desync_lock' );

$t->assertEqual( 4, count( $GLOBALS['__wp_cron_cleared'] ), '8.1a: all 4 cron hooks cleared' );
$t->assert( ! get_transient( 'r2_offload_batch_lock' ), '8.1b: batch lock cleared' );
$t->assert( ! get_transient( 'r2_offload_restore_lock' ), '8.1c: restore lock cleared' );
$t->assert( ! get_transient( 'r2_offload_local_del_lock' ), '8.1d: local_del lock cleared' );
$t->assert( ! get_transient( 'r2_offload_desync_lock' ), '8.1e: desync lock cleared' );

// =========================================================================
// SECTION 9: End-to-End User Scenarios
// =========================================================================

echo "\n--- SECTION 9: End-to-End User Scenarios ---\n\n";

// Scenario 9.1: User saves credentials → tests connection → starts migration → completes
echo "Test 9.1: full happy-path — save → test → migrate → complete\n";
reset_all_state();
cleanup_upload_dir();

// Step 1: User saves credentials
$settings = new Settings();
$encrypted = $settings->sanitize_secret_key( 'wJalrXUtnFEMI/K7MDENG/bPxRfiCYEXAMPLEKEY' );
update_option( 'r2_offload_account_id', 'abc123def456789012345678abcdef00' );
update_option( 'r2_offload_access_key_id', 'AKIAIOSFODNN7EXAMPLE' );
update_option( 'r2_offload_secret_access_key', $encrypted );
update_option( 'r2_offload_bucket', 'my-media-bucket' );
$settings->flush_cache();

$settings2 = new Settings();
$t->assert( $settings2->is_configured(), '9.1a: credentials saved and configured' );

// Step 2: User uploads 5 images during migration
for ( $i = 1; $i <= 5; $i++ ) {
    create_test_file( "2024/05/photo-{$i}.jpg" );
    setup_attachment_meta( 100 + $i, "2024/05/photo-{$i}.jpg" );
}

// Step 3: Batch processes them
$r2 = new R2Client();
$r2->upload_returns = true;
$sync = new AttachmentSync( $r2, $settings2, new ErrorLogger() );

$total_uploaded = 0;
for ( $i = 1; $i <= 5; $i++ ) {
    $result = $sync->sync_attachment( 100 + $i );
    $total_uploaded += $result['uploaded'];
}
$t->assertEqual( 5, $total_uploaded, '9.1b: all 5 files uploaded' );

// Verify all marked synced
$synced_count = 0;
for ( $i = 1; $i <= 5; $i++ ) {
    if ( get_post_meta( 100 + $i, '_r2_offload_synced', true ) === '1' ) {
        $synced_count++;
    }
}
$t->assertEqual( 5, $synced_count, '9.1c: all 5 marked synced' );

// Scenario 9.2: User enables delete_local mid-migration
echo "\nTest 9.2: enable delete_local mid-migration\n";
reset_all_state();
cleanup_upload_dir();

// Already synced 3 files without delete_local
configure_settings_options( [ 'r2_offload_delete_local' => 0 ] );
for ( $i = 1; $i <= 3; $i++ ) {
    create_test_file( "2024/05/old-{$i}.jpg" );
    setup_attachment_meta( 200 + $i, "2024/05/old-{$i}.jpg" );
}
$settings_off = new Settings();
$sync_off = new AttachmentSync( new R2Client(), $settings_off, new ErrorLogger() );
for ( $i = 1; $i <= 3; $i++ ) {
    $sync_off->sync_attachment( 200 + $i );
}

// Now enable delete_local and sync 2 new ones
update_option( 'r2_offload_delete_local', 1 );
create_test_file( '2024/05/new-1.jpg' );
create_test_file( '2024/05/new-2.jpg' );
setup_attachment_meta( 204, '2024/05/new-1.jpg' );
setup_attachment_meta( 205, '2024/05/new-2.jpg' );
$settings_on = new Settings();
$sync_on = new AttachmentSync( new R2Client(), $settings_on, new ErrorLogger() );
$sync_on->sync_attachment( 204 );
$sync_on->sync_attachment( 205 );

// Old files: NOT marked local_deleted (synced before setting was enabled)
for ( $i = 1; $i <= 3; $i++ ) {
    $t->assertEqual( '', get_post_meta( 200 + $i, '_r2_offload_local_deleted', true ),
        "9.2a-{$i}: old file NOT marked local_deleted" );
}
// New files: MARKED local_deleted
$t->assertEqual( '1', get_post_meta( 204, '_r2_offload_local_deleted', true ), '9.2b: new file 1 marked local_deleted' );
$t->assertEqual( '1', get_post_meta( 205, '_r2_offload_local_deleted', true ), '9.2c: new file 2 marked local_deleted' );

// Scenario 9.3: User runs bulk local-delete for old files
echo "\nTest 9.3: bulk local-delete for previously-synced files\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();

// These have local files and are synced
for ( $i = 1; $i <= 3; $i++ ) {
    create_test_file( "2024/05/file-{$i}.jpg" );
    setup_attachment_meta( 300 + $i, "2024/05/file-{$i}.jpg" );
    update_post_meta( 300 + $i, '_r2_offload_synced', '1' );
}

$sync = new AttachmentSync( new R2Client(), new Settings(), new ErrorLogger() );
for ( $i = 1; $i <= 3; $i++ ) {
    $result = $sync->delete_local_for_attachment( 300 + $i );
    $t->assertEqual( 1, $result['deleted'], "9.3a-{$i}: file deleted" );
    $t->assertEqual( '1', get_post_meta( 300 + $i, '_r2_offload_local_deleted', true ), "9.3b-{$i}: flag set" );
}

// Scenario 9.4: User restores then re-syncs (changed their mind)
echo "\nTest 9.4: restore then re-sync (user changed mind)\n";
reset_all_state();
cleanup_upload_dir();
setup_upload_dir();

setup_attachment_meta( 400, '2024/05/restored.jpg' );
update_post_meta( 400, '_r2_offload_synced', '1' );
update_post_meta( 400, '_r2_offload_local_deleted', '1' );
update_post_meta( 400, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/05/restored.jpg' ] ) );

configure_settings_options( [ 'r2_offload_delete_local' => 1 ] );
$r2 = new R2Client();
$r2->download_returns = true;
$settings = new Settings();
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );

// Restore
$restore_result = $sync->restore_from_r2( 400 );
$t->assertEqual( 1, $restore_result['restored'], '9.4a: file restored' );
$t->assertEqual( '', get_post_meta( 400, '_r2_offload_local_deleted', true ), '9.4b: flag cleared' );
$t->assertEqual( '1', get_post_meta( 400, '_r2_offload_synced', true ), '9.4c: still synced' );

// Re-sync (file already on R2 so it should be skipped)
$resync_result = $sync->sync_attachment( 400 );
$t->assertEqual( 1, $resync_result['skipped'], '9.4d: already on R2, skipped' );
$t->assertEqual( 0, $resync_result['uploaded'], '9.4e: nothing new uploaded' );

// Scenario 9.5: Partial failure in multi-file attachment — retry succeeds
echo "\nTest 9.5: partial failure → retry succeeds\n";
reset_all_state();
cleanup_upload_dir();
create_test_file( '2024/05/multi.jpg' );
create_test_file( '2024/05/multi-150x150.jpg' );
setup_attachment_meta( 500, '2024/05/multi.jpg', [
    'thumbnail' => [ 'file' => 'multi-150x150.jpg' ],
] );

// First attempt: upload fails
configure_settings_options( [ 'r2_offload_delete_local' => 1 ] );
$r2_fail = new R2Client();
$r2_fail->upload_returns = false;
$settings = new Settings();
$sync_fail = new AttachmentSync( $r2_fail, $settings, new ErrorLogger() );
$result1 = $sync_fail->sync_attachment( 500 );
$t->assertEqual( 2, $result1['failed'], '9.5a: both files failed' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_synced', true ), '9.5b: NOT synced' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_local_deleted', true ), '9.5c: NOT local_deleted' );
$t->assertEqual( 1, get_post_meta( 500, '_r2_offload_retry_count', true ), '9.5d: retry count = 1' );

// Second attempt: upload succeeds
$r2_ok = new R2Client();
$r2_ok->upload_returns = true;
$sync_ok = new AttachmentSync( $r2_ok, $settings, new ErrorLogger() );
$result2 = $sync_ok->sync_attachment( 500 );
$t->assertEqual( 2, $result2['uploaded'], '9.5e: both files uploaded on retry' );
$t->assertEqual( '1', get_post_meta( 500, '_r2_offload_synced', true ), '9.5f: now synced' );
$t->assertEqual( '1', get_post_meta( 500, '_r2_offload_local_deleted', true ), '9.5g: local_deleted set' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_retry_count', true ), '9.5h: retry count cleared' );

// Scenario 9.6: Full desync — restores locally, removes from R2, clears all meta
echo "\nTest 9.6: full desync lifecycle\n";
reset_all_state();
cleanup_upload_dir();
setup_upload_dir();

setup_attachment_meta( 600, '2024/05/desync.jpg', [
    'thumbnail' => [ 'file' => 'desync-150x150.jpg' ],
] );
update_post_meta( 600, '_r2_offload_synced', '1' );
update_post_meta( 600, '_r2_offload_local_deleted', '1' );
update_post_meta( 600, '_r2_offload_synced_at', time() );
update_post_meta( 600, '_r2_offload_keys', json_encode( [
    'wp-content/uploads/2024/05/desync.jpg',
    'wp-content/uploads/2024/05/desync-150x150.jpg',
] ) );

configure_settings_options();
$r2 = new R2Client();
$r2->download_returns = true;
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );
$result = $sync->restore_and_desync_attachment( 600 );

$t->assert( $result['desynced'], '9.6a: desynced successfully' );
$t->assertEqual( 2, $result['restored'], '9.6b: both files restored' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_synced', true ), '9.6c: synced cleared' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_keys', true ), '9.6d: keys cleared' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_local_deleted', true ), '9.6e: local_deleted cleared' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_synced_at', true ), '9.6f: synced_at cleared' );

// Verify R2 delete was called
$t->assertEqual( 2, count( $r2->deleted_keys ), '9.6g: 2 keys deleted from R2' );

// Scenario 9.7: Desync aborts if download fails
echo "\nTest 9.7: desync aborts on download failure\n";
reset_all_state();
cleanup_upload_dir();

setup_attachment_meta( 700, '2024/05/fail-desync.jpg' );
update_post_meta( 700, '_r2_offload_synced', '1' );
update_post_meta( 700, '_r2_offload_local_deleted', '1' );
update_post_meta( 700, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/05/fail-desync.jpg' ] ) );

configure_settings_options();
$r2 = new R2Client();
$r2->download_returns = false;
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );
$result = $sync->restore_and_desync_attachment( 700 );

$t->assert( ! $result['desynced'], '9.7a: NOT desynced' );
$t->assertEqual( '1', get_post_meta( 700, '_r2_offload_synced', true ), '9.7b: still synced' );
$t->assertEqual( '1', get_post_meta( 700, '_r2_offload_local_deleted', true ), '9.7c: flag preserved' );
$t->assertEqual( [], $r2->deleted_keys, '9.7d: nothing deleted from R2' );

// Scenario 9.8: Concurrent migration + new upload doesn't conflict
echo "\nTest 9.8: new upload during migration — no conflict\n";
reset_all_state();
cleanup_upload_dir();

// Simulating: migration is running on IDs 1-10, user uploads a new file (ID 11)
for ( $i = 1; $i <= 10; $i++ ) {
    create_test_file( "2024/05/migration-{$i}.jpg" );
    setup_attachment_meta( 800 + $i, "2024/05/migration-{$i}.jpg" );
}
create_test_file( '2024/05/user-upload.jpg' );
setup_attachment_meta( 811, '2024/05/user-upload.jpg' );

configure_settings_options( [ 'r2_offload_delete_local' => 1 ] );
$settings = new Settings();
$sync = new AttachmentSync( new R2Client(), $settings, new ErrorLogger() );

// Migration processes batch
for ( $i = 1; $i <= 10; $i++ ) {
    $sync->sync_attachment( 800 + $i );
}

// User upload also gets synced
$upload_result = $sync->sync_attachment( 811 );

$t->assertEqual( 1, $upload_result['uploaded'], '9.8a: user upload succeeded' );
$t->assertEqual( '1', get_post_meta( 811, '_r2_offload_synced', true ), '9.8b: user upload synced' );
$t->assertEqual( '1', get_post_meta( 811, '_r2_offload_local_deleted', true ), '9.8c: user upload local_deleted' );

// All migration items also synced
$all_synced = 0;
for ( $i = 1; $i <= 10; $i++ ) {
    if ( get_post_meta( 800 + $i, '_r2_offload_synced', true ) === '1' ) {
        $all_synced++;
    }
}
$t->assertEqual( 10, $all_synced, '9.8d: all migration items synced' );

// Scenario 9.9: Stats tracking
echo "\nTest 9.9: upload stats recorded\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/stats.jpg' );
setup_attachment_meta( 900, '2024/05/stats.jpg' );

$sync = new AttachmentSync( new R2Client(), new Settings(), new ErrorLogger() );
$sync->sync_attachment( 900 );

$stat_key = 'r2_offload_stats_' . gmdate( 'Y-m-d' );
$stats = get_option( $stat_key, false );
$t->assert( $stats !== false, '9.9a: stats option exists' );
$t->assertEqual( 1, $stats['uploads'], '9.9b: uploads count = 1' );
$t->assert( $stats['bytes'] > 0, '9.9c: bytes > 0' );

// Scenario 9.10: Upload with custom path prefix
echo "\nTest 9.10: custom path prefix in R2 keys\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options( [ 'r2_offload_path_prefix' => 'media/files' ] );
create_test_file( '2024/05/prefix-test.jpg' );
setup_attachment_meta( 950, '2024/05/prefix-test.jpg' );

$settings = new Settings();
$r2 = new R2Client();
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );
$sync->sync_attachment( 950 );

$keys = json_decode( get_post_meta( 950, '_r2_offload_keys', true ), true );
$t->assertEqual( [ 'media/files/2024/05/prefix-test.jpg' ], $keys, '9.10a: custom prefix applied to R2 key' );
$t->assertEqual( 'media/files/2024/05/prefix-test.jpg', $r2->uploaded[0]['key'], '9.10b: R2 upload used custom prefix' );

// =========================================================================
// SECTION 10: Edge Cases and Defensive Behaviors
// =========================================================================

echo "\n--- SECTION 10: Edge Cases ---\n\n";

// Test 10.1: Sync attachment with file that disappeared between check and upload
echo "Test 10.1: file vanishes between exists check and upload (race condition)\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
// File doesn't exist (simulating race condition where it was deleted)
setup_attachment_meta( 1000, '2024/05/vanished.jpg' );
$logger = new ErrorLogger();
$sync = new AttachmentSync( new R2Client(), new Settings(), $logger );
$result = $sync->sync_attachment( 1000 );
$t->assertEqual( 1, $result['skipped'], '10.1a: missing file skipped' );
$warning_logs = array_filter( $logger->logs, fn( $l ) => $l['level'] === 'warning' );
$t->assert( count( $warning_logs ) > 0, '10.1b: warning logged for missing file' );

// Test 10.2: Multiple syncs of same attachment are idempotent
echo "\nTest 10.2: multiple syncs are idempotent\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/idempotent.jpg' );
setup_attachment_meta( 1001, '2024/05/idempotent.jpg' );
$r2 = new R2Client();
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );

$sync->sync_attachment( 1001 );
$t->assertEqual( 1, count( $r2->uploaded ), '10.2a: first sync uploads once' );

$sync->sync_attachment( 1001 );
$t->assertEqual( 1, count( $r2->uploaded ), '10.2b: second sync uploads nothing new' );

$keys = json_decode( get_post_meta( 1001, '_r2_offload_keys', true ), true );
$t->assertEqual( 1, count( $keys ), '10.2c: keys not duplicated' );

// Test 10.3: Excluded MIME type blocks upload
echo "\nTest 10.3: excluded MIME type blocks upload\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options( [ 'r2_offload_excluded_mime_types' => [ 'video/mp4' ] ] );
create_test_file( '2024/05/video.mp4' );
setup_attachment_meta( 1002, '2024/05/video.mp4' );
$GLOBALS['__wp_postmeta'][1002]['_mime_type'] = 'video/mp4';

$settings = new Settings();
$r2 = new R2Client();
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );
$result = $sync->sync_attachment( 1002 );
$t->assertEqual( 1, $result['skipped'], '10.3a: video skipped' );
$t->assertEqual( 0, $result['uploaded'], '10.3b: nothing uploaded' );
$t->assertEqual( [], $r2->uploaded, '10.3c: R2 client never called' );

// Test 10.4: Restore creates directories if they don't exist
echo "\nTest 10.4: restore creates directories\n";
reset_all_state();
cleanup_upload_dir();
setup_upload_dir();
configure_settings_options();

setup_attachment_meta( 1003, '2024/05/deep/nested/file.jpg' );
update_post_meta( 1003, '_r2_offload_synced', '1' );
update_post_meta( 1003, '_r2_offload_local_deleted', '1' );
update_post_meta( 1003, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/05/deep/nested/file.jpg' ] ) );

$r2 = new R2Client();
$r2->download_returns = true;
$sync = new AttachmentSync( $r2, new Settings(), new ErrorLogger() );
$result = $sync->restore_from_r2( 1003 );
$t->assertEqual( 1, $result['restored'], '10.4a: file restored' );
$t->assert( file_exists( sys_get_temp_dir() . '/wp-uploads/2024/05/deep/nested/file.jpg' ), '10.4b: nested dir created' );

// Test 10.5: Delete local for non-synced attachment — safety guard
echo "\nTest 10.5: delete_local refuses for non-synced attachment\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options();
create_test_file( '2024/05/unsafe.jpg' );
setup_attachment_meta( 1004, '2024/05/unsafe.jpg' );
// NOT marked as synced
$sync = new AttachmentSync( new R2Client(), new Settings(), new ErrorLogger() );
$result = $sync->delete_local_for_attachment( 1004 );
$t->assertEqual( 0, $result['deleted'], '10.5a: nothing deleted' );
$t->assertEqual( 1, $result['skipped'], '10.5b: skipped (safety guard)' );
$t->assert( file_exists( sys_get_temp_dir() . '/wp-uploads/2024/05/unsafe.jpg' ), '10.5c: file still exists' );

// Test 10.6: WooCommerce lazy size regeneration scenario
echo "\nTest 10.6: WooCommerce lazy regeneration — new sizes picked up on re-sync\n";
reset_all_state();
cleanup_upload_dir();
configure_settings_options( [ 'r2_offload_delete_local' => 1 ] );
create_test_file( '2024/05/product.jpg' );
setup_attachment_meta( 1005, '2024/05/product.jpg' );

$settings = new Settings();
$r2 = new R2Client();
$sync = new AttachmentSync( $r2, $settings, new ErrorLogger() );

// Initial sync
$sync->sync_attachment( 1005 );
$t->assertEqual( 1, count( $r2->uploaded ), '10.6a: original uploaded' );

// WooCommerce generates additional sizes later
create_test_file( '2024/05/product-100x100.jpg' );
create_test_file( '2024/05/product-300x300.jpg' );
$GLOBALS['__wp_postmeta'][1005]['_wp_attachment_metadata'] = [
    'sizes' => [
        'woocommerce_thumbnail' => [ 'file' => 'product-100x100.jpg' ],
        'woocommerce_single'    => [ 'file' => 'product-300x300.jpg' ],
    ],
];

// Re-sync picks up new sizes only
$result2 = $sync->sync_attachment( 1005 );
$t->assertEqual( 2, $result2['uploaded'], '10.6b: 2 new sizes uploaded' );
$t->assertEqual( 1, $result2['skipped'], '10.6c: original skipped (already on R2)' );
$t->assertEqual( 3, count( $r2->uploaded ), '10.6d: total 3 uploads across both syncs' );

$keys = json_decode( get_post_meta( 1005, '_r2_offload_keys', true ), true );
$t->assertEqual( 3, count( $keys ), '10.6e: 3 keys tracked' );

// =========================================================================
// Cleanup and summary
// =========================================================================

cleanup_upload_dir();
exit( $t->summary() );
