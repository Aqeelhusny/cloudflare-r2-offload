<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * WP-Cron powered background batch processor for the migration queue.
 */
class BatchProcessor {

    private AttachmentSync $sync;
    private Settings       $settings;
    private ErrorLogger    $logger;

    const CRON_HOOK         = 'r2_offload_process_batch';
    const RESTORE_HOOK      = 'r2_offload_process_restore_batch';
    const LOCAL_DEL_HOOK    = 'r2_offload_process_local_delete_batch';
    const DESYNC_HOOK       = 'r2_offload_process_desync_batch';
    const VALIDATE_HOOK     = 'r2_offload_process_validate_batch';
    const LOCK_KEY          = 'r2_offload_batch_lock';
    const RESTORE_LOCK_KEY  = 'r2_offload_restore_lock';
    const LOCAL_DEL_LOCK    = 'r2_offload_local_del_lock';
    const DESYNC_LOCK       = 'r2_offload_desync_lock';
    const VALIDATE_LOCK     = 'r2_offload_validate_lock';
    const LOCK_TTL          = 300; // 5 minutes — also the stale-row recovery cutoff

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    /** Swap in a fresh AttachmentSync (after credentials change) without re-registering hooks. */
    public function set_sync( AttachmentSync $sync ): void {
        $this->sync = $sync;
    }

    /**
     * Schedule a cron hook to run NOW and spawn the cron runner immediately.
     *
     * spawn_cron() only fires events that are already due — the old pattern of
     * scheduling at time()+N then spawning was a no-op until the next visitor
     * happened to hit the site. Scheduling at time() makes the event due, so
     * the non-blocking loopback request actually starts the batch.
     */
    public static function kick( string $hook ): void {
        if ( ! wp_next_scheduled( $hook ) ) {
            wp_schedule_single_event( time(), $hook );
        }
        spawn_cron();
    }

    /**
     * Seconds this run may spend before rescheduling.
     *
     * Derived from max_execution_time instead of a hard-coded 50s, and capped
     * below LOCK_TTL so stale-row recovery can never steal rows from a worker
     * that is still alive. Unlimited environments (CLI, max_execution_time=0)
     * get the cap.
     */
    private function time_budget(): int {
        $limit  = (int) ini_get( 'max_execution_time' );
        $budget = $limit > 0 ? $limit - 10 : 240;
        return max( 20, min( $budget, 240 ) );
    }

    public function register_hooks(): void {
        add_action( self::CRON_HOOK,      [ $this, 'process_batch' ] );
        add_action( self::RESTORE_HOOK,   [ $this, 'process_restore_batch' ] );
        add_action( self::LOCAL_DEL_HOOK, [ $this, 'process_local_delete_batch' ] );
        add_action( self::DESYNC_HOOK,    [ $this, 'process_desync_batch' ] );
        add_action( self::VALIDATE_HOOK,  [ $this, 'process_validate_batch' ] );
    }

    /**
     * Process one batch of queued attachments.
     * Self-reschedules if items remain.
     */
    public function process_batch(): void {
        if ( get_option( 'r2_offload_migration_paused' ) ) {
            return;
        }
        if ( get_transient( self::LOCK_KEY ) ) {
            $this->logger->info( 'Migration batch: skipped — another instance is running (lock held).' );
            return;
        }
        set_transient( self::LOCK_KEY, 1, self::LOCK_TTL );
        $this->logger->info( 'Migration batch: cron fired, starting run.' );

        try {
            $this->run_batch();
        } finally {
            delete_transient( self::LOCK_KEY );
        }
    }

    /**
     * Process as many items as possible within MAX_EXECUTION_SEC.
     * Each iteration picks batch_size items, processes them, then loops
     * — so a single cron event can handle hundreds of items instead of
     * just 10. This makes 10K+ image migrations practical without
     * relying on rapid cron rescheduling.
     */
    private function run_batch(): void {
        global $wpdb;

        $table      = $wpdb->prefix . 'r2_offload_migration_queue';
        $batch_size = $this->settings->get_batch_size();
        $start_time = time();
        $budget     = $this->time_budget();
        $processed  = 0;

        // Recover rows stuck in 'processing' from a previous run that died or was paused
        // mid-batch. Without this, resume after pause sees an empty pending queue and
        // incorrectly reports migration complete while those rows remain unprocessed.
        $this->recover_stale_rows( $table, null );

        while ( ( time() - $start_time ) < $budget ) {
            // Check pause flag each iteration so pause takes effect mid-run.
            if ( get_option( 'r2_offload_migration_paused' ) ) {
                break;
            }

            $items = $this->claim_batch( $table, null, $batch_size );

            if ( empty( $items ) ) {
                // Queue fully drained.
                $this->cleanup_migration_table( $table );
                do_action( 'r2_offload_migration_complete' );
                $this->logger->info( 'Migration complete.', [ 'processed_this_run' => $processed ] );
                return;
            }

            foreach ( $items as $item ) {
                // Time guard inside the inner loop too.
                if ( ( time() - $start_time ) >= $budget ) {
                    // Revert unprocessed items back to pending.
                    $wpdb->update(
                        $table,
                        [ 'status' => 'pending', 'claimed_by' => null, 'updated_at' => current_time( 'mysql', true ) ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%s', '%s' ],
                        [ '%d' ]
                    );
                    continue;
                }

                $this->process_migration_item( $item, $table );

                // Flush object cache after processing to manage memory on large migrations.
                if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                    wp_cache_flush_runtime();
                } else {
                    wp_cache_flush();
                }

                $processed++;
            }
        }

        // Time limit reached but items remain — reschedule.
        $pending_count = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status = %s", 'pending' )
        );

        if ( $pending_count > 0 ) {
            $this->logger->info( 'Batch time limit reached, rescheduling.', [
                'processed_this_run' => $processed,
                'remaining'          => $pending_count,
            ] );
            self::kick( self::CRON_HOOK );
        } else {
            $this->cleanup_migration_table( $table );
            do_action( 'r2_offload_migration_complete' );
            $this->logger->info( 'Migration complete.', [ 'processed_this_run' => $processed ] );
        }
    }

    /**
     * Sync one claimed migration-queue row and write its terminal status.
     *
     * @return bool True when the attachment synced successfully.
     */
    private function process_migration_item( object $item, string $table ): bool {
        global $wpdb;

        $attachment_id = (int) $item->attachment_id;
        $result        = $this->sync->sync_attachment( $attachment_id );
        $item_now      = current_time( 'mysql', true );

        // Success: no failures and at least one file was uploaded or already on R2.
        // "Nothing happened" (all zeros) means plugin not configured/credentials bad — treat as failure.
        $is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );

        if ( $is_success ) {
            $wpdb->update(
                $table,
                [ 'status' => 'complete', 'claimed_by' => null, 'updated_at' => $item_now ],
                [ 'id' => (int) $item->id ],
                [ '%s', '%s', '%s' ],
                [ '%d' ]
            );
        } else {
            $retry_count = (int) $item->retry_count + 1;
            $new_status  = $retry_count >= 3 ? 'failed' : 'pending';
            $error_msg   = ( $result['uploaded'] === 0 && $result['failed'] === 0 )
                ? 'Skipped: plugin not configured or credentials invalid.'
                : "Uploaded: {$result['uploaded']}, Failed: {$result['failed']}";

            $wpdb->update(
                $table,
                [
                    'status'        => $new_status,
                    'claimed_by'    => null,
                    'retry_count'   => $retry_count,
                    'error_message' => $error_msg,
                    'updated_at'    => $item_now,
                ],
                [ 'id' => (int) $item->id ],
                [ '%s', '%s', '%d', '%s', '%s' ],
                [ '%d' ]
            );
        }

        return $is_success;
    }

    /**
     * Drain the migration queue in the current process until it is empty,
     * paused, or only terminally-failed rows remain. Used by the `wp r2
     * migrate` CLI command — no time budget, no cron, no transient lock
     * (atomic claiming makes concurrent workers safe).
     *
     * @param callable|null $on_item Called after each processed item:
     *                               fn( object $row, bool $success ).
     * @return array{ complete: int, failed: int, failed_rows: int }
     *               complete/failed count processing attempts this run (a row
     *               retried twice counts twice); failed_rows is the number of
     *               rows that exhausted their retries, captured BEFORE cleanup
     *               truncates the table.
     */
    public function drain_migration_queue( ?callable $on_item = null ): array {
        global $wpdb;

        $table      = $wpdb->prefix . 'r2_offload_migration_queue';
        $batch_size = $this->settings->get_batch_size();
        $stats      = [ 'complete' => 0, 'failed' => 0, 'failed_rows' => 0 ];

        $this->recover_stale_rows( $table, null );

        while ( true ) {
            if ( get_option( 'r2_offload_migration_paused' ) ) {
                break;
            }

            $items = $this->claim_batch( $table, null, $batch_size );
            if ( empty( $items ) ) {
                break;
            }

            foreach ( $items as $item ) {
                $ok = $this->process_migration_item( $item, $table );
                $stats[ $ok ? 'complete' : 'failed' ]++;

                if ( $on_item ) {
                    $on_item( $item, $ok );
                }

                if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                    wp_cache_flush_runtime();
                } else {
                    wp_cache_flush();
                }
            }
        }

        $pending = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status IN (%s, %s)", 'pending', 'processing' )
        );
        // Capture before cleanup — when the queue is fully drained, cleanup
        // truncates the table, which would erase the failed-row evidence.
        $stats['failed_rows'] = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status = %s", 'failed' )
        );
        if ( $pending === 0 ) {
            if ( $stats['failed_rows'] > 0 ) {
                // Keep failed rows so `wp r2 retry` (and the admin retry button)
                // can re-queue them — only clear the completed ones.
                $wpdb->query( $wpdb->prepare( "DELETE FROM `{$table}` WHERE status = %s", 'complete' ) );
            } else {
                $this->cleanup_migration_table( $table );
            }
            do_action( 'r2_offload_migration_complete' );
        }

        return $stats;
    }

    private function cleanup_migration_table( string $table ): void {
        global $wpdb;

        // Only delete completed/failed rows — new pending items may have been
        // inserted by background offload while this batch was running.
        $remaining = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status IN (%s, %s)", 'pending', 'processing' )
        );

        if ( $remaining === 0 ) {
            $wpdb->query( "TRUNCATE TABLE `{$table}`" );
            delete_option( 'r2_offload_migration_paused' );
        } else {
            $wpdb->query(
                $wpdb->prepare( "DELETE FROM `{$table}` WHERE status IN (%s, %s)", 'complete', 'failed' )
            );
        }
    }

    // =========================================================================
    // Bulk Restore batch — downloads files from R2 back to the server.
    // =========================================================================

    public function process_restore_batch(): void {
        if ( get_option( 'r2_offload_restore_paused' ) ) {
            return;
        }
        if ( get_transient( self::RESTORE_LOCK_KEY ) ) {
            return;
        }
        set_transient( self::RESTORE_LOCK_KEY, 1, self::LOCK_TTL );

        try {
            $this->run_bulk_batch( 'restore', self::RESTORE_HOOK, 'r2_offload_restore_paused', 'r2_offload_restore_complete' );
        } finally {
            delete_transient( self::RESTORE_LOCK_KEY );
        }
    }

    // =========================================================================
    // Bulk Local-Delete batch — removes local files for synced attachments.
    // =========================================================================

    public function process_local_delete_batch(): void {
        if ( get_option( 'r2_offload_local_del_paused' ) ) {
            return;
        }
        if ( get_transient( self::LOCAL_DEL_LOCK ) ) {
            return;
        }
        set_transient( self::LOCAL_DEL_LOCK, 1, self::LOCK_TTL );

        try {
            $this->run_bulk_batch( 'local_delete', self::LOCAL_DEL_HOOK, 'r2_offload_local_del_paused', 'r2_offload_local_delete_complete' );
        } finally {
            delete_transient( self::LOCAL_DEL_LOCK );
        }
    }

    // =========================================================================
    // Validate pre-uploaded batch — confirms manually-uploaded files exist in R2
    // and claims them as synced so migration skips them.
    // Uses HeadObject per expected key — only the exact keys under the configured
    // path prefix are checked, nothing else in the bucket is touched.
    // Safe to run alongside an active migration: validate_pre_uploaded() re-checks
    // _r2_offload_synced before writing meta, so concurrent migration wins are fine.
    // =========================================================================

    public function process_validate_batch(): void {
        if ( get_option( 'r2_offload_validate_paused' ) ) {
            $this->logger->info( 'Validate batch: skipped — paused.' );
            return;
        }
        if ( get_transient( self::VALIDATE_LOCK ) ) {
            $this->logger->info( 'Validate batch: skipped — another instance is running (lock held).' );
            return;
        }
        set_transient( self::VALIDATE_LOCK, 1, self::LOCK_TTL );
        $this->logger->info( 'Validate batch: cron fired, starting run.' );

        try {
            $this->run_bulk_batch( 'validate', self::VALIDATE_HOOK, 'r2_offload_validate_paused', 'r2_offload_validate_complete' );
        } finally {
            delete_transient( self::VALIDATE_LOCK );
        }
    }

    // =========================================================================
    // Bulk Desync batch — restore from R2, verify, then delete from R2.
    // =========================================================================

    public function process_desync_batch(): void {
        if ( get_option( 'r2_offload_desync_paused' ) ) {
            return;
        }
        if ( get_transient( self::DESYNC_LOCK ) ) {
            return;
        }
        set_transient( self::DESYNC_LOCK, 1, self::LOCK_TTL );

        try {
            $this->run_bulk_batch( 'desync', self::DESYNC_HOOK, 'r2_offload_desync_paused', 'r2_offload_desync_complete' );
        } finally {
            delete_transient( self::DESYNC_LOCK );
        }
    }

    // =========================================================================
    // Unified bulk batch processor — reads from r2_offload_bulk_queue table.
    // Replaces option-based array queues that OOM at 641K+ scale.
    // =========================================================================

    private function run_bulk_batch( string $job_type, string $cron_hook, string $pause_option, string $complete_action ): void {
        global $wpdb;

        $table      = $wpdb->prefix . 'r2_offload_bulk_queue';
        $batch_size = $this->settings->get_batch_size();
        $start_time = time();
        $budget     = $this->time_budget();
        $processed  = 0;

        // Stale-processing recovery: rows stuck in 'processing' for longer than
        // LOCK_TTL mean a previous cron run died mid-batch. Reset them to 'pending'
        // so they are picked up by this run rather than blocking it forever.
        $this->recover_stale_rows( $table, $job_type );

        while ( ( time() - $start_time ) < $budget ) {
            if ( get_option( $pause_option ) ) {
                break;
            }

            $items = $this->claim_batch( $table, $job_type, $batch_size );

            if ( empty( $items ) ) {
                $this->cleanup_bulk_queue( $table, $job_type, $pause_option );
                do_action( $complete_action );
                $this->logger->info( "Bulk {$job_type} complete.", [ 'processed_this_run' => $processed ] );
                return;
            }

            foreach ( $items as $item ) {
                if ( ( time() - $start_time ) >= $budget ) {
                    $wpdb->update(
                        $table,
                        [ 'status' => 'pending', 'claimed_by' => null, 'updated_at' => current_time( 'mysql', true ) ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%s', '%s' ],
                        [ '%d' ]
                    );
                    continue;
                }

                $attachment_id = (int) $item->attachment_id;
                $success       = false;
                $error_message = null;

                $requeue = false; // set true to leave row pending for a future run

                switch ( $job_type ) {
                    case 'restore':
                        $result  = $this->sync->restore_from_r2( $attachment_id );
                        $success = $result['failed'] === 0;
                        if ( ! $success ) {
                            $error_message = "Restored: {$result['restored']}, Failed: {$result['failed']}";
                        }
                        break;

                    case 'local_delete':
                        $result  = $this->sync->delete_local_for_attachment( $attachment_id );
                        // deleted > 0 OR skipped > 0 (files already gone) both mean success —
                        // the local copy is absent and the attachment is R2-only either way.
                        $success = $result['deleted'] > 0 || $result['skipped'] > 0;
                        break;

                    case 'desync':
                        $result  = $this->sync->restore_and_desync_attachment( $attachment_id );
                        $success = $result['desynced'];
                        if ( ! $success ) {
                            $error_message = "Restored: {$result['restored']}, Failed: {$result['failed']}";
                        }
                        break;

                    case 'validate':
                        $result  = $this->sync->validate_pre_uploaded( $attachment_id );
                        if ( $result['claimed'] > 0 ) {
                            // Confirmed present and claimed — done.
                            $success = true;
                        } elseif ( ! empty( $result['missing_keys'] ) ) {
                            // Confirmed absent — permanently failed for this run.
                            $success       = false;
                            $error_message = 'Missing in R2: ' . implode( ', ', $result['missing_keys'] );
                        } else {
                            // Skipped (already synced, excluded MIME, or API error) —
                            // mark complete so it doesn't count as a failure, but don't
                            // requeue: already-synced stays complete, API errors will be
                            // retried on the next validate run started by the admin.
                            $success = true;
                        }
                        break;
                }

                $row_data   = [ 'status' => $success ? 'complete' : 'failed', 'claimed_by' => null, 'updated_at' => current_time( 'mysql', true ) ];
                $row_format = [ '%s', '%s', '%s' ];
                if ( $error_message !== null ) {
                    $row_data['error_message'] = $error_message;
                    $row_format[]              = '%s';
                }

                $wpdb->update( $table, $row_data, [ 'id' => (int) $item->id ], $row_format, [ '%d' ] );
                $processed++;

                // Flush object cache after each item to control memory on large runs.
                if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                    wp_cache_flush_runtime();
                } else {
                    wp_cache_flush();
                }
            }
        }

        // Time limit reached — reschedule if items remain.
        $pending_count = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE job_type = %s AND status = 'pending'", $job_type )
        );

        if ( $pending_count > 0 ) {
            $this->logger->info( "Bulk {$job_type} batch time limit reached, rescheduling.", [
                'processed_this_run' => $processed,
                'remaining'          => $pending_count,
            ] );
            self::kick( $cron_hook );
        } else {
            $this->cleanup_bulk_queue( $table, $job_type, $pause_option );
            do_action( $complete_action );
            $this->logger->info( "Bulk {$job_type} complete.", [ 'processed_this_run' => $processed ] );
        }
    }

    /**
     * Atomically claim up to $limit pending rows for this worker.
     *
     * The single UPDATE with a per-call token is the claim — two workers
     * running concurrently (cron + CLI, or several CLI processes) can never
     * grab the same row, because each row's status flips to 'processing'
     * with exactly one claimed_by token. The follow-up SELECT then reads
     * back only the rows this worker won.
     *
     * @param string      $table    Fully-qualified queue table name.
     * @param string|null $job_type Bulk-queue job type, or null for the migration queue.
     * @param int         $limit    Maximum rows to claim.
     * @return object[]   The claimed rows (all columns).
     */
    private function claim_batch( string $table, ?string $job_type, int $limit ): array {
        global $wpdb;

        $token = substr( md5( uniqid( (string) getmypid(), true ) ), 0, 32 );
        $now   = current_time( 'mysql', true );

        if ( $job_type !== null ) {
            $wpdb->query(
                $wpdb->prepare(
                    "UPDATE `{$table}` SET status = 'processing', claimed_by = %s, updated_at = %s
                     WHERE job_type = %s AND status = 'pending' ORDER BY id ASC LIMIT %d",
                    $token, $now, $job_type, $limit
                )
            );
        } else {
            $wpdb->query(
                $wpdb->prepare(
                    "UPDATE `{$table}` SET status = 'processing', claimed_by = %s, updated_at = %s
                     WHERE status = 'pending' ORDER BY id ASC LIMIT %d",
                    $token, $now, $limit
                )
            );
        }

        return $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM `{$table}` WHERE claimed_by = %s AND status = 'processing' ORDER BY id ASC",
                $token
            )
        );
    }

    /**
     * Reset rows stuck in 'processing' longer than LOCK_TTL back to 'pending'.
     * A stale row means the worker that claimed it died mid-batch.
     *
     * @param string|null $job_type Bulk-queue job type, or null for the migration queue.
     */
    private function recover_stale_rows( string $table, ?string $job_type ): void {
        global $wpdb;

        $stale_cutoff = gmdate( 'Y-m-d H:i:s', time() - self::LOCK_TTL );
        $now          = current_time( 'mysql', true );

        if ( $job_type !== null ) {
            $recovered = $wpdb->query(
                $wpdb->prepare(
                    "UPDATE `{$table}` SET status = 'pending', claimed_by = NULL, updated_at = %s
                     WHERE job_type = %s AND status = 'processing' AND updated_at < %s",
                    $now, $job_type, $stale_cutoff
                )
            );
        } else {
            $recovered = $wpdb->query(
                $wpdb->prepare(
                    "UPDATE `{$table}` SET status = 'pending', claimed_by = NULL, updated_at = %s
                     WHERE status = 'processing' AND updated_at < %s",
                    $now, $stale_cutoff
                )
            );
        }

        if ( $recovered ) {
            $this->logger->info( 'Recovered stale processing rows.', [
                'table'    => $table,
                'job_type' => $job_type ?? 'migration',
                'count'    => $recovered,
            ] );
        }
    }

    private function cleanup_bulk_queue( string $table, string $job_type, string $pause_option ): void {
        global $wpdb;

        $remaining = (int) $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*) FROM `{$table}` WHERE job_type = %s AND status IN ('pending', 'processing')",
                $job_type
            )
        );

        if ( $remaining === 0 ) {
            $wpdb->delete( $table, [ 'job_type' => $job_type ], [ '%s' ] );
            delete_option( $pause_option );
        } else {
            $wpdb->query(
                $wpdb->prepare(
                    "DELETE FROM `{$table}` WHERE job_type = %s AND status IN ('complete', 'failed')",
                    $job_type
                )
            );
        }
    }
}
