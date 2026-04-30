<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Rewrites WordPress (and WooCommerce) media URLs to point at the Cloudflare R2 / CDN domain.
 *
 * WooCommerce compatibility notes:
 *  - woocommerce_product_get_image / post_thumbnail_html: covered via wp_get_attachment_image_src.
 *  - woocommerce_single_product_image_thumbnail_html: rewritten through wp_get_attachment_url.
 *  - woocommerce_rest_prepare_product_object: WC REST API calls wp_get_attachment_url internally,
 *    so standard filter covers it.
 *  - wc_placeholder_img_src: excluded — placeholder has no attachment ID.
 *  - Multisite: local_base / cdn_base must NOT be cached across switch_to_blog() boundaries.
 */
class UrlRewriter {

    private Settings $settings;

    public function __construct( Settings $settings ) {
        $this->settings = $settings;
    }

    public function register_hooks(): void {
        // Only register URL rewriting filters when the toggle is ON and a CDN
        // domain is configured. This means zero filter overhead on frontend
        // requests when R2 serving is disabled — no function calls, no DB queries.
        if ( ! $this->settings->get_serve_from_r2() || ! $this->settings->get_custom_domain() ) {
            return;
        }

        // Core WordPress media URL filters.
        add_filter( 'wp_get_attachment_url',       [ $this, 'rewrite_url' ],       10, 2 );
        add_filter( 'wp_get_attachment_image_src', [ $this, 'rewrite_image_src' ], 10, 4 );
        add_filter( 'wp_calculate_image_srcset',   [ $this, 'rewrite_srcset' ],    10, 5 );
        add_filter( 'the_content',                 [ $this, 'rewrite_content' ],   20 );

        // WooCommerce: product gallery thumbnails use this filter directly.
        add_filter( 'woocommerce_single_product_image_thumbnail_html', [ $this, 'rewrite_html_blob' ], 10, 1 );

        // WooCommerce REST API: product/variation image URLs come through here.
        add_filter( 'woocommerce_rest_prepare_product_object',           [ $this, 'rewrite_rest_response' ], 10, 1 );
        add_filter( 'woocommerce_rest_prepare_product_variation_object', [ $this, 'rewrite_rest_response' ], 10, 1 );

        // Multisite: flush the per-request URL caches when switching blogs,
        // because wp_upload_dir() returns different baseurls per blog.
        add_action( 'switch_blog', [ $this, 'flush_url_cache' ] );
    }

    // -------------------------------------------------------------------------
    // Core WordPress filters
    // -------------------------------------------------------------------------

    /**
     * Rewrite a single attachment URL (used everywhere in WP + WooCommerce).
     */
    public function rewrite_url( string $url, int $attachment_id ): string {
        if ( ! $this->is_synced( $attachment_id ) ) {
            return $url;
        }
        return $this->replace( $url );
    }

    /**
     * Rewrite the src returned by wp_get_attachment_image_src().
     * WooCommerce product images, thumbnails, and gallery images all go through this.
     *
     * @param array|false $image  [ url, width, height, is_intermediate ] or false.
     */
    public function rewrite_image_src( $image, int $attachment_id, $size, bool $icon ) {
        if ( ! $image || ! $this->is_synced( $attachment_id ) ) {
            return $image;
        }
        $image[0] = $this->replace( $image[0] );
        return $image;
    }

    /**
     * Rewrite all URLs in a srcset array.
     */
    public function rewrite_srcset( array $sources, array $size_array, string $image_src, array $image_meta, int $attachment_id ): array {
        if ( ! $this->is_synced( $attachment_id ) ) {
            return $sources;
        }
        foreach ( $sources as &$source ) {
            if ( isset( $source['url'] ) ) {
                $source['url'] = $this->replace( $source['url'] );
            }
        }
        return $sources;
    }

    /**
     * Rewrite any remaining upload URLs in post content / product descriptions.
     * Runs at priority 20 — after WooCommerce's own content filters (priority 10).
     */
    public function rewrite_content( string $content ): string {
        $local = $this->get_local_base();
        $cdn   = $this->get_cdn_base();

        if ( ! $local || ! $cdn || $local === $cdn ) {
            return $content;
        }

        return str_replace( $local, $cdn, $content );
    }

    // -------------------------------------------------------------------------
    // WooCommerce-specific filters
    // -------------------------------------------------------------------------

    /**
     * Rewrite URLs inside an arbitrary HTML blob.
     * Used for woocommerce_single_product_image_thumbnail_html and similar filters
     * that return raw HTML rather than a URL string.
     */
    public function rewrite_html_blob( string $html ): string {
        return $this->rewrite_content( $html );
    }

    /**
     * Rewrite image URLs inside WooCommerce REST API response objects.
     * WP_REST_Response->data['images'] contains src/thumbnail/medium keys.
     *
     * @param \WP_REST_Response $response
     * @return \WP_REST_Response
     */
    public function rewrite_rest_response( $response ) {
        if ( ! $response instanceof \WP_REST_Response ) {
            return $response;
        }

        $local = $this->get_local_base();
        $cdn   = $this->get_cdn_base();

        if ( ! $local || ! $cdn || $local === $cdn ) {
            return $response;
        }

        $data = $response->get_data();

        // Top-level images array (product).
        if ( ! empty( $data['images'] ) && is_array( $data['images'] ) ) {
            $data['images'] = $this->rewrite_rest_image_array( $data['images'], $local, $cdn );
        }

        // Variations may nest under 'image'.
        if ( ! empty( $data['image'] ) && is_array( $data['image'] ) ) {
            $data['image'] = $this->rewrite_rest_image_item( $data['image'], $local, $cdn );
        }

        $response->set_data( $data );
        return $response;
    }

    // -------------------------------------------------------------------------
    // Multisite cache flush
    // -------------------------------------------------------------------------

    /**
     * Flush cached URL bases when switching blogs on multisite.
     * Called on the switch_blog action.
     */
    public function flush_url_cache(): void {
        // No instance properties to clear — we compute on demand (see get_local_base/get_cdn_base).
        // This method exists as a hook target so subclasses or future caching can hook in.
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    private function is_synced( int $attachment_id ): bool {
        return get_post_meta( $attachment_id, '_r2_offload_synced', true ) === '1';
    }

    private function replace( string $url ): string {
        $local = $this->get_local_base();
        $cdn   = $this->get_cdn_base();

        if ( ! $local || ! $cdn ) {
            return $url;
        }

        return str_replace( $local, $cdn, $url );
    }

    /**
     * Return the local upload base URL.
     * NOT cached as a property — wp_upload_dir() is already cached by WordPress
     * internally and handles multisite correctly per current blog.
     */
    private function get_local_base(): string {
        return untrailingslashit( wp_upload_dir()['baseurl'] );
    }

    /**
     * Return the CDN base URL.
     * NOT cached as a property — settings may change during a request on multisite.
     */
    private function get_cdn_base(): string {
        return untrailingslashit( $this->settings->get_cdn_base_url() );
    }

    /**
     * Rewrite src/thumbnail/medium URL keys inside a WooCommerce REST images array.
     */
    private function rewrite_rest_image_array( array $images, string $local, string $cdn ): array {
        foreach ( $images as &$image ) {
            $image = $this->rewrite_rest_image_item( $image, $local, $cdn );
        }
        return $images;
    }

    private function rewrite_rest_image_item( array $image, string $local, string $cdn ): array {
        foreach ( [ 'src', 'thumbnail', 'medium', 'medium_large', 'large', 'full' ] as $key ) {
            if ( ! empty( $image[ $key ] ) ) {
                $image[ $key ] = str_replace( $local, $cdn, $image[ $key ] );
            }
        }
        return $image;
    }
}
