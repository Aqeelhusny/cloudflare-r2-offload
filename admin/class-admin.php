<?php
namespace R2Offload\Admin;

use R2Offload\Settings;
use R2Offload\ErrorLogger;
use R2Offload\R2Client;

defined( 'ABSPATH' ) || exit;

/**
 * Registers the admin menu and enqueues assets.
 */
class Admin {

    private Settings    $settings;
    private ErrorLogger $logger;
    private R2Client    $r2;

    public function __construct( Settings $settings, ErrorLogger $logger, R2Client $r2 ) {
        $this->settings = $settings;
        $this->logger   = $logger;
        $this->r2       = $r2;
    }

    public function register(): void {
        add_action( 'admin_menu',            [ $this, 'add_menus' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function add_menus(): void {
        add_menu_page(
            __( 'R2 Offload', 'cloudflare-r2-offload' ),
            __( 'R2 Offload', 'cloudflare-r2-offload' ),
            'manage_options',
            'r2-offload',
            [ $this, 'render_settings' ],
            'dashicons-cloud-upload',
            80
        );

        add_submenu_page(
            'r2-offload',
            __( 'Settings', 'cloudflare-r2-offload' ),
            __( 'Settings', 'cloudflare-r2-offload' ),
            'manage_options',
            'r2-offload',
            [ $this, 'render_settings' ]
        );

        add_submenu_page(
            'r2-offload',
            __( 'Migration', 'cloudflare-r2-offload' ),
            __( 'Migration', 'cloudflare-r2-offload' ),
            'manage_options',
            'r2-offload-migration',
            [ $this, 'render_migration' ]
        );

        add_submenu_page(
            'r2-offload',
            __( 'Stats', 'cloudflare-r2-offload' ),
            __( 'Stats', 'cloudflare-r2-offload' ),
            'manage_options',
            'r2-offload-stats',
            [ $this, 'render_stats' ]
        );

        if ( $this->settings->get_file_manager_enabled() ) {
            add_submenu_page(
                'r2-offload',
                __( 'File Manager', 'cloudflare-r2-offload' ),
                __( 'File Manager', 'cloudflare-r2-offload' ),
                'manage_options',
                'r2-offload-file-manager',
                [ $this, 'render_file_manager' ]
            );
        }
    }

    public function render_settings(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Insufficient permissions.', 'cloudflare-r2-offload' ) );
        }
        $page = new SettingsPage( $this->settings );
        $page->render();
    }

    public function render_migration(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Insufficient permissions.', 'cloudflare-r2-offload' ) );
        }
        $page = new MigrationPage( $this->settings, $this->logger );
        $page->render();
    }

    public function render_stats(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Insufficient permissions.', 'cloudflare-r2-offload' ) );
        }
        $page = new StatsPage( $this->settings );
        $page->render();
    }

    public function render_file_manager(): void {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'Insufficient permissions.', 'cloudflare-r2-offload' ) );
        }
        $page = new FileManagerPage( $this->settings, $this->r2, $this->logger );
        $page->render();
    }

    public function enqueue_assets( string $hook ): void {
        $plugin_pages = [
            'toplevel_page_r2-offload',
            'r2-offload_page_r2-offload-migration',
            'r2-offload_page_r2-offload-stats',
            'r2-offload_page_r2-offload-file-manager',
        ];

        // Media Library list: row actions + status badges need the script and styles too.
        $page_scripts = [
            'toplevel_page_r2-offload'             => 'settings',
            'r2-offload_page_r2-offload-migration' => 'migration',
            'r2-offload_page_r2-offload-stats'     => 'stats',
            'upload.php'                           => 'media-library',
        ];

        if ( ! in_array( $hook, $plugin_pages, true ) && ! isset( $page_scripts[ $hook ] ) ) {
            return;
        }

        wp_enqueue_style(
            'r2-offload-admin',
            R2_OFFLOAD_URL . 'assets/css/admin.css',
            [],
            R2_OFFLOAD_VERSION
        );

        // Source-less handle that only carries the R2Offload config, so it prints before
        // every plugin script (including live-logs.js, which loads before the page script).
        wp_register_script( 'r2-offload-config', false, [ 'jquery' ], R2_OFFLOAD_VERSION, true );

        $deps = [ 'jquery', 'r2-offload-config' ];
        if ( in_array( $hook, [ 'r2-offload_page_r2-offload-migration', 'r2-offload_page_r2-offload-stats' ], true ) ) {
            wp_register_script( 'r2-offload-live-logs', R2_OFFLOAD_URL . 'assets/js/live-logs.js', [ 'jquery', 'r2-offload-config' ], R2_OFFLOAD_VERSION, true );
            $deps[] = 'r2-offload-live-logs';
        }
        if ( $hook === 'r2-offload_page_r2-offload-stats' ) {
            wp_register_script( 'r2-offload-chartjs', R2_OFFLOAD_URL . 'assets/js/chart.umd.min.js', [], '4.4.7', true );
            $deps[] = 'r2-offload-chartjs';
        }

        // Each screen gets only its own script; admin.js serves the File Manager.
        $script = $page_scripts[ $hook ] ?? 'admin';
        wp_enqueue_script(
            'r2-offload-admin',
            R2_OFFLOAD_URL . "assets/js/{$script}.js",
            $deps,
            R2_OFFLOAD_VERSION,
            true
        );

        wp_localize_script( 'r2-offload-config', 'R2Offload', [
            'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
            'nonce'    => wp_create_nonce( 'r2_offload_nonce' ),
            'i18n'     => [
                // Credentials.
                'saving'                => __( 'Saving…', 'cloudflare-r2-offload' ),
                // Migration.
                'starting'              => __( 'Starting migration…', 'cloudflare-r2-offload' ),
                'pausing'               => __( 'Pausing…', 'cloudflare-r2-offload' ),
                'resuming'              => __( 'Resuming…', 'cloudflare-r2-offload' ),
                'cancelling'            => __( 'Cancelling…', 'cloudflare-r2-offload' ),
                'complete'              => __( 'Migration complete!', 'cloudflare-r2-offload' ),
                'confirmCancel'         => __( 'Cancel the migration? Progress will be lost.', 'cloudflare-r2-offload' ),
                // Logs.
                'confirmDelete'         => __( 'Delete all logs? This cannot be undone.', 'cloudflare-r2-offload' ),
                // File manager.
                'confirmDeleteFile'     => __( 'Delete this file from R2? This cannot be undone.', 'cloudflare-r2-offload' ),
                'copied'                => __( 'URL copied!', 'cloudflare-r2-offload' ),
                // Restore.
                'confirmRestoreMissing' => __( 'Download all R2-only files back to the server?', 'cloudflare-r2-offload' ),
                'confirmRestoreAll'     => __( 'Re-download ALL synced files from R2 to the server? This may take a long time.', 'cloudflare-r2-offload' ),
                'confirmRestoreSingle'  => __( 'Restore this file from R2 to the server?', 'cloudflare-r2-offload' ),
                'restoreStarting'       => __( 'Restore queued — processing in background…', 'cloudflare-r2-offload' ),
                'restoring'             => __( 'Restoring…', 'cloudflare-r2-offload' ),
                'restoreComplete'       => __( 'Restore complete!', 'cloudflare-r2-offload' ),
                'restoreFailed'         => __( 'Restore failed', 'cloudflare-r2-offload' ),
                'restoreFromR2'         => __( 'Restore from R2', 'cloudflare-r2-offload' ),
                // Local delete.
                'confirmLocalDelete'    => __( 'Delete local copies of ALL synced files? Files will still be served from R2. This cannot be undone without using the Restore feature.', 'cloudflare-r2-offload' ),
                'confirmDeleteLocal'    => __( 'Delete the local copy of this file? It will only be served from R2.', 'cloudflare-r2-offload' ),
                'localDeleteStarting'   => __( 'Local delete queued — processing in background…', 'cloudflare-r2-offload' ),
                'localDeleteComplete'   => __( 'All local files deleted.', 'cloudflare-r2-offload' ),
                'deleteFailed'          => __( 'Delete failed', 'cloudflare-r2-offload' ),
                // Restore & desync.
                'confirmDesync'         => __( 'This will restore ALL files from R2 to the server, verify them, then DELETE them from R2. Your R2 bucket will be emptied. Continue?', 'cloudflare-r2-offload' ),
                'desyncStarting'        => __( 'Restore & desync queued — processing in background…', 'cloudflare-r2-offload' ),
                'desyncComplete'        => __( 'All files restored and removed from R2.', 'cloudflare-r2-offload' ),
                'desyncCompleteFailed'  => __( '%d attachment(s) failed to desync. Check the error log.', 'cloudflare-r2-offload' ),
                // Clear activity logs.
                'confirmClearLogs'      => __( 'Clear all activity logs? This cannot be undone.', 'cloudflare-r2-offload' ),
                // Status badges.
                'statusSynced'          => __( 'Synced', 'cloudflare-r2-offload' ),
                'statusR2Only'          => __( 'R2 only', 'cloudflare-r2-offload' ),
                // Settings screen.
                'unsaved'               => __( 'You have unsaved changes', 'cloudflare-r2-offload' ),
                'allSaved'              => __( 'All changes saved', 'cloudflare-r2-offload' ),
                'saveToTest'            => __( 'Save your changes to test the new credentials.', 'cloudflare-r2-offload' ),
                'testing'               => __( 'Testing…', 'cloudflare-r2-offload' ),
                'connected'             => __( 'Connected', 'cloudflare-r2-offload' ),
                'connFailed'            => __( 'Connection failed', 'cloudflare-r2-offload' ),
                'testedNow'             => __( 'Bucket is readable and writable · tested just now', 'cloudflare-r2-offload' ),
                'requestFailed'         => __( 'Request failed. Check your connection and try again.', 'cloudflare-r2-offload' ),
                'serveHelpOn'           => __( 'Media already on R2 is served from your domain. Turn off to switch back to this server instantly.', 'cloudflare-r2-offload' ),
                'serveHelpOff'          => __( 'Add a public domain above first — without one there is nothing to serve from.', 'cloudflare-r2-offload' ),
                /* translators: %s: MIME type */
                'removeType'            => __( 'Remove %s', 'cloudflare-r2-offload' ),
                // Migration screen.
                /* translators: 1: on R2 + server, 2: R2 only, 3: not on R2, 4: failed */
                'barLabel'              => __( '%1$s on R2 and this server, %2$s on R2 only, %3$s not on R2 yet, %4$s failed', 'cloudflare-r2-offload' ),
                /* translators: %s: number of items */
                'offloadN'              => __( 'Offload %s items', 'cloudflare-r2-offload' ),
                'offloadOne'            => __( 'Offload 1 item', 'cloudflare-r2-offload' ),
                'checkNew'              => __( 'Check for new items', 'cloudflare-r2-offload' ),
                'helpRunning'           => __( 'Offloading runs in the background, so you can leave this page.', 'cloudflare-r2-offload' ),
                /* translators: %s: number of items */
                'helpLocal'             => __( '%s items are not on R2 yet. Offloading runs in the background, so you can leave this page.', 'cloudflare-r2-offload' ),
                'helpLocalOne'          => __( '1 item is not on R2 yet. Offloading runs in the background, so you can leave this page.', 'cloudflare-r2-offload' ),
                'helpDone'              => __( 'All done. New uploads are offloaded automatically — you only need this for older media.', 'cloudflare-r2-offload' ),
                'helpAllOn'             => __( 'Everything is on R2. New uploads are offloaded automatically.', 'cloudflare-r2-offload' ),
                /* translators: 1: done, 2: total, 3: percent */
                'progressCount'         => __( '%1$s of %2$s · %3$s%%', 'cloudflare-r2-offload' ),
                'estimating'            => __( 'Estimating time left…', 'cloudflare-r2-offload' ),
                /* translators: 1: items per second, 2: time left */
                'rate'                  => __( '~%1$s items/s · about %2$s left', 'cloudflare-r2-offload' ),
                /* translators: %s: number of seconds */
                'seconds'               => __( '%s s', 'cloudflare-r2-offload' ),
                /* translators: %s: number of minutes */
                'minutes'               => __( '%s min', 'cloudflare-r2-offload' ),
                'pausedNote'            => __( 'Paused — resumes where it left off', 'cloudflare-r2-offload' ),
                'finished'              => __( 'Finished', 'cloudflare-r2-offload' ),
                'noActivity'            => __( 'No activity yet.', 'cloudflare-r2-offload' ),
                'noMatches'             => __( 'Nothing to show for this filter.', 'cloudflare-r2-offload' ),
                /* translators: 1: done, 2: total */
                'jobProgress'           => __( 'Working… %1$s of %2$s', 'cloudflare-r2-offload' ),
                'jobDone'               => __( 'Done.', 'cloudflare-r2-offload' ),
                /* translators: %s: number of failed items */
                'jobDoneFailed'         => __( 'Done — %s item(s) failed. See Activity for details.', 'cloudflare-r2-offload' ),
                'confirmRestore'        => __( 'Download these files from R2 back to this server?', 'cloudflare-r2-offload' ),
                /* translators: %s: number of failed items */
                'lastRunFailed'         => __( 'Last run: %s item(s) failed. Run it again to retry them.', 'cloudflare-r2-offload' ),
                'mimeInvalid'           => __( 'That is not a valid MIME type (example: image/gif). Fix or clear it before saving.', 'cloudflare-r2-offload' ),
                'checking'              => __( 'Checking…', 'cloudflare-r2-offload' ),
                'diagItem'              => __( 'Item', 'cloudflare-r2-offload' ),
                'diagPrefix'            => __( 'Looking in bucket under:', 'cloudflare-r2-offload' ),
                // Live logs (never stored).
                'liveStarting'          => __( 'Starting…', 'cloudflare-r2-offload' ),
                'liveEnded'             => __( 'Live logs stopped — the session ended (switched off elsewhere or idle too long). Turn on again to resume.', 'cloudflare-r2-offload' ),
                'level_error'           => __( 'Error', 'cloudflare-r2-offload' ),
                'level_warning'         => __( 'Warning', 'cloudflare-r2-offload' ),
                'level_info'            => __( 'Info', 'cloudflare-r2-offload' ),
                'level_debug'           => __( 'Debug', 'cloudflare-r2-offload' ),
                'liveWaiting'           => __( 'Waiting for activity… upload media or run an offload to see it here.', 'cloudflare-r2-offload' ),
                /* translators: %s: number of entries */
                'liveCount'             => __( 'Live · %s entries · cleared when you turn this off', 'cloudflare-r2-offload' ),
                // Stats.
                /* translators: %s: number of days */
                'lastNDays'             => __( 'last %s days', 'cloudflare-r2-offload' ),
                /* translators: 1: days, 2: uploads, 3: failures */
                'chartLabel'            => __( 'Bar chart of the last %1$s days: %2$s files uploaded, %3$s failed syncs.', 'cloudflare-r2-offload' ),
                'filesUploaded'         => __( 'Files uploaded', 'cloudflare-r2-offload' ),
                'failedSyncs'           => __( 'Failed syncs', 'cloudflare-r2-offload' ),
            ],
        ] );
    }
}
