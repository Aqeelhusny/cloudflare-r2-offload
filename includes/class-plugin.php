<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Core plugin orchestrator — singleton that wires all service classes.
 */
class Plugin {

    private static ?Plugin $instance = null;

    // Public for internal cross-class access (e.g. Migration -> R2Client).
    public Settings       $settings;
    public ErrorLogger    $logger;
    public R2Client       $r2;
    public AttachmentSync $sync;

    private UploadHandler   $upload_handler;
    private UrlRewriter     $url_rewriter;
    private Migration       $migration;
    private BatchProcessor  $batch_processor;

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

        // Always-on services.
        $this->settings = new Settings();
        $this->logger   = new ErrorLogger();
        $this->r2       = new R2Client( $this->settings, $this->logger );
        $this->sync     = new AttachmentSync( $this->r2, $this->settings, $this->logger );

        // Register settings fields.
        add_action( 'admin_init', [ $this->settings, 'register' ] );

        // Hooks for new uploads and attachment deletion.
        $this->upload_handler = new UploadHandler( $this->sync, $this->settings, $this->logger );
        $this->upload_handler->register_hooks();

        // URL rewriting filters.
        $this->url_rewriter = new UrlRewriter( $this->settings );
        $this->url_rewriter->register_hooks();

        // Migration AJAX + bulk processing.
        $this->migration = new Migration( $this->sync, $this->settings, $this->logger );
        $this->migration->register_hooks();

        // Cron batch processor (needed even outside admin for scheduled events).
        $this->batch_processor = new BatchProcessor( $this->sync, $this->settings, $this->logger );
        $this->batch_processor->register_hooks();

        // Admin-only classes.
        if ( is_admin() ) {
            $admin = new Admin\Admin( $this->settings, $this->logger, $this->r2 );
            $admin->register();
        }
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

        // Ensure WordPress picks up the new cron event registration.
        flush_rewrite_rules();
    }

    /**
     * Runs on plugin deactivation.
     */
    public static function deactivate(): void {
        wp_clear_scheduled_hook( BatchProcessor::CRON_HOOK );
        delete_transient( BatchProcessor::LOCK_KEY );
    }

    // -------------------------------------------------------------------------
    // DB Setup
    // -------------------------------------------------------------------------

    private static function create_table(): void {
        global $wpdb;

        $table          = $wpdb->prefix . 'r2_offload_migration_queue';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE {$table} (
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

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta( $sql );
    }
}
