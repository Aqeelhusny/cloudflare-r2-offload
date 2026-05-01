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
        $complete   = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status = %s", 'complete' ) );
        $failed     = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status = %s", 'failed' ) );
        $pending    = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `{$table}` WHERE status IN (%s,%s)", 'pending', 'processing' ) );
        $paused     = (bool) get_option( 'r2_offload_migration_paused', false );

        // Total WP attachments.
        $all_attachments = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' )
        );
        $synced_all = (int) $wpdb->get_var(
            $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' )
        );

        $recent_errors = $this->logger->get_recent_entries( 20 );
        $recent_errors = array_filter( $recent_errors, fn( $e ) => $e['level'] === 'error' );
        ?>
        <div class="wrap r2-offload-wrap">
            <h1><?php esc_html_e( 'R2 Offload — Migration', 'cloudflare-r2-offload' ); ?></h1>

            <!-- Stats Bar -->
            <div class="r2-stats-bar">
                <div class="r2-stat">
                    <span class="r2-stat-number" id="r2-stat-total-attachments"><?php echo esc_html( $all_attachments ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Total Attachments', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--success">
                    <span class="r2-stat-number" id="r2-stat-synced"><?php echo esc_html( $synced_all ); ?></span>
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
                <button type="button" id="r2-btn-run-now" class="button"
                        style="<?php echo $pending > 0 ? '' : 'display:none;'; ?>"
                        title="<?php esc_attr_e( 'Manually process one batch now — use this if cron is not running.', 'cloudflare-r2-offload' ); ?>">
                    <?php esc_html_e( 'Process Batch Now', 'cloudflare-r2-offload' ); ?>
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

            <hr style="margin:32px 0 24px;">

            <!-- ============================================================
                 Feature: Background Offload Queue
                 ============================================================ -->
            <?php if ( $this->settings->get_background_offload() ) : ?>
            <h2><?php esc_html_e( 'Background Offload Queue', 'cloudflare-r2-offload' ); ?></h2>
            <p class="description">
                <?php esc_html_e( 'New media uploads are queued and offloaded to R2 in the background via WP-Cron. This prevents upload requests from blocking while waiting for R2 transfers.', 'cloudflare-r2-offload' ); ?>
            </p>

            <div class="r2-stats-bar" style="margin:12px 0 16px;">
                <div class="r2-stat r2-stat--pending">
                    <span class="r2-stat-number" id="r2-bg-queue-pending"><?php echo esc_html( $pending ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Queued', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--success">
                    <span class="r2-stat-number" id="r2-bg-queue-synced"><?php echo esc_html( $synced_all ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Synced', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--error">
                    <span class="r2-stat-number" id="r2-bg-queue-failed"><?php echo esc_html( $failed ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Failed', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat">
                    <span class="r2-stat-number" id="r2-bg-queue-next-cron">
                        <?php
                        $next = wp_next_scheduled( 'r2_offload_process_batch' );
                        echo $next ? esc_html( human_time_diff( time(), $next ) ) : '—';
                        ?>
                    </span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Next Batch', 'cloudflare-r2-offload' ); ?></span>
                </div>
            </div>

            <div id="r2-bg-queue-message" class="r2-message" style="display:none;"></div>

            <!-- Background Queue Logs -->
            <div id="r2-bg-logs-wrap" style="margin-top:16px;">
                <h3>
                    <?php esc_html_e( 'Recent Activity', 'cloudflare-r2-offload' ); ?>
                    <button type="button" id="r2-bg-refresh-logs" class="button button-small" style="margin-left:8px;">
                        <?php esc_html_e( 'Refresh', 'cloudflare-r2-offload' ); ?>
                    </button>
                    <button type="button" id="r2-bg-clear-logs" class="button button-small" style="margin-left:4px;color:#d63638;">
                        <?php esc_html_e( 'Clear Logs', 'cloudflare-r2-offload' ); ?>
                    </button>
                </h3>
                <table class="wp-list-table widefat fixed striped" id="r2-bg-logs-table">
                    <thead>
                        <tr>
                            <th style="width:180px;"><?php esc_html_e( 'Time', 'cloudflare-r2-offload' ); ?></th>
                            <th style="width:80px;"><?php esc_html_e( 'Level', 'cloudflare-r2-offload' ); ?></th>
                            <th><?php esc_html_e( 'Message', 'cloudflare-r2-offload' ); ?></th>
                            <th style="width:250px;"><?php esc_html_e( 'Context', 'cloudflare-r2-offload' ); ?></th>
                        </tr>
                    </thead>
                    <tbody id="r2-bg-logs-body">
                        <?php
                        $bg_logs = $this->logger->get_recent_entries( 30 );
                        if ( empty( $bg_logs ) ) :
                        ?>
                        <tr><td colspan="4"><?php esc_html_e( 'No log entries yet.', 'cloudflare-r2-offload' ); ?></td></tr>
                        <?php else :
                            foreach ( $bg_logs as $entry ) :
                                $level_class = '';
                                if ( ( $entry['level'] ?? '' ) === 'error' ) $level_class = 'r2-log-error';
                                elseif ( ( $entry['level'] ?? '' ) === 'warning' ) $level_class = 'r2-log-warning';
                        ?>
                        <tr class="<?php echo esc_attr( $level_class ); ?>">
                            <td><?php echo esc_html( $entry['timestamp'] ?? '' ); ?></td>
                            <td><span class="r2-log-badge r2-log-badge--<?php echo esc_attr( $entry['level'] ?? 'info' ); ?>"><?php echo esc_html( strtoupper( $entry['level'] ?? 'INFO' ) ); ?></span></td>
                            <td><?php echo esc_html( $entry['message'] ?? '' ); ?></td>
                            <td><code style="font-size:11px;word-break:break-all;"><?php echo esc_html( wp_json_encode( $entry['context'] ?? [] ) ); ?></code></td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>

            <hr style="margin:32px 0 24px;">
            <?php endif; ?>

            <!-- ============================================================
                 Feature: Restore from R2 → Server
                 ============================================================ -->
            <h2><?php esc_html_e( 'Restore Files from R2 to Server', 'cloudflare-r2-offload' ); ?></h2>
            <p class="description">
                <?php esc_html_e( 'Download files from R2 back to the local server. Use this if you previously deleted local files and need to restore them, or if you want to migrate away from R2.', 'cloudflare-r2-offload' ); ?>
            </p>
            <?php
            $r2only_count = (int) $wpdb->get_var(
                $wpdb->prepare(
                    "SELECT COUNT(DISTINCT pm.post_id)
                     FROM {$wpdb->postmeta} pm
                     WHERE pm.meta_key = %s AND pm.meta_value = %s
                       AND EXISTS (
                           SELECT 1 FROM {$wpdb->postmeta} pm2
                           WHERE pm2.post_id = pm.post_id
                             AND pm2.meta_key = %s AND pm2.meta_value = %s
                       )",
                    '_r2_offload_synced', '1',
                    '_r2_offload_local_deleted', '1'
                )
            );
            ?>
            <div class="r2-stats-bar" style="margin:12px 0 16px;">
                <div class="r2-stat r2-stat--r2only">
                    <span class="r2-stat-number"><?php echo esc_html( $r2only_count ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'R2-only (local deleted)', 'cloudflare-r2-offload' ); ?></span>
                </div>
            </div>
            <div id="r2-restore-message" class="r2-message" style="display:none;"></div>
            <div class="r2-progress-wrap" id="r2-restore-progress-wrap" style="display:none;">
                <div class="r2-progress-bar-track">
                    <div class="r2-progress-bar-fill r2-progress-bar-fill--restore" id="r2-restore-fill" style="width:0%;"></div>
                </div>
                <div class="r2-progress-label">
                    <span id="r2-restore-text">0 / 0</span>
                    <span id="r2-restore-pct">0%</span>
                </div>
            </div>
            <div class="r2-controls">
                <button type="button" id="r2-btn-restore-missing" class="button button-primary">
                    <?php esc_html_e( 'Restore Missing Files from R2', 'cloudflare-r2-offload' ); ?>
                </button>
                <button type="button" id="r2-btn-restore-all" class="button">
                    <?php esc_html_e( 'Restore ALL Synced Files from R2', 'cloudflare-r2-offload' ); ?>
                </button>
                <p class="description" style="margin:6px 0 0;">
                    <?php esc_html_e( '"Restore Missing" only downloads files that are R2-only. "Restore ALL" re-downloads every synced file regardless.', 'cloudflare-r2-offload' ); ?>
                </p>
            </div>

            <hr style="margin:32px 0 24px;">

            <!-- ============================================================
                 Feature: Auto-delete local files (bulk)
                 ============================================================ -->
            <h2><?php esc_html_e( 'Delete Local Files (Free Up Server Space)', 'cloudflare-r2-offload' ); ?></h2>
            <p class="description">
                <?php esc_html_e( 'Delete local copies of all files that are already synced to R2. Use this after a bulk migration to reclaim server disk space. Files remain fully accessible via R2/CDN.', 'cloudflare-r2-offload' ); ?>
            </p>
            <p class="description" style="color:#d63638;font-weight:600;">
                <?php esc_html_e( 'Warning: This is irreversible without using the Restore feature above. Ensure your R2 connection is stable before proceeding.', 'cloudflare-r2-offload' ); ?>
            </p>
            <?php
            $local_del_total  = (int) get_option( 'r2_offload_local_del_total',  0 );
            $local_del_done   = (int) get_option( 'r2_offload_local_del_done',   0 );
            $local_del_failed = (int) get_option( 'r2_offload_local_del_failed', 0 );
            ?>
            <?php if ( $local_del_total > 0 ) : ?>
            <div class="r2-progress-wrap" id="r2-local-del-progress-wrap">
                <div class="r2-progress-bar-track">
                    <?php $del_pct = $local_del_total > 0 ? round( $local_del_done / $local_del_total * 100 ) : 0; ?>
                    <div class="r2-progress-bar-fill r2-progress-bar-fill--delete" id="r2-local-del-fill"
                         style="width:<?php echo esc_attr( $del_pct ); ?>%;"></div>
                </div>
                <div class="r2-progress-label">
                    <span id="r2-local-del-text"><?php echo esc_html( "{$local_del_done} / {$local_del_total}" ); ?></span>
                    <span id="r2-local-del-pct"><?php echo esc_html( $del_pct . '%' ); ?></span>
                </div>
            </div>
            <?php else : ?>
            <div class="r2-progress-wrap" id="r2-local-del-progress-wrap" style="display:none;">
                <div class="r2-progress-bar-track">
                    <div class="r2-progress-bar-fill r2-progress-bar-fill--delete" id="r2-local-del-fill" style="width:0%;"></div>
                </div>
                <div class="r2-progress-label">
                    <span id="r2-local-del-text">0 / 0</span>
                    <span id="r2-local-del-pct">0%</span>
                </div>
            </div>
            <?php endif; ?>
            <div id="r2-local-del-message" class="r2-message" style="display:none;"></div>
            <div class="r2-controls">
                <button type="button" id="r2-btn-local-delete" class="button button-primary" style="background:#d63638;border-color:#d63638;">
                    <?php esc_html_e( 'Delete Local Files for All Synced Attachments', 'cloudflare-r2-offload' ); ?>
                </button>
            </div>

            <hr style="margin:32px 0 24px;">

            <!-- ============================================================
                 Feature: Restore & Desync — restore from R2, verify, delete from R2
                 ============================================================ -->
            <h2><?php esc_html_e( 'Restore & Remove from R2', 'cloudflare-r2-offload' ); ?></h2>
            <p class="description">
                <?php esc_html_e( 'Download all synced files from R2 back to the server, verify each file exists locally, then delete the copies from R2 and remove all sync metadata. Use this to fully disconnect from R2.', 'cloudflare-r2-offload' ); ?>
            </p>
            <p class="description" style="color:#d63638;font-weight:600;">
                <?php esc_html_e( 'Warning: This will remove all files from your R2 bucket and clear sync status. Your files will only exist on the local server afterwards.', 'cloudflare-r2-offload' ); ?>
            </p>
            <div id="r2-desync-message" class="r2-message" style="display:none;"></div>
            <div class="r2-progress-wrap" id="r2-desync-progress-wrap" style="display:none;">
                <div class="r2-progress-bar-track">
                    <div class="r2-progress-bar-fill r2-progress-bar-fill--delete" id="r2-desync-fill" style="width:0%;"></div>
                </div>
                <div class="r2-progress-label">
                    <span id="r2-desync-text">0 / 0</span>
                    <span id="r2-desync-pct">0%</span>
                </div>
            </div>
            <div class="r2-controls">
                <button type="button" id="r2-btn-desync" class="button button-primary" style="background:#d63638;border-color:#d63638;">
                    <?php esc_html_e( 'Restore & Remove All from R2', 'cloudflare-r2-offload' ); ?>
                </button>
            </div>

            <hr style="margin:32px 0 24px;">

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
