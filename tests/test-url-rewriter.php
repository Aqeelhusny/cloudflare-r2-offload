<?php
/**
 * Comprehensive tests for UrlRewriter.
 *
 * Covers every public method and every guard condition:
 *   rewrite_url, rewrite_image_src, rewrite_srcset,
 *   rewrite_content, rewrite_html_blob,
 *   rewrite_rest_response, flush_url_cache, register_hooks.
 *
 * Run: php cloudflare-r2-offload/tests/test-url-rewriter.php
 */

// =============================================================================
// Global namespace — WP stubs + extra stubs needed by UrlRewriter
// =============================================================================
namespace {

    require_once __DIR__ . '/wp-stubs.php';

    $GLOBALS['__wp_url_to_id']       = []; // url  => attachment_id
    $GLOBALS['__wp_url_to_id_calls'] = []; // every URL passed to attachment_url_to_postid

    function untrailingslashit( string $string ): string {
        return rtrim( $string, '/\\' );
    }

    function attachment_url_to_postid( string $url ): int {
        $GLOBALS['__wp_url_to_id_calls'][] = $url;
        return $GLOBALS['__wp_url_to_id'][ $url ] ?? 0;
    }

    if ( ! class_exists( 'WP_REST_Response' ) ) {
        class WP_REST_Response {
            private array $data;
            public function __construct( array $data = [] ) { $this->data = $data; }
            public function get_data(): array { return $this->data; }
            public function set_data( array $data ): void { $this->data = $data; }
        }
    }
}

// =============================================================================
// R2Offload namespace — minimal Settings stub for UrlRewriter
// =============================================================================
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

// =============================================================================
// Tests — global namespace
// =============================================================================
namespace {

use R2Offload\UrlRewriter;
use R2Offload\Settings;

// -----------------------------------------------------------------------------
// Test harness
// -----------------------------------------------------------------------------

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

    public function section( string $title ): void {
        echo "\n" . str_repeat( '-', 60 ) . "\n{$title}\n" . str_repeat( '-', 60 ) . "\n";
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

// -----------------------------------------------------------------------------
// Constants and helpers
// -----------------------------------------------------------------------------

const LOCAL_BASE = 'http://example.com/wp-content/uploads';
const CDN_BASE   = 'https://cdn.example.com';

function reset_url_state(): void {
    $GLOBALS['__wp_postmeta']        = [];
    $GLOBALS['__wp_url_to_id']       = [];
    $GLOBALS['__wp_url_to_id_calls'] = [];
    $GLOBALS['__wp_hooks']           = [];
}

function make_rewriter( ?Settings $s = null ): UrlRewriter {
    return new UrlRewriter( $s ?? new Settings() );
}

function mark_synced( int $id ): void {
    update_post_meta( $id, '_r2_offload_synced', '1' );
}

function register_url( string $url, int $id ): void {
    $GLOBALS['__wp_url_to_id'][ $url ] = $id;
}

/**
 * Register a local upload URL for an attachment and optionally mark it synced.
 * Returns the full local URL.
 */
function attach( int $id, string $path, bool $synced = true ): string {
    $url = LOCAL_BASE . '/' . ltrim( $path, '/' );
    register_url( $url, $id );
    if ( $synced ) mark_synced( $id );
    return $url;
}

$t = new TestRunner();

// =============================================================================
// 1. rewrite_url()
// =============================================================================

$t->section( '1. rewrite_url()' );

// 1.1 Synced → local URL replaced with CDN URL
reset_url_state();
mark_synced( 10 );
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 10 );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', $got, '1.1 Synced: URL rewritten to CDN' );

// 1.2 Not synced → URL returned unchanged
reset_url_state();
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 11 );
$t->assertEqual( LOCAL_BASE . '/2024/08/photo.jpg', $got, '1.2 Not synced: URL unchanged' );

// 1.3 Synced, year/month subdir and filename preserved exactly
reset_url_state();
mark_synced( 12 );
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2025/03/banner-1920x600.jpg', 12 );
$t->assertEqual( CDN_BASE . '/2025/03/banner-1920x600.jpg', $got, '1.3 Synced: full path preserved' );

// 1.4 Synced thumbnail URL → rewritten
reset_url_state();
mark_synced( 13 );
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo-150x150.jpg', 13 );
$t->assertEqual( CDN_BASE . '/2024/08/photo-150x150.jpg', $got, '1.4 Synced thumbnail: rewritten' );

// 1.5 Synced but URL is external (no local base) → str_replace is a no-op
reset_url_state();
mark_synced( 14 );
$got = make_rewriter()->rewrite_url( 'https://external.com/image.jpg', 14 );
$t->assertEqual( 'https://external.com/image.jpg', $got, '1.5 Synced but external URL: unchanged' );

// 1.6 attachment_id = 0 → treated as not synced
reset_url_state();
$got = make_rewriter()->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 0 );
$t->assertEqual( LOCAL_BASE . '/2024/08/photo.jpg', $got, '1.6 attachment_id=0: URL unchanged' );

// 1.7 HTTP-scheme CDN (url_scheme = http)
reset_url_state();
mark_synced( 15 );
$s = new Settings();
$s->set_url_scheme( 'http' );
$got = ( new UrlRewriter( $s ) )->rewrite_url( LOCAL_BASE . '/2024/08/photo.jpg', 15 );
$t->assertEqual( 'http://cdn.example.com/2024/08/photo.jpg', $got, '1.7 HTTP-scheme CDN: rewritten correctly' );

// =============================================================================
// 2. rewrite_image_src()
// =============================================================================

$t->section( '2. rewrite_image_src()' );

// 2.1 false input → returns false
reset_url_state();
$got = make_rewriter()->rewrite_image_src( false, 20, 'thumbnail', false );
$t->assertEqual( false, $got, '2.1 false input: returns false unchanged' );

// 2.2 Not synced → array returned unchanged
reset_url_state();
$img = [ LOCAL_BASE . '/2024/08/photo.jpg', 800, 600, false ];
$got = make_rewriter()->rewrite_image_src( $img, 21, 'full', false );
$t->assertEqual( $img, $got, '2.2 Not synced: image array unchanged' );

// 2.3 Synced → index 0 rewritten, width/height/is_intermediate unchanged
reset_url_state();
mark_synced( 22 );
$img = [ LOCAL_BASE . '/2024/08/photo.jpg', 800, 600, false ];
$got = make_rewriter()->rewrite_image_src( $img, 22, 'full', false );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', $got[0], '2.3 Synced: img[0] rewritten' );
$t->assertEqual( 800, $got[1], '2.3 Synced: width unchanged' );
$t->assertEqual( 600, $got[2], '2.3 Synced: height unchanged' );
$t->assertEqual( false, $got[3], '2.3 Synced: is_intermediate unchanged' );

// 2.4 Synced thumbnail size URL → rewritten
reset_url_state();
mark_synced( 23 );
$img = [ LOCAL_BASE . '/2024/08/photo-300x300.jpg', 300, 300, true ];
$got = make_rewriter()->rewrite_image_src( $img, 23, 'medium', false );
$t->assertEqual( CDN_BASE . '/2024/08/photo-300x300.jpg', $got[0], '2.4 Synced thumbnail: img[0] rewritten' );

// 2.5 Empty array (falsy) → returned as-is via falsy guard
reset_url_state();
mark_synced( 24 );
$got = make_rewriter()->rewrite_image_src( [], 24, 'thumbnail', false );
$t->assertEqual( [], $got, '2.5 Empty array: returned unchanged (falsy guard)' );

// 2.6 Synced but URL is external → str_replace no-op
reset_url_state();
mark_synced( 25 );
$img = [ 'https://other.com/photo.jpg', 400, 300, false ];
$got = make_rewriter()->rewrite_image_src( $img, 25, 'full', false );
$t->assertEqual( 'https://other.com/photo.jpg', $got[0], '2.6 Synced external URL: img[0] unchanged' );

// =============================================================================
// 3. rewrite_srcset()
// =============================================================================

$t->section( '3. rewrite_srcset()' );

$dummy_meta = [];

// 3.1 Not synced → sources returned unchanged
reset_url_state();
$sources = [
    300  => [ 'url' => LOCAL_BASE . '/2024/08/photo-300x200.jpg', 'descriptor' => 'w', 'value' => 300 ],
    600  => [ 'url' => LOCAL_BASE . '/2024/08/photo-600x400.jpg', 'descriptor' => 'w', 'value' => 600 ],
];
$got = make_rewriter()->rewrite_srcset( $sources, [600,400], LOCAL_BASE . '/2024/08/photo.jpg', $dummy_meta, 30 );
$t->assertEqual( $sources, $got, '3.1 Not synced: sources unchanged' );

// 3.2 Synced → all source URLs rewritten
reset_url_state();
mark_synced( 31 );
$sources = [
    300  => [ 'url' => LOCAL_BASE . '/2024/08/photo-300x200.jpg',  'descriptor' => 'w', 'value' => 300 ],
    600  => [ 'url' => LOCAL_BASE . '/2024/08/photo-600x400.jpg',  'descriptor' => 'w', 'value' => 600 ],
    1200 => [ 'url' => LOCAL_BASE . '/2024/08/photo.jpg',           'descriptor' => 'w', 'value' => 1200 ],
];
$got = make_rewriter()->rewrite_srcset( $sources, [1200,800], LOCAL_BASE . '/2024/08/photo.jpg', $dummy_meta, 31 );
$t->assertEqual( CDN_BASE . '/2024/08/photo-300x200.jpg', $got[300]['url'],  '3.2 Synced: 300w URL rewritten' );
$t->assertEqual( CDN_BASE . '/2024/08/photo-600x400.jpg', $got[600]['url'],  '3.2 Synced: 600w URL rewritten' );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg',          $got[1200]['url'], '3.2 Synced: 1200w URL rewritten' );

// 3.3 Synced, source without 'url' key → no error, url not added
reset_url_state();
mark_synced( 32 );
$sources = [
    300 => [ 'descriptor' => 'w', 'value' => 300 ],
    600 => [ 'url' => LOCAL_BASE . '/2024/08/photo-600x400.jpg', 'descriptor' => 'w', 'value' => 600 ],
];
$got = make_rewriter()->rewrite_srcset( $sources, [600,400], '', $dummy_meta, 32 );
$t->assert( ! isset( $got[300]['url'] ), '3.3 Source without url key: no url added' );
$t->assertEqual( CDN_BASE . '/2024/08/photo-600x400.jpg', $got[600]['url'], '3.3 Source with url: rewritten' );

// 3.4 Synced, empty sources → returns empty array
reset_url_state();
mark_synced( 33 );
$got = make_rewriter()->rewrite_srcset( [], [], '', $dummy_meta, 33 );
$t->assertEqual( [], $got, '3.4 Empty sources: returns []' );

// 3.5 Synced, URL not matching local base → str_replace no-op
reset_url_state();
mark_synced( 34 );
$sources = [ 600 => [ 'url' => 'https://other.com/photo.jpg', 'descriptor' => 'w', 'value' => 600 ] ];
$got = make_rewriter()->rewrite_srcset( $sources, [600,400], '', $dummy_meta, 34 );
$t->assertEqual( 'https://other.com/photo.jpg', $got[600]['url'], '3.5 Synced external URL in srcset: unchanged' );

// =============================================================================
// 4. rewrite_content()
// =============================================================================

$t->section( '4. rewrite_content()' );

// 4.1 Content with no local URLs → unchanged
reset_url_state();
$c = '<p>Hello world, no images here.</p>';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.1 No local URLs: content unchanged' );

// 4.2 One synced img → rewritten
reset_url_state();
$url = attach( 40, '2024/08/photo.jpg' );
$c   = '<img src="' . $url . '">';
$t->assertEqual( '<img src="' . CDN_BASE . '/2024/08/photo.jpg">', make_rewriter()->rewrite_content( $c ), '4.2 Synced image: URL rewritten' );

// 4.3 One non-synced img → unchanged
reset_url_state();
$url = attach( 41, '2024/08/pending.jpg', false );
$c   = '<img src="' . $url . '">';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.3 Non-synced image: URL unchanged' );

// 4.4 Mixed: synced + non-synced on same page
reset_url_state();
$synced_url   = attach( 42, '2024/08/synced.jpg', true );
$unsynced_url = attach( 43, '2024/08/pending.jpg', false );
$c = '<img src="' . $synced_url . '"><img src="' . $unsynced_url . '">';
$expected = '<img src="' . CDN_BASE . '/2024/08/synced.jpg"><img src="' . $unsynced_url . '">';
$t->assertEqual( $expected, make_rewriter()->rewrite_content( $c ), '4.4 Mixed: only synced URL rewritten' );

// 4.5 Same synced URL appears twice → both rewritten
reset_url_state();
$url      = attach( 44, '2024/08/hero.jpg' );
$cdn_url  = CDN_BASE . '/2024/08/hero.jpg';
$c        = '<img src="' . $url . '"><img src="' . $url . '">';
$expected = '<img src="' . $cdn_url . '"><img src="' . $cdn_url . '">';
$t->assertEqual( $expected, make_rewriter()->rewrite_content( $c ), '4.5 Duplicate synced URL: both rewritten' );

// 4.6 URL in href (download link) → rewritten if synced
reset_url_state();
$url = attach( 45, '2025/01/document.pdf' );
$c   = '<a href="' . $url . '">Download</a>';
$t->assertEqual( '<a href="' . CDN_BASE . '/2025/01/document.pdf">Download</a>', make_rewriter()->rewrite_content( $c ), '4.6 Synced URL in href: rewritten' );

// 4.7 URL with query string — regex stops at '?', query suffix preserved
reset_url_state();
$url = attach( 46, '2024/08/photo.jpg' );
$c   = '<img src="' . $url . '?v=2">';
$t->assertEqual( '<img src="' . CDN_BASE . '/2024/08/photo.jpg?v=2">', make_rewriter()->rewrite_content( $c ), '4.7 URL with query string: path rewritten, ?query preserved' );

// 4.8 URL with fragment — regex stops at '#', fragment preserved
reset_url_state();
$url = attach( 47, '2024/08/photo.jpg' );
$c   = '<img src="' . $url . '#section">';
$t->assertEqual( '<img src="' . CDN_BASE . '/2024/08/photo.jpg#section">', make_rewriter()->rewrite_content( $c ), '4.8 URL with fragment: path rewritten, #fragment preserved' );

// 4.9 URL in inline CSS url() with single quotes
reset_url_state();
$url = attach( 48, '2024/08/bg.jpg' );
$c   = "style=\"background:url('" . $url . "')\"";
$t->assertEqual( "style=\"background:url('" . CDN_BASE . "/2024/08/bg.jpg')\"", make_rewriter()->rewrite_content( $c ), '4.9 URL in CSS url(): rewritten' );

// 4.10 URL at end of string with no terminator
reset_url_state();
$url = attach( 49, '2024/08/photo.jpg' );
$t->assertEqual( CDN_BASE . '/2024/08/photo.jpg', make_rewriter()->rewrite_content( $url ), '4.10 URL at end of string: rewritten' );

// 4.11 Empty content → returns empty string
reset_url_state();
$t->assertEqual( '', make_rewriter()->rewrite_content( '' ), '4.11 Empty content: returns empty string' );

// 4.12 No CDN domain configured → content unchanged (cdn_base is empty string)
reset_url_state();
mark_synced( 50 );
$s = new Settings();
$s->set_custom_domain( '' );
$c = '<img src="' . LOCAL_BASE . '/2024/08/photo.jpg">';
$t->assertEqual( $c, ( new UrlRewriter( $s ) )->rewrite_content( $c ), '4.12 No CDN domain: content unchanged' );

// 4.13 Three images from different year/month folders — each checked independently
reset_url_state();
$url_a = attach( 51, '2023/01/old.jpg', true );
$url_b = attach( 52, '2024/06/mid.jpg', false );
$url_c = attach( 53, '2025/11/new.jpg', true );
$rw    = make_rewriter();
$c     = '<img src="' . $url_a . '"> <img src="' . $url_b . '"> <img src="' . $url_c . '">';
$expected = '<img src="' . CDN_BASE . '/2023/01/old.jpg"> <img src="' . $url_b . '"> <img src="' . CDN_BASE . '/2025/11/new.jpg">';
$t->assertEqual( $expected, $rw->rewrite_content( $c ), '4.13 Three images across years: synced rewritten, non-synced intact' );

// 4.14 URL surrounded by spaces — correct path boundary
reset_url_state();
$url = attach( 54, '2024/08/photo.jpg' );
$c   = 'See ' . $url . ' for details';
$t->assertEqual( 'See ' . CDN_BASE . '/2024/08/photo.jpg for details', make_rewriter()->rewrite_content( $c ), '4.14 URL in text: correct space boundary' );

// 4.15 Unknown attachment (attachment_url_to_postid returns 0) → not rewritten
reset_url_state();
$c = '<img src="' . LOCAL_BASE . '/2024/08/unknown.jpg">';
$t->assertEqual( $c, make_rewriter()->rewrite_content( $c ), '4.15 Unknown attachment (id=0): URL not rewritten' );

// 4.16 WooCommerce srcset attribute — all synced sizes rewritten
reset_url_state();
$url_sm = attach( 55, '2024/08/product-300x300.jpg', true );
$url_md = attach( 56, '2024/08/product-600x600.jpg', true );
$url_lg = attach( 57, '2024/08/product.jpg', true );
$rw = make_rewriter();
$c  = '<img srcset="' . $url_sm . ' 300w, ' . $url_md . ' 600w, ' . $url_lg . ' 1200w">';
$expected = '<img srcset="' . CDN_BASE . '/2024/08/product-300x300.jpg 300w, ' . CDN_BASE . '/2024/08/product-600x600.jpg 600w, ' . CDN_BASE . '/2024/08/product.jpg 1200w">';
$t->assertEqual( $expected, $rw->rewrite_content( $c ), '4.16 srcset attribute: all synced sizes rewritten' );

// =============================================================================
// 5. rewrite_html_blob()
// =============================================================================

$t->section( '5. rewrite_html_blob()' );

// 5.1 Synced img in WC gallery HTML → rewritten
reset_url_state();
$url  = attach( 60, '2024/08/product.jpg' );
$html = '<figure><img src="' . $url . '" class="wp-post-image"></figure>';
$exp  = '<figure><img src="' . CDN_BASE . '/2024/08/product.jpg" class="wp-post-image"></figure>';
$t->assertEqual( $exp, make_rewriter()->rewrite_html_blob( $html ), '5.1 WC gallery HTML: synced image rewritten' );

// 5.2 Non-synced img → unchanged
reset_url_state();
$url  = attach( 61, '2024/08/product.jpg', false );
$html = '<figure><img src="' . $url . '"></figure>';
$t->assertEqual( $html, make_rewriter()->rewrite_html_blob( $html ), '5.2 WC gallery HTML: non-synced image unchanged' );

// 5.3 Mixed HTML blob — only synced images rewritten
reset_url_state();
$url_s = attach( 62, '2024/08/main.jpg', true );
$url_n = attach( 63, '2024/08/thumb.jpg', false );
$html  = '<img src="' . $url_s . '"><img src="' . $url_n . '">';
$exp   = '<img src="' . CDN_BASE . '/2024/08/main.jpg"><img src="' . $url_n . '">';
$t->assertEqual( $exp, make_rewriter()->rewrite_html_blob( $html ), '5.3 Mixed HTML blob: only synced rewritten' );

// 5.4 Full WC gallery thumbnail blob with both href and src
reset_url_state();
$url     = attach( 64, '2025/02/wc-product-300x300.jpg' );
$cdn_url = CDN_BASE . '/2025/02/wc-product-300x300.jpg';
$html    = '<div class="woocommerce-product-gallery__image"><a href="' . $url . '"><img src="' . $url . '" /></a></div>';
$exp     = '<div class="woocommerce-product-gallery__image"><a href="' . $cdn_url . '"><img src="' . $cdn_url . '" /></a></div>';
$t->assertEqual( $exp, make_rewriter()->rewrite_html_blob( $html ), '5.4 WC gallery thumbnail blob: href and src both rewritten' );

// =============================================================================
// 6. rewrite_rest_response()
// =============================================================================

$t->section( '6. rewrite_rest_response()' );

// 6.1 Non-WP_REST_Response → returned as-is
reset_url_state();
$rw = make_rewriter();
$t->assertEqual( 'raw-string', $rw->rewrite_rest_response( 'raw-string' ), '6.1 String input: returned as-is' );
$t->assertEqual( null,         $rw->rewrite_rest_response( null ),         '6.1b null input: returned as-is' );

// 6.2 Response with no images key → data unchanged
reset_url_state();
$res = new WP_REST_Response( [ 'id' => 1, 'name' => 'Test Product' ] );
$got = make_rewriter()->rewrite_rest_response( $res );
$t->assertEqual( [ 'id' => 1, 'name' => 'Test Product' ], $got->get_data(), '6.2 No images key: data unchanged' );

// 6.3 Empty images array → unchanged
reset_url_state();
$res = new WP_REST_Response( [ 'images' => [] ] );
$got = make_rewriter()->rewrite_rest_response( $res );
$t->assertEqual( [], $got->get_data()['images'], '6.3 Empty images array: unchanged' );

// 6.4 Single synced product image → src and thumbnail rewritten
reset_url_state();
mark_synced( 70 );
$res = new WP_REST_Response( [
    'images' => [ [
        'id'        => 70,
        'src'       => LOCAL_BASE . '/2024/08/product.jpg',
        'thumbnail' => LOCAL_BASE . '/2024/08/product-150x150.jpg',
    ] ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$imgs = $got->get_data()['images'];
$t->assertEqual( CDN_BASE . '/2024/08/product.jpg',        $imgs[0]['src'],       '6.4 Synced product: src rewritten' );
$t->assertEqual( CDN_BASE . '/2024/08/product-150x150.jpg', $imgs[0]['thumbnail'], '6.4 Synced product: thumbnail rewritten' );

// 6.5 Single non-synced product image → unchanged
reset_url_state();
$res = new WP_REST_Response( [
    'images' => [ [ 'id' => 71, 'src' => LOCAL_BASE . '/2024/08/product.jpg' ] ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$imgs = $got->get_data()['images'];
$t->assertEqual( LOCAL_BASE . '/2024/08/product.jpg', $imgs[0]['src'], '6.5 Non-synced product image: src unchanged' );

// 6.6 Mixed images array — some synced, some not
reset_url_state();
mark_synced( 72 );
// 73 is NOT synced
$res = new WP_REST_Response( [
    'images' => [
        [ 'id' => 72, 'src' => LOCAL_BASE . '/2024/08/a.jpg' ],
        [ 'id' => 73, 'src' => LOCAL_BASE . '/2024/08/b.jpg' ],
    ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$imgs = $got->get_data()['images'];
$t->assertEqual( CDN_BASE   . '/2024/08/a.jpg', $imgs[0]['src'], '6.6 Mixed: synced image rewritten' );
$t->assertEqual( LOCAL_BASE . '/2024/08/b.jpg', $imgs[1]['src'], '6.6 Mixed: non-synced image unchanged' );

// 6.7 All URL keys rewritten for a synced image: src, thumbnail, medium, medium_large, large, full
reset_url_state();
mark_synced( 74 );
$img = [
    'id'           => 74,
    'src'          => LOCAL_BASE . '/2024/08/img.jpg',
    'thumbnail'    => LOCAL_BASE . '/2024/08/img-150x150.jpg',
    'medium'       => LOCAL_BASE . '/2024/08/img-300x300.jpg',
    'medium_large' => LOCAL_BASE . '/2024/08/img-768x768.jpg',
    'large'        => LOCAL_BASE . '/2024/08/img-1024x1024.jpg',
    'full'         => LOCAL_BASE . '/2024/08/img.jpg',
];
$res = new WP_REST_Response( [ 'images' => [ $img ] ] );
$got = make_rewriter()->rewrite_rest_response( $res );
$out = $got->get_data()['images'][0];
foreach ( [ 'src', 'thumbnail', 'medium', 'medium_large', 'large', 'full' ] as $key ) {
    $t->assert( str_starts_with( $out[ $key ], CDN_BASE ), "6.7 Synced image: {$key} rewritten to CDN" );
}

// 6.8 Image without 'id' key → not rewritten (id defaults to 0)
reset_url_state();
$res = new WP_REST_Response( [
    'images' => [ [ 'src' => LOCAL_BASE . '/2024/08/product.jpg' ] ], // no 'id'
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$imgs = $got->get_data()['images'];
$t->assertEqual( LOCAL_BASE . '/2024/08/product.jpg', $imgs[0]['src'], '6.8 Image without id: src unchanged' );

// 6.9 Variation 'image' object, synced → rewritten
reset_url_state();
mark_synced( 75 );
$res = new WP_REST_Response( [
    'image' => [ 'id' => 75, 'src' => LOCAL_BASE . '/2024/08/variation.jpg' ],
] );
$got = make_rewriter()->rewrite_rest_response( $res );
$t->assertEqual( CDN_BASE . '/2024/08/variation.jpg', $got->get_data()['image']['src'], '6.9 Synced variation: rewritten' );

// 6.10 Variation 'image' object, not synced → unchanged
reset_url_state();
$res = new WP_REST_Response( [
    'image' => [ 'id' => 76, 'src' => LOCAL_BASE . '/2024/08/variation.jpg' ],
] );
$got = make_rewriter()->rewrite_rest_response( $res );
$t->assertEqual( LOCAL_BASE . '/2024/08/variation.jpg', $got->get_data()['image']['src'], '6.10 Non-synced variation: unchanged' );

// 6.11 Variation 'image' without 'id' key → not rewritten
reset_url_state();
$res = new WP_REST_Response( [
    'image' => [ 'src' => LOCAL_BASE . '/2024/08/variation.jpg' ], // no 'id'
] );
$got = make_rewriter()->rewrite_rest_response( $res );
$t->assertEqual( LOCAL_BASE . '/2024/08/variation.jpg', $got->get_data()['image']['src'], '6.11 Variation without id: unchanged' );

// 6.12 Both images array and image key present → both handled independently
reset_url_state();
mark_synced( 77 );
mark_synced( 78 );
$res = new WP_REST_Response( [
    'images' => [ [ 'id' => 77, 'src' => LOCAL_BASE . '/2024/08/product.jpg' ] ],
    'image'  => [ 'id' => 78, 'src' => LOCAL_BASE . '/2024/08/variation.jpg' ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$data = $got->get_data();
$t->assertEqual( CDN_BASE . '/2024/08/product.jpg',   $data['images'][0]['src'], '6.12 Both present: images[0] rewritten' );
$t->assertEqual( CDN_BASE . '/2024/08/variation.jpg', $data['image']['src'],     '6.12 Both present: image rewritten' );

// 6.13 No CDN domain → response returned unchanged early
reset_url_state();
mark_synced( 79 );
$s = new Settings();
$s->set_custom_domain( '' );
$res = new WP_REST_Response( [
    'images' => [ [ 'id' => 79, 'src' => LOCAL_BASE . '/2024/08/product.jpg' ] ],
] );
$got = ( new UrlRewriter( $s ) )->rewrite_rest_response( $res );
$t->assertEqual( LOCAL_BASE . '/2024/08/product.jpg', $got->get_data()['images'][0]['src'], '6.13 No CDN domain: REST response unchanged' );

// 6.14 Image with no URL fields → no error, other fields intact
reset_url_state();
mark_synced( 80 );
$res = new WP_REST_Response( [
    'images' => [ [ 'id' => 80, 'alt' => 'Alt text only' ] ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$data = $got->get_data();
$t->assertEqual( 'Alt text only', $data['images'][0]['alt'], '6.14 No URL fields: alt text intact' );
$t->assert( ! isset( $data['images'][0]['src'] ), '6.14 No src key added when absent' );

// 6.15 Multiple products: each image checked independently
reset_url_state();
mark_synced( 81 );
// 82 NOT synced
mark_synced( 83 );
$res = new WP_REST_Response( [
    'images' => [
        [ 'id' => 81, 'src' => LOCAL_BASE . '/2024/01/img-a.jpg' ],
        [ 'id' => 82, 'src' => LOCAL_BASE . '/2024/02/img-b.jpg' ],
        [ 'id' => 83, 'src' => LOCAL_BASE . '/2024/03/img-c.jpg' ],
    ],
] );
$got  = make_rewriter()->rewrite_rest_response( $res );
$imgs = $got->get_data()['images'];
$t->assertEqual( CDN_BASE   . '/2024/01/img-a.jpg', $imgs[0]['src'], '6.15 Multi-product: img A (synced) rewritten' );
$t->assertEqual( LOCAL_BASE . '/2024/02/img-b.jpg', $imgs[1]['src'], '6.15 Multi-product: img B (not synced) unchanged' );
$t->assertEqual( CDN_BASE   . '/2024/03/img-c.jpg', $imgs[2]['src'], '6.15 Multi-product: img C (synced) rewritten' );

// =============================================================================
// 7. url_to_attachment_id() cache and flush_url_cache()
// =============================================================================

$t->section( '7. url_to_attachment_id() cache + flush_url_cache()' );

// 7.1 Same URL appears three times in content → attachment_url_to_postid called only once
reset_url_state();
$url = attach( 90, '2024/08/hero.jpg' );
$c   = '<img src="' . $url . '"><img src="' . $url . '"><img src="' . $url . '">';
make_rewriter()->rewrite_content( $c );
$calls = array_count_values( $GLOBALS['__wp_url_to_id_calls'] );
$t->assertEqual( 1, $calls[ $url ] ?? 0, '7.1 Duplicate URL: attachment_url_to_postid called exactly once (cache hit)' );

// 7.2 Two different URLs → each queried once
reset_url_state();
$url_a = attach( 91, '2024/08/a.jpg' );
$url_b = attach( 92, '2024/08/b.jpg' );
$rw    = make_rewriter();
$rw->rewrite_content( '<img src="' . $url_a . '"><img src="' . $url_b . '">' );
$calls = array_count_values( $GLOBALS['__wp_url_to_id_calls'] );
$t->assertEqual( 1, $calls[ $url_a ] ?? 0, '7.2 URL A: queried exactly once' );
$t->assertEqual( 1, $calls[ $url_b ] ?? 0, '7.2 URL B: queried exactly once' );

// 7.3 flush_url_cache() clears the cache — next call re-queries
reset_url_state();
$url  = attach( 93, '2024/08/hero.jpg' );
$rw   = make_rewriter();
$c    = '<img src="' . $url . '">';
$rw->rewrite_content( $c );
$before = count( $GLOBALS['__wp_url_to_id_calls'] );
$rw->flush_url_cache();
$rw->rewrite_content( $c );
$after = count( $GLOBALS['__wp_url_to_id_calls'] );
$t->assert( $after > $before, '7.3 After flush_url_cache: URL re-queried on next rewrite_content' );

// 7.4 URL returning 0 (unknown attachment) is cached — not re-queried on repeat
reset_url_state();
$unknown = LOCAL_BASE . '/2024/08/unknown.jpg';
$rw = make_rewriter();
$rw->rewrite_content( '<img src="' . $unknown . '"><img src="' . $unknown . '">' );
$calls = array_count_values( $GLOBALS['__wp_url_to_id_calls'] );
$t->assertEqual( 1, $calls[ $unknown ] ?? 0, '7.4 Unknown URL (id=0): queried once, 0 result cached' );

// 7.5 Cache is per-instance — two different rewriter instances have independent caches
reset_url_state();
$url  = attach( 94, '2024/08/photo.jpg' );
$c    = '<img src="' . $url . '">';
$rw1  = make_rewriter();
$rw2  = make_rewriter();
$rw1->rewrite_content( $c );
$rw2->rewrite_content( $c );
$calls = array_count_values( $GLOBALS['__wp_url_to_id_calls'] );
$t->assertEqual( 2, $calls[ $url ] ?? 0, '7.5 Two instances: each queries independently' );

// =============================================================================
// 8. register_hooks()
// =============================================================================

$t->section( '8. register_hooks()' );

// 8.1 serve_from_r2 = false → no hooks registered at all
reset_url_state();
$s = new Settings();
$s->set_serve_from_r2( false );
( new UrlRewriter( $s ) )->register_hooks();
$t->assert( empty( $GLOBALS['__wp_hooks'] ), '8.1 serve_from_r2=false: no hooks registered' );

// 8.2 serve_from_r2 = true but no custom domain → no hooks registered
reset_url_state();
$s = new Settings();
$s->set_serve_from_r2( true );
$s->set_custom_domain( '' );
( new UrlRewriter( $s ) )->register_hooks();
$t->assert( empty( $GLOBALS['__wp_hooks'] ), '8.2 serve_from_r2=true, no domain: no hooks registered' );

// 8.3 Both enabled → hooks are registered
reset_url_state();
( new UrlRewriter( new Settings() ) )->register_hooks();
$t->assert( ! empty( $GLOBALS['__wp_hooks'] ), '8.3 Both enabled: hooks registered' );

// 8.4 Every expected hook is present
reset_url_state();
( new UrlRewriter( new Settings() ) )->register_hooks();
$registered = array_keys( $GLOBALS['__wp_hooks'] );
foreach ( [
    'wp_get_attachment_url',
    'wp_get_attachment_image_src',
    'wp_calculate_image_srcset',
    'the_content',
    'woocommerce_single_product_image_thumbnail_html',
    'woocommerce_rest_prepare_product_object',
    'woocommerce_rest_prepare_product_variation_object',
    'switch_blog',
] as $hook ) {
    $t->assert( in_array( $hook, $registered, true ), "8.4 Hook registered: {$hook}" );
}

// =============================================================================
// Summary
// =============================================================================

exit( $t->summary() );

} // end global namespace block
