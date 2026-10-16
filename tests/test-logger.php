<?php
/**
 * Tests for the live-only ErrorLogger (real class, real filesystem in a temp dir).
 *
 * Covers: nothing kept while nobody watches · start → entries stream → stop deletes all ·
 * expired heartbeat stops capture and deletes the buffer · buffer cap · legacy log purge.
 *
 * Run: php tests/test-logger.php
 */

require_once __DIR__ . '/wp-stubs.php';
require_once __DIR__ . '/TestRunner.php';
require_once __DIR__ . '/../includes/class-error-logger.php';

use R2Offload\ErrorLogger;

$t   = new TestRunner();
$dir = sys_get_temp_dir() . '/wp-uploads/r2-offload-logs';
$buf = "{$dir}/live.jsonl";
$hb  = "{$dir}/live.on";

function rm_dir( string $d ): void {
    foreach ( (array) glob( "{$d}/{,.}*", GLOB_BRACE ) as $f ) {
        if ( is_file( $f ) ) { unlink( $f ); }
    }
    if ( is_dir( $d ) ) { rmdir( $d ); }
}
rm_dir( $dir );

// -----------------------------------------------------------------------------
$t->section( '1. Nothing is kept while nobody is watching' );
mkdir( $dir, 0755, true );   // folder exists, as after any earlier live session — writes WOULD succeed
$log = new ErrorLogger();
$log->error( 'boom', [ 'k' => 1 ] );
$log->info( 'hello' );
$log->write_migration_terminal( [ 'id' => 5, 'file' => 'a.jpg', 'up' => 3 ] );
$t->assertEqual( [], glob( "{$dir}/*" ), '1.1 no log files written when live view is off' );
$t->assertEqual( false, ( new ErrorLogger() )->live_poll( 0 )['live'], '1.2 poll reports not live' );

// -----------------------------------------------------------------------------
$t->section( '2. Toggle ON streams entries; OFF deletes everything shown' );
$log->live_start();
$t->assertEqual( true, file_exists( $hb ) && file_exists( $buf ), '2.1 live_start opens buffer + heartbeat' );
$t->assertEqual( true, file_exists( "{$dir}/.htaccess" ), '2.2 buffer dir protected from direct HTTP access' );
$log->error( 'upload failed', [ 'key' => 'x.jpg' ] );
$log->write_migration_terminal( [ 'id' => 7, 'file' => 'b.jpg', 'up' => 9 ] );
$p1 = $log->live_poll( 0 );
$t->assertEqual( 2, count( $p1['entries'] ), '2.3 entries written while live are streamed' );
$t->assertEqual( 'error', $p1['entries'][0]['level'] ?? '', '2.4 level preserved' );
$t->assertStringContains( 'b.jpg', $p1['entries'][1]['message'] ?? '', '2.5 per-item result becomes a readable line' );
$log->warning( 'later' );
$p2 = $log->live_poll( $p1['next_offset'] );
$t->assertEqual( [ 'later' ], array_column( $p2['entries'], 'message' ), '2.6 poll from offset returns only new entries' );
$log->live_stop();
$t->assertEqual( false, file_exists( $buf ) || file_exists( $hb ), '2.7 live_stop deletes the buffer and heartbeat' );
$log->error( 'after stop' );
$t->assertEqual( false, file_exists( $buf ), '2.8 nothing captured after stop' );

// -----------------------------------------------------------------------------
$t->section( '3. Viewer left without switching off → session expires and is deleted' );
$log->live_start();
$log->info( 'kept while live' );
touch( $hb, time() - ErrorLogger::LIVE_TTL - 5 );
$log->error( 'arrives after expiry' );
$t->assertEqual( false, file_exists( $buf ) || file_exists( $hb ), '3.1 stale heartbeat: buffer deleted on next log call' );
$t->assertEqual( false, $log->live_poll( 0 )['live'], '3.2 poll after expiry reports not live' );

// -----------------------------------------------------------------------------
$t->section( '4. Buffer is capped while live' );
$log->live_start();
for ( $i = 0; $i < ErrorLogger::LIVE_MAX + 200; $i++ ) {
    $log->info( 'entry ' . $i . ' ' . str_repeat( 'x', 500 ) );
}
$all = $log->live_poll( 0 )['entries'];
$t->assertEqual( true, count( $all ) <= ErrorLogger::LIVE_MAX + 1, '4.1 buffer never grows past the cap (' . count( $all ) . ' entries)' );
$t->assertStringContains( 'entry ' . ( ErrorLogger::LIVE_MAX + 199 ), end( $all )['message'] ?? '', '4.2 newest entry kept' );
$log->live_stop();

// -----------------------------------------------------------------------------
$t->section( '5. Upgrade purge removes logs kept by earlier versions' );
@mkdir( $dir, 0755, true );
foreach ( [ '2026-10-01.log', '2026-10-02.1.log', 'migration-terminal.jsonl', 'validate-terminal.jsonl' ] as $f ) {
    file_put_contents( "{$dir}/{$f}", "{}\n" );
}
file_put_contents( "{$dir}/.htaccess", "deny from all\n" );
$log->purge_all();
$left = array_map( 'basename', glob( "{$dir}/*" ) );
$t->assertEqual( [ 'index.php' ], array_values( array_diff( $left, [ '.htaccess' ] ) ), '5.1 all legacy log files deleted (protection files kept)' );

rm_dir( $dir );
exit( $t->summary() );
