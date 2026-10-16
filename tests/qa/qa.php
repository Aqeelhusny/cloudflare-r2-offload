<?php
/**
 * QA driver — runs on the host against the Dockerised WP 7.1 + WC 11.1.1 + plugin.
 * Acts as a real user: cookie login + admin-ajax, REST (application password),
 * multipart uploads, WooCommerce REST, WP-CLI. Verifies against real R2 objects.
 *
 * Usage: php tests/qa/qa.php          (creds: QA_ENV or <plugin>/.env.r2-test)
 * Subset: QA_ONLY=DJ php tests/qa/qa.php   (A,B,C always run)
 */
error_reporting( E_ALL );
const SITE = 'http://localhost:8088';
$Q   = __DIR__;
$IMG = "$Q/img";
$env = parse_ini_file( getenv( 'QA_ENV' ) ?: dirname( __DIR__, 2 ) . '/.env.r2-test', false, INI_SCANNER_RAW );
$RUN = 'qa-' . gmdate( 'Ymd-His' );
$PFX = "{$RUN}/wp-content/uploads";
$CDN = 'cdn.qa-test.example';

// ---------------------------------------------------------------- helpers
$pass = 0; $fail = 0; $failures = [];
function ok( bool $c, string $name, $detail = '' ): bool {
    global $pass, $fail, $failures;
    if ( $c ) { $pass++; echo "  PASS  {$name}\n"; }
    else { $fail++; $failures[] = $name; echo "  FAIL  {$name}" . ( $detail !== '' ? '  → ' . ( is_string( $detail ) ? $detail : json_encode( $detail, JSON_UNESCAPED_SLASHES ) ) : '' ) . "\n"; }
    return $c;
}
function section( string $t ): void { echo "\n== {$t}\n"; }
/** Run argv without any shell (no cmd.exe / sh quoting issues). */
function run( array $argv ): string {
    $p = proc_open( $argv, [ 1 => [ 'pipe', 'w' ], 2 => [ 'redirect', 1 ] ], $pipes );
    $o = stream_get_contents( $pipes[1] );
    proc_close( $p );
    return trim( (string) $o );
}
function dc(): array { global $Q; return [ 'docker', 'compose', '-f', "{$Q}/compose.yml", 'exec', '-T', 'wp' ]; }
/** wp('plugin get x --field=version') — space-split; pass args containing spaces/quotes as extra params. */
function wp( string $args, string ...$extra ): string {
    return run( array_merge( dc(), [ 'php', '-d', 'memory_limit=1G', '/usr/local/bin/wp' ], preg_split( '/\s+/', trim( $args ) ), $extra ) );
}
function csh( string $script ): string { return run( array_merge( dc(), [ 'sh', '-c', $script ] ) ); }
function h( string $cmd, $arg = null ): array {
    $o  = $arg === null ? wp( "eval-file /tmp/qa-h.php {$cmd}" ) : wp( "eval-file /tmp/qa-h.php {$cmd}", json_encode( $arg, JSON_UNESCAPED_SLASHES ) );
    $r  = json_decode( substr( $o, strrpos( $o, "\n" ) === false ? 0 : strrpos( $o, "\n" ) + 1 ), true );
    if ( ! is_array( $r ) ) { $r = json_decode( $o, true ); }
    return is_array( $r ) ? $r : [ '_raw' => $o ];
}
function set( array $opts ): void { h( 'set', $opts ); }
function http( string $method, string $url, array $o = [] ): array {
    global $Q;
    $ch = curl_init( str_starts_with( $url, 'http' ) ? $url : SITE . $url );
    $opt = [ CURLOPT_RETURNTRANSFER => true, CURLOPT_CUSTOMREQUEST => $method, CURLOPT_TIMEOUT => 120, CURLOPT_HEADER => false, CURLOPT_FOLLOWLOCATION => true ];
    if ( ! empty( $o['auth'] ) )   { $opt[ CURLOPT_USERPWD ] = $o['auth']; }
    if ( ! empty( $o['cookie'] ) ) { $opt[ CURLOPT_COOKIEJAR ] = $opt[ CURLOPT_COOKIEFILE ] = "{$Q}/cookies-{$o['cookie']}.txt"; }
    if ( isset( $o['form'] ) )     { $opt[ CURLOPT_POSTFIELDS ] = $o['form']; }
    if ( isset( $o['json'] ) )     { $opt[ CURLOPT_POSTFIELDS ] = json_encode( $o['json'] ); $opt[ CURLOPT_HTTPHEADER ] = [ 'Content-Type: application/json' ]; }
    curl_setopt_array( $ch, $opt );
    $body = curl_exec( $ch );
    $code = curl_getinfo( $ch, CURLINFO_RESPONSE_CODE );
    return [ 'code' => $code, 'body' => (string) $body, 'json' => json_decode( (string) $body, true ) ];
}
function rest( string $method, string $path, array $o = [] ): array { global $AP; return http( $method, "/wp-json{$path}", $o + [ 'auth' => $AP ] ); }
function upload( string $file, array $extra = [] ): int {
    $r = rest( 'POST', '/wp/v2/media', [ 'form' => [ 'file' => new CURLFile( $file, mime_content_type( $file ), basename( $file ) ) ] + $extra ] );
    if ( empty( $r['json']['id'] ) ) { echo "        upload error: {$r['code']} " . substr( $r['body'], 0, 300 ) . "\n"; }
    return (int) ( $r['json']['id'] ?? 0 );
}
function ajax( string $action, array $data = [], string $who = 'admin' ): array {
    global $NONCE;
    static $last = [];
    // Plugin throttles each mutating action for ~3s (transient, whole-second expiry). The window
    // opens DURING the previous request, so space from when it FINISHED (cold sites are slow).
    if ( isset( $last[ $action ] ) && microtime( true ) - $last[ $action ] < 4.5 ) { usleep( (int) ( ( 4.5 - ( microtime( true ) - $last[ $action ] ) ) * 1e6 ) ); }
    $r = http( 'POST', '/wp-admin/admin-ajax.php', [ 'cookie' => $who, 'form' => [ 'action' => $action, 'nonce' => $data['_nonce'] ?? $NONCE ] + $data ] );
    $last[ $action ] = microtime( true );
    return $r;
}
function login( string $user, string $pw ): void {
    global $Q; @unlink( "{$Q}/cookies-{$user}.txt" );
    http( 'GET', '/wp-login.php', [ 'cookie' => $user ] );
    http( 'POST', '/wp-login.php', [ 'cookie' => $user, 'form' => [ 'log' => $user, 'pwd' => $pw, 'wp-submit' => 'Log In', 'testcookie' => 1 ] ] );
}
/** All files of an attachment: on R2 (and tracked), optional local expectation. */
function all_on_r2( array $s ): bool { foreach ( $s['files'] as $f ) { if ( $f['r2'] !== 'found' || ! $f['tracked'] ) return false; } return (bool) $s['files']; }
function none_local( array $s ): bool { foreach ( $s['files'] as $f ) { if ( $f['local'] ) return false; } return true; }
function all_local( array $s ): bool { foreach ( $s['files'] as $f ) { if ( ! $f['local'] ) return false; } return true; }
function brief( array $s ): array { return [ 'synced' => $s['synced'] ?? null, 'nkeys' => $s['nkeys'] ?? null, 'err' => $s['error'] ?? null, 'files' => $s['files'] ?? $s ]; }
function run_cron( string $hook ): string { return wp( "cron event run {$hook}" ); }

$created = [];
$ONLY    = (string) getenv( 'QA_ONLY' );           // e.g. QA_ONLY=DJ -> run A,B,C + D,J only
function want( string $x ): bool { global $ONLY; return $ONLY === '' || str_contains( $ONLY, $x ); }
$cdnbase = "https://{$CDN}/{$PFX}/";
csh( ': > wp-content/debug.log' );                // N1 must only judge THIS run
// Test-only mu-plugin: hands the CURRENT user their own r2_offload nonce (models a leaked nonce).
csh( 'mkdir -p wp-content/mu-plugins' );
run( [ 'docker', 'compose', '-f', "{$Q}/compose.yml", 'cp', "{$Q}/qa-nonce.php", 'wp:/var/www/html/wp-content/mu-plugins/qa-nonce.php' ] );

echo "Run: {$RUN}   bucket: {$env['R2_BUCKET']}   prefix: {$PFX}/\n";
echo 'Stack: WP ' . wp( 'core version' ) . ' | WC ' . wp( 'plugin get woocommerce --field=version' ) . ' | PHP ' . csh( 'php -r "echo PHP_VERSION;"' ) . ' | plugin ' . wp( 'plugin get cloudflare-r2-offload --field=version' ) . "\n";

try {
// =====================================================================
section( 'A. Install / activation / compatibility' );
$q = h( 'queue' );
ok( count( $q['tables'] ?? [] ) === 2, 'A1 activation created both queue tables', $q['tables'] ?? $q );
ok( wp( 'option get r2_offload_db_version' ) === '1.3.0', 'A2 DB version recorded' );
$hp = h( 'hpos' );
ok( ! empty( $hp['hpos_compatible'] ), 'A3 WooCommerce reports plugin HPOS-compatible', $hp );
ok( ! empty( $hp['blocks_compatible'] ), 'A4 WooCommerce reports plugin Cart/Checkout-Blocks-compatible', $hp );
$r = http( 'GET', '/' );
ok( $r['code'] === 200, 'A5 front end renders with plugin active (HTTP 200)', $r['code'] );

// =====================================================================
section( 'B. Settings via the real admin UI (cookie login + admin-ajax)' );
login( 'admin', 'admin' );
$page = http( 'GET', '/wp-admin/admin.php?page=r2-offload', [ 'cookie' => 'admin' ] );
ok( $page['code'] === 200, 'B1 settings page loads for admin', $page['code'] );
preg_match( '/var R2Offload = {[^;]*?"nonce":"([a-f0-9]+)"/', $page['body'], $m );
$NONCE = $m[1] ?? '';
ok( $NONCE !== '', 'B2 admin nonce localized on settings page' );

$r = ajax( 'r2_offload_save_credentials', [ 'r2_offload_account_id' => 'not-hex!', 'r2_offload_access_key_id' => 'x', 'r2_offload_secret_access_key' => 'y', 'r2_offload_bucket' => 'b' ] );
ok( ( $r['json']['success'] ?? null ) === false, 'B3 invalid (non-hex) account ID rejected', $r['json'] );

$r = ajax( 'r2_offload_save_credentials', [
    'r2_offload_account_id' => $env['R2_ACCOUNT_ID'], 'r2_offload_access_key_id' => $env['R2_ACCESS_KEY_ID'],
    'r2_offload_secret_access_key' => $env['R2_SECRET_ACCESS_KEY'], 'r2_offload_bucket' => $env['R2_BUCKET'],
] );
ok( ( $r['json']['success'] ?? null ) === true, 'B4 credentials saved via AJAX', $r['json'] );
$sec = h( 'secret', $env['R2_SECRET_ACCESS_KEY'] );
ok( ( $sec['stored_prefix'] ?? '' ) === 'r2enc:' && empty( $sec['stored_has_raw'] ), 'B5 secret stored encrypted (r2enc:), raw secret not in DB', $sec );
ok( ! empty( $sec['decrypts_ok'] ), 'B6 stored secret decrypts back correctly', $sec );
$page = http( 'GET', '/wp-admin/admin.php?page=r2-offload', [ 'cookie' => 'admin' ] );
ok( strpos( $page['body'], $env['R2_SECRET_ACCESS_KEY'] ) === false, 'B7 raw secret never rendered in settings HTML' );

$r = ajax( 'r2_offload_test_connection' );
ok( ( $r['json']['success'] ?? null ) === true, 'B8 Test Connection succeeds against real R2', $r['json']['data']['message'] ?? $r['json'] );

set( [ 'r2_offload_path_prefix' => $PFX, 'r2_offload_custom_domain' => $CDN, 'r2_offload_serve_from_r2' => 1,
       'r2_offload_delete_local' => 0, 'r2_offload_upload_on_save' => 1, 'r2_offload_background_offload' => 0 ] );

// Security
$r = http( 'POST', '/wp-admin/admin-ajax.php', [ 'form' => [ 'action' => 'r2_offload_save_credentials', 'nonce' => $NONCE, 'r2_offload_account_id' => 'abc', 'r2_offload_access_key_id' => 'x', 'r2_offload_secret_access_key' => 'y', 'r2_offload_bucket' => 'hijack-anon' ] ] );
ok( ( $r['json']['success'] ?? null ) !== true && wp( 'option get r2_offload_bucket' ) === $env['R2_BUCKET'], 'B9 anonymous save-credentials attempt refused and settings unchanged', "{$r['code']} " . substr( $r['body'], 0, 80 ) );
wp( 'user create sub sub@example.com --role=subscriber --user_pass=sub --quiet' );
login( 'sub', 'sub' );
$r = ajax( 'r2_offload_save_credentials', [ 'r2_offload_bucket' => 'hijack' ], 'sub' );
ok( ( $r['json']['success'] ?? null ) !== true && wp( 'option get r2_offload_bucket' ) === $env['R2_BUCKET'], 'B10 subscriber (with stolen admin nonce) cannot change credentials', "{$r['code']} " . substr( $r['body'], 0, 80 ) );
$sn = http( 'POST', '/wp-admin/admin-ajax.php', [ 'cookie' => 'sub', 'form' => [ 'action' => 'qa_nonce' ] ] )['json']['n'] ?? '';
$r  = ajax( 'r2_offload_save_credentials', [ '_nonce' => $sn, 'r2_offload_account_id' => 'abc', 'r2_offload_access_key_id' => 'x', 'r2_offload_secret_access_key' => 'y', 'r2_offload_bucket' => 'hijack-sub' ], 'sub' );
ok( $sn !== '' && ( $r['json']['success'] ?? null ) === false && wp( 'option get r2_offload_bucket' ) === $env['R2_BUCKET'], 'B10b subscriber WITH their own valid nonce is stopped by the capability check', [ 'nonce' => $sn !== '', 'resp' => $r['json'] ?? $r['body'] ] );
$r = http( 'GET', '/wp-admin/admin.php?page=r2-offload', [ 'cookie' => 'sub' ] );
ok( $r['code'] === 403 || stripos( $r['body'], 'not allowed' ) !== false, 'B11 subscriber cannot open plugin settings page', $r['code'] );

// =====================================================================
section( 'C. Uploads (server-side image processing)' );
$AP = trim( file_get_contents( "{$Q}/.ap" ) );
$id = upload( "{$IMG}/small.jpg" ); $created[] = $id;
$s  = h( 'state', $id );
ok( $s['synced'] === '1', 'C1 small JPEG upload synced inline', brief( $s ) );
ok( all_on_r2( $s ) && count( $s['files'] ) >= 7, 'C2 original + every sub-size (incl. WooCommerce sizes) exists on R2', brief( $s ) );
ok( in_array( 'woocommerce_thumbnail', $s['meta_sizes'], true ), 'C3 WooCommerce image sizes generated & included', $s['meta_sizes'] );
$SMALL = $id;

$id = upload( "{$IMG}/big.jpg" ); $created[] = $id;
$s  = h( 'state', $id );
ok( $s['synced'] === '1' && ! empty( $s['original'] ), 'C4 large JPEG → -scaled main file + original_image recorded', brief( $s ) );
ok( all_on_r2( $s ), 'C5 [fix] full-res original_image AND -scaled AND all sizes on R2', brief( $s ) );
$BIG = $id;

$id = upload( "{$IMG}/doc.pdf" ); $created[] = $id;
$s  = h( 'state', $id );
ok( $s['synced'] === '1' && all_on_r2( $s ), 'C6 PDF upload synced to R2', brief( $s ) );

set( [ 'r2_offload_excluded_mime_types' => [ 'image/gif' ] ] );
$id = upload( "{$IMG}/anim.gif" ); $created[] = $id;
$s  = h( 'state', $id );
ok( $s['synced'] === '' && $s['nkeys'] === 0, 'C7 excluded MIME type (GIF) not uploaded', brief( $s ) );
set( [ 'r2_offload_excluded_mime_types' => [] ] );

set( [ 'r2_offload_upload_on_save' => 0 ] );
$id = upload( "{$IMG}/cli1.jpg" ); $created[] = $id; $CLI1 = $id;
$s  = h( 'state', $id );
ok( $s['synced'] === '', 'C8 "upload on save" OFF → new upload stays local', brief( $s ) );
set( [ 'r2_offload_upload_on_save' => 1 ] );

if ( want( 'D' ) ) {
// =====================================================================
section( 'D. WP 7.1 client-side media processing (real REST create → sideload → finalize)' );
foreach ( [ 0, 1 ] as $del ) {
    set( [ 'r2_offload_delete_local' => $del ] );
    $label = $del ? 'with Delete-local ON' : 'Delete-local OFF';
    $id = upload( "{$IMG}/client.jpg", [ 'generate_sub_sizes' => 'false' ] ); $created[] = $id;
    $s  = h( 'state', $id );
    ok( $s['synced'] === '' && $s['nkeys'] === 0, "D1 [{$label}] 'create' pass deferred — not synced while sizes pending", brief( $s ) );
    ok( all_local( $s ), "D2 [{$label}] original still on disk before finalize", brief( $s ) );
    $subs = [];
    foreach ( [ [ 'client-scaled.jpg', 'scaled' ], [ 'client-150x150.jpg', 'thumbnail' ], [ 'client-300x200.jpg', 'medium' ], [ 'client-1024x683.jpg', 'large' ] ] as [ $f, $size ] ) {
        $r = rest( 'POST', "/wp/v2/media/{$id}/sideload", [ 'form' => [ 'file' => new CURLFile( "{$IMG}/{$f}", 'image/jpeg', $f ), 'image_size' => $size ] ] );
        if ( ! empty( $r['json']['image_size'] ) ) { $subs[] = $r['json']; } else { echo "        sideload {$size}: {$r['code']} " . substr( $r['body'], 0, 200 ) . "\n"; }
    }
    ok( count( $subs ) === 4, "D3 [{$label}] 4 client-made files sideloaded (scaled + 3 sizes)", count( $subs ) );
    $s = h( 'state', $id );
    ok( $s['synced'] === '', "D4 [{$label}] still not synced after sideloads (before finalize)", brief( $s ) );
    $r = rest( 'POST', "/wp/v2/media/{$id}/finalize", [ 'json' => [ 'sub_sizes' => $subs ] ] );
    ok( $r['code'] === 200, "D5 [{$label}] finalize accepted", "{$r['code']} " . substr( $r['body'], 0, 200 ) );
    $s = h( 'state', $id );
    ok( $s['synced'] === '1', "D6 [{$label}] synced on finalize ('update' pass)", brief( $s ) );
    ok( all_on_r2( $s ) && count( $s['files'] ) === 5, "D7 [{$label}] scaled + original + 3 sizes all on R2 & tracked", brief( $s ) );
    if ( $del ) {
        ok( none_local( $s ), "D8 [{$label}] local files removed only after everything is on R2", brief( $s ) );
    }
    $CLIENT[ $del ] = $id;
}
set( [ 'r2_offload_delete_local' => 0 ] );
// Animated GIF: client converts to video + poster; poster is a companion file outside 'sizes'.
$id = upload( "{$IMG}/anim.gif", [ 'generate_sub_sizes' => 'false' ] ); $created[] = $id;
$r  = rest( 'POST', "/wp/v2/media/{$id}/sideload", [ 'form' => [ 'file' => new CURLFile( "{$IMG}/client-300x200.jpg", 'image/jpeg', 'anim-poster.jpg' ), 'image_size' => 'animated_video_poster' ] ] );
$sub = ! empty( $r['json']['image_size'] ) ? [ $r['json'] ] : [];
ok( (bool) $sub, 'D9 animated GIF: poster sideloaded as animated_video_poster', "{$r['code']} " . substr( $r['body'], 0, 200 ) );
rest( 'POST', "/wp/v2/media/{$id}/finalize", [ 'json' => [ 'sub_sizes' => $sub ] ] );
$s = h( 'state', $id );
$poster = array_filter( $s['files'], fn( $k ) => str_contains( $k, 'poster' ), ARRAY_FILTER_USE_KEY );
ok( $poster && all_on_r2( $s ), 'D10 [fix] GIF + animated_video_poster companion both on R2 (block builds its URL from CDN source_url)', brief( $s ) );

}
if ( want( 'E' ) ) {
// =====================================================================
section( 'E. URL rewriting (serve from R2 + custom domain)' );
$u = h( 'urls', $SMALL );
ok( str_starts_with( (string) $u['url'], $cdnbase ), 'E1 wp_get_attachment_url → CDN', $u['url'] );
ok( str_starts_with( (string) $u['src'], $cdnbase ), 'E2 wp_get_attachment_image_src (medium) → CDN', $u['src'] );
ok( $u['srcset'] && substr_count( $u['srcset'], $cdnbase ) === substr_count( $u['srcset'], 'http' ), 'E3 every srcset candidate → CDN', $u['srcset'] );
ok( strpos( $u['content'], $cdnbase ) !== false, 'E4 the_content image (sized variant) rewritten → CDN', $u['content'] );
$u = h( 'urls', $BIG );
ok( str_starts_with( (string) $u['orig'], $cdnbase ), 'E5 [fix] wp_get_original_image_url → CDN (and object exists, see C5)', $u['orig'] );
$u = h( 'urls', $CLI1 );
ok( strpos( (string) $u['url'], SITE ) === 0, 'E6 unsynced attachment keeps local URL (no 404 to CDN)', $u['url'] );
$r = rest( 'GET', "/wp/v2/media/{$SMALL}" );
ok( str_starts_with( (string) ( $r['json']['source_url'] ?? '' ), $cdnbase ), 'E7 REST media source_url → CDN', $r['json']['source_url'] ?? '' );
set( [ 'r2_offload_serve_from_r2' => 0 ] );
$u = h( 'urls', $SMALL );
ok( strpos( (string) $u['url'], SITE ) === 0, 'E8 serve-from-R2 OFF → local URLs (instant switch back)', $u['url'] );
set( [ 'r2_offload_serve_from_r2' => 1 ] );

}
if ( want( 'F' ) ) {
// =====================================================================
section( 'F. WooCommerce 11.1 (REST products, galleries, variations)' );
$pimg = upload( "{$IMG}/product.jpg" ); $g1 = upload( "{$IMG}/gallery1.jpg" ); $g2 = upload( "{$IMG}/gallery2.jpg" ); $vg = upload( "{$IMG}/variation-gallery.jpg" );
array_push( $created, $pimg, $g1, $g2, $vg );
$r = rest( 'POST', '/wc/v3/products', [ 'json' => [ 'name' => 'QA Tee', 'type' => 'variable', 'status' => 'publish',
    'images' => [ [ 'id' => $pimg ], [ 'id' => $g1 ], [ 'id' => $g2 ] ],
    'attributes' => [ [ 'name' => 'Size', 'options' => [ 'S', 'M' ], 'variation' => true, 'visible' => true ] ] ] ] );
$PID = (int) ( $r['json']['id'] ?? 0 );
ok( $PID > 0, 'F1 variable product created via WC REST with featured + 2 gallery images', $r['code'] . ' ' . substr( $r['body'], 0, 200 ) );
$srcs = array_column( $r['json']['images'] ?? [], 'src' );
ok( count( $srcs ) === 3 && count( array_filter( $srcs, fn( $x ) => str_starts_with( $x, $cdnbase ) ) ) === 3, 'F2 WC REST product images[].src → CDN', $srcs );
$r = rest( 'POST', "/wc/v3/products/{$PID}/variations", [ 'json' => [ 'regular_price' => '10', 'attributes' => [ [ 'name' => 'Size', 'option' => 'S' ] ], 'image' => [ 'id' => $pimg ], 'gallery_image_ids' => [ $vg ] ] ] );
$VID = (int) ( $r['json']['id'] ?? 0 );
ok( $VID > 0, 'F3 variation created with image + gallery_image_ids (WC 11.1 variation galleries)', $r['code'] . ' ' . substr( $r['body'], 0, 200 ) );
ok( str_starts_with( (string) ( $r['json']['image']['src'] ?? '' ), $cdnbase ), 'F4 variation image src → CDN', $r['json']['image']['src'] ?? null );
$html = http( 'GET', "/?p={$PID}" )['body'];
$local_imgs = preg_match_all( '#' . preg_quote( SITE . '/wp-content/uploads', '#' ) . '#', $html );
ok( strpos( $html, $cdnbase ) !== false && $local_imgs === 0, 'F5 single product page: all product/gallery images served from CDN', "local refs: {$local_imgs}" );
$sa = http( 'GET', "/wp-json/wc/store/v1/products/{$PID}" );
$ssrc = array_column( $sa['json']['images'] ?? [], 'src' );
ok( $ssrc && count( array_filter( $ssrc, fn( $x ) => str_starts_with( $x, $cdnbase ) ) ) === count( $ssrc ), 'F6 Store API (Blocks) image srcs → CDN', $ssrc );
// Gallery re-sync on REST save: drop a gallery size from R2 + keys, then save product via REST.
$before = h( 'state', $g1 );
$thumbKey = array_values( array_filter( $before['keys'], fn( $k ) => str_contains( $k, '-150x150' ) ) )[0] ?? '';
wp( 'eval', "\$p=R2Offload\\Plugin::get_instance(); \$k=json_decode(get_post_meta({$g1},'_r2_offload_keys',true),true); update_post_meta({$g1},'_r2_offload_keys',wp_json_encode(array_values(array_diff(\$k,['{$thumbKey}'])))); \$p->r2->delete_files(['{$thumbKey}']);" );
ok( h( 'r2keys', [ $thumbKey ] )[ $thumbKey ] === 'missing', 'F7 (setup) gallery thumbnail removed from R2 to simulate a missing size' );
rest( 'POST', "/wc/v3/products/{$PID}", [ 'json' => [ 'name' => 'QA Tee v2' ] ] );
ok( h( 'r2keys', [ $thumbKey ] )[ $thumbKey ] === 'found', 'F8 [fix] REST product save re-syncs GALLERY images (missing size re-uploaded)', $thumbKey );
$out = wp( "media regenerate {$pimg} --yes" );
$s   = h( 'state', $pimg );
ok( $s['synced'] === '1' && all_on_r2( $s ), 'F9 wp media regenerate → still synced, all sizes on R2', brief( $s ) );

}
if ( want( 'G' ) ) {
// =====================================================================
section( 'G. Background offload (WP-Cron queue)' );
set( [ 'r2_offload_background_offload' => 1 ] );
$id = upload( "{$IMG}/bg.jpg" ); $created[] = $id;
for ( $i = 0, $s = []; $i < 30 && ( $s['synced'] ?? '' ) !== '1'; $i++ ) { sleep( 1 ); $s = h( 'state', $id ); }
$log = csh( "grep -h '\"attachment_id\":{$id}' wp-content/uploads/r2-offload-logs/*.log" );
ok( strpos( $log, 'queued for background' ) !== false && strpos( $log, 'via wp_generate_attachment_metadata' ) === false, 'G1 upload was queued, not synced inline in the upload request', $log );
ok( $s['synced'] === '1' && all_on_r2( $s ), "G2 queued upload synced by itself via kick()+spawn_cron (~{$i}s, no visitor, no manual cron)", brief( $s ) );
$q = h( 'queue' );
ok( ! array_filter( $q['migration'], fn( $x ) => (int) $x['attachment_id'] === $id ), 'G3 queue row cleaned up after success', $q['migration'] );
wp( 'config set DISABLE_WP_CRON true --raw' ); sleep( 3 ); // opcache revalidate window on wp-config.php
$admin = http( 'GET', '/wp-admin/admin.php?page=r2-offload', [ 'cookie' => 'admin' ] )['body'];
ok( stripos( $admin, 'DISABLE_WP_CRON' ) !== false, 'G4 admin warned when DISABLE_WP_CRON is set' );
$id = upload( "{$IMG}/bg.jpg" ); $created[] = $id;
for ( $i = 0, $s = []; $i < 30 && ( $s['synced'] ?? '' ) !== '1'; $i++ ) { sleep( 1 ); $s = h( 'state', $id ); }
ok( $s['synced'] === '1', "G5 with DISABLE_WP_CRON, kick() still processes the queue (~{$i}s)", brief( $s ) );
wp( 'config delete DISABLE_WP_CRON' );
set( [ 'r2_offload_background_offload' => 0 ] );

}
if ( want( 'H' ) ) {
// =====================================================================
section( 'H. WP-CLI' );
$st = wp( 'r2 status' );
preg_match( '/Attachments: (\d+) total, (\d+) synced/', $st, $m );
$dbt = (int) wp( 'db query --skip-column-names', "SELECT COUNT(*) FROM wp_posts WHERE post_type='attachment'" );
$dbs = (int) wp( 'db query --skip-column-names', "SELECT COUNT(*) FROM wp_postmeta WHERE meta_key='_r2_offload_synced' AND meta_value='1'" );
ok( $m && (int) $m[1] === $dbt && (int) $m[2] === $dbs && $dbs > 0, "H1 wp r2 status counts match the database ({$dbt} total / {$dbs} synced)", $st );
$o  = wp( "r2 sync {$CLI1}" );
$s  = h( 'state', $CLI1 );
ok( $s['synced'] === '1' && all_on_r2( $s ), 'H2 wp r2 sync <id> syncs a local-only attachment', $o );
set( [ 'r2_offload_upload_on_save' => 0 ] );
$c2 = upload( "{$IMG}/cli2.jpg" ); $created[] = $c2;
set( [ 'r2_offload_upload_on_save' => 1 ] );
$o = wp( 'r2 migrate' );
$s = h( 'state', $c2 );
ok( $s['synced'] === '1' && all_on_r2( $s ), 'H3 wp r2 migrate enqueues + drains unsynced attachments', substr( $o, -300 ) );
set( [ 'r2_offload_upload_on_save' => 0 ] );
$rid = upload( "{$IMG}/cli1.jpg" ); $created[] = $rid;
set( [ 'r2_offload_upload_on_save' => 1 ] );
wp( 'db query', "INSERT INTO wp_r2_offload_migration_queue (attachment_id, status, retry_count, created_at, updated_at) VALUES ({$rid}, 'failed', 3, UTC_TIMESTAMP(), UTC_TIMESTAMP())" );
ok( h( 'state', $rid )['synced'] === '', 'H4 (setup) attachment sits in the queue as FAILED, unsynced' );
$o = wp( 'r2 retry' );
$s = h( 'state', $rid );
$left = (int) wp( 'db query --skip-column-names', "SELECT COUNT(*) FROM wp_r2_offload_migration_queue WHERE attachment_id={$rid} AND status='failed'" );
ok( $s['synced'] === '1' && all_on_r2( $s ) && $left === 0, 'H5 wp r2 retry resets the failed row and actually uploads it', [ $o, brief( $s ) ] );

}
if ( want( 'I' ) ) {
// =====================================================================
section( 'I. Media Library actions (admin-ajax): delete local → restore' );
$r = ajax( 'r2_offload_delete_local_single', [ 'attachment_id' => $BIG ] );
$s = h( 'state', $BIG );
ok( ( $r['json']['success'] ?? false ) && none_local( $s ) && $s['local_deleted'] === '1', 'I1 "Delete local" removes all local files (incl. original)', [ $r['json']['data']['message'] ?? $r['body'], brief( $s ) ] );
$u = h( 'urls', $BIG );
ok( str_starts_with( (string) $u['url'], $cdnbase ), 'I2 media still served from CDN after local delete', $u['url'] );
$r = ajax( 'r2_offload_restore_attachment', [ 'attachment_id' => $BIG ] );
$s = h( 'state', $BIG );
ok( ( $r['json']['success'] ?? false ) && all_local( $s ), 'I3 "Restore from R2" brings every file back (incl. original)', [ $r['json']['data']['message'] ?? $r['body'], brief( $s ) ] );
$sha_local = csh( 'sha1sum wp-content/uploads/' . dirname( wp( "post meta get {$BIG} _wp_attached_file" ) ) . '/' . $s['original'] );
ok( str_starts_with( $sha_local, sha1_file( "{$IMG}/big.jpg" ) ), 'I4 restored full-res original is byte-identical to the uploaded file', $sha_local );

}
if ( want( 'J' ) ) {
// =====================================================================
section( 'J. Upgrade from 1.4.0: legacy attachment without original_image on R2' );
$id = upload( "{$IMG}/big.jpg" ); $created[] = $id; $LEG = $id;
$lg = h( 'legacy', $id );
$s  = h( 'state', $id );
$orig_rel = array_keys( array_filter( $s['files'], fn( $f ) => ! $f['tracked'] ) )[0] ?? '';
ok( $orig_rel !== '' && $s['files'][ $orig_rel ]['r2'] === 'missing', 'J1 (setup) attachment looks 1.4.0-synced: original untracked & absent on R2', $lg );
ajax( 'r2_offload_delete_local_single', [ 'attachment_id' => $id ] );
$s = h( 'state', $id );
ok( $s['files'][ $orig_rel ]['local'] === true, 'J2 [fix] bulk/row "Delete local" keeps the never-uploaded original on disk (no data loss)', brief( $s ) );
wp( "r2 sync {$id}" );
$s = h( 'state', $id );
ok( $s['files'][ $orig_rel ]['r2'] === 'found' && $s['files'][ $orig_rel ]['tracked'], 'J3 re-sync uploads the missing original', brief( $s ) );

}
if ( want( 'K' ) ) {
// =====================================================================
section( 'K. Failure handling (bad secret)' );
set( [ 'r2_offload_delete_local' => 1 ] );
$good = wp( 'option get r2_offload_secret_access_key' );
wp( 'eval', '$s=new R2Offload\Settings(); update_option("r2_offload_secret_access_key", $s->sanitize_secret_key("0000000000000000000000000000000000000000000000000000000000000000"));' );
$id = upload( "{$IMG}/fail.jpg" ); $created[] = $id;
$s  = h( 'state', $id );
ok( $s['synced'] !== '1', 'K1 upload with bad credentials is NOT marked synced', brief( $s ) );
ok( (int) $s['retry'] >= 1 && $s['error'] !== '', 'K2 failure recorded (retry_count + error meta)', [ 'retry' => $s['retry'], 'error' => $s['error'] ] );
ok( all_local( $s ), 'K3 local files kept despite Delete-local ON (no data loss on failure)', brief( $s ) );
$r = http( 'POST', '/wp-json/wp/v2/media', [ 'auth' => $AP, 'form' => [ 'file' => new CURLFile( "{$IMG}/fail.jpg", 'image/jpeg', 'fail2.jpg' ) ] ] );
ok( $r['code'] === 201, 'K4 media upload itself still succeeds for the user (R2 outage does not break uploads)', $r['code'] );
if ( ! empty( $r['json']['id'] ) ) { $created[] = (int) $r['json']['id']; }
wp( 'option update r2_offload_secret_access_key', $good );
set( [ 'r2_offload_delete_local' => 0 ] );
$o = wp( "r2 sync {$id}" );
$s = h( 'state', $id );
ok( $s['synced'] === '1' && all_on_r2( $s ), 'K5 after fixing credentials, wp r2 sync recovers the failed attachment', brief( $s ) );

}
if ( want( 'L' ) ) {
// =====================================================================
section( 'L. Delete attachment → removed from R2' );
$s = h( 'state', $SMALL );
$keys = $s['keys'];
wp( "post delete {$SMALL} --force" );
$k = h( 'r2keys', $keys );
ok( $keys && count( array_filter( $k, fn( $v ) => $v === 'missing' ) ) === count( $keys ), 'L1 deleting attachment deletes all its R2 objects', $k );

}
if ( want( 'M' ) ) {
// =====================================================================
section( 'M. Deactivate / reactivate' );
foreach ( [ 'r2_offload_process_batch', 'r2_offload_process_restore_batch', 'r2_offload_process_validate_batch' ] as $hk ) {
    wp( "cron event schedule {$hk} +1hour" );
}
$pre = wp( 'cron event list --fields=hook --format=csv' );
ok( substr_count( $pre, 'r2_offload_process_' ) >= 3, 'M0 (setup) plugin cron events scheduled before deactivation', $pre );
wp( 'plugin deactivate cloudflare-r2-offload' );
$cron = wp( 'cron event list --fields=hook --format=csv' );
ok( strpos( $cron, 'r2_offload' ) === false, 'M1 deactivation clears all r2_offload cron events', $cron );
ok( http( 'GET', '/' )['code'] === 200, 'M2 site works with plugin deactivated' );
wp( 'plugin activate cloudflare-r2-offload' );
ok( wp( "post meta get {$BIG} _r2_offload_synced" ) === '1', 'M3 reactivation keeps sync state (no re-migration needed)' );

}
if ( want( 'N' ) ) {
// =====================================================================
section( 'N. PHP log hygiene' );
$log = csh( 'cat wp-content/debug.log 2>/dev/null' );
$ours = array_filter( explode( "\n", $log ), fn( $l ) => stripos( $l, 'cloudflare-r2-offload' ) !== false || stripos( $l, 'R2Offload' ) !== false );
ok( ! $ours, 'N1 no PHP errors/warnings/notices from the plugin during the whole run', array_slice( array_values( $ours ), 0, 5 ) );

}
if ( want( 'R' ) ) {
// =====================================================================
section( 'R. Queue concurrency on the real database (two workers)' );
$rc = h( 'race' );
ok( ( $rc['w1'] ?? 0 ) === 10 && ( $rc['w2'] ?? 0 ) === 10 && ( $rc['overlap'] ?? -1 ) === 0, 'R1 two workers each claim 10 of 20 queued rows, zero overlap (no double-processing)', $rc );
}
if ( want( 'P' ) ) {
// =====================================================================
section( 'P. PHP 7.4 host (below new 8.1 minimum)' );
$o = run( [ 'docker', 'run', '--rm', '--network', 'r2qa_default', '-v', 'r2qa_site:/var/www/html', '-w', '/var/www/html', '--user', '33:33', 'wordpress:cli-php7.4',
            'php', '-d', 'memory_limit=1G', '/usr/local/bin/wp', 'eval',
            'remove_all_actions("admin_notices"); include WP_PLUGIN_DIR . "/cloudflare-r2-offload/cloudflare-r2-offload.php"; ob_start(); do_action("admin_notices"); $n = ob_get_clean(); echo "PHP=", PHP_VERSION, " loaded=", class_exists("R2Offload\Plugin", false) ? "yes" : "no", " notice=", strpos($n, "requires PHP 8.1") !== false ? "yes" : "no";' ] );
ok( strpos( $o, 'PHP=7.4' ) !== false && strpos( $o, 'loaded=no' ) !== false && strpos( $o, 'notice=yes' ) !== false && stripos( $o, 'fatal' ) === false, 'P1 on PHP 7.4 the plugin refuses to load, shows its "requires PHP 8.1" notice, no fatal', $o );

}
} catch ( Throwable $e ) {
    ok( false, 'Driver exception: ' . $e->getMessage() . ' @' . $e->getLine() );
} finally {
    section( 'Z. Cleanup' );
    csh( 'rm -f wp-content/mu-plugins/qa-nonce.php' );
    $c = h( 'cleanup_prefix', "{$RUN}/" );
    ok( ( $c['left'] ?? 1 ) === 0, "Z1 R2 prefix {$RUN}/ emptied", $c );
}

echo "\n" . str_repeat( '=', 60 ) . "\nResults: {$pass}/" . ( $pass + $fail ) . " passed, {$fail} failed\n";
foreach ( $failures as $f ) { echo "  ✗ {$f}\n"; }
exit( $fail ? 1 : 0 );
