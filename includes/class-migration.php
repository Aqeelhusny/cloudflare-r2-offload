<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Handles bulk migration of existing media library to R2.
 * Provides AJAX endpoints for the admin migration UI.
 */
class Migration {

    private AttachmentSync $sync;
    private Settings       $settings;
    private ErrorLogger    $logger;

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function register_hooks(): void {
        $actions = [
            'r2_offload_start_migration',
            'r2_offload_pause_migration',
            'r2_offload_resume_migration',
            'r2_offload_cancel_migration',
            'r2_offload_migration_status',
            'r2_offload_retry_failed',
            'r2_offload_test_connection',
            'r2_offload_delete_logs',
        ];
        foreach ( $actions as $action ) {
            add_action( "wp_ajax_{$action}", [ $this, 'handle_ajax' ] );
        }
    }

    public function handle_ajax(): void {
        $action = isset( $_REQUEST['action'] ) ? sanitize_key( $_REQUEST['action'] ) : '';
        $method = 'ajax_' . str_replace( 'r2_offload_', '', $action );

        if ( ! method_exists( $this, $method ) ) {
            wp_send_json_error( [ 'message' => 'Unknown action.' ], 400 );
        }

        check_ajax_referer( 'r2_offload_nonce', 'nonce' );

        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( [ 'message' => __( 'Unauthorized.', 'cloudflare-r2-offload' ) ], 403 );
        }

        $this->$method();
    }

    // -------------------------------------------------------------------------
    // AJAX handlers
    // -------------------------------------------------------------------------

    private function ajax_start_migration(): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_migration_queue';

        // Clear any existing queue first.
        $wpdb->query( "TRUNCATE TABLE `{$table}`" );
        delete_option( 'r2_offload_migration_paused' );

        // Find all attachments NOT yet synced.
        $ids = $wpdb->get_col(
            "SELECT ID FROM {$wpdb->posts}
             WHERE post_type = 'attachment'
               AND ID NOT IN (
                   SELECT post_id FROM {$wpdb->postmeta}
                   WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'
               )
             ORDER BY ID ASC"
        );

        if ( empty( $ids ) ) {
            wp_send_json_success( [ 'message' => __( 'All attachments are already synced.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        $now   = current_time( 'mysql', true );
        $rows  = [];
        foreach ( $ids as $id ) {
            $rows[] = $wpdb->prepare( '(%d, %s, %s)', (int) $id, 'pending', $now );
        }

        // Batch insert (500 per query to avoid hitting max_allowed_packet).
        foreach ( array_chunk( $rows, 500 ) as $chunk ) {
            $wpdb->query(
                "INSERT INTO `{$table}` (attachment_id, status, created_at, updated_at)
                 VALUES " . implode( ',', $chunk )
            );
        }

        // Schedule first batch.
        wp_schedule_single_event( time() + 2, 'r2_offload_process_batch' );

        $this->logger->info( 'Migration started.', [ 'total' => count( $ids ) ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of attachments */
                __( 'Migration started. %d attachments queued.', 'cloudflare-r2-offload' ),
                count( $ids )
            ),
            'total'   => count( $ids ),
        ] );
    }

    private function ajax_pause_migration(): void {
        update_option( 'r2_offload_migration_paused', 1 );
        $this->logger->info( 'Migration paused.' );
        wp_send_json_success( [ 'message' => __( 'Migration paused.', 'cloudflare-r2-offload' ) ] );
    }

    private function ajax_resume_migration(): void {
        delete_option( 'r2_offload_migration_paused' );
        wp_schedule_single_event( time() + 2, 'r2_offload_process_batch' );
        $this->logger->info( 'Migration resumed.' );
        wp_send_json_success( [ 'message' => __( 'Migration resumed.', 'cloudflare-r2-offload' ) ] );
    }

    private function ajax_cancel_migration(): void {
        global $wpdb;
        $table = $wpdb->prefix . 'r2_offload_migration_queue';
        $wpdb->query( "TRUNCATE TABLE `{$table}`" );
        delete_option( 'r2_offload_migration_paused' );
        wp_clear_scheduled_hook( 'r2_offload_process_batch' );
        $this->logger->info( 'Migration cancelled.' );
        wp_send_json_success( [ 'message' => __( 'Migration cancelled.', 'cloudflare-r2-offload' ) ] );
    }

    private function ajax_migration_status(): void {
        global $wpdb;
        $table = $wpdb->prefix . 'r2_offload_migration_queue';

        $counts = $wpdb->get_results(
            "SELECT status, COUNT(*) as cnt FROM `{$table}` GROUP BY status",
            OBJECT_K
        );

        $total      = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}`" );
        $complete   = isset( $counts['complete'] )   ? (int) $counts['complete']->cnt   : 0;
        $failed     = isset( $counts['failed'] )     ? (int) $counts['failed']->cnt     : 0;
        $pending    = isset( $counts['pending'] )    ? (int) $counts['pending']->cnt    : 0;
        $processing = isset( $counts['processing'] ) ? (int) $counts['processing']->cnt : 0;
        $paused     = (bool) get_option( 'r2_offload_migration_paused', false );

        wp_send_json_success( compact( 'total', 'complete', 'failed', 'pending', 'processing', 'paused' ) );
    }

    private function ajax_retry_failed(): void {
        global $wpdb;
        $table = $wpdb->prefix . 'r2_offload_migration_queue';
        $now   = current_time( 'mysql', true );

        $updated = $wpdb->query(
            $wpdb->prepare(
                "UPDATE `{$table}` SET status = 'pending', retry_count = 0, error_message = NULL, updated_at = %s WHERE status = 'failed'",
                $now
            )
        );

        if ( $updated > 0 ) {
            wp_schedule_single_event( time() + 2, 'r2_offload_process_batch' );
        }

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of items reset */
                __( '%d failed items reset and re-queued.', 'cloudflare-r2-offload' ),
                (int) $updated
            ),
        ] );
    }

    private function ajax_test_connection(): void {
        // Re-instantiate R2Client to ensure fresh credentials (user may have just saved).
        $r2     = Plugin::get_instance()->r2;
        $result = $r2->test_connection();
        if ( $result['success'] ) {
            wp_send_json_success( $result );
        } else {
            wp_send_json_error( $result );
        }
    }

    private function ajax_delete_logs(): void {
        $logger = Plugin::get_instance()->logger;
        $r2     = Plugin::get_instance()->r2;

        // Delete local logs.
        $logger->delete_local_logs();

        // Delete R2 logs (if file manager is enabled).
        if ( $this->settings->get_file_manager_enabled() ) {
            $r2->delete_by_prefix( 'r2-offload-logs/' );
        }

        wp_send_json_success( [ 'message' => __( 'Logs deleted.', 'cloudflare-r2-offload' ) ] );
    }
}
