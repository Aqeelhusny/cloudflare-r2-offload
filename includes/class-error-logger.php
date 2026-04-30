<?php
namespace R2Offload;

defined( 'ABSPATH' ) || exit;

/**
 * Structured error logger — writes to a local log file using WP_Filesystem.
 */
class ErrorLogger {

    const LOG_LEVELS = [ 'debug', 'info', 'warning', 'error' ];

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

        $contents = $fs->get_contents( $file );
        if ( ! $contents ) {
            return [];
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

        $file    = $this->get_log_file_path();
        $current = $fs->exists( $file ) ? $fs->get_contents( $file ) : '';
        $fs->put_contents( $file, $current . $entry . "\n", FS_CHMOD_FILE );
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
