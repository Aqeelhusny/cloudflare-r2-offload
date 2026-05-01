<?php
/**
 * WordPress function stubs for unit testing.
 */

define( 'ABSPATH', __DIR__ . '/../' );

$GLOBALS['__wp_postmeta']  = [];
$GLOBALS['__wp_options']   = [];
$GLOBALS['__wp_deleted']   = [];

function get_post_meta( int $post_id, string $key = '', bool $single = false ) {
    $store = $GLOBALS['__wp_postmeta'];
    if ( $key === '' ) {
        return $store[ $post_id ] ?? [];
    }
    $val = $store[ $post_id ][ $key ] ?? null;
    if ( $single ) {
        return $val ?? '';
    }
    return $val !== null ? [ $val ] : [];
}

function update_post_meta( int $post_id, string $key, $value ): bool {
    $GLOBALS['__wp_postmeta'][ $post_id ][ $key ] = $value;
    return true;
}

function delete_post_meta( int $post_id, string $key ): bool {
    unset( $GLOBALS['__wp_postmeta'][ $post_id ][ $key ] );
    return true;
}

function get_post_mime_type( int $post_id ): string {
    return $GLOBALS['__wp_postmeta'][ $post_id ]['_mime_type'] ?? 'image/jpeg';
}

function wp_get_attachment_metadata( int $post_id ) {
    return $GLOBALS['__wp_postmeta'][ $post_id ]['_wp_attachment_metadata'] ?? [];
}

function wp_upload_dir(): array {
    return [
        'basedir' => sys_get_temp_dir() . '/wp-uploads',
        'baseurl' => 'http://example.com/wp-content/uploads',
    ];
}

function trailingslashit( string $string ): string {
    return rtrim( $string, '/\\' ) . '/';
}

function wp_json_encode( $data ): string {
    return json_encode( $data );
}

function wp_delete_file( string $path ): void {
    $GLOBALS['__wp_deleted'][] = $path;
    if ( file_exists( $path ) ) {
        @unlink( $path );
    }
}

function wp_mkdir_p( string $target ): bool {
    if ( ! is_dir( $target ) ) {
        return mkdir( $target, 0755, true );
    }
    return true;
}

function current_time( string $type, bool $gmt = false ): string {
    if ( $type === 'c' ) {
        return date( 'c' );
    }
    return date( 'Y-m-d H:i:s' );
}

function get_option( string $key, $default = false ) {
    return $GLOBALS['__wp_options'][ $key ] ?? $default;
}

function update_option( string $key, $value, $autoload = null ): bool {
    $GLOBALS['__wp_options'][ $key ] = $value;
    return true;
}

function add_option( string $key, $value ): bool {
    if ( ! isset( $GLOBALS['__wp_options'][ $key ] ) ) {
        $GLOBALS['__wp_options'][ $key ] = $value;
    }
    return true;
}

function delete_option( string $key ): bool {
    unset( $GLOBALS['__wp_options'][ $key ] );
    return true;
}

function apply_filters( string $hook, ...$args ) {
    return $args[0];
}

function register_setting( ...$args ): void {}
function add_settings_error( ...$args ): void {
    $GLOBALS['__wp_settings_errors'][] = $args;
}
function sanitize_text_field( $str ): string { return trim( (string) $str ); }
function sanitize_mime_type( $str ): string { return trim( (string) $str ); }
function absint( $val ): int { return abs( (int) $val ); }
function wp_salt( string $scheme = 'auth' ): string { return 'test-salt-key-1234567890abcdef'; }

function set_transient( string $key, $value, int $expiration = 0 ): bool {
    $GLOBALS['__wp_transients'][ $key ] = $value;
    return true;
}

function get_transient( string $key ) {
    return $GLOBALS['__wp_transients'][ $key ] ?? false;
}

function delete_transient( string $key ): bool {
    unset( $GLOBALS['__wp_transients'][ $key ] );
    return true;
}

function wp_schedule_single_event( int $timestamp, string $hook, array $args = [] ): bool {
    $GLOBALS['__wp_cron_scheduled'][] = [ 'time' => $timestamp, 'hook' => $hook, 'args' => $args ];
    return true;
}

function wp_clear_scheduled_hook( string $hook ): int {
    $GLOBALS['__wp_cron_cleared'][] = $hook;
    return 1;
}

function wp_next_scheduled( string $hook, array $args = [] ) {
    return $GLOBALS['__wp_next_scheduled'][ $hook ] ?? false;
}

function spawn_cron(): void {
    $GLOBALS['__wp_cron_spawned'] = ( $GLOBALS['__wp_cron_spawned'] ?? 0 ) + 1;
}

function do_action( string $hook, ...$args ): void {
    $GLOBALS['__wp_actions_fired'][] = [ 'hook' => $hook, 'args' => $args ];
}

function add_action( string $hook, $callback, int $priority = 10, int $accepted_args = 1 ): bool {
    $GLOBALS['__wp_hooks'][ $hook ][] = [ 'callback' => $callback, 'priority' => $priority ];
    return true;
}

function add_filter( string $hook, $callback, int $priority = 10, int $accepted_args = 1 ): bool {
    return add_action( $hook, $callback, $priority, $accepted_args );
}

function wp_cache_get( string $key, string $group = '' ) {
    return $GLOBALS['__wp_cache'][ $group . ':' . $key ] ?? false;
}

function wp_cache_set( string $key, $data, string $group = '', int $expire = 0 ): bool {
    $GLOBALS['__wp_cache'][ $group . ':' . $key ] = $data;
    return true;
}

function wp_cache_flush(): bool {
    $GLOBALS['__wp_cache'] = [];
    return true;
}

function wp_cache_flush_runtime(): bool {
    return wp_cache_flush();
}

function is_admin(): bool {
    return $GLOBALS['__wp_is_admin'] ?? true;
}

function wp_doing_ajax(): bool {
    return $GLOBALS['__wp_doing_ajax'] ?? false;
}

function wp_doing_cron(): bool {
    return $GLOBALS['__wp_doing_cron'] ?? false;
}

function load_plugin_textdomain( ...$args ): bool { return true; }

function __( string $text, string $domain = 'default' ): string { return $text; }

if ( ! defined( 'FS_CHMOD_FILE' ) ) {
    define( 'FS_CHMOD_FILE', 0644 );
}

if ( ! defined( 'R2_OFFLOAD_DB_VERSION' ) ) {
    define( 'R2_OFFLOAD_DB_VERSION', '1.1.0' );
}

if ( ! defined( 'R2_OFFLOAD_BASENAME' ) ) {
    define( 'R2_OFFLOAD_BASENAME', 'cloudflare-r2-offload/cloudflare-r2-offload.php' );
}

if ( ! defined( 'OPENSSL_RAW_DATA' ) ) {
    define( 'OPENSSL_RAW_DATA', 1 );
}
