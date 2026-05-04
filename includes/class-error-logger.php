<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Structured error logger — writes to a local log file using WP_Filesystem.
 * Includes automatic rotation (5 MB per file, 14 days retention).
 */
class ErrorLogger {

    const LOG_LEVELS    = [ 'debug', 'info', 'warning', 'error' ];
    const MAX_FILE_SIZE = 5 * 1024 * 1024; // 5 MB
    const MAX_LOG_DAYS  = 14;

    /** @var string Absolute path to local log directory */
    private string $log_dir;

    public function __construct() {
        $upload        = wp_upload_dir();
        $this->log_dir = trailingslashit( $upload['basedir'] ) . 'r2-offload-logs';
    }

    /**
     * Log a message.
     *
     * @param string $level   debug|info|warning|error
     * @param string $message Human-readable message.
     * @param array  $context Key-value context.
     */
    public function log( string $level, string $message, array $context = [] ): void {
        if ( $level === 'debug' && ! ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ) {
            return;
        }

        $entry = wp_json_encode( [
            'timestamp' => current_time( 'c' ),
            'level'     => $level,
            'message'   => $message,
            'context'   => $context,
        ] );

        $this->write_local( $entry );
    }

    public function error( string $message, array $context = [] ): void {
        $this->log( 'error', $message, $context );
    }

    public function warning( string $message, array $context = [] ): void {
        $this->log( 'warning', $message, $context );
    }

    public function info( string $message, array $context = [] ): void {
        $this->log( 'info', $message, $context );
    }

    public function debug( string $message, array $context = [] ): void {
        $this->log( 'debug', $message, $context );
    }

    /**
     * Get recent log entries from the local log file.
     *
     * @param int $limit Number of entries to return (most recent first).
     * @return array
     */
    public function get_recent_entries( int $limit = 50 ): array {
        $file = $this->get_log_file_path();
        $fs   = $this->get_filesystem();

        if ( ! $fs || ! $fs->exists( $file ) ) {
            return [];
        }

        $size = $fs->size( $file );
        if ( $size === false || $size === 0 ) {
            return [];
        }

        // Read at most the last 512 KB to avoid loading a huge file into memory.
        $read_limit = min( $size, 512 * 1024 );
        $contents   = $fs->get_contents( $file );
        if ( ! $contents ) {
            return [];
        }

        if ( $size > $read_limit ) {
            $contents = substr( $contents, -$read_limit );
        }

        $lines   = array_filter( explode( "\n", $contents ) );
        $lines   = array_reverse( $lines );
        $lines   = array_slice( $lines, 0, $limit );
        $entries = [];
        foreach ( $lines as $line ) {
            $decoded = json_decode( $line, true );
            if ( $decoded ) {
                $entries[] = $decoded;
            }
        }
        return $entries;
    }

    /**
     * Delete all local log files.
     */
    public function delete_local_logs(): bool {
        $fs = $this->get_filesystem();
        if ( ! $fs || ! $fs->is_dir( $this->log_dir ) ) {
            return true;
        }

        $files = $fs->dirlist( $this->log_dir );
        if ( ! $files ) {
            return true;
        }

        $success = true;
        foreach ( $files as $name => $info ) {
            if ( substr( $name, -4 ) === '.log' ) {
                if ( ! $fs->delete( $this->log_dir . '/' . $name ) ) {
                    $success = false;
                }
            }
        }
        return $success;
    }

    /**
     * Get the path to today's local log file.
     */
    public function get_log_file_path(): string {
        return $this->log_dir . '/' . current_time( 'Y-m-d' ) . '.log';
    }

    /**
     * Append a JSON-lines entry to the local log file.
     * Handles size-based rotation and age-based pruning.
     */
    private function write_local( string $entry ): void {
        $fs = $this->get_filesystem();
        if ( ! $fs ) {
            return;
        }

        if ( ! $fs->is_dir( $this->log_dir ) ) {
            wp_mkdir_p( $this->log_dir );
            $fs->put_contents( $this->log_dir . '/.htaccess', "deny from all\n", FS_CHMOD_FILE );
            $fs->put_contents( $this->log_dir . '/index.php', "<?php // Silence is golden.\n", FS_CHMOD_FILE );
        }

        $file = $this->get_log_file_path();

        // Rotate if current file exceeds the size cap.
        if ( $fs->exists( $file ) && $fs->size( $file ) >= self::MAX_FILE_SIZE ) {
            $this->rotate_file( $fs, $file );
        }

        $current = $fs->exists( $file ) ? $fs->get_contents( $file ) : '';
        $fs->put_contents( $file, $current . $entry . "\n", FS_CHMOD_FILE );

        // Prune old log files periodically (roughly once per day, keyed by transient).
        if ( false === get_transient( 'r2_offload_log_pruned' ) ) {
            $this->prune_old_logs( $fs );
            set_transient( 'r2_offload_log_pruned', 1, DAY_IN_SECONDS );
        }
    }

    /**
     * Rotate a log file: rename current → .1.log, shift existing rotated files.
     * Keeps at most 2 rotated files per day (day.log, day.1.log, day.2.log).
     */
    private function rotate_file( \WP_Filesystem_Base $fs, string $file ): void {
        $base = substr( $file, 0, -4 ); // strip .log

        // Delete the oldest rotated file if it exists.
        $oldest = $base . '.2.log';
        if ( $fs->exists( $oldest ) ) {
            $fs->delete( $oldest );
        }

        // Shift .1 → .2
        $prev = $base . '.1.log';
        if ( $fs->exists( $prev ) ) {
            $fs->move( $prev, $oldest );
        }

        // Move current → .1
        $fs->move( $file, $prev );
    }

    /**
     * Delete log files older than MAX_LOG_DAYS.
     */
    private function prune_old_logs( \WP_Filesystem_Base $fs ): void {
        $files = $fs->dirlist( $this->log_dir );
        if ( ! $files ) {
            return;
        }

        $cutoff = current_time( 'timestamp' ) - ( self::MAX_LOG_DAYS * DAY_IN_SECONDS );

        foreach ( $files as $name => $info ) {
            if ( substr( $name, -4 ) !== '.log' ) {
                continue;
            }

            // Extract date from filename (YYYY-MM-DD.log or YYYY-MM-DD.1.log).
            if ( preg_match( '/^(\d{4}-\d{2}-\d{2})/', $name, $matches ) ) {
                $file_date = strtotime( $matches[1] . ' 23:59:59' );
                if ( $file_date && $file_date < $cutoff ) {
                    $fs->delete( $this->log_dir . '/' . $name );
                }
            }
        }
    }

    /**
     * Initialise and return the WP_Filesystem instance.
     */
    private function get_filesystem(): ?\WP_Filesystem_Base {
        global $wp_filesystem;

        if ( $wp_filesystem ) {
            return $wp_filesystem;
        }

        require_once ABSPATH . 'wp-admin/includes/file.php';

        if ( WP_Filesystem() ) {
            return $wp_filesystem;
        }

        return null;
    }
}
