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

    const CRON_HOOK  = 'r2_offload_process_batch';
    const LOCK_KEY   = 'r2_offload_batch_lock';
    const LOCK_TTL   = 300; // 5 minutes

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function register_hooks(): void {
        add_action( self::CRON_HOOK, [ $this, 'process_batch' ] );
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
}
