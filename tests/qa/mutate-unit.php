<?php
/**
 * Unit-suite mutation runner (repo source, host PHP). Each mutation is applied to the
 * real source file, ALL unit suites run, then the file is restored byte-for-byte.
 * Usage: php tests/qa/mutate-unit.php
 */
$dir = dirname( __DIR__, 2 );
chdir( $dir );
$suites = glob( 'tests/test-*.php' );
$suites = array_values( array_filter( $suites, fn( $f ) => ! str_contains( $f, 'live' ) ) );

$extra = [
    [ 'U01', 'includes/class-settings.php', 'return $this->encrypt( sanitize_text_field( $value ) );', 'return sanitize_text_field( $value );', 'Secret saved without encryption' ],
    [ 'U02', 'includes/class-settings.php', 'if ( ! hash_equals( $expected_hmac, $stored_hmac ) ) {', 'if ( false ) {', 'Ciphertext tamper (HMAC) check removed' ],
    [ 'U03', 'includes/class-settings.php', "if ( \$value && ! preg_match( '/^[a-f0-9]+\$/i', \$value ) ) {", 'if ( false ) {', 'Account ID hex validation removed' ],
    [ 'U04', 'includes/class-settings.php', 'return max( 1, min( 50, $value ) );', 'return $value;', 'Batch size no longer clamped to 1..50' ],
    [ 'U05', 'includes/class-batch-processor.php', '$token = substr( md5( uniqid( (string) getmypid(), true ) ), 0, 32 );', "\$token = 'same-for-every-worker';", 'Batch claim token not unique (double-processing race)' ],
    [ 'U06', 'includes/class-url-rewriter.php', 'return str_replace( $local, $cdn, $url );', 'return $url;', 'URL replace is a no-op' ],
    [ 'U07', 'includes/class-url-rewriter.php', "\$original = preg_replace( '/-\\d+x\\d+(\\.\\w+)\$/', '\$1', \$url );", '$original = $url;', 'Sized variants in content not resolved to attachment' ],
    [ 'U08', 'includes/class-attachment-sync.php', 'if ( ! $this->r2->delete_files( $keys ) ) {', 'if ( false ) {', 'Desync wipes meta even when R2 delete failed' ],
    [ 'U09', 'includes/class-attachment-sync.php', "if ( get_post_meta( \$attachment_id, '_r2_offload_synced', true ) !== '1' ) {\n            \$result['skipped']++;\n            return \$result;\n        }\n\n        \$attached", "if ( false ) {\n            \$result['skipped']++;\n            return \$result;\n        }\n\n        \$attached", 'Delete-local runs on attachments NOT synced to R2' ],
];
$catalogue = array_merge(
    array_map( fn( $m ) => [ $m[0], $m[1], $m[2], $m[3], $m[5] ], require __DIR__ . '/mutations.php' ),
    $extra
);

$hash_before = [];
foreach ( glob( '{includes,admin}/*.php', GLOB_BRACE ) + [ 'cloudflare-r2-offload.php' ] as $f ) { $hash_before[ $f ] = sha1_file( $f ); }
$hash_before['cloudflare-r2-offload.php'] = sha1_file( 'cloudflare-r2-offload.php' );

$killed = 0; $total = 0;
foreach ( $catalogue as [ $id, $file, $find, $repl, $desc ] ) {
    $orig = file_get_contents( $file );
    $p    = strpos( $orig, $find );
    if ( $p === false ) {                       // git autocrlf may check files out with CRLF
        $find = str_replace( "\n", "\r\n", $find );
        $repl = str_replace( "\n", "\r\n", $repl );
        $p    = strpos( $orig, $find );
    }
    if ( $p === false ) { printf( "%s NOMATCH  %s\n", $id, $desc ); continue; }
    $total++;
    try {
        file_put_contents( $file, substr_replace( $orig, $repl, $p, strlen( $find ) ) );
        $fails = []; $sum = 0;
        foreach ( $suites as $s ) {
            $o = shell_exec( 'php ' . escapeshellarg( $s ) . ' 2>&1' );
            preg_match( '/Results: \d+\/\d+ passed, (\d+) failed/', (string) $o, $r );
            $n = $r ? (int) $r[1] : -1;                // -1 = suite crashed (also a kill)
            if ( $n !== 0 ) {
                $fails[] = basename( $s, '.php' ) . '=' . ( $n < 0 ? 'CRASH' : $n );
                preg_match_all( '/^\s+FAIL\s+(.{0,60})/m', (string) $o, $fm );
                $sum += max( 1, $n );
                $first[ $id ] = $fm[1][0] ?? '';
            }
        }
    } finally {
        file_put_contents( $file, $orig );          // always restore
    }
    $verdict = $fails ? 'KILLED' : 'SURVIVED';
    if ( $fails ) { $killed++; }
    printf( "%s %-8s %-58s %s%s\n", $id, $verdict, $desc, implode( ' ', $fails ), $fails ? '  e.g. "' . trim( $first[ $id ] ) . '"' : '' );
}
foreach ( $hash_before as $f => $h ) {
    if ( sha1_file( $f ) !== $h ) { echo "!! {$f} NOT restored\n"; exit( 2 ); }
}
echo "\nAll source files verified restored (sha1 match).\nUnit mutation score: {$killed}/{$total} killed\n";
