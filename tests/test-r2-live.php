<?php
/**
 * Live integration tests against a real Cloudflare R2 bucket.
 *
 * Exercises the REAL R2Client + AttachmentSync through the Strauss-scoped AWS SDK
 * (lib/vendor) — run `composer release` (or `php build.php`) first.
 *
 * Every object is written under a unique  r2-offload-livetest/<run-id>/  prefix and
 * the whole prefix is deleted in a finally block, so nothing else in the bucket is
 * touched and nothing is left behind, even when a test fails.
 *
 * Required env:  R2_ACCOUNT_ID  R2_ACCESS_KEY_ID  R2_SECRET_ACCESS_KEY  R2_BUCKET
 * Optional env:  R2_CDN_URL  (e.g. https://cdn.example.com — verifies public serving)
 * Values are read from env vars, else from .env.r2-test in the plugin root
 * (KEY=value lines; gitignored via /.env* and never packaged).
 *
 * Run: php tests/test-r2-live.php
 * Not part of `composer test` (needs network + credentials). Skips (exit 0) without env.
 */

namespace R2Offload {

    class Settings {
        public int    $multipart_threshold = 5242880;
        public string $path_prefix         = '';
        public bool   $delete_local        = false;

        public function get_account_id(): string        { return (string) getenv( 'R2_ACCOUNT_ID' ); }
        public function get_access_key_id(): string     { return (string) getenv( 'R2_ACCESS_KEY_ID' ); }
        public function get_secret_access_key(): string { return (string) getenv( 'R2_SECRET_ACCESS_KEY' ); }
        public function get_bucket(): string            { return (string) getenv( 'R2_BUCKET' ); }
        public function is_configured(): bool           { return true; }
        public function get_multipart_threshold(): int  { return $this->multipart_threshold; }
        public function get_multipart_concurrency(): int { return 3; }
        public function get_path_prefix(): string       { return $this->path_prefix; }
        public function get_delete_local(): bool        { return $this->delete_local; }
        public function get_excluded_mime_types(): array { return []; }
    }

    /** Collects errors so failures show the real SDK message. */
    class ErrorLogger {
        public array $errors = [];
        public function __call( string $level, array $args ) {
            if ( $level === 'error' ) {
                $this->errors[] = $args[0] . ' ' . json_encode( $args[1] ?? [] );
            }
        }
    }
}

namespace {

    // Local creds file (gitignored, never packaged). Real env vars take precedence.
    $env_file = __DIR__ . '/../.env.r2-test';
    if ( is_readable( $env_file ) ) {
        foreach ( (array) parse_ini_file( $env_file, false, INI_SCANNER_RAW ) as $k => $val ) {
            if ( getenv( $k ) === false ) {
                putenv( "{$k}={$val}" );
            }
        }
    }

    foreach ( [ 'R2_ACCOUNT_ID', 'R2_ACCESS_KEY_ID', 'R2_SECRET_ACCESS_KEY', 'R2_BUCKET' ] as $v ) {
        if ( ! getenv( $v ) ) {
            echo "SKIP: {$v} not set — live R2 tests not run.\n";
            exit( 0 );
        }
    }

    require_once __DIR__ . '/wp-stubs.php';
    require_once __DIR__ . '/TestRunner.php';
    require_once __DIR__ . '/../lib/vendor/autoload.php';
    require_once __DIR__ . '/../includes/class-r2-client.php';
    require_once __DIR__ . '/../includes/class-attachment-sync.php';

    use R2Offload\AttachmentSync;
    use R2Offload\ErrorLogger;
    use R2Offload\R2Client;
    use R2Offload\Settings;

    // Windows PHP often ships without a CA bundle — R2Client honours AWS_CA_BUNDLE.
    $ca = __DIR__ . '/cacert.pem';
    if ( ! getenv( 'AWS_CA_BUNDLE' ) && file_exists( $ca ) ) {
        putenv( "AWS_CA_BUNDLE={$ca}" );
    }

    $t      = new TestRunner();
    $run    = gmdate( 'Ymd-His' ) . '-' . bin2hex( random_bytes( 3 ) );
    $prefix = "r2-offload-livetest/{$run}";
    $tmp    = sys_get_temp_dir() . "/r2-livetest-{$run}";
    mkdir( $tmp, 0755, true );

    $settings = new Settings();
    $logger   = new ErrorLogger();
    $r2       = new R2Client( $settings, $logger );

    echo "Bucket: " . getenv( 'R2_BUCKET' ) . "  Prefix: {$prefix}/\n";

    function make_file( string $path, int $bytes ): string {
        if ( ! is_dir( dirname( $path ) ) ) {
            mkdir( dirname( $path ), 0755, true );
        }
        file_put_contents( $path, random_bytes( $bytes ) );
        return $path;
    }

    function show_errors( ErrorLogger $logger ): void {
        foreach ( $logger->errors as $e ) {
            echo "        ! {$e}\n";
        }
        $logger->errors = [];
    }

    try {
        // ---------------------------------------------------------------------
        $t->section( '1. Connection' );
        $conn = $r2->test_connection();
        $t->assert( ! empty( $conn['success'] ), '1.1 test_connection succeeds: ' . ( $conn['message'] ?? '' ) );
        if ( empty( $conn['success'] ) ) {
            throw new RuntimeException( 'Connection failed — aborting remaining tests.' );
        }

        // ---------------------------------------------------------------------
        $t->section( '2. Single upload / head / download' );
        $small     = make_file( "{$tmp}/small.jpg", 64 * 1024 );
        $small_key = "{$prefix}/raw/small.jpg";
        $t->assert( $r2->upload_file( $small, $small_key, 'image/jpeg' ), '2.1 upload_file (single PUT)' );
        show_errors( $logger );
        $t->assertEqual( 'found', $r2->check_key( $small_key ), '2.2 check_key finds it' );
        $t->assert( $r2->file_exists( $small_key ), '2.3 file_exists true' );
        $t->assertEqual( 'missing', $r2->check_key( "{$prefix}/raw/nope.jpg" ), '2.4 check_key reports missing key' );
        $dl = "{$tmp}/dl/small.jpg";
        @mkdir( dirname( $dl ), 0755, true );
        $t->assert( $r2->download_file( $small_key, $dl ), '2.5 download_file' );
        $t->assertEqual( sha1_file( $small ), @sha1_file( $dl ), '2.6 downloaded bytes identical' );

        // ---------------------------------------------------------------------
        $t->section( '3. Multipart upload (11 MB, 5 MB parts)' );
        $big     = make_file( "{$tmp}/big.bin", 11 * 1024 * 1024 );
        $big_key = "{$prefix}/raw/big.bin";
        $t->assert( $r2->upload_file( $big, $big_key, 'application/octet-stream' ), '3.1 multipart upload_file' );
        show_errors( $logger );
        $dl_big = "{$tmp}/dl/big.bin";
        $t->assert( $r2->download_file( $big_key, $dl_big ), '3.2 download multipart object' );
        $t->assertEqual( sha1_file( $big ), @sha1_file( $dl_big ), '3.3 multipart bytes identical' );

        // ---------------------------------------------------------------------
        $t->section( '4. Pooled concurrent upload (upload_files)' );
        $jobs = [];
        for ( $i = 1; $i <= 4; $i++ ) {
            $p      = make_file( "{$tmp}/pool-{$i}.webp", 8 * 1024 );
            $jobs[] = [ 'path' => $p, 'key' => "{$prefix}/raw/pool-{$i}.webp", 'mime' => 'image/webp' ];
        }
        $res = $r2->upload_files( $jobs );
        show_errors( $logger );
        $t->assertEqual( 4, count( array_filter( $res ) ), '4.1 all 4 pooled uploads succeed' );
        $listed = array_column( $r2->list_objects( "{$prefix}/raw/", 100 )['objects'], 'Key' );
        $t->assertEqual( 6, count( $listed ), '4.2 list_objects sees 6 raw objects' );

        // ---------------------------------------------------------------------
        $cdn = rtrim( (string) getenv( 'R2_CDN_URL' ), '/' );
        if ( $cdn ) {
            $t->section( '5. Public serving via custom domain' );
            $ch = curl_init( "{$cdn}/{$small_key}" );
            curl_setopt_array( $ch, [ CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 20 ] + ( file_exists( $ca ) ? [ CURLOPT_CAINFO => $ca ] : [] ) );
            $body = curl_exec( $ch );
            $code = (int) curl_getinfo( $ch, CURLINFO_RESPONSE_CODE );
            $t->assertEqual( 200, $code, "5.1 CDN returns 200 for {$cdn}/{$small_key}" );
            $t->assertEqual( sha1_file( $small ), $body === false ? '' : sha1( $body ), '5.2 CDN bytes identical' );
        }

        // ---------------------------------------------------------------------
        $t->section( '6. AttachmentSync lifecycle (scaled + original_image + sizes)' );
        // Keys = {path_prefix}/{attached} → everything stays under the run prefix.
        $settings->path_prefix = "{$prefix}/uploads";
        $base                  = sys_get_temp_dir() . '/wp-uploads/';
        $rel                   = "livetest-{$run}/2026/10";
        foreach ( [ 'photo-scaled.jpg' => 300, 'photo.jpg' => 900, 'photo-150x150.jpg' => 10, 'photo-600x400.jpg' => 60 ] as $f => $kb ) {
            make_file( "{$base}{$rel}/{$f}", $kb * 1024 );
        }
        $hash_original = sha1_file( "{$base}{$rel}/photo.jpg" );

        $id = 9001;
        $GLOBALS['__wp_postmeta'][ $id ]['_wp_attached_file']       = "{$rel}/photo-scaled.jpg";
        $GLOBALS['__wp_postmeta'][ $id ]['_wp_attachment_metadata'] = [
            'original_image' => 'photo.jpg',
            'sizes'          => [
                'thumbnail'             => [ 'file' => 'photo-150x150.jpg' ],
                'woocommerce_thumbnail' => [ 'file' => 'photo-600x400.jpg' ],
            ],
        ];

        $sync   = new AttachmentSync( $r2, $settings, $logger );
        $result = $sync->sync_attachment( $id );
        show_errors( $logger );
        $t->assertEqual( 4, $result['uploaded'], '6.1 sync uploads scaled + original + 2 sizes' );
        $t->assertEqual( 0, $result['failed'], '6.2 no failures' );
        $t->assertEqual( '1', get_post_meta( $id, '_r2_offload_synced', true ), '6.3 marked synced' );
        $orig_key = "{$prefix}/uploads/{$rel}/photo.jpg";
        $t->assertEqual( 'found', $r2->check_key( $orig_key ), '6.4 original_image really on R2' );

        $result = $sync->sync_attachment( $id );
        $t->assertEqual( 0, $result['uploaded'], '6.5 re-sync uploads nothing (all tracked)' );

        $del = $sync->delete_local_for_attachment( $id );
        $t->assertEqual( 4, $del['deleted'], '6.6 delete-local removes all 4 tracked files' );
        $t->assert( ! file_exists( "{$base}{$rel}/photo.jpg" ), '6.7 original gone locally' );

        $res = $sync->restore_from_r2( $id );
        show_errors( $logger );
        $t->assertEqual( 4, $res['restored'], '6.8 restore downloads all 4 files' );
        $t->assertEqual( $hash_original, @sha1_file( "{$base}{$rel}/photo.jpg" ), '6.9 restored original byte-identical' );

        $t->assert( $sync->desync_attachment( $id ), '6.10 desync deletes from R2' );
        show_errors( $logger );
        $t->assertEqual( 'missing', $r2->check_key( $orig_key ), '6.11 original removed from R2' );
        $t->assertEqual( '', get_post_meta( $id, '_r2_offload_keys', true ), '6.12 sync meta cleared' );
    } catch ( \Throwable $e ) {
        $t->assert( false, 'Unexpected exception: ' . $e->getMessage() );
        show_errors( $logger );
    } finally {
        // ---------------------------------------------------------------------
        $t->section( '7. Cleanup' );
        $r2->delete_by_prefix( "{$prefix}/" );
        $left = $r2->list_objects( "{$prefix}/", 10 )['objects'];
        $t->assertEqual( 0, count( $left ), "7.1 bucket prefix {$prefix}/ is empty" );

        // Windows: SaveAs download streams stay locked until the SDK objects are freed.
        unset( $sync, $r2 );
        gc_collect_cycles();

        foreach ( [ $tmp, sys_get_temp_dir() . "/wp-uploads/livetest-{$run}" ] as $dir ) {
            if ( is_dir( $dir ) ) {
                $it = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator( $dir, FilesystemIterator::SKIP_DOTS ),
                    RecursiveIteratorIterator::CHILD_FIRST
                );
                foreach ( $it as $f ) {
                    $f->isDir() ? rmdir( $f->getPathname() ) : unlink( $f->getPathname() );
                }
                rmdir( $dir );
            }
        }
    }

    exit( $t->summary() );
}
