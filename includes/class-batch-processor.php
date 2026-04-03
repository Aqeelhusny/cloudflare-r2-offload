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
    const LOCK_KEY          = 'r2_offload_batch_lock';
    const RESTORE_LOCK_KEY  = 'r2_offload_restore_lock';
    const LOCAL_DEL_LOCK    = 'r2_offload_local_del_lock';
    const LOCK_TTL          = 300; // 5 minutes

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function register_hooks(): void {
        add_action( self::CRON_HOOK,      [ $this, 'process_batch' ] );
        add_action( self::RESTORE_HOOK,   [ $this, 'process_restore_batch' ] );
        add_action( self::LOCAL_DEL_HOOK, [ $this, 'process_local_delete_batch' ] );
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

    private function run_batch(): void {
        global $wpdb;

        $table      = $wpdb->prefix . 'r2_offload_migration_queue';
        $batch_size = $this->settings->get_batch_size();
        $now        = current_time( 'mysql', true );

        // Pick pending items.
        $items = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT id, attachment_id, retry_count FROM `{$table}` WHERE status = 'pending' LIMIT %d",
                $batch_size
            )
        );

        if ( empty( $items ) ) {
            // Queue is empty — migration complete.
            do_action( 'r2_offload_migration_complete' );
            $this->logger->info( 'Migration complete: queue drained.' );
            return;
        }

        // Mark as processing.
        $ids_sql = implode( ',', array_map( fn( $item ) => (int) $item->id, $items ) );
        $wpdb->query(
            "UPDATE `{$table}` SET status = 'processing', updated_at = '{$now}' WHERE id IN ({$ids_sql})"
        );

        foreach ( $items as $item ) {
            $attachment_id = (int) $item->attachment_id;

            // Manage memory on large migrations.
            if ( function_exists( 'wp_cache_flush_runtime' ) ) {
                wp_cache_flush_runtime();
            } else {
                wp_cache_flush();
            }

            $result = $this->sync->sync_attachment( $attachment_id );
            $item_now = current_time( 'mysql', true );

            if ( $result['failed'] === 0 && $result['uploaded'] >= 0 ) {
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
                $error_msg   = "Uploaded: {$result['uploaded']}, Failed: {$result['failed']}";

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
        }

        // Check if more pending items exist.
        $pending_count = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM `{$table}` WHERE status = 'pending'"
        );

        if ( $pending_count > 0 ) {
            // Schedule next batch in 5 seconds.
            wp_schedule_single_event( time() + 5, self::CRON_HOOK );
        } else {
            do_action( 'r2_offload_migration_complete' );
            $this->logger->info( 'Migration complete.' );
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
            $done  += $result['restored'];
            $failed += $result['failed'];
        }

        update_option( 'r2_offload_restore_done',   $done,   false );
        update_option( 'r2_offload_restore_failed', $failed, false );

        if ( ! empty( $queue ) ) {
            wp_schedule_single_event( time() + 5, self::RESTORE_HOOK );
        } else {
            do_action( 'r2_offload_restore_complete' );
            $this->logger->info( 'Bulk restore complete.', [ 'done' => $done, 'failed' => $failed ] );
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
            $done  += $result['deleted'];
        }

        update_option( 'r2_offload_local_del_done',   $done,   false );
        update_option( 'r2_offload_local_del_failed', $failed, false );

        if ( ! empty( $queue ) ) {
            wp_schedule_single_event( time() + 5, self::LOCAL_DEL_HOOK );
        } else {
            do_action( 'r2_offload_local_delete_complete' );
            $this->logger->info( 'Bulk local-delete complete.', [ 'done' => $done ] );
        }
    }
}
