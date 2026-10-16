<?php
/**
 * Mutation runner: inject one bug into the INSTALLED plugin, run the QA sections that
 * cover it, check the expected scenarios went red, restore the pristine plugin.
 * Usage: php tests/qa/mutate.php [M01,M02,...]   (creds: QA_ENV or <plugin>/.env.r2-test)
 */
$Q    = __DIR__;
$only = isset( $argv[1] ) ? explode( ',', $argv[1] ) : null;
$PD   = '/var/www/html/wp-content/plugins/cloudflare-r2-offload';

function run( array $argv, array $envx = [] ): string {
    $p = proc_open( $argv, [ 1 => [ 'pipe', 'w' ], 2 => [ 'redirect', 1 ] ], $pipes, null, $envx ? array_merge( getenv(), $envx ) : null );
    $o = stream_get_contents( $pipes[1] ); proc_close( $p ); return (string) $o;
}
function dc( array $a ): string { global $Q; return run( array_merge( [ 'docker', 'compose', '-f', "{$Q}/compose.yml", 'exec', '-T', 'wp' ], $a ) ); }

// Pristine backup of the installed plugin (once).
dc( [ 'sh', '-c', "rm -rf /tmp/r2-pristine && cp -a {$PD} /tmp/r2-pristine" ] );
$restore = fn() => dc( [ 'sh', '-c', "rm -rf {$PD} && cp -a /tmp/r2-pristine {$PD}" ] );

$rows = [];
foreach ( require "{$Q}/mutations.php" as [ $id, $file, $find, $repl, $sections, $desc, $expect ] ) {
    if ( $only && ! in_array( $id, $only, true ) ) { continue; }
    $restore();
    // Apply: replace FIRST occurrence only, inside the container (argv → no shell quoting).
    $res = dc( [ 'php', '-r', '$f=$argv[1]; $s=file_get_contents($f); $p=strpos($s,$argv[2]); if($p===false){echo "NOMATCH";exit(1);} file_put_contents($f, substr_replace($s,$argv[3],$p,strlen($argv[2]))); echo "APPLIED";', "{$PD}/{$file}", $find, $repl ] );
    $lint = dc( [ 'php', '-l', "{$PD}/{$file}" ] );
    sleep( 3 ); // let the web server's opcache see the mutated file
    dc( [ 'php', '-d', 'memory_limit=1G', '/usr/local/bin/wp', 'user', 'delete', 'sub', '--yes', '--quiet' ] );
    array_map( 'unlink', glob( "{$Q}/cookies-*.txt" ) );
    $t0  = time();
    $out = run( [ 'php', "{$Q}/qa.php" ], [ 'QA_ONLY' => $sections === '-' ? '-' : $sections ] );
    preg_match_all( '/^\s+FAIL\s+(\S+)/m', $out, $m );
    $failed  = array_values( array_unique( $m[1] ) );
    $caught  = array_values( array_intersect( $expect, $failed ) );
    $missed  = array_values( array_diff( $expect, $failed ) );
    $verdict = strpos( $res, 'APPLIED' ) === false ? 'NOT APPLIED' : ( ! $expect ? 'EQUIVALENT' : ( $missed ? ( $caught ? 'PARTIAL' : 'SURVIVED' ) : 'KILLED' ) );
    preg_match( '/Results: (\d+)\/(\d+)/', $out, $r );
    $rows[] = compact( 'id', 'desc', 'verdict', 'expect', 'caught', 'missed', 'failed' );
    printf( "%s %-8s %-62s expected=[%s] failed=[%s] (%s, %ds)\n", $id, $verdict, $desc, implode( ',', $expect ), implode( ',', $failed ), $r ? "{$r[1]}/{$r[2]} pass" : 'no summary', time() - $t0 );
    file_put_contents( "{$Q}/mut-{$id}.log", $out );
    if ( strpos( $lint, 'No syntax errors' ) === false ) { echo "      lint: {$lint}\n"; }
}
$restore();
sleep( 3 );
echo "\nPlugin restored to pristine build.\n";
$k = count( array_filter( $rows, fn( $x ) => $x['verdict'] === 'KILLED' ) );
$eq = count( array_filter( $rows, fn( $x ) => $x['verdict'] === 'EQUIVALENT' ) );
echo "Mutation score: {$k}/" . ( count( $rows ) - $eq ) . " killed" . ( $eq ? " ({$eq} equivalent mutant(s) excluded)" : '' ) . "\n";
file_put_contents( "{$Q}/mutation-results.json", json_encode( $rows, JSON_PRETTY_PRINT ) );
