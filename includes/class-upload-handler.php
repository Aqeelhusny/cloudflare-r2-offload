<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Intercepts new media uploads and triggers R2 sync after all image sizes are generated.
 *
 * WooCommerce compatibility notes:
 *  - WooCommerce regenerates image sizes on the fly via wc_product_maybe_generate_image_resize()
 *    and also via WP-CLI / Regenerate Thumbnails. In both cases wp_generate_attachment_metadata
 *    fires again on an already-synced attachment. We must re-sync so any newly generated sizes
 *    (e.g. woocommerce_thumbnail, woocommerce_gallery_thumbnail) are uploaded to R2.
 *  - woocommerce_rest_insert_product_object fires when a product image is set/changed via REST.
 *    The attachment has already been uploaded and wp_generate_attachment_metadata already ran,
 *    so no extra hook is needed.
 *  - WooCommerce's placeholder image is never an attachment — no conflict.
 */
class UploadHandler {

    private AttachmentSync $sync;
    private Settings       $settings;
    private ErrorLogger    $logger;

    public function __construct( AttachmentSync $sync, Settings $settings, ErrorLogger $logger ) {
        $this->sync     = $sync;
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    public function register_hooks(): void {
        // Primary hook: fires after WordPress AND WooCommerce have generated all image sizes.
        // Priority 20 ensures third-party sizes (woocommerce_thumbnail, etc.) already exist.
        add_filter( 'wp_generate_attachment_metadata', [ $this, 'on_generate_metadata' ], 20, 2 );

        // WooCommerce REST API: product image may be set without going through the media uploader.
        // Attachment creation still triggers wp_generate_attachment_metadata, so we are covered.
        // However, when WooCommerce sets a featured image on an existing product via REST and the
        // attachment was already synced, we force a re-sync so any WC-specific sizes are uploaded.
        add_action( 'woocommerce_rest_insert_product_object',          [ $this, 'on_wc_rest_product_save' ], 10, 1 );
        add_action( 'woocommerce_rest_insert_product_variation_object', [ $this, 'on_wc_rest_product_save' ], 10, 1 );

        // Hook for attachments deleted from the media library.
        add_action( 'delete_attachment', [ $this, 'on_delete_attachment' ], 10, 1 );
    }

    // -------------------------------------------------------------------------
    // Hooks
    // -------------------------------------------------------------------------

    /**
     * Triggered after all image sizes are generated for an uploaded attachment.
     * Also fires when WooCommerce regenerates sizes (wc_product_maybe_generate_image_resize).
     * This filter MUST return $metadata unchanged.
     *
     * @param array $metadata      Attachment metadata.
     * @param int   $attachment_id Attachment post ID.
     * @return array
     */
    public function on_generate_metadata( array $metadata, int $attachment_id ): array {
        if ( ! $this->settings->get_upload_on_save() ) {
            return $metadata;
        }

        if ( ! $this->settings->is_configured() ) {
            return $metadata;
        }

        if ( $this->settings->get_background_offload() ) {
            $this->enqueue_for_background( $attachment_id );
            return $metadata;
        }

        // Always re-sync: WooCommerce may have added new sizes since the last sync.
        // AttachmentSync handles skipping individual files that are already on R2
        // (via the r2_offload_keys postmeta diff logic).
        $result = $this->sync->sync_attachment( $attachment_id );

        $this->logger->info( 'Attachment synced to R2 via wp_generate_attachment_metadata.', [
            'attachment_id' => $attachment_id,
            'uploaded'      => $result['uploaded'],
            'failed'        => $result['failed'],
            'skipped'       => $result['skipped'],
        ] );

        return $metadata;
    }

    /**
     * Enqueue an attachment for background R2 offload via WP-Cron.
     * Inserts into the migration queue table and schedules the batch processor.
     */
    private function enqueue_for_background( int $attachment_id ): void {
        global $wpdb;

        $table = $wpdb->prefix . 'r2_offload_migration_queue';
        $now   = current_time( 'mysql', true );

        // INSERT IGNORE skips silently if attachment_id already exists (UNIQUE KEY).
        // No SELECT needed — the DB handles dedup atomically.
        $wpdb->query(
            $wpdb->prepare(
                "INSERT IGNORE INTO `{$table}` (attachment_id, status, retry_count, created_at, updated_at)
                 VALUES (%d, 'pending', 0, %s, %s)",
                $attachment_id, $now, $now
            )
        );

        if ( ! wp_next_scheduled( 'r2_offload_process_batch' ) ) {
            wp_schedule_single_event( time() + 5, 'r2_offload_process_batch' );
            spawn_cron();
        }

        $this->logger->info( 'Attachment queued for background R2 offload.', [ 'attachment_id' => $attachment_id ] );
    }

    /**
     * Re-sync when a WooCommerce product is saved via REST API and references an
     * already-existing attachment that may have new WC image sizes on disk.
     *
     * @param \WC_Product|\WC_Product_Variation $product
     */
    public function on_wc_rest_product_save( $product ): void {
        if ( ! $this->settings->get_upload_on_save() || ! $this->settings->is_configured() ) {
            return;
        }

        if ( ! is_callable( [ $product, 'get_image_id' ] ) ) {
            return;
        }

        $image_id = (int) $product->get_image_id();
        if ( ! $image_id ) {
            return;
        }

        // Only re-sync if the attachment was previously marked synced — meaning new WC sizes
        // may have been generated after the original sync.
        if ( get_post_meta( $image_id, '_r2_offload_synced', true ) !== '1' ) {
            return;
        }

        if ( $this->settings->get_background_offload() ) {
            $this->enqueue_for_background( $image_id );
            return;
        }

        $this->sync->sync_attachment( $image_id );
    }

    /**
     * When a media item is deleted from WordPress, also remove it from R2.
     */
    public function on_delete_attachment( int $attachment_id ): void {
        if ( get_post_meta( $attachment_id, '_r2_offload_synced', true ) !== '1' ) {
            return;
        }
        $this->sync->desync_attachment( $attachment_id );
        $this->logger->info( 'Attachment deleted from R2.', [ 'attachment_id' => $attachment_id ] );
    }
}
