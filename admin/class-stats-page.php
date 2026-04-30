<?php
namespace R2Offload\Admin;

use R2Offload\Settings;

defined( 'ABSPATH' ) || exit;

class StatsPage {

    private Settings $settings;

    public function __construct( Settings $settings ) {
        $this->settings = $settings;
    }

    public function render(): void {
        $days   = 30;
        $labels = [];
        $uploads = [];
        $bytes   = [];
        $failures = [];

        for ( $i = $days - 1; $i >= 0; $i-- ) {
            $date    = gmdate( 'Y-m-d', strtotime( "-{$i} days" ) );
            $key     = 'r2_offload_stats_' . $date;
            $stat    = get_option( $key, [ 'uploads' => 0, 'bytes' => 0, 'failures' => 0 ] );
            if ( ! is_array( $stat ) ) {
                $stat = [ 'uploads' => 0, 'bytes' => 0, 'failures' => 0 ];
            }
            $labels[]   = $date;
            $uploads[]  = (int) ( $stat['uploads'] ?? 0 );
            $bytes[]    = (int) ( $stat['bytes'] ?? 0 );
            $failures[] = (int) ( $stat['failures'] ?? 0 );
        }

        $total_uploads  = array_sum( $uploads );
        $total_bytes    = array_sum( $bytes );
        $total_failures = array_sum( $failures );

        // Total synced count.
        global $wpdb;
        $total_synced = (int) $wpdb->get_var(
            "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = '_r2_offload_synced' AND meta_value = '1'"
        );
        ?>
        <div class="wrap r2-offload-wrap">
            <h1><?php esc_html_e( 'R2 Offload — Stats', 'cloudflare-r2-offload' ); ?></h1>

            <!-- Summary cards -->
            <div class="r2-stats-bar">
                <div class="r2-stat r2-stat--success">
                    <span class="r2-stat-number"><?php echo esc_html( number_format( $total_synced ) ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Total Files on R2', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat">
                    <span class="r2-stat-number"><?php echo esc_html( number_format( $total_uploads ) ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Uploads (30 days)', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat">
                    <span class="r2-stat-number"><?php echo esc_html( $this->format_bytes( $total_bytes ) ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Bytes Offloaded (30 days)', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2-stat r2-stat--error">
                    <span class="r2-stat-number"><?php echo esc_html( number_format( $total_failures ) ); ?></span>
                    <span class="r2-stat-label"><?php esc_html_e( 'Failures (30 days)', 'cloudflare-r2-offload' ); ?></span>
                </div>
            </div>

            <!-- Chart -->
            <div class="r2-chart-wrap">
                <canvas id="r2-uploads-chart" height="100"></canvas>
            </div>

            <?php
            wp_enqueue_script(
                'r2-offload-chartjs',
                R2_OFFLOAD_URL . 'assets/js/chart.umd.min.js',
                [],
                '4.4.7',
                true
            );

            $chart_data = wp_json_encode( [
                'labels'   => $labels,
                'uploads'  => $uploads,
                'failures' => $failures,
                'i18n'     => [
                    'uploads'  => __( 'Uploads', 'cloudflare-r2-offload' ),
                    'failures' => __( 'Failures', 'cloudflare-r2-offload' ),
                ],
            ] );

            wp_add_inline_script( 'r2-offload-chartjs', sprintf(
                '(function(){var d=%s;var ctx=document.getElementById("r2-uploads-chart");if(!ctx)return;new Chart(ctx,{type:"bar",data:{labels:d.labels,datasets:[{label:d.i18n.uploads,data:d.uploads,backgroundColor:"rgba(54,162,235,0.7)",borderRadius:4},{label:d.i18n.failures,data:d.failures,backgroundColor:"rgba(214,54,56,0.7)",borderRadius:4}]},options:{responsive:true,plugins:{legend:{position:"top"}},scales:{y:{beginAtZero:true,ticks:{stepSize:1}}}}});})();',
                $chart_data
            ) );
            ?>
        </div>
        <?php
    }

    private function format_bytes( int $bytes ): string {
        if ( $bytes >= 1073741824 ) return round( $bytes / 1073741824, 2 ) . ' GB';
        if ( $bytes >= 1048576 )   return round( $bytes / 1048576, 2 ) . ' MB';
        if ( $bytes >= 1024 )      return round( $bytes / 1024, 2 ) . ' KB';
        return $bytes . ' B';
    }
}
