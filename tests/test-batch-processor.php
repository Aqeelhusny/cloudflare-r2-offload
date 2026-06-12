<?php
/**
 * Unit tests for BatchProcessor queue machinery (Phase 2):
 *  - kick() due-now scheduling
 *  - time_budget() bounds
 *  - claim_batch() atomic claiming + worker disjointness + job_type filtering
 *  - recover_stale_rows()
 *  - drain_migration_queue(): happy path, retries, permanent failure,
 *    failed-row preservation, pause flag
 *  - process_batch() transient lock
 *
 * Uses a FakeWpdb that emulates the two queue tables against the exact SQL
 * shapes BatchProcessor issues. Run: php tests/test-batch-processor.php
 */

require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/fake-wpdb.php';
require_once __DIR__ . '/../includes/class-batch-processor.php';

use R2Offload\AttachmentSync;
use R2Offload\BatchProcessor;
use R2Offload\ErrorLogger;
use R2Offload\R2Client;
use R2Offload\Settings;

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
// FakeWpdb — in-memory queue tables, parses the exact SQL BatchProcessor uses
// =========================================================================

class FakeWpdb {
    public string $prefix   = 'wp_';
    public string $posts    = 'wp_posts';
    public string $postmeta = 'wp_postmeta';
    public array $tables    = []; // table => [ id => assoc row ]
    private array $auto     = [];

    public function seed( string $table, array $row ): int {
        $id  = $this->auto[ $table ] = ( $this->auto[ $table ] ?? 0 ) + 1;
        $row = array_merge( [
            'id'            => $id,
            'attachment_id' => 0,
            'job_type'      => null,
            'status'        => 'pending',
            'retry_count'   => 0,
            'claimed_by'    => null,
            'error_message' => null,
            'created_at'    => '2026-01-01 00:00:00',
            'updated_at'    => '2026-01-01 00:00:00',
        ], $row, [ 'id' => $id ] );
        $this->tables[ $table ][ $id ] = $row;
        return $id;
    }

    public function rows( string $table ): array {
        return array_values( $this->tables[ $table ] ?? [] );
    }

    public function prepare( string $query, ...$args ): string {
        if ( isset( $args[0] ) && is_array( $args[0] ) ) {
            $args = $args[0];
        }
        $i = 0;
        return (string) preg_replace_callback(
            '/%[sd]/',
            function ( $m ) use ( &$i, $args ) {
                $v = $args[ $i++ ];
                return $m[0] === '%d' ? (string) (int) $v : "'" . (string) $v . "'";
            },
            $query
        );
    }

    public function query( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );

        if ( preg_match( '/^TRUNCATE TABLE `?(\w+)`?$/i', $sql, $m ) ) {
            $n = count( $this->tables[ $m[1] ] ?? [] );
            $this->tables[ $m[1] ] = [];
            return $n;
        }

        if ( preg_match( '/^DELETE FROM `?(\w+)`? WHERE (.+)$/i', $sql, $m ) ) {
            $n = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $id => $row ) {
                if ( $this->match( $row, $m[2] ) ) {
                    unset( $this->tables[ $m[1] ][ $id ] );
                    $n++;
                }
            }
            return $n;
        }

        if ( preg_match( '/^UPDATE `?(\w+)`? SET (.+?) WHERE (.+?)(?: ORDER BY id ASC)?(?: LIMIT (\d+))?$/i', $sql, $m ) ) {
            $set   = $this->parse_assignments( $m[2] );
            $limit = isset( $m[4] ) && $m[4] !== '' ? (int) $m[4] : PHP_INT_MAX;
            $n     = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $id => $row ) {
                if ( $n >= $limit ) {
                    break;
                }
                if ( $this->match( $row, $m[3] ) ) {
                    $this->tables[ $m[1] ][ $id ] = array_merge( $row, $set );
                    $n++;
                }
            }
            return $n;
        }

        throw new RuntimeException( "FakeWpdb cannot parse query: {$sql}" );
    }

    public function get_var( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );
        if ( preg_match( '/^SELECT COUNT\(\*\) FROM `?(\w+)`?(?: WHERE (.+))?$/i', $sql, $m ) ) {
            $n = 0;
            foreach ( $this->tables[ $m[1] ] ?? [] as $row ) {
                if ( ! isset( $m[2] ) || $this->match( $row, $m[2] ) ) {
                    $n++;
                }
            }
            return (string) $n;
        }
        throw new RuntimeException( "FakeWpdb cannot parse get_var: {$sql}" );
    }

    public function get_results( string $sql ) {
        $sql = trim( (string) preg_replace( '/\s+/', ' ', $sql ) );
        if ( preg_match( '/^SELECT \* FROM `?(\w+)`? WHERE (.+?)(?: ORDER BY id ASC)?$/i', $sql, $m ) ) {
            $out = [];
            foreach ( $this->tables[ $m[1] ] ?? [] as $row ) {
                if ( $this->match( $row, $m[2] ) ) {
                    $out[] = (object) $row;
                }
            }
            return $out;
        }
        throw new RuntimeException( "FakeWpdb cannot parse get_results: {$sql}" );
    }

    public function update( string $table, array $data, array $where, $format = null, $where_format = null ): int {
        $n = 0;
        foreach ( $this->tables[ $table ] ?? [] as $id => $row ) {
            $ok = true;
            foreach ( $where as $col => $val ) {
                if ( (string) $row[ $col ] !== (string) $val ) {
                    $ok = false;
                    break;
                }
            }
            if ( $ok ) {
                $this->tables[ $table ][ $id ] = array_merge( $row, $data );
                $n++;
            }
        }
        return $n;
    }

    public function delete( string $table, array $where, $format = null ): int {
        $n = 0;
        foreach ( $this->tables[ $table ] ?? [] as $id => $row ) {
            $ok = true;
            foreach ( $where as $col => $val ) {
                if ( (string) $row[ $col ] !== (string) $val ) {
                    $ok = false;
                    break;
                }
            }
            if ( $ok ) {
                unset( $this->tables[ $table ][ $id ] );
                $n++;
            }
        }
        return $n;
    }

    private function parse_assignments( string $set ): array {
        $out = [];
        foreach ( preg_split( '/,\s*(?=\w+\s*=)/', $set ) as $pair ) {
            [ $col, $val ] = array_map( 'trim', explode( '=', $pair, 2 ) );
            if ( strcasecmp( $val, 'NULL' ) === 0 ) {
                $out[ $col ] = null;
            } elseif ( preg_match( "/^'(.*)'$/s", $val, $m ) ) {
                $out[ $col ] = $m[1];
            } else {
                $out[ $col ] = (int) $val;
            }
        }
        return $out;
    }

    private function match( array $row, string $where ): bool {
        foreach ( preg_split( '/ AND /i', $where ) as $cond ) {
            $cond = trim( $cond );
            if ( preg_match( "/^(\w+) = '([^']*)'$/", $cond, $m ) ) {
                if ( (string) $row[ $m[1] ] !== $m[2] ) {
                    return false;
                }
            } elseif ( preg_match( "/^(\w+) < '([^']*)'$/", $cond, $m ) ) {
                if ( ! ( (string) $row[ $m[1] ] < $m[2] ) ) {
                    return false;
                }
            } elseif ( preg_match( '/^(\w+) IN \(([^)]*)\)$/i', $cond, $m ) ) {
                $vals = array_map( fn( $v ) => trim( trim( $v ), "'" ), explode( ',', $m[2] ) );
                if ( ! in_array( (string) $row[ $m[1] ], $vals, true ) ) {
                    return false;
                }
            } else {
                throw new RuntimeException( "FakeWpdb cannot evaluate condition: {$cond}" );
            }
        }
        return true;
    }
}

// =========================================================================
// ScriptedSync — per-attachment sync results, supports per-call sequences
// =========================================================================

class ScriptedSync extends AttachmentSync {
    /** @var array attachment_id => result array, or list of result arrays consumed per call */
    public array $script = [];
    public array $calls  = [];

    public function sync_attachment( int $attachment_id ): array {
        $this->calls[] = $attachment_id;
        $default = [ 'uploaded' => 1, 'failed' => 0, 'skipped' => 0, 'missing' => 0 ];
        if ( ! isset( $this->script[ $attachment_id ] ) ) {
            return $default;
        }
        $entry = $this->script[ $attachment_id ];
        if ( isset( $entry[0] ) && is_array( $entry[0] ) ) {
            // Sequence: consume one result per call, repeat the last forever.
            $next = count( $entry ) > 1 ? array_shift( $this->script[ $attachment_id ] ) : $entry[0];
            return $next;
        }
        return $entry;
    }
}

// =========================================================================
// Helpers
// =========================================================================

const MIGRATION_TABLE = 'wp_r2_offload_migration_queue';
const BULK_TABLE      = 'wp_r2_offload_bulk_queue';

const SYNC_OK   = [ 'uploaded' => 1, 'failed' => 0, 'skipped' => 0, 'missing' => 0 ];
const SYNC_FAIL = [ 'uploaded' => 0, 'failed' => 1, 'skipped' => 0, 'missing' => 0 ];

function reset_state(): void {
    $GLOBALS['__wp_postmeta']       = [];
    $GLOBALS['__wp_options']        = [];
    $GLOBALS['__wp_transients']     = [];
    $GLOBALS['__wp_cron_scheduled'] = [];
    $GLOBALS['__wp_next_scheduled'] = [];
    $GLOBALS['__wp_cron_spawned']   = 0;
    $GLOBALS['__wp_actions_fired']  = [];
    $GLOBALS['wpdb']                = new FakeWpdb();
}

function make_processor( ?ScriptedSync $sync = null ): array {
    $sync = $sync ?? new ScriptedSync( new R2Client(), new Settings(), new ErrorLogger() );
    $bp   = new BatchProcessor( $sync, new Settings(), new ErrorLogger() );
    return [ $bp, $sync ];
}

function call_private( object $obj, string $method, ...$args ) {
    return ( new ReflectionMethod( $obj, $method ) )->invoke( $obj, ...$args );
}

function action_fired( string $hook ): bool {
    foreach ( $GLOBALS['__wp_actions_fired'] ?? [] as $a ) {
        if ( $a['hook'] === $hook ) {
            return true;
        }
    }
    return false;
}

// =========================================================================
// Test Cases
// =========================================================================

$t = new TestRunner();

// -------------------------------------------------------------------------
echo "\n--- SECTION 1: kick() ---\n\n";

echo "Test 1.1: kick schedules due-now and spawns cron\n";
reset_state();
BatchProcessor::kick( 'r2_test_hook' );
$scheduled = $GLOBALS['__wp_cron_scheduled'];
$t->assertEqual( 1, count( $scheduled ), '1.1a: one event scheduled' );
$t->assertEqual( 'r2_test_hook', $scheduled[0]['hook'], '1.1b: correct hook' );
$t->assert( $scheduled[0]['time'] <= time(), '1.1c: scheduled due-now, not in the future' );
$t->assertEqual( 1, $GLOBALS['__wp_cron_spawned'], '1.1d: spawn_cron called' );

echo "\nTest 1.2: kick does not double-schedule but still spawns\n";
$GLOBALS['__wp_next_scheduled']['r2_test_hook'] = time() + 100;
BatchProcessor::kick( 'r2_test_hook' );
$t->assertEqual( 1, count( $GLOBALS['__wp_cron_scheduled'] ), '1.2a: no duplicate event' );
$t->assertEqual( 2, $GLOBALS['__wp_cron_spawned'], '1.2b: spawn_cron still called' );

// -------------------------------------------------------------------------
echo "\n--- SECTION 2: time_budget() ---\n\n";

echo "Test 2.1: unlimited environment (CLI) gets the 240s cap\n";
reset_state();
[ $bp ] = make_processor();
// PHP CLI runs with max_execution_time=0 → branch returns the 240 cap.
$t->assertEqual( 240, call_private( $bp, 'time_budget' ), '2.1a: budget capped at 240 (< LOCK_TTL 300)' );
$t->assert( call_private( $bp, 'time_budget' ) < BatchProcessor::LOCK_TTL, '2.1b: budget below stale-recovery cutoff' );

// -------------------------------------------------------------------------
echo "\n--- SECTION 3: claim_batch() ---\n\n";

echo "Test 3.1: claims pending rows up to limit, sets processing + token\n";
reset_state();
[ $bp ] = make_processor();
$db = $GLOBALS['wpdb'];
for ( $i = 1; $i <= 5; $i++ ) {
    $db->seed( MIGRATION_TABLE, [ 'attachment_id' => 100 + $i ] );
}
$claimed = call_private( $bp, 'claim_batch', MIGRATION_TABLE, null, 3 );
$t->assertEqual( 3, count( $claimed ), '3.1a: claimed exactly 3 rows' );
$t->assertEqual( [ 1, 2, 3 ], array_map( fn( $r ) => (int) $r->id, $claimed ), '3.1b: lowest ids first' );
$t->assert( $claimed[0]->claimed_by !== null && $claimed[0]->claimed_by !== '', '3.1c: token set' );
$t->assertEqual( 'processing', $claimed[0]->status, '3.1d: status=processing' );
$still_pending = array_filter( $db->rows( MIGRATION_TABLE ), fn( $r ) => $r['status'] === 'pending' );
$t->assertEqual( 2, count( $still_pending ), '3.1e: 2 rows remain pending' );

echo "\nTest 3.2: two workers claim disjoint sets\n";
$claimed2 = call_private( $bp, 'claim_batch', MIGRATION_TABLE, null, 3 );
$ids1 = array_map( fn( $r ) => (int) $r->id, $claimed );
$ids2 = array_map( fn( $r ) => (int) $r->id, $claimed2 );
$t->assertEqual( 2, count( $claimed2 ), '3.2a: second worker gets the remaining 2' );
$t->assertEqual( [], array_intersect( $ids1, $ids2 ), '3.2b: no overlap between workers' );
$t->assert( $claimed[0]->claimed_by !== $claimed2[0]->claimed_by, '3.2c: distinct tokens' );

echo "\nTest 3.3: empty queue claims nothing\n";
$claimed3 = call_private( $bp, 'claim_batch', MIGRATION_TABLE, null, 3 );
$t->assertEqual( [], $claimed3, '3.3a: nothing left to claim' );

echo "\nTest 3.4: bulk queue claim filters by job_type\n";
reset_state();
[ $bp ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( BULK_TABLE, [ 'attachment_id' => 201, 'job_type' => 'restore' ] );
$db->seed( BULK_TABLE, [ 'attachment_id' => 202, 'job_type' => 'desync' ] );
$db->seed( BULK_TABLE, [ 'attachment_id' => 203, 'job_type' => 'restore' ] );
$claimed = call_private( $bp, 'claim_batch', BULK_TABLE, 'restore', 10 );
$t->assertEqual( 2, count( $claimed ), '3.4a: only restore rows claimed' );
$t->assertEqual( [ 201, 203 ], array_map( fn( $r ) => (int) $r->attachment_id, $claimed ), '3.4b: correct attachments' );
$desync_row = $db->rows( BULK_TABLE )[1];
$t->assertEqual( 'pending', $desync_row['status'], '3.4c: desync row untouched' );

// -------------------------------------------------------------------------
echo "\n--- SECTION 4: recover_stale_rows() ---\n\n";

echo "Test 4.1: stale processing rows reset to pending, fresh ones kept\n";
reset_state();
[ $bp ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 301, 'status' => 'processing', 'claimed_by' => 'deadbeef', 'updated_at' => '2020-01-01 00:00:00' ] );
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 302, 'status' => 'processing', 'claimed_by' => 'cafebabe', 'updated_at' => gmdate( 'Y-m-d H:i:s', time() + 1000 ) ] );
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 303, 'status' => 'complete' ] );
call_private( $bp, 'recover_stale_rows', MIGRATION_TABLE, null );
$rows = $db->rows( MIGRATION_TABLE );
$t->assertEqual( 'pending', $rows[0]['status'], '4.1a: stale row reset to pending' );
$t->assertEqual( null, $rows[0]['claimed_by'], '4.1b: stale row claim token cleared' );
$t->assertEqual( 'processing', $rows[1]['status'], '4.1c: fresh processing row untouched' );
$t->assertEqual( 'complete', $rows[2]['status'], '4.1d: complete row untouched' );

// -------------------------------------------------------------------------
echo "\n--- SECTION 5: drain_migration_queue() ---\n\n";

echo "Test 5.1: happy path — drains everything, cleans up, fires action\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
for ( $i = 1; $i <= 12; $i++ ) {
    $db->seed( MIGRATION_TABLE, [ 'attachment_id' => 400 + $i ] );
}
$ticks = 0;
$stats = $bp->drain_migration_queue( function () use ( &$ticks ) { $ticks++; } );
$t->assertEqual( 12, $stats['complete'], '5.1a: 12 successful' );
$t->assertEqual( 0, $stats['failed'], '5.1b: no failures' );
$t->assertEqual( 0, $stats['failed_rows'], '5.1c: no failed rows' );
$t->assertEqual( 12, $ticks, '5.1d: on_item callback fired per item' );
$t->assertEqual( 12, count( $sync->calls ), '5.1e: sync called once per attachment' );
$t->assertEqual( [], $db->rows( MIGRATION_TABLE ), '5.1f: table truncated after full success' );
$t->assert( action_fired( 'r2_offload_migration_complete' ), '5.1g: complete action fired' );

echo "\nTest 5.2: transient failure retries within the drain, then succeeds\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 501 ] );
$sync->script[501] = [ SYNC_FAIL, SYNC_OK ]; // fail once, then succeed
$stats = $bp->drain_migration_queue();
$t->assertEqual( 1, $stats['complete'], '5.2a: eventually succeeded' );
$t->assertEqual( 1, $stats['failed'], '5.2b: one failed attempt counted' );
$t->assertEqual( 0, $stats['failed_rows'], '5.2c: no permanently failed rows' );
$t->assertEqual( 2, count( $sync->calls ), '5.2d: sync attempted twice' );
$t->assertEqual( [], $db->rows( MIGRATION_TABLE ), '5.2e: table cleaned up' );

echo "\nTest 5.3: permanent failure — 3 attempts, failed row preserved for retry\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 601 ] );
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 602 ] );
$sync->script[601] = SYNC_FAIL; // fails every attempt
$stats = $bp->drain_migration_queue();
$t->assertEqual( 1, $stats['complete'], '5.3a: healthy attachment completed' );
$t->assertEqual( 3, $stats['failed'], '5.3b: 3 failed attempts (max retries)' );
$t->assertEqual( 1, $stats['failed_rows'], '5.3c: 1 permanently failed row reported' );
$rows = $db->rows( MIGRATION_TABLE );
$t->assertEqual( 1, count( $rows ), '5.3d: only the failed row survives cleanup' );
$t->assertEqual( 'failed', $rows[0]['status'], '5.3e: status=failed' );
$t->assertEqual( 3, (int) $rows[0]['retry_count'], '5.3f: retry_count=3' );
$t->assert( ! empty( $rows[0]['error_message'] ), '5.3g: error_message recorded' );
$t->assert( action_fired( 'r2_offload_migration_complete' ), '5.3h: complete action still fired' );

echo "\nTest 5.4: 'nothing happened' (not configured) treated as failure, not success\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 701 ] );
$sync->script[701] = [ 'uploaded' => 0, 'failed' => 0, 'skipped' => 0, 'missing' => 0 ];
$stats = $bp->drain_migration_queue();
$t->assertEqual( 0, $stats['complete'], '5.4a: not counted as success' );
$t->assertEqual( 1, $stats['failed_rows'], '5.4b: row ends up failed' );
$rows = $db->rows( MIGRATION_TABLE );
$t->assert( strpos( (string) $rows[0]['error_message'], 'not configured' ) !== false, '5.4c: error message explains why' );

echo "\nTest 5.5: pause flag stops the drain immediately\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 801 ] );
update_option( 'r2_offload_migration_paused', 1 );
$stats = $bp->drain_migration_queue();
$t->assertEqual( 0, $stats['complete'] + $stats['failed'], '5.5a: nothing processed while paused' );
$t->assertEqual( 0, count( $sync->calls ), '5.5b: sync never called' );
$t->assertEqual( 'pending', $db->rows( MIGRATION_TABLE )[0]['status'], '5.5c: row still pending' );
$t->assert( ! action_fired( 'r2_offload_migration_complete' ), '5.5d: complete action NOT fired' );

echo "\nTest 5.6: drain recovers stale rows from a dead worker first\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 901, 'status' => 'processing', 'claimed_by' => 'deadworker', 'updated_at' => '2020-01-01 00:00:00' ] );
$stats = $bp->drain_migration_queue();
$t->assertEqual( 1, $stats['complete'], '5.6a: stale row recovered and processed' );
$t->assertEqual( [ 901 ], $sync->calls, '5.6b: correct attachment synced' );

// -------------------------------------------------------------------------
echo "\n--- SECTION 6: process_batch() lock + end-to-end cron run ---\n\n";

echo "Test 6.1: transient lock prevents overlapping cron runs\n";
reset_state();
[ $bp, $sync ] = make_processor();
$db = $GLOBALS['wpdb'];
$db->seed( MIGRATION_TABLE, [ 'attachment_id' => 1001 ] );
set_transient( BatchProcessor::LOCK_KEY, 1, 300 );
$bp->process_batch();
$t->assertEqual( 0, count( $sync->calls ), '6.1a: locked run processes nothing' );
$t->assertEqual( 'pending', $db->rows( MIGRATION_TABLE )[0]['status'], '6.1b: row untouched' );

echo "\nTest 6.2: unlocked cron run drains the queue and releases the lock\n";
delete_transient( BatchProcessor::LOCK_KEY );
$bp->process_batch();
$t->assertEqual( [ 1001 ], $sync->calls, '6.2a: attachment processed' );
$t->assertEqual( [], $db->rows( MIGRATION_TABLE ), '6.2b: queue drained and cleaned' );
$t->assertEqual( false, get_transient( BatchProcessor::LOCK_KEY ), '6.2c: lock released after run' );
$t->assert( action_fired( 'r2_offload_migration_complete' ), '6.2d: complete action fired' );

// -------------------------------------------------------------------------

exit( $t->summary() );
