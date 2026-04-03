<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Structured error logger — writes to a local log file and optionally to R2.
 */
class ErrorLogger {

    const LOG_LEVELS = [ 'debug', 'info', 'warning', 'error' ];

    /** @var string Absolute path to local log directory */
    private string $log_dir;

    public function __construct() {
        $upload     = wp_upload_dir();
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
            'timestamp' => gmdate( 'c' ),
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
        if ( ! file_exists( $file ) ) {
            return [];
        }

        $lines   = file( $file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES );
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
        if ( ! is_dir( $this->log_dir ) ) {
            return true;
        }
        $files = glob( $this->log_dir . '/*.log' );
        if ( ! $files ) {
            return true;
        }
        $success = true;
        foreach ( $files as $file ) {
            if ( ! @unlink( $file ) ) {
                $success = false;
            }
        }
        return $success;
    }

    /**
     * Get the path to today's local log file, creating the directory if needed.
     */
    public function get_log_file_path(): string {
        return $this->log_dir . '/' . gmdate( 'Y-m-d' ) . '.log';
    }

    /**
     * Append a JSON-lines entry to the local log file.
     */
    private function write_local( string $entry ): void {
        if ( ! is_dir( $this->log_dir ) ) {
            wp_mkdir_p( $this->log_dir );
            // Protect directory from direct web access.
            file_put_contents( $this->log_dir . '/.htaccess', "deny from all\n" );
            file_put_contents( $this->log_dir . '/index.php', "<?php // Silence is golden.\n" );
        }

        $file = $this->get_log_file_path();
        file_put_contents( $file, $entry . "\n", FILE_APPEND | LOCK_EX );
    }
}
