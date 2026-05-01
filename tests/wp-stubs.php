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
function add_settings_error( ...$args ): void {}
function sanitize_text_field( $str ): string { return trim( (string) $str ); }
function sanitize_mime_type( $str ): string { return trim( (string) $str ); }
function absint( $val ): int { return abs( (int) $val ); }
function wp_salt( string $scheme = 'auth' ): string { return 'test-salt-key-1234567890abcdef'; }

if ( ! defined( 'FS_CHMOD_FILE' ) ) {
    define( 'FS_CHMOD_FILE', 0644 );
}

if ( ! defined( 'R2_OFFLOAD_DB_VERSION' ) ) {
    define( 'R2_OFFLOAD_DB_VERSION', '1.0' );
}
