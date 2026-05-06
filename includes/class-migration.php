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
            'r2_offload_restore_status',
            // Feature: Bulk delete local files for all already-synced attachments.
            'r2_offload_start_local_delete',
            'r2_offload_local_delete_status',
            // Feature: Restore & desync — restore from R2, verify, delete from R2.
            'r2_offload_start_desync',
            'r2_offload_desync_status',
            // Feature: Background offload queue stats and logs.
            'r2_offload_background_queue_status',
            'r2_offload_background_queue_logs',
            'r2_offload_clear_activity_logs',
            // Feature: Validate pre-uploaded files (customer manually uploaded to R2).
            'r2_offload_start_validate',
            'r2_offload_validate_status',
            'r2_offload_cancel_validate',
            // Feature: Path diagnostic — shows expected R2 keys vs what actually exists.
            'r2_offload_validate_diagnose',
        ];
        foreach ( $actions as $action ) {
            add_action( "wp_ajax_{$action}", [ $this, 'handle_ajax' ] );
        }
    }

    private const READ_ONLY_ACTIONS = [
        'r2_offload_migration_status',
        'r2_offload_restore_status',
        'r2_offload_local_delete_status',
        'r2_offload_desync_status',
        'r2_offload_background_queue_status',
        'r2_offload_background_queue_logs',
        'r2_offload_validate_status',
        'r2_offload_validate_diagnose',
    ];

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

        // Throttle mutating endpoints: one call per action per 3 seconds.
        if ( ! in_array( $action, self::READ_ONLY_ACTIONS, true ) ) {
            $throttle_key = 'r2_throttle_' . md5( $action . get_current_user_id() );
            if ( get_transient( $throttle_key ) ) {
                wp_send_json_error( [ 'message' => __( 'Please wait a few seconds before trying again.', 'cloudflare-r2-offload' ) ], 429 );
            }
            set_transient( $throttle_key, 1, 3 );
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
        $complete   = isset( $counts['complete'] )   ? (int) $counts['complete']->cnt   : 0;
        $failed     = isset( $counts['failed'] )     ? (int) $counts['failed']->cnt     : 0;
        $pending    = isset( $counts['pending'] )    ? (int) $counts['pending']->cnt    : 0;
        $processing = isset( $counts['processing'] ) ? (int) $counts['processing']->cnt : 0;
        $total      = $complete + $failed + $pending + $processing;

        $all_attachments = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' )
        );
        $synced = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' )
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

        // Verify the queue table exists.
        $table_exists = $wpdb->get_var(
            $wpdb->prepare( 'SHOW TABLES LIKE %s', $table )
        );
        if ( ! $table_exists ) {
            Plugin::activate();
            $table_exists = $wpdb->get_var(
                $wpdb->prepare( 'SHOW TABLES LIKE %s', $table )
            );
            if ( ! $table_exists ) {
                wp_send_json_error( [
                    'message' => __( 'Migration queue table could not be created. Check database permissions.', 'cloudflare-r2-offload' ),
                ] );
            }
        }

        // Clear any existing queue.
        $wpdb->query( "TRUNCATE TABLE `{$table}`" );
        delete_option( 'r2_offload_migration_paused' );

        $now = current_time( 'mysql', true );

        // INSERT ... SELECT directly in the database — never loads IDs into PHP.
        // Handles 600K+ attachments in a single query with zero PHP memory overhead.
        // Uses LEFT JOIN anti-pattern for fast exclusion of already-synced attachments.
        $inserted = $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO `{$table}` (attachment_id, status, created_at, updated_at)
                 SELECT p.ID, 'pending', %s, %s
                 FROM {$wpdb->posts} p
                 LEFT JOIN {$wpdb->postmeta} pm
                       ON pm.post_id = p.ID
                      AND pm.meta_key = %s
                      AND pm.meta_value = %s
                 WHERE p.post_type = %s
                   AND pm.meta_id IS NULL
                 ORDER BY p.ID ASC",
                $now, $now, '_r2_offload_synced', '1', 'attachment'
            )
        );

        $total = (int) $inserted;

        if ( $total === 0 ) {
            wp_send_json_success( [ 'message' => __( 'All attachments are already synced.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        wp_schedule_single_event( time(), 'r2_offload_process_batch' );
        spawn_cron();

        $this->logger->info( 'Migration started.', [ 'total' => $total ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of attachments */
                __( 'Migration started. %d attachments queued.', 'cloudflare-r2-offload' ),
                $total
            ),
            'total'   => $total,
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

        // Single query for all queue stats — the status index makes GROUP BY fast
        // even with 600K+ rows.
        $counts = $wpdb->get_results(
            "SELECT status, COUNT(*) as cnt FROM `{$table}` GROUP BY status",
            OBJECT_K
        );

        $complete   = isset( $counts['complete'] )   ? (int) $counts['complete']->cnt   : 0;
        $failed     = isset( $counts['failed'] )     ? (int) $counts['failed']->cnt     : 0;
        $pending    = isset( $counts['pending'] )    ? (int) $counts['pending']->cnt    : 0;
        $processing = isset( $counts['processing'] ) ? (int) $counts['processing']->cnt : 0;
        $total      = $complete + $failed + $pending + $processing;
        $paused     = (bool) get_option( 'r2_offload_migration_paused', false );

        // Cache expensive full-table counts (wp_posts, wp_postmeta) for 30 seconds.
        // These barely change during a migration and are polled every 3s by the UI.
        $all_attachments = wp_cache_get( 'r2_offload_total_attachments' );
        if ( false === $all_attachments ) {
            $all_attachments = (int) $wpdb->get_var(
                $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' )
            );
            wp_cache_set( 'r2_offload_total_attachments', $all_attachments, '', 30 );
        }

        $synced = wp_cache_get( 'r2_offload_synced_count' );
        if ( false === $synced ) {
            $synced = (int) $wpdb->get_var(
                $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' )
            );
            wp_cache_set( 'r2_offload_synced_count', $synced, '', 30 );
        }

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

        $table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $this->ensure_bulk_queue_table( $table );

        $only_missing = isset( $_POST['only_missing'] ) ? (bool) absint( $_POST['only_missing'] ) : true;

        // Clear previous restore queue rows.
        $wpdb->delete( $table, [ 'job_type' => 'restore' ], [ '%s' ] );
        delete_option( 'r2_offload_restore_paused' );

        $now = current_time( 'mysql', true );

        if ( $only_missing ) {
            $inserted = $wpdb->query(
                $wpdb->prepare(
                    "INSERT INTO `{$table}` (attachment_id, job_type, status, created_at, updated_at)
                     SELECT pm.post_id, 'restore', 'pending', %s, %s
                     FROM {$wpdb->postmeta} pm
                     INNER JOIN {$wpdb->postmeta} pm2
                           ON pm2.post_id = pm.post_id
                          AND pm2.meta_key = %s AND pm2.meta_value = %s
                     WHERE pm.meta_key = %s AND pm.meta_value = %s",
                    $now, $now,
                    '_r2_offload_local_deleted', '1',
                    '_r2_offload_synced', '1'
                )
            );
        } else {
            $inserted = $wpdb->query(
                $wpdb->prepare(
                    "INSERT INTO `{$table}` (attachment_id, job_type, status, created_at, updated_at)
                     SELECT pm.post_id, 'restore', 'pending', %s, %s
                     FROM {$wpdb->postmeta} pm
                     WHERE pm.meta_key = %s AND pm.meta_value = %s",
                    $now, $now,
                    '_r2_offload_synced', '1'
                )
            );
        }

        $total = (int) $inserted;

        if ( $total === 0 ) {
            wp_send_json_success( [ 'message' => __( 'No attachments need restoring.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        wp_schedule_single_event( time() + 2, 'r2_offload_process_restore_batch' );

        $this->logger->info( 'Bulk restore started.', [ 'total' => $total ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of attachments */
                __( 'Restore started. %d attachments queued.', 'cloudflare-r2-offload' ),
                $total
            ),
            'total'   => $total,
        ] );
    }

    private function ajax_restore_status(): void {
        global $wpdb;
        $table  = $wpdb->prefix . 'r2_offload_bulk_queue';
        $counts = $this->bulk_queue_counts( $table, 'restore' );

        wp_send_json_success( [
            'total'  => $counts['pending'] + $counts['processing'] + $counts['complete'] + $counts['failed'],
            'done'   => $counts['complete'],
            'failed' => $counts['failed'],
            'paused' => (bool) get_option( 'r2_offload_restore_paused', false ),
        ] );
    }

    // =========================================================================
    // Feature: Bulk auto-delete local files for all already-synced attachments.
    // This is the "free up server disk space" action for sites that completed
    // migration BEFORE enabling the "delete local" setting.
    // =========================================================================

    private function ajax_start_local_delete(): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $this->ensure_bulk_queue_table( $table );

        $wpdb->delete( $table, [ 'job_type' => 'local_delete' ], [ '%s' ] );
        delete_option( 'r2_offload_local_del_paused' );

        $now = current_time( 'mysql', true );

        // Synced attachments whose local files have NOT been deleted yet.
        $inserted = $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO `{$table}` (attachment_id, job_type, status, created_at, updated_at)
                 SELECT pm.post_id, 'local_delete', 'pending', %s, %s
                 FROM {$wpdb->postmeta} pm
                 LEFT JOIN {$wpdb->postmeta} pm2
                       ON pm2.post_id = pm.post_id
                      AND pm2.meta_key = %s AND pm2.meta_value = %s
                 WHERE pm.meta_key = %s AND pm.meta_value = %s
                   AND pm2.meta_id IS NULL",
                $now, $now,
                '_r2_offload_local_deleted', '1',
                '_r2_offload_synced', '1'
            )
        );

        $total = (int) $inserted;

        if ( $total === 0 ) {
            wp_send_json_success( [ 'message' => __( 'No local files to delete — all synced attachments are already R2-only.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        wp_schedule_single_event( time() + 2, 'r2_offload_process_local_delete_batch' );

        $this->logger->info( 'Bulk local-delete started.', [ 'total' => $total ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number */
                __( 'Local delete started. %d attachments queued.', 'cloudflare-r2-offload' ),
                $total
            ),
            'total'   => $total,
        ] );
    }

    private function ajax_local_delete_status(): void {
        global $wpdb;
        $table  = $wpdb->prefix . 'r2_offload_bulk_queue';
        $counts = $this->bulk_queue_counts( $table, 'local_delete' );

        wp_send_json_success( [
            'total'  => $counts['pending'] + $counts['processing'] + $counts['complete'] + $counts['failed'],
            'done'   => $counts['complete'],
            'failed' => $counts['failed'],
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

    // =========================================================================
    // Feature: Bulk restore & desync — restore from R2, verify, delete from R2.
    // =========================================================================

    private function ajax_start_desync(): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $this->ensure_bulk_queue_table( $table );

        $wpdb->delete( $table, [ 'job_type' => 'desync' ], [ '%s' ] );
        delete_option( 'r2_offload_desync_paused' );

        $now = current_time( 'mysql', true );

        $inserted = $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO `{$table}` (attachment_id, job_type, status, created_at, updated_at)
                 SELECT pm.post_id, 'desync', 'pending', %s, %s
                 FROM {$wpdb->postmeta} pm
                 WHERE pm.meta_key = %s AND pm.meta_value = %s",
                $now, $now,
                '_r2_offload_synced', '1'
            )
        );

        $total = (int) $inserted;

        if ( $total === 0 ) {
            wp_send_json_success( [ 'message' => __( 'No synced attachments to desync.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        wp_schedule_single_event( time() + 2, 'r2_offload_process_desync_batch' );

        $this->logger->info( 'Bulk restore & desync started.', [ 'total' => $total ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number */
                __( 'Restore & desync started. %d attachments queued.', 'cloudflare-r2-offload' ),
                $total
            ),
            'total'   => $total,
        ] );
    }

    private function ajax_desync_status(): void {
        global $wpdb;
        $table  = $wpdb->prefix . 'r2_offload_bulk_queue';
        $counts = $this->bulk_queue_counts( $table, 'desync' );

        wp_send_json_success( [
            'total'  => $counts['pending'] + $counts['processing'] + $counts['complete'] + $counts['failed'],
            'done'   => $counts['complete'],
            'failed' => $counts['failed'],
            'paused' => (bool) get_option( 'r2_offload_desync_paused', false ),
        ] );
    }

    // =========================================================================
    // Feature: Background offload queue stats and logs
    // =========================================================================

    private function ajax_background_queue_status(): void {
        global $wpdb;
        $table = $wpdb->prefix . 'r2_offload_migration_queue';

        $counts = $wpdb->get_results(
            "SELECT status, COUNT(*) as cnt FROM `{$table}` GROUP BY status",
            OBJECT_K
        );

        $pending    = isset( $counts['pending'] )    ? (int) $counts['pending']->cnt    : 0;
        $processing = isset( $counts['processing'] ) ? (int) $counts['processing']->cnt : 0;
        $complete   = isset( $counts['complete'] )   ? (int) $counts['complete']->cnt   : 0;
        $failed     = isset( $counts['failed'] )     ? (int) $counts['failed']->cnt     : 0;

        // Cache expensive full-table counts for 30 seconds — polled every 5s.
        $all_attachments = wp_cache_get( 'r2_offload_total_attachments' );
        if ( false === $all_attachments ) {
            $all_attachments = (int) $wpdb->get_var(
                $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' )
            );
            wp_cache_set( 'r2_offload_total_attachments', $all_attachments, '', 30 );
        }

        $synced = wp_cache_get( 'r2_offload_synced_count' );
        if ( false === $synced ) {
            $synced = (int) $wpdb->get_var(
                $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' )
            );
            wp_cache_set( 'r2_offload_synced_count', $synced, '', 30 );
        }

        $next_cron = wp_next_scheduled( 'r2_offload_process_batch' );

        wp_send_json_success( [
            'queue_pending'    => $pending + $processing,
            'queue_complete'   => $complete,
            'queue_failed'     => $failed,
            'all_attachments'  => (int) $all_attachments,
            'synced'           => (int) $synced,
            'next_cron'        => $next_cron ? human_time_diff( time(), $next_cron ) : null,
            'is_active'        => ( $pending + $processing ) > 0,
            'background_enabled' => $this->settings->get_background_offload(),
        ] );
    }

    private function ajax_background_queue_logs(): void {
        $limit   = isset( $_POST['limit'] ) ? absint( $_POST['limit'] ) : 50;
        $entries = $this->logger->get_recent_entries( max( 10, min( 200, $limit ) ) );

        $logs = [];
        foreach ( $entries as $entry ) {
            $logs[] = [
                'timestamp' => $entry['timestamp'] ?? '',
                'level'     => $entry['level'] ?? 'info',
                'message'   => $entry['message'] ?? '',
                'context'   => $entry['context'] ?? [],
            ];
        }

        wp_send_json_success( [ 'logs' => $logs ] );
    }

    private function ajax_clear_activity_logs(): void {
        $this->logger->delete_local_logs();

        if ( $this->settings->get_file_manager_enabled() ) {
            $r2 = Plugin::get_instance()->r2;
            $r2->delete_by_prefix( 'r2-offload-logs/' );
        }

        wp_send_json_success( [ 'message' => __( 'Activity logs cleared.', 'cloudflare-r2-offload' ) ] );
    }

    // =========================================================================
    // Feature: Path diagnostic for validate pre-upload.
    // Takes one sample attachment ID and returns:
    //   - the path_prefix setting
    //   - the exact R2 keys the plugin expects
    //   - whether each key exists in R2 right now
    //   - the R2 directory prefix it will list
    // This lets the admin immediately see if their manual upload path was wrong.
    // =========================================================================

    private function ajax_validate_diagnose(): void {
        try {
            $this->do_validate_diagnose();
        } catch ( \Throwable $e ) {
            $this->logger->error( 'Validate diagnose fatal.', [ 'error' => $e->getMessage(), 'trace' => $e->getTraceAsString() ] );
            wp_send_json_error( [ 'message' => 'Internal error: ' . $e->getMessage() ] );
        }
    }

    private function do_validate_diagnose(): void {
        $attachment_id = isset( $_POST['attachment_id'] ) ? absint( $_POST['attachment_id'] ) : 0;

        // If no attachment given, pick the first unsynced one automatically.
        if ( ! $attachment_id ) {
            global $wpdb;
            $attachment_id = (int) $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT p.ID FROM {$wpdb->posts} p
                     LEFT JOIN {$wpdb->postmeta} pm
                           ON pm.post_id = p.ID AND pm.meta_key = %s AND pm.meta_value = %s
                     WHERE p.post_type = %s AND pm.meta_id IS NULL
                     ORDER BY p.ID ASC LIMIT 1",
                    '_r2_offload_synced', '1', 'attachment'
                )
            );
        }

        if ( ! $attachment_id ) {
            wp_send_json_success( [ 'message' => 'No unsynced attachments found — all are already synced.' ] );
        }

        $plugin      = Plugin::get_instance();
        $settings    = $plugin->settings;
        $r2          = $plugin->r2;
        $path_prefix = $settings->get_path_prefix();

        $attached  = get_post_meta( $attachment_id, '_wp_attached_file', true );
        $metadata  = wp_get_attachment_metadata( $attachment_id );
        $upload_dir = wp_upload_dir();
        $base_dir  = trailingslashit( $upload_dir['basedir'] );

        if ( ! $attached ) {
            wp_send_json_error( [ 'message' => "Attachment {$attachment_id} has no _wp_attached_file meta — WordPress database may be incomplete." ] );
        }

        // Build the expected key map exactly as validate_pre_uploaded() does.
        $all_files = $plugin->sync->collect_files_public( $attached, $metadata, $base_dir, $path_prefix );
        $r2_keys   = array_values( $all_files );

        // Derive the directory prefix that will be listed.
        $original_key = reset( $all_files );
        $dir_prefix   = trailingslashit( dirname( $original_key ) );
        if ( $dir_prefix === './' ) {
            $dir_prefix = '';
        }

        // Check each key individually via HeadObject for the diagnostic
        // (this is one-off admin use, not a bulk cron operation).
        $key_checks = [];
        foreach ( $r2_keys as $r2_key ) {
            $key_checks[] = [
                'key'    => $r2_key,
                'exists' => $r2->file_exists( $r2_key ),
            ];
        }

        $this->logger->info( 'Validate diagnostic run.', [
            'attachment_id' => $attachment_id,
            'file'          => $attached,
            'path_prefix'   => $path_prefix ?: '(none)',
            'r2_list_prefix' => $dir_prefix ?: '(root)',
            'keys'          => $key_checks,
        ] );

        wp_send_json_success( [
            'attachment_id'  => $attachment_id,
            'wp_file'        => $attached,
            'path_prefix'    => $path_prefix ?: '(none — files stored at bucket root)',
            'r2_list_prefix' => $dir_prefix ?: '(root)',
            'keys'           => $key_checks,
            'hint'           => $this->build_path_hint( $key_checks, $path_prefix, $attached ),
        ] );
    }

    private function build_path_hint( array $key_checks, string $path_prefix, string $attached ): string {
        $all_missing = array_filter( $key_checks, fn( $k ) => ! $k['exists'] );
        if ( empty( $all_missing ) ) {
            return 'All expected keys exist in R2. Validate should claim this attachment successfully.';
        }

        $r2          = Plugin::get_instance()->r2;
        $first_key   = reset( $all_missing )['key'];

        // Try to detect common upload path mismatches by probing alternative prefixes.
        // Most common case: customer copied the uploads/ folder without wp-content/
        // so R2 has uploads/2025/10/file.jpg but plugin expects wp-content/uploads/2025/10/file.jpg.
        $alternatives = [];

        if ( $path_prefix ) {
            // Strip leading path segments one at a time and check if the file exists there.
            $parts = explode( '/', $path_prefix );
            for ( $i = 1; $i < count( $parts ); $i++ ) {
                $shorter_prefix = implode( '/', array_slice( $parts, $i ) );
                $alt_key        = $shorter_prefix . '/' . $attached;
                if ( $r2->file_exists( $alt_key ) ) {
                    $alternatives[] = "Found at '{$alt_key}' — your files were uploaded with prefix '{$shorter_prefix}' instead of '{$path_prefix}'. "
                        . "Fix: go to plugin Settings and change Path Prefix to '{$shorter_prefix}', then run Validate again. "
                        . "Or re-upload your files to match the expected prefix '{$path_prefix}'.";
                    break;
                }
            }
            // Also check with no prefix at all.
            if ( empty( $alternatives ) && $r2->file_exists( $attached ) ) {
                $alternatives[] = "Found at '{$attached}' (no prefix) — your files were uploaded to the bucket root. "
                    . "Fix: go to plugin Settings and clear the Path Prefix field, then run Validate again. "
                    . "Or re-upload your files under the expected prefix '{$path_prefix}'.";
            }
        }

        if ( ! empty( $alternatives ) ) {
            return implode( ' ', $alternatives );
        }

        $prefix_note = $path_prefix
            ? "Your path prefix is set to '{$path_prefix}' — the plugin expects files at '{$path_prefix}/2025/10/file.jpg' in R2. "
            : "No path prefix is set — the plugin expects files at the bucket root (e.g. '2025/10/file.jpg' in R2). ";

        return "Keys are missing and no alternative path was found in R2. "
            . $prefix_note
            . "Make sure your manual upload recreated the full path including the prefix, and that folder names use zero-padded months (e.g. '02' not '2').";
    }

    // =========================================================================
    // Feature: Validate pre-uploaded files (customer manually uploaded to R2).
    // Queues all unsynced attachments and checks each expected R2 key via
    // ListObjectsV2 prefix scan. Runs via cron so it can't exhaust the web server.
    // =========================================================================

    private function ajax_start_validate(): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $this->ensure_bulk_queue_table( $table );

        // Clear previous validate queue rows and reset the claimed counter.
        $wpdb->delete( $table, [ 'job_type' => 'validate' ], [ '%s' ] );
        delete_option( 'r2_offload_validate_paused' );
        delete_option( 'r2_offload_validate_claimed' );

        $now = current_time( 'mysql', true );

        // Queue all attachments that are NOT yet marked synced.
        $inserted = $wpdb->query(
            $wpdb->prepare(
                "INSERT INTO `{$table}` (attachment_id, job_type, status, created_at, updated_at)
                 SELECT p.ID, 'validate', 'pending', %s, %s
                 FROM {$wpdb->posts} p
                 LEFT JOIN {$wpdb->postmeta} pm
                       ON pm.post_id = p.ID
                      AND pm.meta_key = %s
                      AND pm.meta_value = %s
                 WHERE p.post_type = %s
                   AND pm.meta_id IS NULL
                 ORDER BY p.ID ASC",
                $now, $now, '_r2_offload_synced', '1', 'attachment'
            )
        );

        $total = (int) $inserted;

        if ( $total === 0 ) {
            wp_send_json_success( [ 'message' => __( 'All attachments are already synced — nothing to validate.', 'cloudflare-r2-offload' ), 'total' => 0 ] );
        }

        wp_schedule_single_event( time() + 2, BatchProcessor::VALIDATE_HOOK );

        $this->logger->info( 'Pre-upload validation started.', [ 'total' => $total ] );

        wp_send_json_success( [
            'message' => sprintf(
                /* translators: %d: number of attachments queued */
                __( 'Validation started. %d attachments will be checked against R2.', 'cloudflare-r2-offload' ),
                $total
            ),
            'total' => $total,
        ] );
    }

    private function ajax_validate_status(): void {
        global $wpdb;
        $table  = $wpdb->prefix . 'r2_offload_bulk_queue';
        $counts = $this->bulk_queue_counts( $table, 'validate' );

        // Use the dedicated counter incremented by validate_pre_uploaded() — this
        // counts only attachments claimed by THIS validate run, not all-time synced.
        $claimed = (int) get_option( 'r2_offload_validate_claimed', 0 );

        wp_send_json_success( [
            'total'   => $counts['pending'] + $counts['processing'] + $counts['complete'] + $counts['failed'],
            'done'    => $counts['complete'],
            'failed'  => $counts['failed'],
            'claimed' => $claimed,
            'paused'  => (bool) get_option( 'r2_offload_validate_paused', false ),
        ] );
    }

    private function ajax_cancel_validate(): void {
        global $wpdb;
        $table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $wpdb->delete( $table, [ 'job_type' => 'validate' ], [ '%s' ] );
        delete_option( 'r2_offload_validate_paused' );
        delete_option( 'r2_offload_validate_claimed' );
        wp_clear_scheduled_hook( BatchProcessor::VALIDATE_HOOK );
        $this->logger->info( 'Pre-upload validation cancelled.' );
        wp_send_json_success( [ 'message' => __( 'Validation cancelled.', 'cloudflare-r2-offload' ) ] );
    }

    // =========================================================================
    // Helpers
    // =========================================================================

    private function ensure_bulk_queue_table( string $table ): void {
        global $wpdb;
        $exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) );
        if ( ! $exists ) {
            Plugin::activate();
        }
    }

    private function bulk_queue_counts( string $table, string $job_type ): array {
        global $wpdb;

        $defaults = [ 'pending' => 0, 'processing' => 0, 'complete' => 0, 'failed' => 0 ];

        $exists = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) );
        if ( ! $exists ) {
            return $defaults;
        }

        $rows = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT status, COUNT(*) as cnt FROM `{$table}` WHERE job_type = %s GROUP BY status",
                $job_type
            ),
            OBJECT_K
        );

        foreach ( $defaults as $status => $_ ) {
            if ( isset( $rows[ $status ] ) ) {
                $defaults[ $status ] = (int) $rows[ $status ]->cnt;
            }
        }

        return $defaults;
    }
}
