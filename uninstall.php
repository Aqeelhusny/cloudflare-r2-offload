<?php
/**
 * Fired when the plugin is deleted — removes all plugin data.
 * Does NOT delete files from R2 (irreversible and unexpected).
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb;

// -------------------------------------------------------------------------
// 1. Drop the migration queue table.
// -------------------------------------------------------------------------
$table = $wpdb->prefix . 'r2_offload_migration_queue';
$wpdb->query( "DROP TABLE IF EXISTS `{$table}`" );

// -------------------------------------------------------------------------
// 2. Delete all plugin wp_options rows.
// -------------------------------------------------------------------------
$option_keys = [
    'r2_offload_account_id',
    'r2_offload_access_key_id',
    'r2_offload_secret_access_key',
    'r2_offload_bucket',
    'r2_offload_custom_domain',
    'r2_offload_url_scheme',
    'r2_offload_path_prefix',
    'r2_offload_serve_from_r2',
    'r2_offload_delete_local',
    'r2_offload_upload_on_save',
    'r2_offload_file_manager_enabled',
    'r2_offload_excluded_mime_types',
    'r2_offload_batch_size',
    'r2_offload_multipart_threshold',
    'r2_offload_multipart_concurrency',
    'r2_offload_migration_paused',
    'r2_offload_db_version',
    // Bulk restore queue.
    'r2_offload_restore_queue',
    'r2_offload_restore_total',
    'r2_offload_restore_done',
    'r2_offload_restore_failed',
    'r2_offload_restore_paused',
    // Bulk local-delete queue.
    'r2_offload_local_del_queue',
    'r2_offload_local_del_total',
    'r2_offload_local_del_done',
    'r2_offload_local_del_failed',
    'r2_offload_local_del_paused',
    // Bulk desync queue.
    'r2_offload_desync_queue',
    'r2_offload_desync_total',
    'r2_offload_desync_done',
    'r2_offload_desync_failed',
    'r2_offload_desync_paused',
];

foreach ( $option_keys as $key ) {
    delete_option( $key );
}

// Catch any dynamic options not in the list above (e.g. daily stats).
$wpdb->query(
    $wpdb->prepare( "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s", 'r2\_offload\_%' )
);

// -------------------------------------------------------------------------
// 3. Delete all attachment postmeta written by the plugin.
// -------------------------------------------------------------------------
$wpdb->query(
    $wpdb->prepare( "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE %s", '\_r2\_offload\_%' )
);

// -------------------------------------------------------------------------
// 4. Clear scheduled cron events and transient locks.
// -------------------------------------------------------------------------
wp_clear_scheduled_hook( 'r2_offload_process_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_restore_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_local_delete_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_desync_batch' );
delete_transient( 'r2_offload_batch_lock' );
delete_transient( 'r2_offload_restore_lock' );
delete_transient( 'r2_offload_local_del_lock' );
delete_transient( 'r2_offload_desync_lock' );

// -------------------------------------------------------------------------
// 5. Delete local log files written to {uploads}/r2-offload-logs/.
// -------------------------------------------------------------------------
$upload_dir = wp_upload_dir();
$log_dir    = trailingslashit( $upload_dir['basedir'] ) . 'r2-offload-logs';

if ( is_dir( $log_dir ) ) {
    require_once ABSPATH . 'wp-admin/includes/file.php';
    WP_Filesystem();
    global $wp_filesystem;

    if ( $wp_filesystem ) {
        $wp_filesystem->delete( $log_dir, true );
    }
}
