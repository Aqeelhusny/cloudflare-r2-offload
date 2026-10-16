<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Live-only logger: nothing is kept by default.
 *
 * Log calls are DISCARDED unless an admin is watching the "Live logs" view. Turning the
 * view on opens a short-lived buffer (a capped JSON-lines file — never the database);
 * entries written while it is open are streamed to the browser. Turning it off deletes
 * the buffer and everything in it. If the viewer just closes the tab, the heartbeat goes
 * stale within LIVE_TTL seconds and the next log call (or poll) deletes the buffer.
 *
 * A file is used because log calls happen in other PHP requests (uploads, WP-Cron) than
 * the viewer's poll, and plugins cannot assume a persistent object cache.
 */
class ErrorLogger {

    const LOG_LEVELS = [ 'debug', 'info', 'warning', 'error' ];
    const LIVE_TTL   = 30;      // seconds without a poll before the live session expires
    const LIVE_MAX   = 300;     // entries kept in the buffer while it is open

    private string $dir;
    private string $buffer;
    private string $heartbeat;

    public function __construct() {
        $upload          = wp_upload_dir();
        $this->dir       = trailingslashit( $upload['basedir'] ) . 'r2-offload-logs';
        $this->buffer    = $this->dir . '/live.jsonl';
        $this->heartbeat = $this->dir . '/live.on';
    }

    // -------------------------------------------------------------------------
    // Logging API (unchanged for callers)
    // -------------------------------------------------------------------------

    public function log( string $level, string $message, array $context = [] ): void {
        if ( $level === 'debug' && ! ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ) {
            return;
        }
        if ( ! $this->is_live() ) {
            return; // Nobody is watching — the entry is not kept anywhere.
        }
        $this->append( [
            'timestamp' => current_time( 'c' ),
            'level'     => in_array( $level, self::LOG_LEVELS, true ) ? $level : 'info',
            'message'   => $message,
            'context'   => $context,
        ] );
    }

    public function error( string $message, array $context = [] ): void   { $this->log( 'error', $message, $context ); }
    public function warning( string $message, array $context = [] ): void { $this->log( 'warning', $message, $context ); }
    public function info( string $message, array $context = [] ): void    { $this->log( 'info', $message, $context ); }
    public function debug( string $message, array $context = [] ): void   { $this->log( 'debug', $message, $context ); }

    /** Per-attachment offload result → one readable live line. */
    public function write_migration_terminal( array $e ): void {
        $file = $e['file'] ?? ( '#' . ( $e['id'] ?? '?' ) );
        if ( ! empty( $e['fail'] ) ) {
            /* translators: 1: file, 2: count */
            $this->log( 'error', sprintf( __( '%1$s — %2$d file(s) failed to upload', 'cloudflare-r2-offload' ), $file, $e['fail'] ), [ 'attachment_id' => $e['id'] ?? 0 ] );
        } elseif ( ! empty( $e['up'] ) ) {
            /* translators: 1: file, 2: count */
            $this->log( 'info', sprintf( __( '%1$s — %2$d file(s) uploaded', 'cloudflare-r2-offload' ), $file, $e['up'] ), [ 'attachment_id' => $e['id'] ?? 0 ] );
        }
    }

    /** Per-attachment validate result → one readable live line. */
    public function write_validate_terminal( array $e ): void {
        $file  = $e['file'] ?? ( '#' . ( $e['id'] ?? '?' ) );
        $level = ( $e['status'] ?? '' ) === 'missing' ? 'warning' : 'info';
        $this->log( $level, trim( $file . ' — ' . ( $e['status'] ?? '' ) . ( isset( $e['reason'] ) ? ': ' . $e['reason'] : '' ) ), [ 'attachment_id' => $e['id'] ?? 0 ] );
    }

    // -------------------------------------------------------------------------
    // Live session (driven by the admin's toggle)
    // -------------------------------------------------------------------------

    /** Toggle ON: open an empty buffer and start the heartbeat. */
    public function live_start(): void {
        if ( ! is_dir( $this->dir ) ) {
            wp_mkdir_p( $this->dir );
        }
        // Keep the buffer unreachable over HTTP on Apache; index.php for directory listing.
        if ( ! file_exists( $this->dir . '/.htaccess' ) ) {
            file_put_contents( $this->dir . '/.htaccess', "deny from all\n" );
            file_put_contents( $this->dir . '/index.php', "<?php // Silence is golden.\n" );
        }
        file_put_contents( $this->buffer, '', LOCK_EX );
        touch( $this->heartbeat );
    }

    /**
     * Poll: refresh the heartbeat and return entries after $offset (byte offset).
     *
     * @return array{ live: bool, entries: array, next_offset: int, reset?: bool }
     */
    public function live_poll( int $offset ): array {
        if ( ! $this->is_live() ) {
            return [ 'live' => false, 'entries' => [], 'next_offset' => 0 ];
        }
        touch( $this->heartbeat );
        clearstatcache( true, $this->buffer );

        $size  = file_exists( $this->buffer ) ? (int) filesize( $this->buffer ) : 0;
        $reset = $offset > $size;
        if ( $reset ) {
            $offset = 0; // buffer was trimmed at its cap — the client redraws from what is left
        }
        $raw     = $size > $offset ? (string) file_get_contents( $this->buffer, false, null, $offset ) : '';
        $entries = [];
        foreach ( explode( "\n", $raw ) as $line ) {
            $row = $line !== '' ? json_decode( $line, true ) : null;
            if ( is_array( $row ) ) {
                $entries[] = $row;
            }
        }
        return [ 'live' => true, 'entries' => $entries, 'next_offset' => $size, 'reset' => $reset ];
    }

    /** Toggle OFF (or expiry): delete the buffer and everything that was shown. */
    public function live_stop(): void {
        foreach ( [ $this->buffer, $this->heartbeat ] as $f ) {
            if ( file_exists( $f ) ) {
                wp_delete_file( $f );
            }
        }
    }

    /** Remove every log file this plugin ever wrote (1.x kept 14 days of logs on disk). */
    public function purge_all(): void {
        if ( ! is_dir( $this->dir ) ) {
            return;
        }
        foreach ( (array) glob( $this->dir . '/*' ) as $f ) {
            if ( is_file( $f ) && ! in_array( basename( $f ), [ '.htaccess', 'index.php' ], true ) ) {
                wp_delete_file( $f );
            }
        }
    }

    // -------------------------------------------------------------------------
    // Internals
    // -------------------------------------------------------------------------

    private function is_live(): bool {
        clearstatcache( true, $this->heartbeat );
        if ( ! file_exists( $this->heartbeat ) ) {
            return false;
        }
        if ( time() - (int) filemtime( $this->heartbeat ) > self::LIVE_TTL ) {
            $this->live_stop(); // viewer went away without switching off
            return false;
        }
        return true;
    }

    private function append( array $entry ): void {
        file_put_contents( $this->buffer, wp_json_encode( $entry ) . "\n", FILE_APPEND | LOCK_EX );

        // Cap the buffer: keep only the newest LIVE_MAX entries (checked cheaply by size first).
        clearstatcache( true, $this->buffer );
        if ( (int) @filesize( $this->buffer ) > self::LIVE_MAX * 600 ) { // phpcs:ignore WordPress.PHP.NoSilencedErrors
            $lines = file( $this->buffer, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES ) ?: [];
            file_put_contents( $this->buffer, implode( "\n", array_slice( $lines, -self::LIVE_MAX ) ) . "\n", LOCK_EX );
        }
    }
}
