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

        if ( ! in_array( $hook, $plugin_pages, true ) ) {
            return;
        }

        wp_enqueue_style(
            'r2-offload-admin',
            R2_OFFLOAD_URL . 'assets/css/admin.css',
            [],
            R2_OFFLOAD_VERSION
        );

        wp_enqueue_script(
            'r2-offload-admin',
            R2_OFFLOAD_URL . 'assets/js/admin.js',
            [ 'jquery' ],
            R2_OFFLOAD_VERSION,
            true
        );

        wp_localize_script( 'r2-offload-admin', 'R2Offload', [
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
            ],
        ] );
    }
}
