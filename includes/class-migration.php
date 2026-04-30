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
            'r2_offload_save_credentials',
            'r2_offload_run_batch_now',
            'r2_offload_start_migration',
            'r2_offload_pause_migration',
            'r2_offload_resume_migration',
            'r2_offload_cancel_migration',
            'r2_offload_migration_status',
            'r2_offload_retry_failed',
            'r2_offload_test_connection',
            'r2_offload_delete_logs',
            // Feature: Restore from R2 → server (single attachment).
            'r2_offload_restore_attachment',
            // Feature: Delete local file for a single synced attachment (row action).
            'r2_offload_delete_local_single',
            // Feature: Bulk restore all R2-only files back to server.
            'r2_offload_start_restore_all',
            // Feature: Bulk delete local files for all already-synced attachments.
            'r2_offload_start_local_delete',
            'r2_offload_local_delete_status',
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

    /**
     * Synchronously process one batch right now — bypasses cron scheduling.
     * Used for debugging and for hosts where WP-Cron is unreliable.
     */
    private function ajax_run_batch_now(): void {
        $plugin = Plugin::get_instance();

        // Force-delete the lock so a stuck previous run doesn't block us.
        delete_transient( 'r2_offload_batch_lock' );

        // Rebuild the R2 client with current credentials — the singleton's client
        // was built at boot and may hold stale/empty credentials.
        $plugin->settings->flush_cache();
        $plugin->rebuild_r2_client();

        $plugin->batch_processor->process_batch();

        // Return current status after processing.
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

        $all_attachments = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'attachment'"
        );
        $synced = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'"
        );

        wp_send_json_success( [
            'message'         => sprintf( __( 'Batch processed. Complete: %d, Pending: %d, Failed: %d', 'cloudflare-r2-offload' ), $complete, $pending + $processing, $failed ),
            'total'           => $total,
            'complete'        => $complete,
            'failed'          => $failed,
            'pending'         => $pending,
            'processing'      => $processing,
            'all_attachments' => $all_attachments,
            'synced'          => $synced,
        ] );
    }

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
            $rows[] = $wpdb->prepare( '(%d, %s, %s, %s)', (int) $id, 'pending', $now, $now );
        }

        // Batch insert (500 per query to avoid hitting max_allowed_packet).
        foreach ( array_chunk( $rows, 500 ) as $chunk ) {
            $wpdb->query(
                "INSERT INTO `{$table}` (attachment_id, status, created_at, updated_at)
                 VALUES " . implode( ',', $chunk )
            );
        }

        // Schedule first batch and immediately trigger cron via loopback so it
        // fires even on hosts where WP-Cron is not triggered by real traffic.
        wp_schedule_single_event( time(), 'r2_offload_process_batch' );
        spawn_cron();

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
        wp_schedule_single_event( time(), 'r2_offload_process_batch' );
        spawn_cron();
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

        // Live stats for the header cards.
        $all_attachments = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'attachment'"
        );
        $synced = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'"
        );

        wp_send_json_success( compact( 'total', 'complete', 'failed', 'pending', 'processing', 'paused', 'all_attachments', 'synced' ) );
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

    private function ajax_save_credentials(): void {
        $account_id = isset( $_POST['r2_offload_account_id'] )        ? sanitize_text_field( wp_unslash( $_POST['r2_offload_account_id'] ) )        : '';
        $key_id     = isset( $_POST['r2_offload_access_key_id'] )      ? sanitize_text_field( wp_unslash( $_POST['r2_offload_access_key_id'] ) )      : '';
        $secret_raw = isset( $_POST['r2_offload_secret_access_key'] )  ? trim( wp_unslash( (string) $_POST['r2_offload_secret_access_key'] ) )        : '';
        $bucket     = isset( $_POST['r2_offload_bucket'] )             ? sanitize_text_field( wp_unslash( $_POST['r2_offload_bucket'] ) )             : '';

        // Account ID: strip whitespace, enforce hex.
        $account_id = strtolower( trim( $account_id ) );
        if ( $account_id && ! preg_match( '/^[a-f0-9]+$/i', $account_id ) ) {
            wp_send_json_error( [ 'message' => __( 'Account ID must contain only hex characters (0-9, a-f).', 'cloudflare-r2-offload' ) ] );
        }

        // sanitize_secret_key is the single source of encryption. It detects the
        // 'r2enc:' prefix and refuses to re-encrypt an already-encrypted value.
        $secret_to_store = $this->settings->sanitize_secret_key( $secret_raw );

        update_option( 'r2_offload_account_id',        $account_id );
        update_option( 'r2_offload_access_key_id',     $key_id );
        update_option( 'r2_offload_secret_access_key', $secret_to_store );
        update_option( 'r2_offload_bucket',            $bucket );

        // Flush the settings cache so test_connection reads the new values immediately.
        $this->settings->flush_cache();

        wp_send_json_success( [ 'message' => __( 'Credentials saved.', 'cloudflare-r2-offload' ) ] );
    }

    private function ajax_test_connection(): void {
        // Flush the settings in-request cache so we read the values currently in the DB,
        // not the values that were in the DB when the plugin booted. This is critical when
        // the user saves settings and then immediately clicks Test Connection in the same
        // page load (or when the AJAX request reuses a persistent PHP-FPM opcode cache).
        $plugin = Plugin::get_instance();
        $plugin->settings->flush_cache();

        // Build a completely fresh R2Client — do NOT reuse the singleton's cached client
        // which was instantiated at boot time with the old (possibly empty) credentials.
        $fresh_r2 = new \R2Offload\R2Client( $plugin->settings, $plugin->logger );
        $result   = $fresh_r2->test_connection();

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

    // =========================================================================
    // Feature: Restore single attachment from R2 → local server
    // Called from the Media Library row action.
    // =========================================================================

    private function ajax_restore_attachment(): void {
        $attachment_id = isset( $_POST['attachment_id'] ) ? absint( $_POST['attachment_id'] ) : 0;

        if ( ! $attachment_id ) {
            wp_send_json_error( [ 'message' => __( 'Invalid attachment ID.', 'cloudflare-r2-offload' ) ] );
        }

        if ( get_post_meta( $attachment_id, '_r2_offload_synced', true ) !== '1' ) {
            wp_send_json_error( [ 'message' => __( 'This attachment is not synced to R2.', 'cloudflare-r2-offload' ) ] );
        }

        $result = $this->sync->restore_from_r2( $attachment_id );

        if ( $result['failed'] > 0 ) {
            wp_send_json_error( [
                'message' => sprintf(
                    /* translators: %d: failed count */
                    __( 'Restore completed with %d failure(s). Check the logs.', 'cloudflare-r2-offload' ),
                    $result['failed']
                ),
                'result'  => $result,
            ] );
        }

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: restored count */
                __( '%d file(s) restored to the server.', 'cloudflare-r2-offload' ),
                $result['restored']
            ),
            'result'  => $result,
        ] );
    }

    // =========================================================================
    // Feature: Bulk restore ALL synced attachments from R2 → local server.
    // Runs synchronously for up to 30s then schedules a cron for the remainder.
    // Uses the existing migration queue table with a dedicated context flag.
    // =========================================================================

    private function ajax_start_restore_all(): void {
        global $wpdb;

        // Find all synced attachments whose local files are missing (local_deleted = 1)
        // OR all synced attachments regardless — user can choose via a POST param.
        $only_missing = isset( $_POST['only_missing'] ) ? (bool) absint( $_POST['only_missing'] ) : true;

        if ( $only_missing ) {
            $ids = $wpdb->get_col(
                "SELECT pm.post_id
                 FROM {$wpdb->postmeta} pm
                 WHERE pm.meta_key = '_r2_offload_synced' AND pm.meta_value = '1'
                   AND EXISTS (
                       SELECT 1 FROM {$wpdb->postmeta} pm2
                       WHERE pm2.post_id = pm.post_id
                         AND pm2.meta_key = '_r2_offload_local_deleted' AND pm2.meta_value = '1'
                   )"
            );
        } else {
            $ids = $wpdb->get_col(
                "SELECT post_id FROM {$wpdb->postmeta}
                 WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'"
            );
        }

        if ( empty( $ids ) ) {
            wp_send_json_success( [ 'message' => __( 'No attachments need restoring.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        // Store the list in an option; the batch cron will drain it.
        update_option( 'r2_offload_restore_queue', array_map( 'intval', $ids ), false );
        update_option( 'r2_offload_restore_total',  count( $ids ), false );
        update_option( 'r2_offload_restore_done',   0, false );
        update_option( 'r2_offload_restore_failed', 0, false );
        delete_option( 'r2_offload_restore_paused' );

        wp_schedule_single_event( time() + 2, 'r2_offload_process_restore_batch' );

        $this->logger->info( 'Bulk restore started.', [ 'total' => count( $ids ) ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of attachments */
                __( 'Restore started. %d attachments queued.', 'cloudflare-r2-offload' ),
                count( $ids )
            ),
            'total'   => count( $ids ),
        ] );
    }

    // =========================================================================
    // Feature: Bulk auto-delete local files for all already-synced attachments.
    // This is the "free up server disk space" action for sites that completed
    // migration BEFORE enabling the "delete local" setting.
    // =========================================================================

    private function ajax_start_local_delete(): void {
        global $wpdb;

        // Only target attachments that are synced AND still have local files
        // (i.e., _r2_offload_local_deleted is not set).
        $ids = $wpdb->get_col(
            "SELECT pm.post_id
             FROM {$wpdb->postmeta} pm
             WHERE pm.meta_key = '_r2_offload_synced' AND pm.meta_value = '1'
               AND NOT EXISTS (
                   SELECT 1 FROM {$wpdb->postmeta} pm2
                   WHERE pm2.post_id = pm.post_id
                     AND pm2.meta_key = '_r2_offload_local_deleted' AND pm2.meta_value = '1'
               )"
        );

        if ( empty( $ids ) ) {
            wp_send_json_success( [ 'message' => __( 'No local files to delete — all synced attachments are already R2-only.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        update_option( 'r2_offload_local_del_queue',  array_map( 'intval', $ids ), false );
        update_option( 'r2_offload_local_del_total',  count( $ids ), false );
        update_option( 'r2_offload_local_del_done',   0, false );
        update_option( 'r2_offload_local_del_failed', 0, false );
        delete_option( 'r2_offload_local_del_paused' );

        wp_schedule_single_event( time() + 2, 'r2_offload_process_local_delete_batch' );

        $this->logger->info( 'Bulk local-delete started.', [ 'total' => count( $ids ) ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number */
                __( 'Local delete started. %d attachments queued.', 'cloudflare-r2-offload' ),
                count( $ids )
            ),
            'total'   => count( $ids ),
        ] );
    }

    private function ajax_local_delete_status(): void {
        wp_send_json_success( [
            'total'  => (int) get_option( 'r2_offload_local_del_total',  0 ),
            'done'   => (int) get_option( 'r2_offload_local_del_done',   0 ),
            'failed' => (int) get_option( 'r2_offload_local_del_failed', 0 ),
            'paused' => (bool) get_option( 'r2_offload_local_del_paused', false ),
        ] );
    }

    /**
     * Delete local files for a single synced attachment (Media Library row action).
     */
    private function ajax_delete_local_single(): void {
        $attachment_id = isset( $_POST['attachment_id'] ) ? absint( $_POST['attachment_id'] ) : 0;

        if ( ! $attachment_id ) {
            wp_send_json_error( [ 'message' => __( 'Invalid attachment ID.', 'cloudflare-r2-offload' ) ] );
        }

        if ( get_post_meta( $attachment_id, '_r2_offload_synced', true ) !== '1' ) {
            wp_send_json_error( [ 'message' => __( 'Attachment is not synced to R2.', 'cloudflare-r2-offload' ) ] );
        }

        $result = $this->sync->delete_local_for_attachment( $attachment_id );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: files deleted */
                __( '%d local file(s) deleted.', 'cloudflare-r2-offload' ),
                $result['deleted']
            ),
            'result'  => $result,
        ] );
    }
}
