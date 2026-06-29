<?php
/**
 * Tests for AttachmentSync — file upload, restore, desync, local delete.
 *
 * Covers:
 * - sync_attachment: upload files, mark synced, handle failures
 * - delete_local: toggling, flag management, already-gone files
 * - restore_from_r2: download, flag clearing, failure handling
 * - restore_and_desync_attachment: full cleanup workflow
 * - validate_pre_uploaded: R2 key checking
 * - MIME type exclusion filter
 * - Path prefix customization
 * - Multi-size image handling (thumbnails)
 * - Concurrent batch operations (25+ attachments)
 *
 * Run: php tests/test-attachment-sync.php
 */

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/TestRunner.php';
require_once __DIR__ . '/../includes/class-attachment-sync.php';

use R2Offload\AttachmentSync;
use R2Offload\R2Client;
use R2Offload\Settings;
use R2Offload\ErrorLogger;

$t = new TestRunner();

// =============================================================================
// Helpers
// =============================================================================

function reset_state(): void {
    $GLOBALS['__wp_postmeta'] = [];
    $GLOBALS['__wp_options']  = [];
    $GLOBALS['__wp_deleted']  = [];
}

function setup_upload_dir(): string {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( ! is_dir( $base ) ) mkdir( $base, 0755, true );
    return $base;
}

function create_test_file( string $relative_path ): string {
    $base = setup_upload_dir();
    $full = $base . '/' . $relative_path;
    $dir  = dirname( $full );
    if ( ! is_dir( $dir ) ) mkdir( $dir, 0755, true );
    file_put_contents( $full, 'test-content-' . basename( $relative_path ) );
    return $full;
}

function cleanup_upload_dir(): void {
    $base = sys_get_temp_dir() . '/wp-uploads';
    if ( is_dir( $base ) ) {
        $it    = new RecursiveDirectoryIterator( $base, RecursiveDirectoryIterator::SKIP_DOTS );
        $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
        foreach ( $files as $file ) {
            if ( $file->isDir() ) rmdir( $file->getRealPath() );
            else unlink( $file->getRealPath() );
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

// =============================================================================
// 1. sync_attachment — basic upload
// =============================================================================

$t->section( '1. sync_attachment() — basic upload' );

reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 100, '2024/03/photo.jpg' );

$sync   = make_sync();
$result = $sync->sync_attachment( 100 );

$t->assertEqual( 1, $result['uploaded'], '1.1 One file uploaded' );
$t->assertEqual( 0, $result['failed'], '1.1b No failures' );
$t->assertEqual( '1', get_post_meta( 100, '_r2_offload_synced', true ), '1.1c Marked synced' );
$t->assertNotEmpty( get_post_meta( 100, '_r2_offload_keys', true ), '1.1d R2 keys stored' );

// 1.2 Multi-size image upload
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
create_test_file( '2024/03/photo-150x150.jpg' );
create_test_file( '2024/03/photo-300x200.jpg' );
setup_attachment_meta( 101, '2024/03/photo.jpg', [
    'thumbnail' => [ 'file' => 'photo-150x150.jpg' ],
    'medium'    => [ 'file' => 'photo-300x200.jpg' ],
] );

$result = make_sync()->sync_attachment( 101 );
$t->assertEqual( 3, $result['uploaded'], '1.2 Three files uploaded (original + 2 sizes)' );
$t->assertEqual( '1', get_post_meta( 101, '_r2_offload_synced', true ), '1.2b Multi-size marked synced' );

// 1.3 Upload failure — not marked synced
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 102, '2024/03/photo.jpg' );

$r2 = new R2Client();
$r2->upload_returns = false;
$result = make_sync( null, $r2 )->sync_attachment( 102 );

$t->assertEqual( 1, $result['failed'], '1.3 Upload failure counted' );
$t->assertEqual( '', get_post_meta( 102, '_r2_offload_synced', true ), '1.3b NOT marked synced on failure' );

// 1.4 Missing local file — counted as missing
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 103, '2024/03/missing.jpg' );

$result = make_sync()->sync_attachment( 103 );
$t->assertEqual( 1, $result['missing'], '1.4 Missing file counted' );
$t->assertEqual( 0, $result['uploaded'], '1.4b Nothing uploaded' );

// 1.5 Plugin not configured — skipped
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 104, '2024/03/photo.jpg' );

$s = new Settings();
$s->set_configured( false );
$result = make_sync( $s )->sync_attachment( 104 );
$t->assertEqual( 1, $result['skipped'], '1.5 Skipped when not configured' );

// =============================================================================
// 2. sync_attachment — delete_local behavior
// =============================================================================

$t->section( '2. sync_attachment() + delete_local' );

// 2.1 delete_local=true sets _r2_offload_local_deleted
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 200, '2024/03/photo.jpg' );

$s = new Settings();
$s->set_delete_local( true );
$result = make_sync( $s, new R2Client() )->sync_attachment( 200 );

$t->assertEqual( 1, $result['uploaded'], '2.1 Uploaded' );
$t->assertEqual( '1', get_post_meta( 200, '_r2_offload_local_deleted', true ), '2.1b local_deleted flag set' );

// 2.2 delete_local=false does NOT set flag
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 201, '2024/03/photo.jpg' );

$s = new Settings();
$s->set_delete_local( false );
$result = make_sync( $s, new R2Client() )->sync_attachment( 201 );

$t->assertEqual( 1, $result['uploaded'], '2.2 Uploaded' );
$t->assertEqual( '', get_post_meta( 201, '_r2_offload_local_deleted', true ), '2.2b local_deleted NOT set' );

// 2.3 Upload failure does NOT set local_deleted
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 202, '2024/03/photo.jpg' );

$s = new Settings();
$s->set_delete_local( true );
$r2 = new R2Client();
$r2->upload_returns = false;
$result = make_sync( $s, $r2 )->sync_attachment( 202 );

$t->assertEqual( 1, $result['failed'], '2.3 Failed' );
$t->assertEqual( '', get_post_meta( 202, '_r2_offload_local_deleted', true ), '2.3b local_deleted NOT set on failure' );

// =============================================================================
// 3. Re-sync (already synced) — no duplicate upload
// =============================================================================

$t->section( '3. Re-sync (already synced)' );

reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 300, '2024/03/photo.jpg' );
update_post_meta( 300, '_r2_offload_synced', '1' );
update_post_meta( 300, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$s = new Settings();
$s->set_delete_local( true );
$result = make_sync( $s, new R2Client() )->sync_attachment( 300 );

$t->assertEqual( 0, $result['uploaded'], '3.1 No new uploads' );
$t->assertEqual( 1, $result['skipped'], '3.1b Skipped (already on R2)' );

// =============================================================================
// 4. delete_local_for_attachment()
// =============================================================================

$t->section( '4. delete_local_for_attachment()' );

// 4.1 Files exist, deleted, flag set
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 400, '2024/03/photo.jpg' );
update_post_meta( 400, '_r2_offload_synced', '1' );

$result = make_sync()->delete_local_for_attachment( 400 );
$t->assertEqual( 1, $result['deleted'], '4.1 One file deleted' );
$t->assertEqual( '1', get_post_meta( 400, '_r2_offload_local_deleted', true ), '4.1b Flag set' );

// 4.2 Files already gone — flag STILL set (bug fix verification)
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 401, '2024/03/photo.jpg' );
update_post_meta( 401, '_r2_offload_synced', '1' );

$result = make_sync()->delete_local_for_attachment( 401 );
$t->assertEqual( 0, $result['deleted'], '4.2 Nothing to delete' );
$t->assertEqual( 1, $result['skipped'], '4.2b Skipped (already gone)' );
$t->assertEqual( '1', get_post_meta( 401, '_r2_offload_local_deleted', true ), '4.2c Flag SET despite files gone' );

// 4.3 Not synced — refuses to delete
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 402, '2024/03/photo.jpg' );

$result = make_sync()->delete_local_for_attachment( 402 );
$t->assertEqual( 0, $result['deleted'], '4.3 Nothing deleted (not synced)' );
$t->assertEqual( '', get_post_meta( 402, '_r2_offload_local_deleted', true ), '4.3b Flag NOT set' );

// 4.4 Multiple sizes ALL already gone — flag set
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 403, '2024/03/photo.jpg', [
    'thumbnail' => [ 'file' => 'photo-150x150.jpg' ],
    'medium'    => [ 'file' => 'photo-300x200.jpg' ],
] );
update_post_meta( 403, '_r2_offload_synced', '1' );

$result = make_sync()->delete_local_for_attachment( 403 );
$t->assertEqual( 0, $result['deleted'], '4.4 Nothing deleted' );
$t->assertEqual( 3, $result['skipped'], '4.4b All three skipped' );
$t->assertEqual( '1', get_post_meta( 403, '_r2_offload_local_deleted', true ), '4.4c Flag SET' );

// =============================================================================
// 5. restore_from_r2()
// =============================================================================

$t->section( '5. restore_from_r2()' );

// 5.1 Successful restore clears flag
reset_state(); cleanup_upload_dir(); setup_upload_dir();
setup_attachment_meta( 500, '2024/03/photo.jpg' );
update_post_meta( 500, '_r2_offload_synced', '1' );
update_post_meta( 500, '_r2_offload_local_deleted', '1' );
update_post_meta( 500, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$result = make_sync( new Settings(), new R2Client() )->restore_from_r2( 500 );
$t->assertEqual( 1, $result['restored'], '5.1 One file restored' );
$t->assertEqual( '', get_post_meta( 500, '_r2_offload_local_deleted', true ), '5.1b local_deleted cleared' );

// 5.2 Download failure keeps flag
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 501, '2024/03/photo.jpg' );
update_post_meta( 501, '_r2_offload_synced', '1' );
update_post_meta( 501, '_r2_offload_local_deleted', '1' );
update_post_meta( 501, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$r2 = new R2Client();
$r2->download_returns = false;
$result = make_sync( new Settings(), $r2 )->restore_from_r2( 501 );
$t->assertEqual( 1, $result['failed'], '5.2 One failure' );
$t->assertEqual( '1', get_post_meta( 501, '_r2_offload_local_deleted', true ), '5.2b Flag preserved on failure' );

// 5.3 File already exists locally — skipped
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 502, '2024/03/photo.jpg' );
update_post_meta( 502, '_r2_offload_synced', '1' );
update_post_meta( 502, '_r2_offload_local_deleted', '1' );
update_post_meta( 502, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$result = make_sync( new Settings(), new R2Client() )->restore_from_r2( 502 );
$t->assertEqual( 0, $result['restored'], '5.3 Nothing restored (exists locally)' );
$t->assertEqual( 1, $result['skipped'], '5.3b Skipped' );

// 5.4 No R2 keys — skipped
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 503, '2024/03/photo.jpg' );
update_post_meta( 503, '_r2_offload_synced', '1' );
update_post_meta( 503, '_r2_offload_local_deleted', '1' );

$result = make_sync()->restore_from_r2( 503 );
$t->assertEqual( 1, $result['skipped'], '5.4 Skipped (no R2 keys)' );

// 5.5 Not configured — skipped
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 504, '2024/03/photo.jpg' );
update_post_meta( 504, '_r2_offload_synced', '1' );
update_post_meta( 504, '_r2_offload_local_deleted', '1' );

$s = new Settings();
$s->set_configured( false );
$result = make_sync( $s )->restore_from_r2( 504 );
$t->assertEqual( 1, $result['skipped'], '5.5 Skipped (not configured)' );

// =============================================================================
// 6. restore_and_desync_attachment()
// =============================================================================

$t->section( '6. restore_and_desync_attachment()' );

reset_state(); cleanup_upload_dir(); setup_upload_dir();
setup_attachment_meta( 600, '2024/03/photo.jpg' );
update_post_meta( 600, '_r2_offload_synced', '1' );
update_post_meta( 600, '_r2_offload_local_deleted', '1' );
update_post_meta( 600, '_r2_offload_keys', json_encode( [ 'wp-content/uploads/2024/03/photo.jpg' ] ) );

$r2 = new R2Client();
$result = make_sync( new Settings(), $r2 )->restore_and_desync_attachment( 600 );

$t->assertEqual( true, $result['desynced'], '6.1 Desync succeeded' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_synced', true ), '6.1b _synced cleared' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_local_deleted', true ), '6.1c local_deleted cleared' );
$t->assertEqual( '', get_post_meta( 600, '_r2_offload_keys', true ), '6.1d R2 keys cleared' );
$t->assert( count( $r2->deleted_keys ) > 0, '6.1e R2 keys were deleted' );

// =============================================================================
// 7. validate_pre_uploaded()
// =============================================================================

$t->section( '7. validate_pre_uploaded()' );

reset_state(); cleanup_upload_dir();
setup_attachment_meta( 700, '2024/03/photo.jpg' );

$r2 = new R2Client();
$r2->check_key_responses = [ 'wp-content/uploads/2024/03/photo.jpg' => 'found' ];

$result = make_sync( new Settings(), $r2 )->validate_pre_uploaded( 700 );
$t->assertEqual( 1, $result['claimed'], '7.1 Pre-uploaded claimed' );
$t->assertEqual( '1', get_post_meta( 700, '_r2_offload_synced', true ), '7.1b Marked synced' );

// 7.2 Key not found on R2
reset_state(); cleanup_upload_dir();
setup_attachment_meta( 701, '2024/03/photo.jpg' );

$r2 = new R2Client();
$r2->check_key_default = 'missing';
$result = make_sync( new Settings(), $r2 )->validate_pre_uploaded( 701 );
$t->assertGreaterThan( 0, $result['missing'], '7.2 Key missing on R2' );
$t->assertEqual( '', get_post_meta( 701, '_r2_offload_synced', true ), '7.2b NOT marked synced' );

// =============================================================================
// 8. MIME type exclusion
// =============================================================================

$t->section( '8. MIME type exclusion' );

reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/video.mp4' );
setup_attachment_meta( 800, '2024/03/video.mp4' );
$GLOBALS['__wp_postmeta'][800]['_mime_type'] = 'video/mp4';

$s = new Settings();
$s->set_excluded_mime_types( [ 'video/mp4' ] );

$result = make_sync( $s )->sync_attachment( 800 );
$t->assertEqual( 1, $result['skipped'], '8.1 Excluded MIME type skipped' );
$t->assertEqual( '', get_post_meta( 800, '_r2_offload_synced', true ), '8.1b Not marked synced' );

// Non-excluded type still works
reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 801, '2024/03/photo.jpg' );
$GLOBALS['__wp_postmeta'][801]['_mime_type'] = 'image/jpeg';

$s = new Settings();
$s->set_excluded_mime_types( [ 'video/mp4' ] );
$result = make_sync( $s )->sync_attachment( 801 );
$t->assertEqual( 1, $result['uploaded'], '8.2 Non-excluded MIME uploaded normally' );

// =============================================================================
// 9. Custom path prefix
// =============================================================================

$t->section( '9. Custom path prefix' );

reset_state(); cleanup_upload_dir();
create_test_file( '2024/03/photo.jpg' );
setup_attachment_meta( 900, '2024/03/photo.jpg' );

$s = new Settings();
$s->set_path_prefix( 'custom/prefix' );
$r2 = new R2Client();
$result = make_sync( $s, $r2 )->sync_attachment( 900 );

$t->assertEqual( 1, $result['uploaded'], '9.1 Uploaded with custom prefix' );
$t->assertStringContains( 'custom/prefix', $r2->uploaded[0]['key'], '9.1b Key uses custom prefix' );

// =============================================================================
// 10. Bulk operations (25 attachments)
// =============================================================================

$t->section( '10. Bulk operations — 25 attachments' );

reset_state(); cleanup_upload_dir();

$s = new Settings();
$s->set_delete_local( true );
$sync = make_sync( $s, new R2Client() );

for ( $i = 1; $i <= 25; $i++ ) {
    create_test_file( "2024/03/img-{$i}.jpg" );
    setup_attachment_meta( $i, "2024/03/img-{$i}.jpg" );
    $sync->sync_attachment( $i );
}

$synced_count = 0;
$flagged_count = 0;
for ( $i = 1; $i <= 25; $i++ ) {
    if ( get_post_meta( $i, '_r2_offload_synced', true ) === '1' ) $synced_count++;
    if ( get_post_meta( $i, '_r2_offload_local_deleted', true ) === '1' ) $flagged_count++;
}

$t->assertEqual( 25, $synced_count, '10.1 All 25 synced' );
$t->assertEqual( 25, $flagged_count, '10.2 All 25 local_deleted flagged' );

// Bulk delete on already-deleted files
for ( $i = 1; $i <= 25; $i++ ) {
    $sync->delete_local_for_attachment( $i );
}

$still_flagged = 0;
for ( $i = 1; $i <= 25; $i++ ) {
    if ( get_post_meta( $i, '_r2_offload_local_deleted', true ) === '1' ) $still_flagged++;
}
$t->assertEqual( 25, $still_flagged, '10.3 All 25 still flagged after bulk delete' );

// =============================================================================
// Cleanup
// =============================================================================

cleanup_upload_dir();
exit( $t->summary() );
