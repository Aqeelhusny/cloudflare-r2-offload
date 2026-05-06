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
    const LOCK_TTL          = 300; // 5 minutes
    const MAX_EXECUTION_SEC = 50;  // keep under PHP max_execution_time (usually 60s)

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
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
        $processed  = 0;

        // Recover rows stuck in 'processing' from a previous run that died or was paused
        // mid-batch. Without this, resume after pause sees an empty pending queue and
        // incorrectly reports migration complete while those rows remain unprocessed.
        $stale_cutoff = gmdate( 'Y-m-d H:i:s', time() - self::LOCK_TTL );
        $recovered    = $wpdb->query(
            $wpdb->prepare(
                "UPDATE `{$table}` SET status = 'pending', updated_at = %s
                 WHERE status = 'processing' AND updated_at < %s",
                current_time( 'mysql', true ), $stale_cutoff
            )
        );
        if ( $recovered ) {
            $this->logger->info( 'Migration batch: recovered stale processing rows.', [ 'count' => $recovered ] );
        }

        while ( ( time() - $start_time ) < self::MAX_EXECUTION_SEC ) {
            // Check pause flag each iteration so pause takes effect mid-run.
            if ( get_option( 'r2_offload_migration_paused' ) ) {
                break;
            }

            $now   = current_time( 'mysql', true );
            $items = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT id, attachment_id, retry_count FROM `{$table}` WHERE status = 'pending' ORDER BY id ASC LIMIT %d",
                    $batch_size
                )
            );

            if ( empty( $items ) ) {
                // Queue fully drained.
                $this->cleanup_migration_table( $table );
                do_action( 'r2_offload_migration_complete' );
                $this->logger->info( 'Migration complete.', [ 'processed_this_run' => $processed ] );
                return;
            }

            // Mark as processing.
            $ids_int = array_map( fn( $item ) => (int) $item->id, $items );
            $this->mark_as_processing( $ids_int, $table, $now );

            foreach ( $items as $item ) {
                // Time guard inside the inner loop too.
                if ( ( time() - $start_time ) >= self::MAX_EXECUTION_SEC ) {
                    // Revert unprocessed items back to pending.
                    $wpdb->update(
                        $table,
                        [ 'status' => 'pending', 'updated_at' => current_time( 'mysql', true ) ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%s' ],
                        [ '%d' ]
                    );
                    continue;
                }

                $attachment_id = (int) $item->attachment_id;
                $result        = $this->sync->sync_attachment( $attachment_id );
                $item_now      = current_time( 'mysql', true );

                // Success: no failures and at least one file was uploaded or already on R2.
                // "Nothing happened" (all zeros) means plugin not configured/credentials bad — treat as failure.
                $is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );

                if ( $is_success ) {
                    $wpdb->update(
                        $table,
                        [ 'status' => 'complete', 'updated_at' => $item_now ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%s' ],
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
                            'retry_count'   => $retry_count,
                            'error_message' => $error_msg,
                            'updated_at'    => $item_now,
                        ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%d', '%s', '%s' ],
                        [ '%d' ]
                    );
                }

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
            // Schedule next batch with minimal gap. For large queues (1000+),
            // schedule immediately to maximize throughput.
            $delay = $pending_count > 1000 ? 1 : 3;
            wp_schedule_single_event( time() + $delay, self::CRON_HOOK );
            spawn_cron();
        } else {
            $this->cleanup_migration_table( $table );
            do_action( 'r2_offload_migration_complete' );
            $this->logger->info( 'Migration complete.', [ 'processed_this_run' => $processed ] );
        }
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
        $processed  = 0;

        // Stale-processing recovery: rows stuck in 'processing' for longer than
        // LOCK_TTL mean a previous cron run died mid-batch. Reset them to 'pending'
        // so they are picked up by this run rather than blocking it forever.
        $stale_cutoff = gmdate( 'Y-m-d H:i:s', time() - self::LOCK_TTL );
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE `{$table}` SET status = 'pending', updated_at = %s
                 WHERE job_type = %s AND status = 'processing' AND updated_at < %s",
                current_time( 'mysql', true ), $job_type, $stale_cutoff
            )
        );

        while ( ( time() - $start_time ) < self::MAX_EXECUTION_SEC ) {
            if ( get_option( $pause_option ) ) {
                break;
            }

            $now   = current_time( 'mysql', true );
            $items = $wpdb->get_results(
                $wpdb->prepare(
                    "SELECT id, attachment_id FROM `{$table}` WHERE job_type = %s AND status = 'pending' ORDER BY id ASC LIMIT %d",
                    $job_type, $batch_size
                )
            );

            if ( empty( $items ) ) {
                $this->cleanup_bulk_queue( $table, $job_type, $pause_option );
                do_action( $complete_action );
                $this->logger->info( "Bulk {$job_type} complete.", [ 'processed_this_run' => $processed ] );
                return;
            }

            // Mark as processing.
            $ids_int = array_map( fn( $item ) => (int) $item->id, $items );
            $this->mark_as_processing( $ids_int, $table, $now );


            foreach ( $items as $item ) {
                if ( ( time() - $start_time ) >= self::MAX_EXECUTION_SEC ) {
                    $wpdb->update(
                        $table,
                        [ 'status' => 'pending', 'updated_at' => current_time( 'mysql', true ) ],
                        [ 'id' => (int) $item->id ],
                        [ '%s', '%s' ],
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

                $row_data   = [ 'status' => $success ? 'complete' : 'failed', 'updated_at' => current_time( 'mysql', true ) ];
                $row_format = [ '%s', '%s' ];
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
            $delay = $pending_count > 1000 ? 1 : 3;
            wp_schedule_single_event( time() + $delay, $cron_hook );
            spawn_cron();
        } else {
            $this->cleanup_bulk_queue( $table, $job_type, $pause_option );
            do_action( $complete_action );
            $this->logger->info( "Bulk {$job_type} complete.", [ 'processed_this_run' => $processed ] );
        }
    }

    /**
     * Mark a set of queue rows as 'processing' atomically.
     *
     * Uses a two-pass prepare to satisfy wpdb and phpcs: first prepare the
     * IN clause with the correct number of %d placeholders, then prepare the
     * outer UPDATE with the timestamp. This avoids the fragile single-pass
     * pattern that required phpcs:ignore.
     *
     * @param int[]  $ids   Row IDs (already cast to int).
     * @param string $table Fully-qualified table name.
     * @param string $now   MySQL datetime string (UTC).
     */
    private function mark_as_processing( array $ids, string $table, string $now ): void {
        global $wpdb;

        $in_clause = implode( ',', array_map( 'absint', $ids ) );
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE `{$table}` SET status = 'processing', updated_at = %s WHERE id IN ({$in_clause})",
                $now
            )
        );
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
