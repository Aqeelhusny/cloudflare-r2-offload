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
 * stale after LIVE_TTL seconds and the next log call (or poll) deletes the buffer.
 *
 * A file is used because log calls happen in other PHP requests (uploads, WP-Cron) than
 * the viewer's poll, and plugins cannot assume a persistent object cache.
 */
class ErrorLogger {

    const LOG_LEVELS = [ 'debug', 'info', 'warning', 'error' ];
    const LIVE_TTL   = 120;     // seconds without a poll before the session expires (background tabs poll ~1/min)
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

    /**
     * Toggle ON: open an empty buffer and start the heartbeat.
     *
     * One session is shared site-wide: a second admin switching ON starts a fresh
     * buffer, and anyone switching OFF (or leaving the page) ends it for everyone.
     *
     * @return bool False when the uploads folder is not writable.
     */
    public function live_start(): bool {
        if ( ! is_dir( $this->dir ) && ! wp_mkdir_p( $this->dir ) ) {
            return false;
        }
        // Keep the buffer unreachable over HTTP on Apache; index.php for directory listing.
        if ( ! file_exists( $this->dir . '/.htaccess' ) ) {
            @file_put_contents( $this->dir . '/.htaccess', "deny from all\n" );            // phpcs:ignore WordPress.PHP.NoSilencedErrors
            @file_put_contents( $this->dir . '/index.php', "<?php // Silence is golden.\n" ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
        }
        // Generation counter in the heartbeat: bumped whenever the buffer is rewritten, so
        // a viewer holding a byte offset into the old content knows to start over.
        return false !== @file_put_contents( $this->buffer, '', LOCK_EX )   // phpcs:ignore WordPress.PHP.NoSilencedErrors
            && false !== @file_put_contents( $this->heartbeat, '1' );        // phpcs:ignore WordPress.PHP.NoSilencedErrors
    }

    /**
     * Poll: refresh the heartbeat and return the complete entries after $offset.
     *
     * @param int $offset Byte offset already read by this viewer.
     * @param int $gen    Buffer generation the offset belongs to (0 = unknown).
     * @return array{ live: bool, entries: array, next_offset: int, gen: int, reset: bool }
     */
    public function live_poll( int $offset, int $gen = 0 ): array {
        if ( ! $this->is_live() ) {
            return [ 'live' => false, 'entries' => [], 'next_offset' => 0, 'gen' => 0, 'reset' => true ];
        }
        touch( $this->heartbeat ); // mtime = heartbeat; content (generation) unchanged

        $cur   = (int) @file_get_contents( $this->heartbeat ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
        $raw   = '';
        $reset = false;
        $fh    = @fopen( $this->buffer, 'rb' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
        if ( $fh ) {
            flock( $fh, LOCK_SH );
            $size  = (int) fstat( $fh )['size'];
            $reset = $gen !== $cur || $offset > $size;
            if ( $reset ) {
                $offset = 0; // buffer was trimmed (or first poll) — client redraws from what is left
            }
            if ( $size > $offset ) {
                fseek( $fh, $offset );
                $raw = (string) fread( $fh, $size - $offset );
            }
            flock( $fh, LOCK_UN );
            fclose( $fh );
        }

        // Only hand out complete lines; a line still being written is picked up next poll.
        $last     = strrpos( $raw, "\n" );
        $complete = $last === false ? '' : substr( $raw, 0, $last + 1 );
        $entries  = [];
        foreach ( explode( "\n", $complete ) as $line ) {
            $row = $line !== '' ? json_decode( $line, true ) : null;
            if ( is_array( $row ) ) {
                $entries[] = $row;
            }
        }
        return [ 'live' => true, 'entries' => $entries, 'next_offset' => $offset + strlen( $complete ), 'gen' => $cur, 'reset' => $reset ];
    }

    /** Toggle OFF (or expiry): delete the buffer and everything that was shown. */
    public function live_stop(): void {
        foreach ( [ $this->heartbeat, $this->buffer ] as $f ) { // heartbeat first: writers re-check it under lock
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
            if ( file_exists( $this->buffer ) ) {
                $this->live_stop(); // orphaned buffer (e.g. a write raced with OFF) — never keep it
            }
            return false;
        }
        if ( time() - (int) filemtime( $this->heartbeat ) > self::LIVE_TTL ) {
            $this->live_stop(); // viewer went away without switching off
            return false;
        }
        return true;
    }

    /**
     * Append one entry under an exclusive lock, re-checking the session inside the lock so
     * a write that races with OFF can never leave a buffer behind. Trims to half the cap.
     */
    private function append( array $entry ): void {
        $fh = @fopen( $this->buffer, 'c+b' ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
        if ( ! $fh ) {
            return;
        }
        flock( $fh, LOCK_EX );
        clearstatcache( true, $this->heartbeat );
        if ( ! file_exists( $this->heartbeat ) ) {           // switched OFF while we waited
            flock( $fh, LOCK_UN );
            fclose( $fh );
            @unlink( $this->buffer );                          // phpcs:ignore WordPress.PHP.NoSilencedErrors
            return;
        }
        fseek( $fh, 0, SEEK_END );
        fwrite( $fh, wp_json_encode( $entry ) . "\n" );
        fflush( $fh ); // fstat()/re-read below must see the line just written

        if ( (int) fstat( $fh )['size'] > self::LIVE_MAX * 600 ) {
            rewind( $fh );
            $lines = array_filter( explode( "\n", (string) stream_get_contents( $fh ) ), 'strlen' );
            $keep  = implode( "\n", array_slice( $lines, -(int) ( self::LIVE_MAX / 2 ) ) ) . "\n";
            ftruncate( $fh, 0 );
            rewind( $fh );
            fwrite( $fh, $keep );
            @file_put_contents( $this->heartbeat, (string) ( (int) @file_get_contents( $this->heartbeat ) + 1 ) ); // phpcs:ignore WordPress.PHP.NoSilencedErrors
        }
        fflush( $fh );
        flock( $fh, LOCK_UN );
        fclose( $fh );
    }
}
