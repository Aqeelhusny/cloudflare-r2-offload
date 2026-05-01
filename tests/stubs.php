<?php
/**
 * Stub classes in the R2Offload namespace for unit testing.
 * These replace the real classes so we don't need AWS SDK or WP_Filesystem.
 */
namespace R2Offload;

class R2Client {
    public bool $upload_returns = true;
    public bool $download_returns = true;
    public array $uploaded = [];
    public array $downloaded = [];
    public array $deleted_keys = [];

    public function __construct( ...$args ) {}

    public function upload_file( string $local_path, string $r2_key, string $mime_type, array $extra_args = [] ): bool {
        $this->uploaded[] = [ 'path' => $local_path, 'key' => $r2_key ];
        return $this->upload_returns;
    }

    public function download_file( string $r2_key, string $local_path ): bool {
        $this->downloaded[] = [ 'key' => $r2_key, 'path' => $local_path ];
        if ( $this->download_returns ) {
            \wp_mkdir_p( dirname( $local_path ) );
            file_put_contents( $local_path, 'restored-content' );
        }
        return $this->download_returns;
    }

    public function delete_files( array $keys ): void {
        $this->deleted_keys = array_merge( $this->deleted_keys, $keys );
    }
}

class ErrorLogger {
    public array $logs = [];

    public function __construct( ...$args ) {}

    public function log( string $level, string $message, array $context = [] ): void {
        $this->logs[] = compact( 'level', 'message', 'context' );
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
}

class Settings {
    private bool $configured = true;
    private bool $delete_local = false;
    private string $path_prefix = 'wp-content/uploads';
    private array $excluded_mimes = [];

    public function __construct( ...$args ) {}

    public function is_configured(): bool { return $this->configured; }
    public function set_configured( bool $v ): void { $this->configured = $v; }

    public function get_delete_local(): bool { return $this->delete_local; }
    public function set_delete_local( bool $v ): void { $this->delete_local = $v; }

    public function get_path_prefix(): string { return $this->path_prefix; }
    public function set_path_prefix( string $v ): void { $this->path_prefix = $v; }

    public function get_excluded_mime_types(): array { return $this->excluded_mimes; }
    public function set_excluded_mime_types( array $v ): void { $this->excluded_mimes = $v; }

    public function get_batch_size(): int { return 10; }
}
