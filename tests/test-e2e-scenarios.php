<?php
/**
 * End-to-end REAL USE-CASE scenarios — the entire plugin wired together
 * against live Cloudflare R2.
 *
 * Unlike the per-class suites, this runs the real production classes in
 * concert (UploadHandler → migration queue → BatchProcessor → AttachmentSync
 * → R2Client → UrlRewriter) and tells one continuous site story:
 *
 *   S1  Editor uploads an image (inline sync) and it serves from the CDN
 *   S2  Background offload: upload → queue row → cron batch → synced
 *   S3  WooCommerce generates a product size later → REST save re-syncs it
 *   S4  Admin frees disk space (delete local) — site still serves from CDN
 *   S5  Disaster recovery: restore files from R2 to the server
 *   S6  Full exit: restore & desync — bucket emptied, URLs back to local
 *   S7  Pre-uploaded bucket: Validate claims files without re-uploading
 *   S8  Deleting media in WP also deletes it from R2
 *
 * Requires the same env vars as test-r2-live.php. All keys live under
 * r2-offload-test/e2e/ and are deleted at the end.
 *
 * Run: php tests/test-e2e-scenarios.php
 */

// ---------------------------------------------------------------------------
// Bootstrap
// ---------------------------------------------------------------------------

$ca_bundle = __DIR__ . '/cacert.pem';
if ( file_exists( $ca_bundle ) && ! getenv( 'AWS_CA_BUNDLE' ) ) {
    putenv( 'AWS_CA_BUNDLE=' . $ca_bundle );
}

require_once __DIR__ . '/wp-stubs.php';
require_once __DIR__ . '/fake-wpdb.php';

// Extra WP functions UrlRewriter needs that wp-stubs.php doesn't provide.
if ( ! function_exists( 'untrailingslashit' ) ) {
    function untrailingslashit( string $string ): string {
        return rtrim( $string, '/\\' );
    }
}
if ( ! function_exists( 'attachment_url_to_postid' ) ) {
    function attachment_url_to_postid( string $url ): int {
        return 0; // content-rewrite lookups not exercised in these scenarios
    }
}
require_once __DIR__ . '/../includes/class-settings.php';
require_once __DIR__ . '/../includes/class-error-logger.php';
require_once __DIR__ . '/../includes/class-r2-client.php';
require_once __DIR__ . '/../includes/class-attachment-sync.php';
require_once __DIR__ . '/../includes/class-upload-handler.php';
require_once __DIR__ . '/../includes/class-batch-processor.php';
require_once __DIR__ . '/../includes/class-url-rewriter.php';

$lib_autoload = __DIR__ . '/../lib/vendor/autoload.php';
if ( ! file_exists( $lib_autoload ) ) {
    echo "SKIP: lib/vendor/autoload.php not found. Run composer install + strauss first.\n";
    exit( 0 );
}
require_once $lib_autoload;

$account_id = getenv( 'R2_ACCOUNT_ID' );
$key_id     = getenv( 'R2_ACCESS_KEY_ID' );
$secret     = getenv( 'R2_SECRET_ACCESS_KEY' );
$bucket     = getenv( 'R2_BUCKET' );

if ( ! $account_id || ! $key_id || ! $secret || ! $bucket ) {
    echo "SKIP: Missing required environment variables.\n";
    echo "      Set R2_ACCOUNT_ID, R2_ACCESS_KEY_ID, R2_SECRET_ACCESS_KEY, R2_BUCKET.\n";
    exit( 0 );
}

const TEST_PREFIX = 'r2-offload-test/e2e';
const CDN_DOMAIN  = 'cdn.e2e-test.example';
const MIGRATION_TABLE = 'wp_r2_offload_migration_queue';

// Site configuration — exactly what an admin would save in the settings UI.
$GLOBALS['__wp_options'] = [
    'r2_offload_account_id'            => $account_id,
    'r2_offload_access_key_id'         => $key_id,
    'r2_offload_bucket'                => $bucket,
    'r2_offload_path_prefix'           => TEST_PREFIX,
    'r2_offload_custom_domain'         => CDN_DOMAIN,
    'r2_offload_url_scheme'            => 'https',
    'r2_offload_serve_from_r2'         => 1,
    'r2_offload_upload_on_save'        => 1,
    'r2_offload_background_offload'    => 0,
    'r2_offload_delete_local'          => 0,
    'r2_offload_batch_size'            => 10,
    'r2_offload_multipart_threshold'   => 5 * 1024 * 1024,
    'r2_offload_multipart_concurrency' => 3,
    'r2_offload_excluded_mime_types'   => [],
];
$GLOBALS['__wp_postmeta']       = [];
$GLOBALS['__wp_transients']     = [];
$GLOBALS['__wp_cron_scheduled'] = [];
$GLOBALS['__wp_next_scheduled'] = [];
$GLOBALS['__wp_cron_spawned']   = 0;
$GLOBALS['__wp_actions_fired']  = [];
$GLOBALS['wpdb']                = new FakeWpdb();

$settings = new \R2Offload\Settings();
$GLOBALS['__wp_options']['r2_offload_secret_access_key'] = $settings->sanitize_secret_key( $secret );
$settings->flush_cache();

$logger   = new \R2Offload\ErrorLogger();
$r2       = new \R2Offload\R2Client( $settings, $logger );
$sync     = new \R2Offload\AttachmentSync( $r2, $settings, $logger );
$uploader = new \R2Offload\UploadHandler( $sync, $settings, $logger );
$batch    = new \R2Offload\BatchProcessor( $sync, $settings, $logger );
$rewriter = new \R2Offload\UrlRewriter( $settings );

// ---------------------------------------------------------------------------
// Harness + helpers
// ---------------------------------------------------------------------------

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
            echo "  FAIL  {$name}\n        expected: " . var_export( $expected, true )
               . "\n        actual:   " . var_export( $actual, true ) . "\n";
        }
    }

    public function summary(): int {
        $total = $this->passed + $this->failed;
        echo "\n" . str_repeat( '=', 60 ) . "\n";
        echo "E2E Scenario Results: {$this->passed}/{$total} passed, {$this->failed} failed\n";
        if ( $this->failures ) {
            echo "\nFailed:\n";
            foreach ( $this->failures as $f ) {
                echo "  - {$f}\n";
            }
        }
        echo str_repeat( '=', 60 ) . "\n";
        return $this->failed > 0 ? 1 : 0;
    }
}

/** Minimal WC_Product double for the REST re-sync hook. */
class FakeProduct {
    private int $image_id;
    public function __construct( int $image_id ) { $this->image_id = $image_id; }
    public function get_image_id(): int { return $this->image_id; }
}

function upload_base(): string {
    return rtrim( wp_upload_dir()['basedir'], '/\\' );
}

function create_local( string $relative, string $content = '' ): string {
    $full = upload_base() . '/' . $relative;
    if ( ! is_dir( dirname( $full ) ) ) {
        mkdir( dirname( $full ), 0755, true );
    }
    file_put_contents( $full, $content !== '' ? $content : "e2e-content-{$relative}-" . time() );
    return $full;
}

function set_attachment( int $id, string $attached, array $sizes = [] ): void {
    $GLOBALS['__wp_postmeta'][ $id ]['_wp_attached_file'] = $attached;
    if ( $sizes ) {
        $GLOBALS['__wp_postmeta'][ $id ]['_wp_attachment_metadata'] = [ 'sizes' => $sizes ];
    }
}

function r2_key( string $relative ): string {
    return TEST_PREFIX . '/' . $relative;
}

function local_url( string $relative ): string {
    return rtrim( wp_upload_dir()['baseurl'], '/' ) . '/' . $relative;
}

$t = new TestRunner();

echo "=== E2E Scenarios — entire plugin against live R2 ===\n";
echo "Bucket: {$bucket}   Prefix: " . TEST_PREFIX . "/\n";

// ---------------------------------------------------------------------------
echo "\n--- S1: Editor uploads an image (inline sync) and it serves from the CDN ---\n\n";

create_local( '2026/06/hero.jpg' );
create_local( '2026/06/hero-300x200.jpg' );
set_attachment( 11001, '2026/06/hero.jpg', [ 'medium' => [ 'file' => 'hero-300x200.jpg' ] ] );

$metadata = [ 'sizes' => [ 'medium' => [ 'file' => 'hero-300x200.jpg' ] ] ];
$returned = $uploader->on_generate_metadata( $metadata, 11001 );

$t->assertEqual( $metadata, $returned, 'S1a: filter returns metadata unchanged' );
$t->assertEqual( '1', get_post_meta( 11001, '_r2_offload_synced', true ), 'S1b: attachment marked synced' );
$t->assert( $r2->file_exists( r2_key( '2026/06/hero.jpg' ) ), 'S1c: original in R2' );
$t->assert( $r2->file_exists( r2_key( '2026/06/hero-300x200.jpg' ) ), 'S1d: medium size in R2' );

$cdn_url = $rewriter->rewrite_url( local_url( '2026/06/hero.jpg' ), 11001 );
$t->assert( strpos( $cdn_url, 'https://' . CDN_DOMAIN . '/' . TEST_PREFIX . '/2026/06/hero.jpg' ) === 0, 'S1e: URL rewritten to CDN' );

$srcset = $rewriter->rewrite_srcset(
    [ 300 => [ 'url' => local_url( '2026/06/hero-300x200.jpg' ) ] ],
    [ 300, 200 ], local_url( '2026/06/hero.jpg' ), [], 11001
);
$t->assert( strpos( $srcset[300]['url'], CDN_DOMAIN ) !== false, 'S1f: srcset entry rewritten to CDN' );

$unsynced_url = $rewriter->rewrite_url( local_url( '2026/06/other.jpg' ), 19999 );
$t->assertEqual( local_url( '2026/06/other.jpg' ), $unsynced_url, 'S1g: unsynced attachment URL untouched' );

// ---------------------------------------------------------------------------
echo "\n--- S2: Background offload — upload lands in queue, cron batch syncs it ---\n\n";

update_option( 'r2_offload_background_offload', 1 );
$settings->flush_cache();

create_local( '2026/06/gallery.jpg' );
set_attachment( 11002, '2026/06/gallery.jpg' );
$uploader->on_generate_metadata( [], 11002 );

$t->assertEqual( '', get_post_meta( 11002, '_r2_offload_synced', true ), 'S2a: NOT synced inline (queued instead)' );
$rows = $GLOBALS['wpdb']->rows( MIGRATION_TABLE );
$t->assertEqual( 1, count( $rows ), 'S2b: one queue row created' );
$t->assertEqual( 11002, (int) $rows[0]['attachment_id'], 'S2c: correct attachment queued' );
$t->assertEqual( 'pending', $rows[0]['status'], 'S2d: row pending' );
$t->assert( $GLOBALS['__wp_cron_spawned'] > 0, 'S2e: cron runner kicked' );

// Duplicate upload event → INSERT IGNORE keeps a single row.
$uploader->on_generate_metadata( [], 11002 );
$t->assertEqual( 1, count( $GLOBALS['wpdb']->rows( MIGRATION_TABLE ) ), 'S2f: duplicate enqueue ignored (UNIQUE)' );

// Cron fires.
$batch->process_batch();

$t->assertEqual( '1', get_post_meta( 11002, '_r2_offload_synced', true ), 'S2g: synced after cron batch' );
$t->assert( $r2->file_exists( r2_key( '2026/06/gallery.jpg' ) ), 'S2h: object in R2 after cron batch' );
$t->assertEqual( [], $GLOBALS['wpdb']->rows( MIGRATION_TABLE ), 'S2i: queue cleaned up after completion' );

update_option( 'r2_offload_background_offload', 0 );
$settings->flush_cache();

// ---------------------------------------------------------------------------
echo "\n--- S3: WooCommerce generates a product size later — REST save re-syncs ---\n\n";

create_local( '2026/06/product.jpg' );
set_attachment( 11003, '2026/06/product.jpg' );
$uploader->on_generate_metadata( [], 11003 );
$t->assertEqual( '1', get_post_meta( 11003, '_r2_offload_synced', true ), 'S3a: product image synced' );

// WooCommerce lazily generates its thumbnail after the fact.
create_local( '2026/06/product-100x100.jpg' );
set_attachment( 11003, '2026/06/product.jpg', [ 'woocommerce_thumbnail' => [ 'file' => 'product-100x100.jpg' ] ] );

$uploader->on_wc_rest_product_save( new FakeProduct( 11003 ) );

$t->assert( $r2->file_exists( r2_key( '2026/06/product-100x100.jpg' ) ), 'S3b: WC thumbnail uploaded on REST save' );
$keys = json_decode( get_post_meta( 11003, '_r2_offload_keys', true ), true );
$t->assertEqual( 2, count( $keys ), 'S3c: both keys tracked' );

// ---------------------------------------------------------------------------
echo "\n--- S4: Admin frees disk space — local deleted, still served from CDN ---\n\n";

$result = $sync->delete_local_for_attachment( 11001 );
$t->assertEqual( 2, $result['deleted'], 'S4a: both local files deleted' );
$t->assert( ! file_exists( upload_base() . '/2026/06/hero.jpg' ), 'S4b: original gone from disk' );
$t->assertEqual( '1', get_post_meta( 11001, '_r2_offload_local_deleted', true ), 'S4c: R2-only flag set' );
$t->assert( $r2->file_exists( r2_key( '2026/06/hero.jpg' ) ), 'S4d: object still in R2' );
$t->assert( strpos( $rewriter->rewrite_url( local_url( '2026/06/hero.jpg' ), 11001 ), CDN_DOMAIN ) !== false, 'S4e: still served from CDN' );

// ---------------------------------------------------------------------------
echo "\n--- S5: Disaster recovery — restore files from R2 to the server ---\n\n";

$result = $sync->restore_from_r2( 11001 );
$t->assertEqual( 2, $result['restored'], 'S5a: both files restored' );
$t->assertEqual( 0, $result['failed'], 'S5b: no failures' );
$t->assert( file_exists( upload_base() . '/2026/06/hero.jpg' ), 'S5c: original back on disk' );
$t->assert( file_exists( upload_base() . '/2026/06/hero-300x200.jpg' ), 'S5d: size back on disk' );
$t->assertEqual( '', get_post_meta( 11001, '_r2_offload_local_deleted', true ), 'S5e: R2-only flag cleared' );

// ---------------------------------------------------------------------------
echo "\n--- S6: Full exit — restore & desync empties R2, URLs back to local ---\n\n";

$result = $sync->restore_and_desync_attachment( 11002 );
$t->assert( $result['desynced'], 'S6a: desynced' );
$t->assert( file_exists( upload_base() . '/2026/06/gallery.jpg' ), 'S6b: file present locally' );
$t->assertEqual( 'missing', $r2->check_key( r2_key( '2026/06/gallery.jpg' ) ), 'S6c: object deleted from R2' );
$t->assertEqual( '', get_post_meta( 11002, '_r2_offload_synced', true ), 'S6d: sync meta cleared' );
$t->assertEqual( local_url( '2026/06/gallery.jpg' ), $rewriter->rewrite_url( local_url( '2026/06/gallery.jpg' ), 11002 ), 'S6e: URL back to local' );

// ---------------------------------------------------------------------------
echo "\n--- S7: Pre-uploaded bucket — Validate claims files without re-upload ---\n\n";

// The user already copied these to R2 manually (simulate with direct uploads).
$pre1 = create_local( '2026/06/manual.jpg' );
$pre2 = create_local( '2026/06/manual-150x150.jpg' );
$r2->upload_file( $pre1, r2_key( '2026/06/manual.jpg' ), 'image/jpeg' );
$r2->upload_file( $pre2, r2_key( '2026/06/manual-150x150.jpg' ), 'image/jpeg' );
set_attachment( 11004, '2026/06/manual.jpg', [ 'thumbnail' => [ 'file' => 'manual-150x150.jpg' ] ] );

$result = $sync->validate_pre_uploaded( 11004 );
$t->assertEqual( 1, $result['claimed'], 'S7a: attachment claimed' );
$t->assertEqual( 0, $result['missing'], 'S7b: nothing missing' );
$t->assertEqual( '1', get_post_meta( 11004, '_r2_offload_synced', true ), 'S7c: marked synced via Validate' );
$keys = json_decode( get_post_meta( 11004, '_r2_offload_keys', true ), true );
$t->assertEqual( 2, count( $keys ), 'S7d: both keys tracked' );

// ---------------------------------------------------------------------------
echo "\n--- S8: Deleting media in WP also deletes from R2 ---\n\n";

$uploader->on_delete_attachment( 11003 );
$t->assertEqual( 'missing', $r2->check_key( r2_key( '2026/06/product.jpg' ) ), 'S8a: original removed from R2' );
$t->assertEqual( 'missing', $r2->check_key( r2_key( '2026/06/product-100x100.jpg' ) ), 'S8b: WC size removed from R2' );
$t->assertEqual( '', get_post_meta( 11003, '_r2_offload_synced', true ), 'S8c: meta cleared' );

// ---------------------------------------------------------------------------
echo "\n--- Cleanup ---\n";

$r2->delete_by_prefix( TEST_PREFIX . '/' );
$left = $r2->list_objects( TEST_PREFIX . '/', 10 );
$t->assertEqual( 0, count( $left['objects'] ), 'CLEANUP: no objects left under ' . TEST_PREFIX . '/' );

// Remove local temp uploads.
$base = upload_base();
if ( is_dir( $base ) ) {
    $it    = new RecursiveDirectoryIterator( $base, RecursiveDirectoryIterator::SKIP_DOTS );
    $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
    foreach ( $files as $file ) {
        $file->isDir() ? rmdir( $file->getPathname() ) : unlink( $file->getPathname() );
    }
}

exit( $t->summary() );
