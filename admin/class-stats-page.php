<?php
namespace R2Offload\Admin;

use R2Offload\Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Stats screen: KPI cards + daily chart (7/30-day range) and the Live logs panel.
 *
 * Daily counters come from the r2_offload_stats_YYYY-MM-DD options (aggregate numbers,
 * not logs). Logs themselves are never stored — see ErrorLogger / render_live_logs().
 */
class StatsPage {

    const DAYS = 30;

    private Settings $settings;

    public function __construct( Settings $settings ) {
        $this->settings = $settings;
    }

    public function render(): void {
        global $wpdb;

        $days = [];
        for ( $i = self::DAYS - 1; $i >= 0; $i-- ) {
            $date = gmdate( 'Y-m-d', strtotime( "-{$i} days" ) );
            $stat = get_option( 'r2_offload_stats_' . $date, [] );
            $stat = is_array( $stat ) ? $stat : [];
            $days[] = [
                'date'     => $date,
                'uploads'  => (int) ( $stat['uploads'] ?? 0 ),
                'bytes'    => (int) ( $stat['bytes'] ?? 0 ),
                'failures' => (int) ( $stat['failures'] ?? 0 ),
            ];
        }
        $synced = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' ) );
        $total  = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' ) );
        ?>
        <div class="wrap r2ui r2ui--stats">
            <div class="r2ui-head">
                <h1><?php esc_html_e( 'Stats', 'cloudflare-r2-offload' ); ?></h1>
                <div class="r2ui-seg" role="radiogroup" aria-label="<?php esc_attr_e( 'Time range', 'cloudflare-r2-offload' ); ?>">
                    <button type="button" role="radio" class="r2ui-seg-btn" data-range="7" aria-checked="false"><?php esc_html_e( '7 days', 'cloudflare-r2-offload' ); ?></button>
                    <button type="button" role="radio" class="r2ui-seg-btn" data-range="30" aria-checked="true"><?php esc_html_e( '30 days', 'cloudflare-r2-offload' ); ?></button>
                </div>
            </div>

            <div class="r2ui-cards r2ui-cards--4">
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Media on R2', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-kpi"><?php echo esc_html( number_format_i18n( $synced ) ); ?></span>
                    <?php /* translators: %s: total attachments */ ?>
                    <span class="r2ui-sub"><?php echo esc_html( sprintf( __( 'of %s media items', 'cloudflare-r2-offload' ), number_format_i18n( $total ) ) ); ?></span>
                </div>
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Files uploaded', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-kpi" data-kpi="uploads">—</span>
                    <span class="r2ui-sub" data-kpi-range></span>
                </div>
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Data offloaded', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-kpi" data-kpi="bytes">—</span>
                    <span class="r2ui-sub" data-kpi-range></span>
                </div>
                <div class="r2ui-card">
                    <span class="r2ui-eyebrow"><?php esc_html_e( 'Failed syncs', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-kpi" data-kpi="failures">—</span>
                    <span class="r2ui-sub" data-kpi-range></span>
                </div>
            </div>

            <section class="r2ui-box" aria-labelledby="r2s-chart-h">
                <div class="r2ui-box-head">
                    <h2 id="r2s-chart-h"><?php esc_html_e( 'Uploads per day', 'cloudflare-r2-offload' ); ?></h2>
                    <span class="r2ui-legend-inline">
                        <span><i class="is-up" aria-hidden="true"></i><?php esc_html_e( 'Files uploaded', 'cloudflare-r2-offload' ); ?></span>
                        <span><i class="is-fail" aria-hidden="true"></i><?php esc_html_e( 'Failed syncs', 'cloudflare-r2-offload' ); ?></span>
                    </span>
                </div>
                <div class="r2ui-chart"><canvas id="r2s-chart" role="img" aria-label=""></canvas></div>
                <p class="r2ui-muted r2ui-small" id="r2s-empty" hidden><?php esc_html_e( 'No uploads in this period yet.', 'cloudflare-r2-offload' ); ?></p>
            </section>

            <?php self::render_live_logs(); ?>

            <script type="application/json" id="r2s-data"><?php echo wp_json_encode( $days ); ?></script>
        </div>
        <?php
    }

    /**
     * Live logs panel (Stats + Migration). Logs are never stored: switching on opens a
     * temporary buffer that is streamed here; switching off deletes it and everything shown.
     */
    public static function render_live_logs(): void {
        ?>
        <section class="r2ui-box r2ui-live" data-live-logs aria-labelledby="r2-live-h">
            <div class="r2ui-row">
                <div>
                    <h2 id="r2-live-h"><?php esc_html_e( 'Live logs', 'cloudflare-r2-offload' ); ?></h2>
                    <span class="r2ui-help"><?php esc_html_e( 'Logs are not stored. Turn on to watch activity as it happens — turning off deletes everything shown.', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <label class="r2ui-switch">
                    <input type="checkbox" role="switch" data-live-toggle>
                    <span class="screen-reader-text"><?php esc_html_e( 'Show live logs', 'cloudflare-r2-offload' ); ?></span>
                </label>
            </div>
            <div class="r2ui-live-body" data-live-body hidden>
                <div class="r2ui-box-head">
                    <span class="r2ui-live-status" data-live-status aria-live="polite"></span>
                    <div class="r2ui-pills" role="tablist" aria-label="<?php esc_attr_e( 'Filter logs', 'cloudflare-r2-offload' ); ?>">
                        <button type="button" role="tab" class="r2ui-pill" data-filter="all" aria-selected="true"><?php esc_html_e( 'All', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" role="tab" class="r2ui-pill" data-filter="error" aria-selected="false"><?php esc_html_e( 'Errors', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" role="tab" class="r2ui-pill" data-filter="warning" aria-selected="false"><?php esc_html_e( 'Warnings', 'cloudflare-r2-offload' ); ?></button>
                    </div>
                </div>
                <ul class="r2ui-log" data-live-list></ul>
            </div>
        </section>
        <?php
    }
}
