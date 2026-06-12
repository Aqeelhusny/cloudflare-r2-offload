<?php
/**
 * Stub classes for R2Client and ErrorLogger only.
 * Used by tests that load the REAL Settings class.
 */
namespace R2Offload;

class R2Client {
    public bool   $upload_returns    = true;
    public bool   $download_returns  = true;
    public string $check_key_default = 'missing';
    public array  $check_key_responses = [];
    public array  $uploaded      = [];
    public array  $downloaded    = [];
    public array  $deleted_keys  = [];
    public array  $checked_keys  = [];

    public function __construct( ...$args ) {}

    public function upload_file( string $local_path, string $r2_key, string $mime_type, array $extra_args = [] ): bool {
        $this->uploaded[] = [ 'path' => $local_path, 'key' => $r2_key, 'mime' => $mime_type ];
        return $this->upload_returns;
    }

    public function upload_files( array $jobs ): array {
        $results = [];
        foreach ( $jobs as $job ) {
            $results[ $job['key'] ] = $this->upload_file( $job['path'], $job['key'], $job['mime'] );
        }
        return $results;
    }

    public function download_file( string $r2_key, string $local_path ): bool {
        $this->downloaded[] = [ 'key' => $r2_key, 'path' => $local_path ];
        if ( $this->download_returns ) {
            \wp_mkdir_p( dirname( $local_path ) );
            file_put_contents( $local_path, 'restored-content' );
        }
        return $this->download_returns;
    }

    public bool $delete_returns = true;

    public function delete_files( array $keys ): bool {
        $this->deleted_keys = array_merge( $this->deleted_keys, $keys );
        return $this->delete_returns;
    }

    public function check_key( string $key ): string {
        $this->checked_keys[] = $key;
        return $this->check_key_responses[ $key ] ?? $this->check_key_default;
    }
}

class ErrorLogger {
    public array $logs               = [];
    public array $validate_terminal  = [];
    public array $migration_terminal = [];

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

    public function write_validate_terminal( array $entry ): void {
        $this->validate_terminal[] = $entry;
    }

    public function write_migration_terminal( array $entry ): void {
        $this->migration_terminal[] = $entry;
    }
}
