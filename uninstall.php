<?php
/**
 * Fired when the plugin is deleted — removes all plugin data.
 * Does NOT delete files from R2 (irreversible and unexpected).
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

global $wpdb;

// Drop the migration queue table.
$table = $wpdb->prefix . 'r2_offload_migration_queue';
$wpdb->query( "DROP TABLE IF EXISTS `{$table}`" );

// Delete all plugin options.
$option_keys = [
    'r2_offload_account_id',
    'r2_offload_access_key_id',
    'r2_offload_secret_access_key',
    'r2_offload_bucket',
    'r2_offload_custom_domain',
    'r2_offload_url_scheme',
    'r2_offload_path_prefix',
    'r2_offload_delete_local',
    'r2_offload_upload_on_save',
    'r2_offload_file_manager_enabled',
    'r2_offload_excluded_mime_types',
    'r2_offload_batch_size',
    'r2_offload_multipart_threshold',
    'r2_offload_multipart_concurrency',
    'r2_offload_migration_paused',
    'r2_offload_db_version',
];

foreach ( $option_keys as $key ) {
    delete_option( $key );
}

// Delete daily stats options.
$wpdb->query(
    "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'r2_offload_stats_%'"
);

// Delete all attachment postmeta.
$wpdb->query(
    "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_r2_offload_%'"
);

// Delete bulk-restore and bulk-local-delete transient options.
$extra_options = [
    'r2_offload_restore_queue',
    'r2_offload_restore_total',
    'r2_offload_restore_done',
    'r2_offload_restore_failed',
    'r2_offload_restore_paused',
    'r2_offload_local_del_queue',
    'r2_offload_local_del_total',
    'r2_offload_local_del_done',
    'r2_offload_local_del_failed',
    'r2_offload_local_del_paused',
];
foreach ( $extra_options as $opt ) {
    delete_option( $opt );
}

// Clear any scheduled cron events.
wp_clear_scheduled_hook( 'r2_offload_process_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_restore_batch' );
wp_clear_scheduled_hook( 'r2_offload_process_local_delete_batch' );
delete_transient( 'r2_offload_batch_lock' );
delete_transient( 'r2_offload_restore_lock' );
delete_transient( 'r2_offload_local_del_lock' );
