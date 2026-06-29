<?php
/**
 * Tests for UrlRewriter — CDN URL rewriting with sync-status checks.
 *
 * Covers:
 * - rewrite_url: single attachment URL replacement
 * - rewrite_image_src: wp_get_attachment_image_src filter
 * - rewrite_srcset: responsive image srcset rewriting
 * - rewrite_content: post content URL replacement (regex-based)
 * - rewrite_html_blob: WooCommerce gallery HTML
 * - rewrite_rest_response: WooCommerce REST API responses
 * - flush_url_cache: multisite blog-switch cache invalidation
 * - register_hooks: conditional hook registration
 * - Performance: per-request sync cache avoids repeated DB queries
 *
 * Run: php tests/test-url-rewriter.php
 */

namespace {
    require_once __DIR__ . '/wp-stubs.php';
    require_once __DIR__ . '/TestRunner.php';

    $GLOBALS['__wp_url_to_id'] = [];
}

namespace R2Offload {
    class Settings {
        private bool   $serve  = true;
        private string $domain = 'cdn.example.com';
        private string $scheme = 'https';

        public function get_serve_from_r2(): bool      { return $this->serve; }
        public function set_serve_from_r2( bool $v )   { $this->serve = $v; }
        public function get_custom_domain(): string     { return $this->domain; }
        public function set_custom_domain( string $v )  { $this->domain = $v; }
        public function get_url_scheme(): string        { return $this->scheme; }
        public function set_url_scheme( string $v )     { $this->scheme = $v; }
        public function get_cdn_base_url(): string {
            if ( ! $this->domain ) return '';
            return $this->scheme . '://' . $this->domain;
        }
    }

    require_once __DIR__ . '/../includes/class-url-rewriter.php';
}

namespace {

use R2Offload\UrlRewriter;
use R2Offload\Settings;

const LOCAL_BASE = 'http://example.com/wp-content/uploads';
const CDN_BASE   = 'https://cdn.example.com';

function reset_url_state(): void {
    $GLOBALS['__wp_postmeta']  = [];
    $GLOBALS['__wp_url_to_id'] = [];
    $GLOBALS['__wp_hooks']     = [];
}

function make_rewriter( ?Settings $s = null ): UrlRewriter {
    return new UrlRewriter( $s ?? new Settings() );
}

function mark_synced( int $id ): void {
    update_post_meta( $id, '_r2_offload_synced', '1' );
}

function attach( int $id, string $path, bool $synced = true ): string {
    $url = LOCAL_BASE . '/' . ltrim( $path, '/' );
    $GLOBALS['__wp_url_to_id'][ $url ] = $id;
    if ( $synced ) mark_synced( $id );
    return $url;
}

$t = new TestRunner();

// =============================================================================
// 1. rewrite_url()
// =============================================================================

$t->section( '1. rewrite_url()' );

reset_url_state();
mark_synced( 10 );
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 10 );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', $got, '1.1 Synced: URL rewritten to CDN' );

reset_url_state();
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 11 );
$t->assertEqual( LOCAL_BASE . '/2024/08/photo.jpg', $got, '1.2 Not synced: URL unchanged' );

reset_url_state();
mark_synced( 12 );
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2025/03/banner-1920x600.jpg', 12 );
$t->assertEqual( CDN_BASE . '/2025/03/banner-1920x600.jpg', $got, '1.3 Full path preserved' );

reset_url_state();
mark_synced( 14 );
$got = make_rewriter()->rewrite_url( 'https://external.com/image.jpg', 14 );
$t->assertEqual( 'https://external.com/image.jpg', $got, '1.4 External URL: unchanged' );

reset_url_state();
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 0 );
$t->assertEqual( LOCAL_BASE . '/2024/08/photo.jpg', $got, '1.5 ID=0: URL unchanged' );

reset_url_state();
mark_synced( 15 );
$s = new Settings();
$s->set_url_scheme( 'http' );
$got = ( new UrlRewriter( $s ) )->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 15 );
$t->assertEqual( 'http://cdn.example.com/2024/08/photo.jpg', $got, '1.6 HTTP-scheme CDN works' );

// =============================================================================
// 2. rewrite_image_src()
// =============================================================================

$t->section( '2. rewrite_image_src()' );

reset_url_state();
$got = make_rewriter()->rewrite_image_src( false, 20, 'thumbnail', false );
$t->assertEqual( false, $got, '2.1 false input: returns false' );

reset_url_state();
$img = [ LOCAL_BASE . '/2024/08/photo.jpg', 800, 600, false ];
$got = make_rewriter()->rewrite_image_src( $img, 21, 'full', false );
$t->assertEqual( $img, $got, '2.2 Not synced: array unchanged' );

reset_url_state();
mark_synced( 22 );
$img = [ LOCAL_BASE . '/2024/08/photo.jpg', 800, 600, false ];
$got = make_rewriter()->rewrite_image_src( $img, 22, 'full', false );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', $got[0], '2.3 Synced: img[0] rewritten' );
$t->assertEqual( 800, $got[1], '2.3b Width preserved' );
$t->assertEqual( 600, $got[2], '2.3c Height preserved' );
$t->assertEqual( false, $got[3], '2.3d is_intermediate preserved' );

reset_url_state();
mark_synced( 24 );
$got = make_rewriter()->rewrite_image_src( [], 24, 'thumbnail', false );
$t->assertEqual( [], $got, '2.4 Empty array: returned unchanged (falsy guard)' );

// =============================================================================
// 3. rewrite_srcset()
// =============================================================================

$t->section( '3. rewrite_srcset()' );

$dummy_meta = [];

reset_url_state();
$sources = [
    300 => [ 'url' => LOCAL_BASE . '/2024/08/photo-300x200.jpg', 'descriptor' => 'w', 'value' => 300 ],
    600 => [ 'url' => LOCAL_BASE . '/2024/08/photo-600x400.jpg', 'descriptor' => 'w', 'value' => 600 ],
];
$got = make_rewriter()->rewrite_srcset( $sources, [600,400], '', $dummy_meta, 30 );
$t->assertEqual( $sources, $got, '3.1 Not synced: sources unchanged' );

reset_url_state();
mark_synced( 31 );
$sources = [
    300  => [ 'url' => LOCAL_BASE . '/2024/08/photo-300x200.jpg', 'descriptor' => 'w', 'value' => 300 ],
    1200 => [ 'url' => LOCAL_BASE . '/2024/08/photo.jpg', 'descriptor' => 'w', 'value' => 1200 ],
];
$got = make_rewriter()->rewrite_srcset( $sources, [1200,800], '', $dummy_meta, 31 );
$t->assertEqual( CDN_BASE . '/2024/08/photo-300x200.jpg', $got[300]['url'], '3.2 Synced: 300w rewritten' );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', $got[1200]['url'], '3.2b Synced: 1200w rewritten' );

reset_url_state();
mark_synced( 32 );
$sources = [ 300 => [ 'descriptor' => 'w', 'value' => 300 ] ];
$got = make_rewriter()->rewrite_srcset( $sources, [], '', $dummy_meta, 32 );
$t->assert( ! isset( $got[300]['url'] ), '3.3 Source without url key: no url added' );

reset_url_state();
mark_synced( 33 );
$got = make_rewriter()->rewrite_srcset( [], [], '', $dummy_meta, 33 );
$t->assertEqual( [], $got, '3.4 Empty sources: returns []' );

// =============================================================================
// 4. rewrite_content()
// =============================================================================

$t->section( '4. rewrite_content()' );

reset_url_state();
$c = '<p>Hello world, no images here.</p>';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.1 No local URLs: unchanged' );

reset_url_state();
$url = attach( 40, '2024/08/photo.jpg' );
$c   = '<img src="' . $url . '">';
$t->assertEqual( '<img src="' . CDN_BASE . '/2024/08/photo.jpg">', make_rewriter()->rewrite_content( $c ), '4.2 Synced image rewritten' );

reset_url_state();
$url = attach( 41, '2024/08/pending.jpg', false );
$c   = '<img src="' . $url . '">';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.3 Non-synced image unchanged' );

reset_url_state();
$synced_url   = attach( 42, '2024/08/synced.jpg', true );
$unsynced_url = attach( 43, '2024/08/pending.jpg', false );
$c = '<img src="' . $synced_url . '"><img src="' . $unsynced_url . '">';
$expected = '<img src="' . CDN_BASE . '/2024/08/synced.jpg"><img src="' . $unsynced_url . '">';
$t->assertEqual( $expected, make_rewriter()->rewrite_content( $c ), '4.4 Mixed: only synced rewritten' );

reset_url_state();
$url = attach( 44, '2024/08/hero.jpg' );
$c   = '<img src="' . $url . '"><img src="' . $url . '">';
$cdn_url = CDN_BASE . '/2024/08/hero.jpg';
$expected = '<img src="' . $cdn_url . '"><img src="' . $cdn_url . '">';
$t->assertEqual( $expected, make_rewriter()->rewrite_content( $c ), '4.5 Duplicate synced URL: both rewritten' );

reset_url_state();
$url = attach( 45, '2025/01/document.pdf' );
$c   = '<a href="' . $url . '">Download</a>';
$t->assertEqual( '<a href="' . CDN_BASE . '/2025/01/document.pdf">Download</a>', make_rewriter()->rewrite_content( $c ), '4.6 PDF link rewritten' );

reset_url_state();
$url = attach( 46, '2024/08/photo.jpg' );
$c   = '<img src="' . $url . '?v=2">';
$t->assertEqual( '<img src="' . CDN_BASE . '/2024/08/photo.jpg?v=2">', make_rewriter()->rewrite_content( $c ), '4.7 Query string preserved' );

reset_url_state();
$t->assertEqual( '', make_rewriter()->rewrite_content( '' ), '4.8 Empty content: returns empty' );

reset_url_state();
mark_synced( 50 );
$s = new Settings();
$s->set_custom_domain( '' );
$c = '<img src="' . LOCAL_BASE . '/2024/08/photo.jpg">';
$t->assertEqual( $c, ( new UrlRewriter( $s ) )->rewrite_content( $c ), '4.9 No CDN domain: unchanged' );

reset_url_state();
$c = '<img src="' . LOCAL_BASE . '/2024/08/unknown.jpg">';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.10 Unknown attachment (id=0): unchanged' );

// XSS attempt in URL path — should not be rewritten
reset_url_state();
$c = '<img src="' . LOCAL_BASE . '/<script>alert(1)</script>.jpg">';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.11 XSS in path: regex does not match angle brackets' );

// =============================================================================
// 5. rewrite_html_blob()
// =============================================================================

$t->section( '5. rewrite_html_blob()' );

reset_url_state();
$url  = attach( 60, '2024/08/product.jpg' );
$html = '<figure><img src="' . $url . '" class="wp-post-image"></figure>';
$exp  = '<figure><img src="' . CDN_BASE . '/2024/08/product.jpg" class="wp-post-image"></figure>';
$t->assertEqual( $exp, make_rewriter()->rewrite_html_blob( $html ), '5.1 WC gallery: synced rewritten' );

reset_url_state();
$url  = attach( 61, '2024/08/product.jpg', false );
$html = '<figure><img src="' . $url . '"></figure>';
$t->assertEqual( $html, make_rewriter()->rewrite_html_blob( $html ), '5.2 WC gallery: non-synced unchanged' );

// =============================================================================
// 6. rewrite_rest_response()
// =============================================================================

$t->section( '6. rewrite_rest_response()' );

reset_url_state();
$url = attach( 70, '2024/08/product.jpg' );
$response = new \WP_REST_Response( [
    'images' => [
        [ 'id' => 70, 'src' => $url, 'name' => 'Product' ],
    ],
] );
$got = make_rewriter()->rewrite_rest_response( $response );
$data = $got->get_data();
$t->assertEqual( CDN_BASE . '/2024/08/product.jpg', $data['images'][0]['src'], '6.1 REST: synced image src rewritten' );

reset_url_state();
$url = attach( 71, '2024/08/product.jpg', false );
$response = new \WP_REST_Response( [
    'images' => [
        [ 'id' => 71, 'src' => $url, 'name' => 'Product' ],
    ],
] );
$got = make_rewriter()->rewrite_rest_response( $response );
$data = $got->get_data();
$t->assertEqual( $url, $data['images'][0]['src'], '6.2 REST: non-synced unchanged' );

// =============================================================================
// 7. register_hooks() — conditional registration
// =============================================================================

$t->section( '7. register_hooks() conditional registration' );

reset_url_state();
$s = new Settings();
$s->set_serve_from_r2( true );
$s->set_custom_domain( 'cdn.example.com' );
$rw = new UrlRewriter( $s );
$rw->register_hooks();
$t->assert( ! empty( $GLOBALS['__wp_hooks']['wp_get_attachment_url'] ?? [] ), '7.1 Hooks registered when enabled' );

reset_url_state();
$s = new Settings();
$s->set_serve_from_r2( false );
$rw = new UrlRewriter( $s );
$rw->register_hooks();
$t->assert( empty( $GLOBALS['__wp_hooks']['wp_get_attachment_url'] ?? [] ), '7.2 Hooks NOT registered when serve_from_r2=false' );

reset_url_state();
$s = new Settings();
$s->set_serve_from_r2( true );
$s->set_custom_domain( '' );
$rw = new UrlRewriter( $s );
$rw->register_hooks();
$t->assert( empty( $GLOBALS['__wp_hooks']['wp_get_attachment_url'] ?? [] ), '7.3 Hooks NOT registered when domain empty' );

// =============================================================================
// 8. Performance — sync_cache avoids repeated DB queries
// =============================================================================

$t->section( '8. Performance — sync_cache reuse' );

reset_url_state();
mark_synced( 80 );
$rw = make_rewriter();

// First call: cache miss → reads DB
$got1 = $rw->rewrite_url( LOCAL_BASE . '/2024/08/img.jpg', 80 );
$t->assertEqual( CDN_BASE . '/2024/08/img.jpg', $got1, '8.1 First call: rewritten' );

// Unset the meta (simulate); cached value should still say synced
$GLOBALS['__wp_postmeta'][80] = [];
$got2 = $rw->rewrite_url( LOCAL_BASE . '/2024/08/img2.jpg', 80 );
$t->assertEqual( CDN_BASE . '/2024/08/img2.jpg', $got2, '8.2 Second call uses cache (still rewritten despite meta gone)' );

// flush_url_cache resets the sync_cache too
$rw->flush_url_cache();
$got3 = $rw->rewrite_url( LOCAL_BASE . '/2024/08/img3.jpg', 80 );
$t->assertEqual( LOCAL_BASE . '/2024/08/img3.jpg', $got3, '8.3 After flush: meta re-read, not synced' );

// =============================================================================

exit( $t->summary() );

}
