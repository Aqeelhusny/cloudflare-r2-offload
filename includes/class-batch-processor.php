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
    const LOCK_KEY          = 'r2_offload_batch_lock';
    const RESTORE_LOCK_KEY  = 'r2_offload_restore_lock';
    const LOCAL_DEL_LOCK    = 'r2_offload_local_del_lock';
    const DESYNC_LOCK       = 'r2_offload_desync_lock';
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
    }

    /**
     * Process one batch of queued attachments.
     * Self-reschedules if items remain.
     */
    public function process_batch(): void {
        // Check pause flag.
        if ( get_option( 'r2_offload_migration_paused' ) ) {
            return;
        }

        // Acquire transient lock to prevent overlapping runs.
        if ( get_transient( self::LOCK_KEY ) ) {
            return;
        }
        set_transient( self::LOCK_KEY, 1, self::LOCK_TTL );

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
            $ids_int      = array_map( fn( $item ) => (int) $item->id, $items );
            $placeholders = implode( ',', array_fill( 0, count( $ids_int ), '%d' ) );
            // phpcs:ignore WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
            $wpdb->query(
                $wpdb->prepare(
                    "UPDATE `{$table}` SET status = 'processing', updated_at = %s WHERE id IN ({$placeholders})",
                    array_merge( [ $now ], $ids_int )
                )
            );

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

                // Flush object cache to manage memory on large migrations.
                if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                    wp_cache_flush_runtime();
                } else {
                    wp_cache_flush();
                }

                $result   = $this->sync->sync_attachment( $attachment_id );
                $item_now = current_time( 'mysql', true );

                $is_success = $result['failed'] === 0 && ( $result['uploaded'] > 0 || $result['skipped'] > 0 );
                $is_nothing = $result['uploaded'] === 0 && $result['failed'] === 0 && $result['skipped'] === 0;

                if ( $is_success && ! $is_nothing ) {
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
                    $error_msg   = $is_nothing
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
        $wpdb->query( "TRUNCATE TABLE `{$table}`" );
        delete_option( 'r2_offload_migration_paused' );
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
            $this->run_restore_batch();
        } finally {
            delete_transient( self::RESTORE_LOCK_KEY );
        }
    }

    private function run_restore_batch(): void {
        $queue      = (array) get_option( 'r2_offload_restore_queue', [] );
        $batch_size = $this->settings->get_batch_size();
        $batch      = array_splice( $queue, 0, $batch_size );

        if ( empty( $batch ) ) {
            $this->cleanup_restore_options();
            do_action( 'r2_offload_restore_complete' );
            $this->logger->info( 'Bulk restore complete.' );
            return;
        }

        // Persist the remaining queue immediately.
        update_option( 'r2_offload_restore_queue', $queue, false );

        $done   = (int) get_option( 'r2_offload_restore_done',   0 );
        $failed = (int) get_option( 'r2_offload_restore_failed', 0 );

        foreach ( $batch as $attachment_id ) {
            if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                wp_cache_flush_runtime();
            }

            $result = $this->sync->restore_from_r2( (int) $attachment_id );
            if ( $result['failed'] > 0 ) {
                $failed++;
            } else {
                $done++;
            }
        }

        update_option( 'r2_offload_restore_done',   $done,   false );
        update_option( 'r2_offload_restore_failed', $failed, false );

        if ( ! empty( $queue ) ) {
            wp_schedule_single_event( time() + 5, self::RESTORE_HOOK );
        } else {
            $this->cleanup_restore_options();
            do_action( 'r2_offload_restore_complete' );
            $this->logger->info( 'Bulk restore complete.', [ 'done' => $done, 'failed' => $failed ] );
        }
    }

    private function cleanup_restore_options(): void {
        delete_option( 'r2_offload_restore_queue' );
        delete_option( 'r2_offload_restore_total' );
        delete_option( 'r2_offload_restore_done' );
        delete_option( 'r2_offload_restore_failed' );
        delete_option( 'r2_offload_restore_paused' );
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
            $this->run_local_delete_batch();
        } finally {
            delete_transient( self::LOCAL_DEL_LOCK );
        }
    }

    private function run_local_delete_batch(): void {
        $queue      = (array) get_option( 'r2_offload_local_del_queue', [] );
        $batch_size = $this->settings->get_batch_size();
        $batch      = array_splice( $queue, 0, $batch_size );

        if ( empty( $batch ) ) {
            $this->cleanup_local_del_options();
            do_action( 'r2_offload_local_delete_complete' );
            $this->logger->info( 'Bulk local-delete complete.' );
            return;
        }

        update_option( 'r2_offload_local_del_queue', $queue, false );

        $done   = (int) get_option( 'r2_offload_local_del_done',   0 );
        $failed = (int) get_option( 'r2_offload_local_del_failed', 0 );

        foreach ( $batch as $attachment_id ) {
            if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                wp_cache_flush_runtime();
            }

            $result = $this->sync->delete_local_for_attachment( (int) $attachment_id );
            $done++;
        }

        update_option( 'r2_offload_local_del_done',   $done,   false );
        update_option( 'r2_offload_local_del_failed', $failed, false );

        if ( ! empty( $queue ) ) {
            wp_schedule_single_event( time() + 5, self::LOCAL_DEL_HOOK );
        } else {
            $this->cleanup_local_del_options();
            do_action( 'r2_offload_local_delete_complete' );
            $this->logger->info( 'Bulk local-delete complete.', [ 'done' => $done ] );
        }
    }

    private function cleanup_local_del_options(): void {
        delete_option( 'r2_offload_local_del_queue' );
        delete_option( 'r2_offload_local_del_total' );
        delete_option( 'r2_offload_local_del_done' );
        delete_option( 'r2_offload_local_del_failed' );
        delete_option( 'r2_offload_local_del_paused' );
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
            $this->run_desync_batch();
        } finally {
            delete_transient( self::DESYNC_LOCK );
        }
    }

    private function run_desync_batch(): void {
        $queue      = (array) get_option( 'r2_offload_desync_queue', [] );
        $batch_size = $this->settings->get_batch_size();
        $batch      = array_splice( $queue, 0, $batch_size );

        if ( empty( $batch ) ) {
            $this->cleanup_desync_options();
            do_action( 'r2_offload_desync_complete' );
            $this->logger->info( 'Bulk restore & desync complete.' );
            return;
        }

        update_option( 'r2_offload_desync_queue', $queue, false );

        $done   = (int) get_option( 'r2_offload_desync_done',   0 );
        $failed = (int) get_option( 'r2_offload_desync_failed', 0 );

        foreach ( $batch as $attachment_id ) {
            if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                wp_cache_flush_runtime();
            }

            $result = $this->sync->restore_and_desync_attachment( (int) $attachment_id );
            if ( $result['desynced'] ) {
                $done++;
            } else {
                $failed++;
            }
        }

        update_option( 'r2_offload_desync_done',   $done,   false );
        update_option( 'r2_offload_desync_failed', $failed, false );

        if ( ! empty( $queue ) ) {
            wp_schedule_single_event( time() + 5, self::DESYNC_HOOK );
        } else {
            $this->cleanup_desync_options();
            do_action( 'r2_offload_desync_complete' );
            $this->logger->info( 'Bulk restore & desync complete.', [ 'done' => $done, 'failed' => $failed ] );
        }
    }

    private function cleanup_desync_options(): void {
        delete_option( 'r2_offload_desync_queue' );
        delete_option( 'r2_offload_desync_total' );
        delete_option( 'r2_offload_desync_done' );
        delete_option( 'r2_offload_desync_failed' );
        delete_option( 'r2_offload_desync_paused' );
    }
}
