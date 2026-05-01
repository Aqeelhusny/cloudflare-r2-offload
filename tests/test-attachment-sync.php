<?php
/**
 * Comprehensive tests for AttachmentSync — covers both bugs that were fixed:
 *
 * Fix 1: sync_attachment() with delete_local=true now sets _r2_offload_local_deleted.
 * Fix 2: delete_local_for_attachment() now sets the flag even when files are already gone.
 *
 * Run: php tests/test-attachment-sync.php
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

function reset_state(): void {
    $GLOBALS['__wp_postmeta'] = [];
    $GLOBALS['__wp_options']  = [];
    $GLOBALS['__wp_deleted']  = [];
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

function make_sync( ?Settings $settings = null, ?R2Client $r2 = null, ?ErrorLogger $logger = null ): AttachmentSync {
    $settings = $settings ?? new Settings();
    $r2       = $r2 ?? new R2Client();
    $logger   = $logger ?? new ErrorLogger();
    return new AttachmentSync( $r2, $settings, $logger );
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

// -------------------------------------------------------------------------
// FIX 1: sync_attachment() with delete_local=true sets _r2_offload_local_deleted
// -------------------------------------------------------------------------

echo "\n--- FIX 1: sync_attachment() + delete_local setting ---\n\n";

// Test 1.1: Migration with delete_local=true sets the meta flag
echo "Test 1.1: sync with delete_local=true sets _r2_offload_local_deleted\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 100, '2024/03/photo.jpg' );

$settings = new Settings();
$settings->set_delete_local( true );
$r2   = new R2Client();
$sync = make_sync( $settings, $r2 );

$result = $sync->sync_attachment( 100 );

$t->assertEqual( 1, $result['uploaded'], '1.1a: one file uploaded' );
$t->assertEqual( 0, $result['failed'], '1.1b: no failures' );
$t->assertEqual( '1', get_post_meta( 100, '_r2_offload_synced', true ), '1.1c: marked synced' );
$t->assertEqual( '1', get_post_meta( 100, '_r2_offload_local_deleted', true ), '1.1d: marked local_deleted' );

// Test 1.2: Migration with delete_local=false does NOT set the flag
echo "\nTest 1.2: sync with delete_local=false does NOT set _r2_offload_local_deleted\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 101, '2024/03/photo.jpg' );

$settings = new Settings();
$settings->set_delete_local( false );
$sync = make_sync( $settings, new R2Client() );

$result = $sync->sync_attachment( 101 );

$t->assertEqual( 1, $result['uploaded'], '1.2a: one file uploaded' );
$t->assertEqual( '1', get_post_meta( 101, '_r2_offload_synced', true ), '1.2b: marked synced' );
$t->assertEqual( '', get_post_meta( 101, '_r2_offload_local_deleted', true ), '1.2c: local_deleted NOT set' );

// Test 1.3: Migration with delete_local=true + multiple sizes
echo "\nTest 1.3: sync with delete_local=true + multiple image sizes\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
create_test_file( '2024/03/photo-150x150.jpg' );
create_test_file( '2024/03/photo-300x200.jpg' );
setup_attachment_meta( 102, '2024/03/photo.jpg', [
    'thumbnail' => [ 'file' => 'photo-150x150.jpg' ],
    'medium'    => [ 'file' => 'photo-300x200.jpg' ],
] );

$settings = new Settings();
$settings->set_delete_local( true );
$sync = make_sync( $settings, new R2Client() );

$result = $sync->sync_attachment( 102 );

$t->assertEqual( 3, $result['uploaded'], '1.3a: three files uploaded' );
$t->assertEqual( '1', get_post_meta( 102, '_r2_offload_local_deleted', true ), '1.3b: local_deleted set for multi-size' );

// Test 1.4: Upload failure does NOT set local_deleted
echo "\nTest 1.4: upload failure does NOT set local_deleted\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 103, '2024/03/photo.jpg' );

$settings = new Settings();
$settings->set_delete_local( true );
$r2 = new R2Client();
$r2->upload_returns = false;
$sync = make_sync( $settings, $r2 );

$result = $sync->sync_attachment( 103 );

$t->assertEqual( 1, $result['failed'], '1.4a: one failure' );
$t->assertEqual( '', get_post_meta( 103, '_r2_offload_local_deleted', true ), '1.4b: local_deleted NOT set on failure' );
$t->assertEqual( '', get_post_meta( 103, '_r2_offload_synced', true ), '1.4c: NOT marked synced' );

// Test 1.5: Re-sync (all files already on R2) — no new upload, no flag change
echo "\nTest 1.5: re-sync skips all files, does not set local_deleted\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 104, '2024/03/photo.jpg' );
update_post_meta( 104, '_r2_offload_synced', '1' );
update_post_meta( 104, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$settings = new Settings();
$settings->set_delete_local( true );
$sync = make_sync( $settings, new R2Client() );

$result = $sync->sync_attachment( 104 );

$t->assertEqual( 0, $result['uploaded'], '1.5a: nothing new uploaded' );
$t->assertEqual( 1, $result['skipped'], '1.5b: one skipped (already on R2)' );
$t->assertEqual( '', get_post_meta( 104, '_r2_offload_local_deleted', true ), '1.5c: local_deleted not set (no upload)' );

// -------------------------------------------------------------------------
// FIX 2: delete_local_for_attachment() sets flag when files already gone
// -------------------------------------------------------------------------

echo "\n--- FIX 2: delete_local_for_attachment() with already-deleted files ---\n\n";

// Test 2.1: Normal — files exist, get deleted, flag set
echo "Test 2.1: files exist, get deleted, flag set\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 200, '2024/03/photo.jpg' );
update_post_meta( 200, '_r2_offload_synced', '1' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 200 );

$t->assertEqual( 1, $result['deleted'], '2.1a: one file deleted' );
$t->assertEqual( 0, $result['skipped'], '2.1b: none skipped' );
$t->assertEqual( '1', get_post_meta( 200, '_r2_offload_local_deleted', true ), '2.1c: flag set' );

// Test 2.2: THE BUG — files already gone, flag STILL set
echo "\nTest 2.2: files already gone (migration deleted them), flag STILL set\n";
reset_state();
cleanup_upload_dir();
setup_attachment_meta( 201, '2024/03/photo.jpg' );
update_post_meta( 201, '_r2_offload_synced', '1' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 201 );

$t->assertEqual( 0, $result['deleted'], '2.2a: nothing to delete' );
$t->assertEqual( 1, $result['skipped'], '2.2b: one skipped (already gone)' );
$t->assertEqual( '1', get_post_meta( 201, '_r2_offload_local_deleted', true ), '2.2c: flag SET despite files already gone' );

// Test 2.3: Mixed — some files exist, some already gone
echo "\nTest 2.3: mixed — some files exist, some gone\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 202, '2024/03/photo.jpg', [
    'thumbnail' => [ 'file' => 'photo-150x150.jpg' ],
] );
update_post_meta( 202, '_r2_offload_synced', '1' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 202 );

$t->assertEqual( 1, $result['deleted'], '2.3a: one file deleted' );
$t->assertEqual( 1, $result['skipped'], '2.3b: one skipped' );
$t->assertEqual( '1', get_post_meta( 202, '_r2_offload_local_deleted', true ), '2.3c: flag set' );

// Test 2.4: Not synced — safety guard prevents deletion
echo "\nTest 2.4: attachment NOT synced — refuses to delete\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 203, '2024/03/photo.jpg' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 203 );

$t->assertEqual( 0, $result['deleted'], '2.4a: nothing deleted' );
$t->assertEqual( 1, $result['skipped'], '2.4b: skipped (not synced)' );
$t->assertEqual( '', get_post_meta( 203, '_r2_offload_local_deleted', true ), '2.4c: flag NOT set' );

// Test 2.5: No _wp_attached_file meta — skipped
echo "\nTest 2.5: no _wp_attached_file meta — skipped\n";
reset_state();
cleanup_upload_dir();
update_post_meta( 204, '_r2_offload_synced', '1' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 204 );

$t->assertEqual( 0, $result['deleted'], '2.5a: nothing deleted' );
$t->assertEqual( 1, $result['skipped'], '2.5b: skipped' );
$t->assertEqual( '', get_post_meta( 204, '_r2_offload_local_deleted', true ), '2.5c: flag NOT set' );

// Test 2.6: Multiple sizes ALL already gone — flag set
echo "\nTest 2.6: multiple sizes ALL already gone — flag set\n";
reset_state();
cleanup_upload_dir();
setup_attachment_meta( 205, '2024/03/photo.jpg', [
    'thumbnail' => [ 'file' => 'photo-150x150.jpg' ],
    'medium'    => [ 'file' => 'photo-300x200.jpg' ],
] );
update_post_meta( 205, '_r2_offload_synced', '1' );

$sync   = make_sync();
$result = $sync->delete_local_for_attachment( 205 );

$t->assertEqual( 0, $result['deleted'], '2.6a: nothing deleted' );
$t->assertEqual( 3, $result['skipped'], '2.6b: all three skipped' );
$t->assertEqual( '1', get_post_meta( 205, '_r2_offload_local_deleted', true ), '2.6c: flag SET (all gone = R2-only)' );

// -------------------------------------------------------------------------
// END-TO-END: The exact user scenario that triggered the bug
// -------------------------------------------------------------------------

echo "\n--- END-TO-END: User's exact scenario ---\n\n";

// Test 3.1: Migration+delete_local → bulk delete → count correct
echo "Test 3.1: migration+delete_local → bulk delete_local_for_attachment → flag set\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 300, '2024/03/photo.jpg' );

$settings = new Settings();
$settings->set_delete_local( true );
$sync = make_sync( $settings, new R2Client() );

$result = $sync->sync_attachment( 300 );
$t->assertEqual( '1', get_post_meta( 300, '_r2_offload_local_deleted', true ), '3.1a: flag set after migration' );

$result2 = $sync->delete_local_for_attachment( 300 );
$t->assertEqual( '1', get_post_meta( 300, '_r2_offload_local_deleted', true ), '3.1b: flag still set after bulk delete' );

// Test 3.2: Migration (no auto-delete) → manual bulk delete → flag set
echo "\nTest 3.2: migration (no auto-delete) → bulk delete → flag set\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 301, '2024/03/photo.jpg' );

$settings2 = new Settings();
$settings2->set_delete_local( false );
$sync2 = make_sync( $settings2, new R2Client() );

$result = $sync2->sync_attachment( 301 );
$t->assertEqual( '1', get_post_meta( 301, '_r2_offload_synced', true ), '3.2a: synced' );
$t->assertEqual( '', get_post_meta( 301, '_r2_offload_local_deleted', true ), '3.2b: no local_deleted yet' );

$result2 = $sync2->delete_local_for_attachment( 301 );
$t->assertEqual( 1, $result2['deleted'], '3.2c: file deleted' );
$t->assertEqual( '1', get_post_meta( 301, '_r2_offload_local_deleted', true ), '3.2d: flag set' );

// Test 3.3: 25 attachments — simulates user's exact scenario with bulk operations
echo "\nTest 3.3: bulk 25 attachments — migration deletes, bulk delete sets flags\n";
reset_state();
cleanup_upload_dir();

$settings = new Settings();
$settings->set_delete_local( true );
$sync = make_sync( $settings, new R2Client() );

for ( $i = 1; $i <= 25; $i++ ) {
    create_test_file( "2024/03/img-{$i}.jpg" );
    setup_attachment_meta( $i, "2024/03/img-{$i}.jpg" );
    $sync->sync_attachment( $i );
}

$flagged_count = 0;
for ( $i = 1; $i <= 25; $i++ ) {
    if ( get_post_meta( $i, '_r2_offload_local_deleted', true ) === '1' ) {
        $flagged_count++;
    }
}
$t->assertEqual( 25, $flagged_count, '3.3a: all 25 have local_deleted flag after migration' );

// Now run bulk delete on all 25 — files already gone
for ( $i = 1; $i <= 25; $i++ ) {
    $sync->delete_local_for_attachment( $i );
}

$flagged_after = 0;
for ( $i = 1; $i <= 25; $i++ ) {
    if ( get_post_meta( $i, '_r2_offload_local_deleted', true ) === '1' ) {
        $flagged_after++;
    }
}
$t->assertEqual( 25, $flagged_after, '3.3b: all 25 still flagged after bulk delete' );

// -------------------------------------------------------------------------
// RESTORE: verify restore_from_r2 clears the flag
// -------------------------------------------------------------------------

echo "\n--- RESTORE: restore_from_r2 clears _r2_offload_local_deleted ---\n\n";

// Test 4.1: Restore clears the flag on success
echo "Test 4.1: restore clears the flag\n";
reset_state();
cleanup_upload_dir();
setup_upload_dir();

setup_attachment_meta( 400, '2024/03/photo.jpg' );
update_post_meta( 400, '_r2_offload_synced', '1' );
update_post_meta( 400, '_r2_offload_local_deleted', '1' );
update_post_meta( 400, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$r2   = new R2Client();
$sync = make_sync( new Settings(), $r2 );

$result = $sync->restore_from_r2( 400 );

$t->assertEqual( 1, $result['restored'], '4.1a: one file restored' );
$t->assertEqual( 0, $result['failed'], '4.1b: no failures' );
$t->assertEqual( '', get_post_meta( 400, '_r2_offload_local_deleted', true ), '4.1c: flag cleared after restore' );

// Test 4.2: Restore failure keeps the flag
echo "\nTest 4.2: restore failure keeps the flag\n";
reset_state();
cleanup_upload_dir();

setup_attachment_meta( 401, '2024/03/photo.jpg' );
update_post_meta( 401, '_r2_offload_synced', '1' );
update_post_meta( 401, '_r2_offload_local_deleted', '1' );
update_post_meta( 401, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$r2 = new R2Client();
$r2->download_returns = false;
$sync = make_sync( new Settings(), $r2 );

$result = $sync->restore_from_r2( 401 );

$t->assertEqual( 1, $result['failed'], '4.2a: one failure' );
$t->assertEqual( '1', get_post_meta( 401, '_r2_offload_local_deleted', true ), '4.2b: flag preserved on failure' );

// Test 4.3: Restore skips files that already exist locally
echo "\nTest 4.3: restore skips existing local files\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );

setup_attachment_meta( 402, '2024/03/photo.jpg' );
update_post_meta( 402, '_r2_offload_synced', '1' );
update_post_meta( 402, '_r2_offload_local_deleted', '1' );
update_post_meta( 402, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$sync = make_sync( new Settings(), new R2Client() );

$result = $sync->restore_from_r2( 402 );

$t->assertEqual( 0, $result['restored'], '4.3a: nothing restored (already exists)' );
$t->assertEqual( 1, $result['skipped'], '4.3b: one skipped' );
$t->assertEqual( '1', get_post_meta( 402, '_r2_offload_local_deleted', true ), '4.3c: flag stays (nothing was restored)' );

// Test 4.4: Restore with no R2 keys — skipped
echo "\nTest 4.4: restore with no R2 keys — skipped\n";
reset_state();
cleanup_upload_dir();

setup_attachment_meta( 403, '2024/03/photo.jpg' );
update_post_meta( 403, '_r2_offload_synced', '1' );
update_post_meta( 403, '_r2_offload_local_deleted', '1' );

$sync   = make_sync();
$result = $sync->restore_from_r2( 403 );

$t->assertEqual( 1, $result['skipped'], '4.4a: skipped (no keys)' );
$t->assertEqual( '1', get_post_meta( 403, '_r2_offload_local_deleted', true ), '4.4b: flag unchanged' );

// Test 4.5: Restore when plugin not configured — skipped
echo "\nTest 4.5: restore when plugin not configured\n";
reset_state();
cleanup_upload_dir();

setup_attachment_meta( 404, '2024/03/photo.jpg' );
update_post_meta( 404, '_r2_offload_synced', '1' );
update_post_meta( 404, '_r2_offload_local_deleted', '1' );

$settings = new Settings();
$settings->set_configured( false );
$sync = make_sync( $settings );

$result = $sync->restore_from_r2( 404 );
$t->assertEqual( 1, $result['skipped'], '4.5a: skipped' );
$t->assertEqual( '1', get_post_meta( 404, '_r2_offload_local_deleted', true ), '4.5b: flag unchanged' );

// -------------------------------------------------------------------------
// DESYNC: restore_and_desync cleans everything up
// -------------------------------------------------------------------------

echo "\n--- DESYNC: restore_and_desync_attachment ---\n\n";

echo "Test 5.1: desync clears all meta including local_deleted\n";
reset_state();
cleanup_upload_dir();
setup_upload_dir();

setup_attachment_meta( 500, '2024/03/photo.jpg' );
update_post_meta( 500, '_r2_offload_synced', '1' );
update_post_meta( 500, '_r2_offload_local_deleted', '1' );
update_post_meta( 500, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$sync = make_sync( new Settings(), new R2Client() );

$result = $sync->restore_and_desync_attachment( 500 );

$t->assert( $result['desynced'], '5.1a: desynced successfully' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_synced', true ), '5.1b: synced cleared' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_keys', true ), '5.1c: keys cleared' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_local_deleted', true ), '5.1d: local_deleted cleared' );

// Test 5.2: Desync aborts if restore fails
echo "\nTest 5.2: desync aborts if restore fails\n";
reset_state();
cleanup_upload_dir();

setup_attachment_meta( 501, '2024/03/photo.jpg' );
update_post_meta( 501, '_r2_offload_synced', '1' );
update_post_meta( 501, '_r2_offload_local_deleted', '1' );
update_post_meta( 501, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$r2 = new R2Client();
$r2->download_returns = false;
$sync = make_sync( new Settings(), $r2 );

$result = $sync->restore_and_desync_attachment( 501 );

$t->assert( ! $result['desynced'], '5.2a: NOT desynced' );
$t->assertEqual( '1', get_post_meta( 501, '_r2_offload_synced', true ), '5.2b: still synced' );
$t->assertEqual( '1', get_post_meta( 501, '_r2_offload_local_deleted', true ), '5.2c: flag preserved' );

// -------------------------------------------------------------------------
// EDGE CASES
// -------------------------------------------------------------------------

echo "\n--- EDGE CASES ---\n\n";

// Test 6.1: Plugin not configured — sync skips
echo "Test 6.1: plugin not configured — sync skips\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 600, '2024/03/photo.jpg' );

$settings = new Settings();
$settings->set_configured( false );
$settings->set_delete_local( true );
$sync = make_sync( $settings );

$result = $sync->sync_attachment( 600 );
$t->assertEqual( 1, $result['skipped'], '6.1a: skipped' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_local_deleted', true ), '6.1b: no flag set' );

// Test 6.2: Excluded MIME type — sync skips
echo "\nTest 6.2: excluded mime type — sync skips\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 601, '2024/03/photo.jpg' );
$GLOBALS['__wp_postmeta'][601]['_mime_type'] = 'image/jpeg';

$settings = new Settings();
$settings->set_delete_local( true );
$settings->set_excluded_mime_types( [ 'image/jpeg' ] );
$sync = make_sync( $settings );

$result = $sync->sync_attachment( 601 );
$t->assertEqual( 1, $result['skipped'], '6.2a: skipped' );
$t->assertEqual( '', get_post_meta( 601, '_r2_offload_local_deleted', true ), '6.2b: no flag' );

// Test 6.3: Missing _wp_attached_file — sync fails
echo "\nTest 6.3: missing _wp_attached_file — sync fails\n";
reset_state();
cleanup_upload_dir();

$sync   = make_sync();
$result = $sync->sync_attachment( 602 );
$t->assertEqual( 1, $result['failed'], '6.3a: one failure' );
$t->assertEqual( '', get_post_meta( 602, '_r2_offload_local_deleted', true ), '6.3b: no flag' );

// Test 6.4: Logger records already_gone context
echo "\nTest 6.4: logger records already_gone=true when all files missing\n";
reset_state();
cleanup_upload_dir();
setup_attachment_meta( 603, '2024/03/photo.jpg' );
update_post_meta( 603, '_r2_offload_synced', '1' );

$logger = new ErrorLogger();
$sync   = make_sync( new Settings(), new R2Client(), $logger );
$sync->delete_local_for_attachment( 603 );

$info_logs = array_filter( $logger->logs, fn( $l ) => $l['level'] === 'info' );
$last_info = end( $info_logs );
$t->assert( $last_info !== false, '6.4a: info log was recorded' );
$t->assertEqual( true, $last_info['context']['already_gone'] ?? false, '6.4b: already_gone=true in context' );

// Test 6.5: Full lifecycle — sync → delete → restore → verify
echo "\nTest 6.5: full lifecycle — sync → auto-delete → restore → verify\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/lifecycle.jpg' );
setup_attachment_meta( 604, '2024/03/lifecycle.jpg' );

$settings = new Settings();
$settings->set_delete_local( true );
$r2   = new R2Client();
$sync = make_sync( $settings, $r2 );

// Phase 1: Sync + auto-delete.
$sync->sync_attachment( 604 );
$t->assertEqual( '1', get_post_meta( 604, '_r2_offload_local_deleted', true ), '6.5a: flagged after sync' );

// Phase 2: Bulk delete (files already gone).
$sync->delete_local_for_attachment( 604 );
$t->assertEqual( '1', get_post_meta( 604, '_r2_offload_local_deleted', true ), '6.5b: flag persists' );

// Phase 3: Restore from R2.
$result = $sync->restore_from_r2( 604 );
$t->assertEqual( 1, $result['restored'], '6.5c: file restored' );
$t->assertEqual( '', get_post_meta( 604, '_r2_offload_local_deleted', true ), '6.5d: flag cleared after restore' );

// Phase 4: File exists locally again.
$base = sys_get_temp_dir() . '/wp-uploads';
$t->assert( file_exists( $base . '/2024/03/lifecycle.jpg' ), '6.5e: file physically exists after restore' );

// Test 6.6: WooCommerce scenario — extra sizes added after initial sync
echo "\nTest 6.6: WooCommerce extra sizes added after initial sync\n";
reset_state();
cleanup_upload_dir();
create_test_file( '2024/03/product.jpg' );
setup_attachment_meta( 605, '2024/03/product.jpg' );

$settings = new Settings();
$settings->set_delete_local( true );
$sync = make_sync( $settings, new R2Client() );

// Initial sync — just the original.
$result = $sync->sync_attachment( 605 );
$t->assertEqual( 1, $result['uploaded'], '6.6a: original uploaded' );
$t->assertEqual( '1', get_post_meta( 605, '_r2_offload_local_deleted', true ), '6.6b: flagged' );

// WooCommerce generates extra sizes later.
create_test_file( '2024/03/product-100x100.jpg' );
$GLOBALS['__wp_postmeta'][605]['_wp_attachment_metadata'] = [
    'sizes' => [
        'woocommerce_thumbnail' => [ 'file' => 'product-100x100.jpg' ],
    ],
];

// Re-sync picks up the new size.
$result2 = $sync->sync_attachment( 605 );
$t->assertEqual( 1, $result2['uploaded'], '6.6c: new size uploaded' );
$t->assertEqual( 1, $result2['skipped'], '6.6d: original skipped (already on R2)' );
$t->assertEqual( '1', get_post_meta( 605, '_r2_offload_local_deleted', true ), '6.6e: flag still set after re-sync' );

// -------------------------------------------------------------------------
// Cleanup and summary
// -------------------------------------------------------------------------

cleanup_upload_dir();
exit( $t->summary() );
