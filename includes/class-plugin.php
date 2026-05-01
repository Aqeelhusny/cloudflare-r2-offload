<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Core plugin orchestrator — singleton that wires all service classes.
 */
class Plugin {

    private static ?Plugin $instance = null;

    // Public for internal cross-class access (e.g. Migration -> R2Client).
    public Settings        $settings;
    public ErrorLogger     $logger;
    public R2Client        $r2;
    public AttachmentSync  $sync;
    public BatchProcessor  $batch_processor;

    private UploadHandler  $upload_handler;
    private UrlRewriter    $url_rewriter;
    private Migration      $migration;

    private function __construct() {
        $this->boot();
    }

    public static function get_instance(): self {
        if ( self::$instance === null ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // -------------------------------------------------------------------------
    // Boot
    // -------------------------------------------------------------------------

    private function boot(): void {
        // Load text domain.
        load_plugin_textdomain( 'cloudflare-r2-offload', false, dirname( R2_OFFLOAD_BASENAME ) . '/languages' );

        // Settings is lightweight (reads autoloaded options only) — always needed.
        $this->settings = new Settings();

        // URL rewriting — the only thing needed on every frontend request.
        // register_hooks() internally checks the toggle and returns immediately
        // if serving is disabled, so zero overhead when OFF.
        $this->url_rewriter = new UrlRewriter( $this->settings );
        $this->url_rewriter->register_hooks();

        // Everything below is only needed for admin, AJAX, cron, or upload hooks.
        // On a pure frontend page view with no uploads, none of this runs.
        if ( is_admin() || wp_doing_ajax() || wp_doing_cron() || $this->is_upload_request() ) {
            $this->boot_full();
        } else {
            // Deferred boot: if a new upload happens on the frontend (e.g. front-end
            // form plugins), the wp_generate_attachment_metadata filter still needs to
            // work. Register a lazy hook that boots the full stack on demand.
            add_filter( 'wp_generate_attachment_metadata', function ( $metadata, $id ) {
                if ( ! $this->logger ) {
                    $this->boot_full();
                }
                return $this->upload_handler->on_generate_metadata( $metadata, $id );
            }, 20, 2 );
        }
    }

    private function boot_full(): void {
        $this->logger = new ErrorLogger();
        $this->r2     = new R2Client( $this->settings, $this->logger );
        $this->sync   = new AttachmentSync( $this->r2, $this->settings, $this->logger );

        // Register settings fields (admin only, but admin_init may not have fired yet).
        add_action( 'admin_init', [ $this->settings, 'register' ] );

        // Hooks for new uploads and attachment deletion.
        $this->upload_handler = new UploadHandler( $this->sync, $this->settings, $this->logger );
        $this->upload_handler->register_hooks();

        // Migration AJAX + bulk processing.
        $this->migration = new Migration( $this->sync, $this->settings, $this->logger );
        $this->migration->register_hooks();

        // Cron batch processor.
        $this->batch_processor = new BatchProcessor( $this->sync, $this->settings, $this->logger );
        $this->batch_processor->register_hooks();

        // File Manager AJAX handlers (must register before admin-only gate
        // because wp_ajax_ hooks fire on admin-ajax.php which is_admin() = true,
        // but the hooks must be registered unconditionally within boot_full).
        $file_manager = new Admin\FileManagerPage( $this->settings, $this->r2, $this->logger );
        $file_manager->register_hooks();

        // Media Library row/bulk actions (admin only).
        if ( is_admin() ) {
            $media_library = new MediaLibrary( $this->sync, $this->settings );
            $media_library->register_hooks();

            $admin = new Admin\Admin( $this->settings, $this->logger, $this->r2 );
            $admin->register();
        }
    }

    private function is_upload_request(): bool {
        return ! empty( $_FILES ) || ( isset( $_SERVER['REQUEST_METHOD'] ) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset( $_POST['action'] ) );
    }

    /**
     * Rebuild the R2 client and all dependants with fresh credentials.
     * Must be called after settings are saved so the client picks up new keys.
     */
    public function rebuild_r2_client(): void {
        $this->r2   = new R2Client( $this->settings, $this->logger );
        $this->sync = new AttachmentSync( $this->r2, $this->settings, $this->logger );

        // Rebuild dependent services that hold references to the old r2/sync.
        $this->batch_processor = new BatchProcessor( $this->sync, $this->settings, $this->logger );
        $this->batch_processor->register_hooks();
    }

    // -------------------------------------------------------------------------
    // Activation / Deactivation
    // -------------------------------------------------------------------------

    /**
     * Runs on plugin activation.
     */
    public static function activate(): void {
        self::create_table();

        // Boot settings to set defaults (needs a temporary instance).
        $settings = new Settings();
        $settings->set_defaults();
    }

    /**
     * Runs on plugin deactivation.
     */
    public static function deactivate(): void {
        wp_clear_scheduled_hook( BatchProcessor::CRON_HOOK );
        wp_clear_scheduled_hook( BatchProcessor::RESTORE_HOOK );
        wp_clear_scheduled_hook( BatchProcessor::LOCAL_DEL_HOOK );
        wp_clear_scheduled_hook( BatchProcessor::DESYNC_HOOK );
        delete_transient( BatchProcessor::LOCK_KEY );
        delete_transient( BatchProcessor::RESTORE_LOCK_KEY );
        delete_transient( BatchProcessor::LOCAL_DEL_LOCK );
        delete_transient( BatchProcessor::DESYNC_LOCK );
    }

    // -------------------------------------------------------------------------
    // DB Setup
    // -------------------------------------------------------------------------

    private static function create_table(): void {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $migration_table = $wpdb->prefix . 'r2_offload_migration_queue';
        $sql_migration = "CREATE TABLE {$migration_table} (
            id            BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            attachment_id BIGINT(20) UNSIGNED NOT NULL,
            status        ENUM('pending','processing','complete','failed') NOT NULL DEFAULT 'pending',
            retry_count   TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
            error_message TEXT NULL,
            created_at    DATETIME NOT NULL,
            updated_at    DATETIME NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY attachment_id (attachment_id),
            KEY status (status),
            KEY status_retry (status, retry_count)
        ) {$charset_collate};";

        $bulk_table = $wpdb->prefix . 'r2_offload_bulk_queue';
        $sql_bulk = "CREATE TABLE {$bulk_table} (
            id            BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            attachment_id BIGINT(20) UNSIGNED NOT NULL,
            job_type      ENUM('restore','local_delete','desync') NOT NULL,
            status        ENUM('pending','processing','complete','failed') NOT NULL DEFAULT 'pending',
            created_at    DATETIME NOT NULL,
            updated_at    DATETIME NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY job_attachment (job_type, attachment_id),
            KEY job_status (job_type, status)
        ) {$charset_collate};";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql_migration );
        dbDelta( $sql_bulk );
    }
}
