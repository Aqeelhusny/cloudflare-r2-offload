<?php
namespace R2Offload\Admin;

use R2Offload\BatchProcessor;
use R2Offload\ErrorLogger;
use R2Offload\Migration;
use R2Offload\Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Migration screen: where media lives, one offload job, one activity log,
 * collapsed tools and a typed-confirmation danger zone.
 *
 * Markup only — migration.js drives every job through the existing AJAX
 * endpoints and refreshes the numbers rendered here.
 */
class MigrationPage {

    private Settings    $settings;
    private ErrorLogger $logger;

    public function __construct( Settings $settings, ErrorLogger $logger ) {
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function render(): void {
        global $wpdb;

        $queue   = $wpdb->prefix . 'r2_offload_migration_queue';
        $failed  = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM `{$queue}` WHERE status = %s", 'failed' ) );
        $total   = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->posts} WHERE post_type = %s", 'attachment' ) );
        $synced  = (int) $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) FROM {$wpdb->postmeta} WHERE meta_key = %s AND meta_value = %s", '_r2_offload_synced', '1' ) );
        $r2_only = Migration::count_r2_only();
        $both    = max( 0, $synced - $r2_only );
        $local   = max( 0, $total - $synced - $failed );
        $next    = wp_next_scheduled( BatchProcessor::CRON_HOOK );
        $n       = 'number_format_i18n';
        ?>
        <div class="wrap r2ui r2ui--migration" data-bucket="<?php echo esc_attr( $this->settings->get_bucket() ); ?>">
            <div class="r2ui-head">
                <h1><?php esc_html_e( 'Migration', 'cloudflare-r2-offload' ); ?></h1>
            </div>

            <?php if ( ! $this->settings->is_configured() ) : ?>
                <div class="notice notice-warning inline"><p>
                    <?php
                    printf(
                        /* translators: %s: settings page URL */
                        wp_kses( __( 'Add your R2 credentials in <a href="%s">Settings</a> before offloading.', 'cloudflare-r2-offload' ), [ 'a' => [ 'href' => [] ] ] ),
                        esc_url( admin_url( 'admin.php?page=r2-offload' ) )
                    );
                    ?>
                </p></div>
            <?php endif; ?>

            <!-- Where your media lives -->
            <section class="r2ui-box" aria-labelledby="r2m-lib-h">
                <div class="r2ui-box-head">
                    <h2 id="r2m-lib-h"><?php esc_html_e( 'Where your media lives', 'cloudflare-r2-offload' ); ?></h2>
                    <span class="r2ui-muted"><span data-stat="total"><?php echo esc_html( $n( $total ) ); ?></span> <?php esc_html_e( 'media items', 'cloudflare-r2-offload' ); ?></span>
                </div>
                <div class="r2ui-bar" role="img" id="r2m-bar" aria-label="">
                    <span class="r2ui-bar-seg is-both" data-seg="both"></span>
                    <span class="r2ui-bar-seg is-r2" data-seg="r2"></span>
                    <span class="r2ui-bar-seg is-fail" data-seg="fail"></span>
                </div>
                <div class="r2ui-legend">
                    <span><i class="is-both" aria-hidden="true"></i><b data-stat="both"><?php echo esc_html( $n( $both ) ); ?></b><em><?php esc_html_e( 'On R2 + this server', 'cloudflare-r2-offload' ); ?></em></span>
                    <span><i class="is-r2" aria-hidden="true"></i><b data-stat="r2"><?php echo esc_html( $n( $r2_only ) ); ?></b><em><?php esc_html_e( 'R2 only (local freed)', 'cloudflare-r2-offload' ); ?></em></span>
                    <span><i class="is-local" aria-hidden="true"></i><b data-stat="local"><?php echo esc_html( $n( $local ) ); ?></b><em><?php esc_html_e( 'Not on R2 yet', 'cloudflare-r2-offload' ); ?></em></span>
                    <span><i class="is-fail" aria-hidden="true"></i><b data-stat="failed"><?php echo esc_html( $n( $failed ) ); ?></b><em><?php esc_html_e( 'Failed', 'cloudflare-r2-offload' ); ?></em></span>
                </div>
            </section>

            <!-- Offload: one job, one primary action -->
            <section class="r2ui-box" aria-labelledby="r2m-off-h" id="r2m-offload" data-state="idle">
                <div class="r2ui-box-head r2ui-box-head--top">
                    <div>
                        <h2 id="r2m-off-h"><?php esc_html_e( 'Offload media to R2', 'cloudflare-r2-offload' ); ?></h2>
                        <p class="r2ui-muted" id="r2m-off-help"></p>
                    </div>
                    <div class="r2ui-btns">
                        <button type="button" class="button button-primary" id="r2m-start"><?php esc_html_e( 'Offload', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button" id="r2m-pause" hidden><?php esc_html_e( 'Pause', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button button-primary" id="r2m-resume" hidden><?php esc_html_e( 'Resume', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button-link r2ui-danger-link" id="r2m-cancel" hidden><?php esc_html_e( 'Cancel', 'cloudflare-r2-offload' ); ?></button>
                    </div>
                </div>
                <div class="r2ui-progress" id="r2m-progress" hidden>
                    <div class="r2ui-progress-track" role="progressbar" aria-label="<?php esc_attr_e( 'Offload progress', 'cloudflare-r2-offload' ); ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <span class="r2ui-progress-fill"></span>
                    </div>
                    <div class="r2ui-progress-meta"><span data-progress="count"></span><span data-progress="eta"></span></div>
                </div>
                <label class="r2ui-check">
                    <input type="checkbox" id="r2m-fast" checked>
                    <span><b><?php esc_html_e( 'Go faster while this page is open', 'cloudflare-r2-offload' ); ?></b> — <?php esc_html_e( 'processes batches directly from this tab instead of waiting for WP-Cron. Safe to close any time; the rest continues in the background.', 'cloudflare-r2-offload' ); ?></span>
                </label>
                <p class="r2ui-muted r2ui-small" id="r2m-cron-note">
                    <?php
                    echo $next
                        /* translators: %s: human time difference, e.g. "2 mins" */
                        ? esc_html( sprintf( __( 'Next background run in %s.', 'cloudflare-r2-offload' ), human_time_diff( time(), max( time(), (int) $next ) ) ) )
                        : esc_html__( 'No background run scheduled.', 'cloudflare-r2-offload' );
                    ?>
                </p>
                <div class="r2ui-alert" id="r2m-failed" hidden>
                    <span><b data-stat="failed"><?php echo esc_html( $n( $failed ) ); ?></b> <?php esc_html_e( 'items failed after 3 attempts — usually a missing local file or a network error. Turn on Live logs below and retry to see why.', 'cloudflare-r2-offload' ); ?></span>
                    <span class="r2ui-btns">
                        <button type="button" class="button-link" id="r2m-retry"><?php esc_html_e( 'Retry failed', 'cloudflare-r2-offload' ); ?></button>
                    </span>
                </div>
                <div class="r2ui-message" id="r2m-message" role="status" hidden></div>
            </section>

            <?php StatsPage::render_live_logs(); ?>

            <!-- Less common tools -->
            <h2 class="r2ui-section-h"><?php esc_html_e( 'Tools', 'cloudflare-r2-offload' ); ?></h2>

            <details class="r2ui-tool" data-job="validate">
                <summary><?php esc_html_e( 'Already copied your uploads to R2 yourself?', 'cloudflare-r2-offload' ); ?> <span><?php esc_html_e( 'Claim them without re-uploading', 'cloudflare-r2-offload' ); ?></span></summary>
                <div class="r2ui-tool-body">
                    <p class="r2ui-muted"><?php esc_html_e( 'For uploads you copied with rclone or Wrangler. Each unsynced item is checked in the bucket and marked as synced only if every size is found. Safe to run alongside an offload.', 'cloudflare-r2-offload' ); ?></p>
                    <div class="r2ui-btns">
                        <button type="button" class="button" id="r2m-diagnose"><?php esc_html_e( 'Check one item first', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button" id="r2m-validate"><?php esc_html_e( 'Claim existing files', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button-link r2ui-danger-link" id="r2m-validate-cancel" hidden><?php esc_html_e( 'Cancel', 'cloudflare-r2-offload' ); ?></button>
                    </div>
                    <pre class="r2ui-pre" id="r2m-diagnose-out" hidden></pre>
                    <div class="r2ui-job" data-job-status hidden></div>
                </div>
            </details>

            <details class="r2ui-tool" data-job="restore">
                <summary><?php esc_html_e( 'Restore files to this server', 'cloudflare-r2-offload' ); ?> <span><b data-stat="r2"><?php echo esc_html( $n( $r2_only ) ); ?></b> <?php esc_html_e( 'items exist only on R2', 'cloudflare-r2-offload' ); ?></span></summary>
                <div class="r2ui-tool-body">
                    <p class="r2ui-muted"><?php esc_html_e( 'Downloads files back from R2. Items stay synced, so media keeps serving from your CDN.', 'cloudflare-r2-offload' ); ?></p>
                    <fieldset class="r2ui-radios">
                        <legend><?php esc_html_e( 'Restore', 'cloudflare-r2-offload' ); ?></legend>
                        <label><input type="radio" name="r2m_restore" value="1" checked> <?php esc_html_e( 'Only items missing locally', 'cloudflare-r2-offload' ); ?> (<span data-stat="r2"><?php echo esc_html( $n( $r2_only ) ); ?></span>)</label>
                        <label><input type="radio" name="r2m_restore" value="0"> <?php esc_html_e( 'Everything on R2, overwriting local copies', 'cloudflare-r2-offload' ); ?> (<span data-stat="synced"><?php echo esc_html( $n( $synced ) ); ?></span>)</label>
                    </fieldset>
                    <div><button type="button" class="button" id="r2m-restore"><?php esc_html_e( 'Start restore', 'cloudflare-r2-offload' ); ?></button></div>
                    <div class="r2ui-job" data-job-status hidden></div>
                </div>
            </details>

            <details class="r2ui-tool" data-job="local_delete">
                <summary><?php esc_html_e( 'Free up server space', 'cloudflare-r2-offload' ); ?> <span><b data-stat="both"><?php echo esc_html( $n( $both ) ); ?></b> <?php esc_html_e( "items have a local copy that's also on R2", 'cloudflare-r2-offload' ); ?></span></summary>
                <div class="r2ui-tool-body">
                    <p class="r2ui-muted"><?php echo wp_kses( __( 'Deletes local copies only where every file is confirmed on R2. You can bring them back with <b>Restore files to this server</b>.', 'cloudflare-r2-offload' ), [ 'b' => [] ] ); ?></p>
                    <div><button type="button" class="button r2ui-btn-danger" id="r2m-local-delete"><?php esc_html_e( 'Delete local copies', 'cloudflare-r2-offload' ); ?></button></div>
                    <div class="r2ui-job" data-job-status hidden></div>
                </div>
            </details>

            <!-- Danger zone -->
            <section class="r2ui-box r2ui-box--danger" aria-labelledby="r2m-dz-h" data-job="desync">
                <h2 id="r2m-dz-h"><?php esc_html_e( 'Danger zone', 'cloudflare-r2-offload' ); ?></h2>
                <div class="r2ui-box-head r2ui-box-head--top">
                    <div>
                        <span class="r2ui-row-title"><?php esc_html_e( 'Move everything back and disconnect from R2', 'cloudflare-r2-offload' ); ?></span>
                        <span class="r2ui-help"><?php esc_html_e( 'Restores every file to this server, verifies each one, then deletes them from the bucket and clears sync status. Media will be served from this server only.', 'cloudflare-r2-offload' ); ?></span>
                    </div>
                    <button type="button" class="button r2ui-btn-danger" id="r2m-dz-open" aria-expanded="false" aria-controls="r2m-dz-confirm"><?php esc_html_e( 'Disconnect from R2…', 'cloudflare-r2-offload' ); ?></button>
                </div>
                <div class="r2ui-confirm" id="r2m-dz-confirm" hidden>
                    <label for="r2m-dz-input">
                        <?php
                        /* translators: %s: bucket name */
                        echo wp_kses( sprintf( __( 'Type the bucket name %s to confirm', 'cloudflare-r2-offload' ), '<code>' . esc_html( $this->settings->get_bucket() ) . '</code>' ), [ 'code' => [] ] );
                        ?>
                    </label>
                    <div class="r2ui-btns">
                        <input type="text" id="r2m-dz-input" autocomplete="off" spellcheck="false">
                        <button type="button" class="button r2ui-btn-danger-solid" id="r2m-desync" disabled><?php esc_html_e( 'Restore & remove from R2', 'cloudflare-r2-offload' ); ?></button>
                        <button type="button" class="button-link" id="r2m-dz-close"><?php esc_html_e( 'Keep R2', 'cloudflare-r2-offload' ); ?></button>
                    </div>
                </div>
                <div class="r2ui-job" data-job-status hidden></div>
            </section>
        </div>
        <?php
    }
}
