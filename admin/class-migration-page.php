<?php
namespace R2Offload\Admin;

use R2Offload\Settings;
use R2Offload\ErrorLogger;

defined( 'ABSPATH' ) || exit;

class MigrationPage {

    private Settings    $settings;
    private ErrorLogger $logger;

    public function __construct( Settings $settings, ErrorLogger $logger ) {
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function render(): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_migration_queue';

        $total      = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}`" );
        $complete   = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}` WHERE status = 'complete'" );
        $failed     = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}` WHERE status = 'failed'" );
        $pending    = (int) $wpdb->get_var( "SELECT COUNT(*) FROM `{$table}` WHERE status IN ('pending','processing')" );
        $paused     = (bool) get_option( 'r2_offload_migration_paused', false );

        // Total WP attachments.
        $all_attachments = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = 'attachment'"
        );
        $synced_all = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'"
        );

        $recent_errors = $this->logger->get_recent_entries( 20 );
        $recent_errors = array_filter( $recent_errors, fn( $e ) => $e['level'] === 'error' );
        ?>
        <div class="wrap r2-offload-wrap">
            <h1><?php esc_html_e( 'R2 Offload — Migration', 'cloudflare-r2-offload' ); ?></h1>

            <!-- Stats Bar -->
            <div class="r2-stats-bar">
                <div class="r2-stat">
                    <span class="r2-stat-number"><?php echo esc_html( $all_attachments ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Total Attachments', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--success">
                    <span class="r2-stat-number"><?php echo esc_html( $synced_all ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Synced to R2', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--pending">
                    <span class="r2-stat-number" id="r2-stat-pending"><?php echo esc_html( $pending ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'In Queue', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--error">
                    <span class="r2-stat-number" id="r2-stat-failed"><?php echo esc_html( $failed ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Failed', 'cloudflare-r2-offload' ); ?></span>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="r2-progress-wrap" id="r2-progress-wrap" style="<?php echo $total === 0 ? 'display:none;' : ''; ?>">
                <div class="r2-progress-bar-track">
                    <?php $pct = $total > 0 ? round( $complete / $total * 100 ) : 0; ?>
                    <div class="r2-progress-bar-fill" id="r2-progress-fill" style="width:<?php echo esc_attr( $pct ); ?>%"></div>
                </div>
                <div class="r2-progress-label">
                    <span id="r2-progress-text"><?php echo esc_html( "{$complete} / {$total}" ); ?></span>
                    <span id="r2-progress-pct"><?php echo esc_html( $pct . '%' ); ?></span>
                </div>
            </div>

            <!-- Status message -->
            <div id="r2-migration-message" class="r2-message" style="display:none;"></div>

            <!-- Controls -->
            <div class="r2-controls">
                <button type="button" id="r2-btn-start" class="button button-primary">
                    <?php esc_html_e( 'Start Migration', 'cloudflare-r2-offload' ); ?>
                </button>
                <button type="button" id="r2-btn-pause" class="button"
                        style="<?php echo ( ! $paused && $pending > 0 ) ? '' : 'display:none;'; ?>">
                    <?php esc_html_e( 'Pause', 'cloudflare-r2-offload' ); ?>
                </button>
                <button type="button" id="r2-btn-resume" class="button"
                        style="<?php echo $paused ? '' : 'display:none;'; ?>">
                    <?php esc_html_e( 'Resume', 'cloudflare-r2-offload' ); ?>
                </button>
                <button type="button" id="r2-btn-cancel" class="button button-link-delete"
                        style="<?php echo $total > 0 ? '' : 'display:none;'; ?>">
                    <?php esc_html_e( 'Cancel', 'cloudflare-r2-offload' ); ?>
                </button>
                <?php if ( $failed > 0 ) : ?>
                <button type="button" id="r2-btn-retry" class="button">
                    <?php esc_html_e( 'Retry Failed', 'cloudflare-r2-offload' ); ?>
                </button>
                <?php endif; ?>
            </div>

            <!-- Error log -->
            <?php if ( ! empty( $recent_errors ) ) : ?>
            <h2><?php esc_html_e( 'Recent Errors', 'cloudflare-r2-offload' ); ?></h2>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e( 'Time', 'cloudflare-r2-offload' ); ?></th>
                        <th><?php esc_html_e( 'Message', 'cloudflare-r2-offload' ); ?></th>
                        <th><?php esc_html_e( 'Context', 'cloudflare-r2-offload' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $recent_errors as $entry ) : ?>
                    <tr>
                        <td><?php echo esc_html( $entry['timestamp'] ?? '' ); ?></td>
                        <td><?php echo esc_html( $entry['message'] ?? '' ); ?></td>
                        <td><code><?php echo esc_html( wp_json_encode( $entry['context'] ?? [] ) ); ?></code></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
        <?php
    }
}
