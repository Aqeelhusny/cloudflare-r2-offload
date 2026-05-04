<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Manages all plugin settings — registration, sanitization, typed getters.
 */
class Settings {

    const OPTION_GROUP = 'r2_offload_settings';

    /** @var array In-request cache */
    private array $cache = [];

    /** @var bool Whether decryption of the stored secret key failed this request. */
    private bool $decryption_failed = false;

    /**
     * Register settings with WordPress.
     */
    public function register(): void {
        register_setting( self::OPTION_GROUP, 'r2_offload_account_id',          [ $this, 'sanitize_account_id' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_access_key_id',        [ $this, 'sanitize_text' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_secret_access_key',    [ $this, 'sanitize_secret_key' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_bucket',               [ $this, 'sanitize_bucket' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_custom_domain',        [ $this, 'sanitize_domain' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_url_scheme',           [ $this, 'sanitize_scheme' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_path_prefix',          [ $this, 'sanitize_path_prefix' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_serve_from_r2',         'absint' );
        register_setting( self::OPTION_GROUP, 'r2_offload_delete_local',         'absint' );
        register_setting( self::OPTION_GROUP, 'r2_offload_upload_on_save',       'absint' );
        register_setting( self::OPTION_GROUP, 'r2_offload_file_manager_enabled', 'absint' );
        register_setting( self::OPTION_GROUP, 'r2_offload_excluded_mime_types',  [ $this, 'sanitize_mime_types' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_batch_size',           [ $this, 'sanitize_batch_size' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_multipart_threshold',  [ $this, 'sanitize_multipart_threshold' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_multipart_concurrency',[ $this, 'sanitize_concurrency' ] );
        register_setting( self::OPTION_GROUP, 'r2_offload_background_offload',  'absint' );
    }

    /**
     * Set default option values on plugin activation.
     */
    public function set_defaults(): void {
        $defaults = [
            'r2_offload_url_scheme'            => 'https',
            'r2_offload_path_prefix'           => 'wp-content/uploads',
            'r2_offload_serve_from_r2'         => 0,
            'r2_offload_delete_local'          => 0,
            'r2_offload_upload_on_save'        => 1,
            'r2_offload_file_manager_enabled'  => 0,
            'r2_offload_batch_size'            => 10,
            'r2_offload_multipart_threshold'   => 5 * 1024 * 1024,
            'r2_offload_multipart_concurrency' => 3,
            'r2_offload_excluded_mime_types'   => [],
            'r2_offload_background_offload'   => 0,
            'r2_offload_db_version'            => R2_OFFLOAD_DB_VERSION,
        ];
        foreach ( $defaults as $key => $value ) {
            add_option( $key, $value );
        }
    }

    // -------------------------------------------------------------------------
    // Typed getters
    // -------------------------------------------------------------------------

    public function get_account_id(): string {
        return $this->cached( 'r2_offload_account_id', '' );
    }

    public function get_access_key_id(): string {
        return $this->cached( 'r2_offload_access_key_id', '' );
    }

    public function get_secret_access_key(): string {
        $encrypted = $this->cached( 'r2_offload_secret_access_key', '' );
        if ( ! $encrypted ) {
            return '';
        }
        $decrypted = $this->decrypt( $encrypted );
        if ( $decrypted === '' && strpos( $encrypted, 'r2enc:' ) === 0 ) {
            $this->decryption_failed = true;
        }
        return $decrypted;
    }

    public function has_decryption_failed(): bool {
        return $this->decryption_failed;
    }

    public function get_bucket(): string {
        return $this->cached( 'r2_offload_bucket', '' );
    }

    public function get_custom_domain(): string {
        return $this->cached( 'r2_offload_custom_domain', '' );
    }

    public function get_url_scheme(): string {
        return $this->cached( 'r2_offload_url_scheme', 'https' );
    }

    public function get_path_prefix(): string {
        return trim( $this->cached( 'r2_offload_path_prefix', 'wp-content/uploads' ), '/' );
    }

    public function get_serve_from_r2(): bool {
        return (bool) $this->cached( 'r2_offload_serve_from_r2', 0 );
    }

    public function get_delete_local(): bool {
        return (bool) $this->cached( 'r2_offload_delete_local', 0 );
    }

    public function get_upload_on_save(): bool {
        return (bool) $this->cached( 'r2_offload_upload_on_save', 1 );
    }

    public function get_file_manager_enabled(): bool {
        return (bool) $this->cached( 'r2_offload_file_manager_enabled', 0 );
    }

    public function get_background_offload(): bool {
        return (bool) $this->cached( 'r2_offload_background_offload', 0 );
    }

    public function get_excluded_mime_types(): array {
        $val = $this->cached( 'r2_offload_excluded_mime_types', [] );
        return is_array( $val ) ? $val : [];
    }

    public function get_batch_size(): int {
        return (int) apply_filters( 'r2_offload_batch_size', $this->cached( 'r2_offload_batch_size', 10 ) );
    }

    public function get_multipart_threshold(): int {
        return (int) apply_filters( 'r2_offload_multipart_threshold', $this->cached( 'r2_offload_multipart_threshold', 5 * 1024 * 1024 ) );
    }

    public function get_multipart_concurrency(): int {
        return (int) apply_filters( 'r2_offload_multipart_concurrency', $this->cached( 'r2_offload_multipart_concurrency', 3 ) );
    }

    /**
     * Build the CDN base URL used for URL rewriting.
     * Returns empty string if not configured.
     */
    public function get_cdn_base_url(): string {
        $domain = $this->get_custom_domain();
        if ( ! $domain ) {
            return '';
        }
        $scheme = $this->get_url_scheme();
        $prefix = $this->get_path_prefix();
        return $prefix ? "{$scheme}://{$domain}/{$prefix}" : "{$scheme}://{$domain}";
    }

    /**
     * Check whether all required credentials are configured.
     */
    public function is_configured(): bool {
        return $this->get_account_id() &&
               $this->get_access_key_id() &&
               $this->get_secret_access_key() &&
               $this->get_bucket();
    }

    // -------------------------------------------------------------------------
    // Sanitizers
    // -------------------------------------------------------------------------

    public function sanitize_text( $value ): string {
        return sanitize_text_field( $value );
    }

    public function sanitize_account_id( $value ): string {
        // Strip whitespace — users frequently copy-paste with a trailing space.
        $value = trim( sanitize_text_field( $value ) );
        // Cloudflare Account IDs are hex strings, typically 32 chars but can vary.
        // We validate presence of only hex characters rather than a fixed length
        // so future Cloudflare account ID formats don't silently break the plugin.
        if ( $value && ! preg_match( '/^[a-f0-9]+$/i', $value ) ) {
            add_settings_error( 'r2_offload_account_id', 'invalid', __( 'Account ID must contain only hex characters (0-9, a-f).', 'cloudflare-r2-offload' ) );
        }
        return strtolower( $value );
    }

    public function sanitize_secret_key( $value ): string {
        // Strip leading/trailing whitespace — frequent with copy-paste.
        $value = trim( (string) $value );

        // Empty or the placeholder → keep whatever is already stored.
        if ( $value === '' || $value === '__R2_SECRET_UNCHANGED__' ) {
            return get_option( 'r2_offload_secret_access_key', '' );
        }

        // Already encrypted by us — do not re-encrypt. This happens when WordPress
        // calls this sanitizer on a value that was saved by ajax_save_credentials
        // and then re-submitted via the main settings form with the placeholder.
        // The prefix 'r2enc:' is our canary — only our encrypt() produces it.
        if ( strpos( $value, 'r2enc:' ) === 0 ) {
            return $value;
        }

        // Raw plaintext key — encrypt once.
        return $this->encrypt( sanitize_text_field( $value ) );
    }

    public function sanitize_bucket( $value ): string {
        $value = sanitize_text_field( $value );
        if ( $value && ! preg_match( '/^[a-z0-9][a-z0-9\-]{1,61}[a-z0-9]$/', $value ) ) {
            add_settings_error( 'r2_offload_bucket', 'invalid', __( 'Bucket name is invalid.', 'cloudflare-r2-offload' ) );
        }
        return $value;
    }

    public function sanitize_domain( $value ): string {
        $value = sanitize_text_field( $value );
        // Strip scheme if user accidentally added it.
        $value = preg_replace( '#^https?://#', '', $value );
        return trim( $value, '/' );
    }

    public function sanitize_scheme( $value ): string {
        return in_array( $value, [ 'https', 'http' ], true ) ? $value : 'https';
    }

    public function sanitize_path_prefix( $value ): string {
        return trim( sanitize_text_field( $value ), '/' );
    }

    public function sanitize_mime_types( $value ): array {
        if ( ! is_array( $value ) ) {
            $value = array_filter( array_map( 'trim', explode( "\n", (string) $value ) ) );
        }
        return array_values( array_map( 'sanitize_mime_type', $value ) );
    }

    public function sanitize_batch_size( $value ): int {
        $value = absint( $value );
        return max( 1, min( 50, $value ) );
    }

    public function sanitize_concurrency( $value ): int {
        $value = absint( $value );
        return max( 1, min( 10, $value ) );
    }

    /**
     * The settings form sends MB; we store bytes.
     * Minimum 5 MB (S3/R2 multipart minimum part size).
     */
    public function sanitize_multipart_threshold( $value ): int {
        $mb = max( 5, absint( $value ) ); // floor at 5 MB
        return $mb * 1024 * 1024;
    }

    // -------------------------------------------------------------------------
    // Encryption helpers (AES-256-CBC)
    // -------------------------------------------------------------------------

    private function get_encryption_key(): string {
        $source = defined( 'R2_OFFLOAD_ENCRYPTION_KEY' ) ? R2_OFFLOAD_ENCRYPTION_KEY : wp_salt( 'auth' );
        return substr( hash( 'sha256', $source, true ), 0, 32 );
    }

    private function encrypt( string $plaintext ): string {
        $key    = $this->get_encryption_key();
        $iv     = openssl_random_pseudo_bytes( 16 );
        $cipher = openssl_encrypt( $plaintext, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
        if ( $cipher === false ) {
            return '';
        }
        return 'r2enc:' . base64_encode( $iv . $cipher );
    }

    private function decrypt( string $ciphertext ): string {
        if ( strpos( $ciphertext, 'r2enc:' ) === 0 ) {
            $ciphertext = substr( $ciphertext, 6 );
        }
        $data = base64_decode( $ciphertext, true );
        if ( $data === false || strlen( $data ) < 17 ) {
            return '';
        }
        $key   = $this->get_encryption_key();
        $iv    = substr( $data, 0, 16 );
        $plain = openssl_decrypt( substr( $data, 16 ), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv );
        return $plain !== false ? $plain : '';
    }

    // -------------------------------------------------------------------------
    // Internal
    // -------------------------------------------------------------------------

    private function cached( string $key, $default ) {
        if ( ! array_key_exists( $key, $this->cache ) ) {
            $this->cache[ $key ] = get_option( $key, $default );
        }
        return $this->cache[ $key ];
    }

    /** Flush the in-request cache (e.g. after saving settings). */
    public function flush_cache(): void {
        $this->cache = [];
    }
}
