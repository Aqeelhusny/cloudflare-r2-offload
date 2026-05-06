<?php
namespace R2Offload;

use R2Offload\Vendor\Aws\Exception\AwsException;
use R2Offload\Vendor\Aws\S3\MultipartUploader;
use R2Offload\Vendor\Aws\S3\S3Client;

defined( 'ABSPATH' ) || exit;

/**
 * Thin wrapper around AWS SDK S3Client configured for Cloudflare R2.
 * Transparently uses multipart upload for large files.
 */
class R2Client {

    private Settings    $settings;
    private ErrorLogger $logger;
    private ?S3Client   $client = null;

    public function __construct( Settings $settings, ErrorLogger $logger ) {
        $this->settings = $settings;
        $this->logger   = $logger;
    }

    // -------------------------------------------------------------------------
    // Public API
    // -------------------------------------------------------------------------

    /**
     * Upload a local file to R2. Uses multipart for files ≥ threshold.
     *
     * @param string $local_path Absolute path to the local file.
     * @param string $r2_key     Object key in R2 (e.g. wp-content/uploads/2024/03/photo.jpg).
     * @param string $mime_type  MIME type of the file.
     * @param array  $extra_args Additional PutObject / multipart args.
     * @return bool
     */
    public function upload_file( string $local_path, string $r2_key, string $mime_type, array $extra_args = [] ): bool {
        if ( ! file_exists( $local_path ) ) {
            $this->logger->error( 'Upload failed: local file not found.', [ 'path' => $local_path, 'key' => $r2_key ] );
            return false;
        }

        $file_size = filesize( $local_path );
        $threshold = $this->settings->get_multipart_threshold();

        return $file_size >= $threshold
            ? $this->multipart_upload( $local_path, $r2_key, $mime_type, $extra_args )
            : $this->single_upload( $local_path, $r2_key, $mime_type, $extra_args );
    }

    /**
     * Download an R2 object and write it to a local path.
     * Uses streaming (SaveAs) so large files do not exhaust PHP memory.
     *
     * @param string $r2_key     Object key in R2.
     * @param string $local_path Absolute path to write the file to.
     * @return bool
     */
    public function download_file( string $r2_key, string $local_path ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }
        try {
            $client->getObject( [
                'Bucket' => $this->settings->get_bucket(),
                'Key'    => $r2_key,
                'SaveAs' => $local_path,
            ] );
            return true;
        } catch ( AwsException $e ) {
            $this->logger->error( 'R2 getObject (download) failed.', [
                'key'     => $r2_key,
                'local'   => $local_path,
                'code'    => $e->getAwsErrorCode(),
                'message' => $e->getMessage(),
            ] );
            return false;
        }
    }

    /**
     * Delete a single file from R2.
     */
    public function delete_file( string $r2_key ): bool {
        return $this->delete_files( [ $r2_key ] );
    }

    /**
     * Delete multiple files from R2 (batch DeleteObjects, max 1000 per call).
     *
     * @param string[] $r2_keys
     */
    public function delete_files( array $r2_keys ): bool {
        if ( empty( $r2_keys ) ) {
            return true;
        }
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }

        $chunks  = array_chunk( $r2_keys, 1000 );
        $success = true;

        foreach ( $chunks as $chunk ) {
            $objects = array_map( fn( $key ) => [ 'Key' => $key ], $chunk );
            try {
                $client->deleteObjects( [
                    'Bucket' => $this->settings->get_bucket(),
                    'Delete' => [ 'Objects' => $objects ],
                ] );
            } catch ( AwsException $e ) {
                $this->logger->error( 'R2 deleteObjects failed.', [
                    'code'    => $e->getAwsErrorCode(),
                    'message' => $e->getMessage(),
                ] );
                $success = false;
            }
        }
        return $success;
    }

    /**
     * Check whether an object exists in R2.
     */
    public function file_exists( string $r2_key ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }
        try {
            $client->headObject( [
                'Bucket' => $this->settings->get_bucket(),
                'Key'    => $r2_key,
            ] );
            return true;
        } catch ( AwsException $e ) {
            return false;
        } catch ( \Throwable $e ) {
            $this->logger->error( 'file_exists: unexpected exception.', [ 'key' => $r2_key, 'error' => $e->getMessage() ] );
            return false;
        }
    }

    /**
     * Test the connection by issuing a HeadBucket request.
     *
     * @return array{ success: bool, message: string }
     */
    public function test_connection(): array {
        // Surface exactly which credential is missing before attempting to build a client.
        $missing = [];
        if ( ! $this->settings->get_account_id() )        { $missing[] = 'Account ID'; }
        if ( ! $this->settings->get_access_key_id() )     { $missing[] = 'Access Key ID'; }
        if ( ! $this->settings->get_secret_access_key() ) { $missing[] = 'Secret Access Key'; }
        if ( ! $this->settings->get_bucket() )            { $missing[] = 'Bucket Name'; }

        if ( $missing ) {
            return [
                'success' => false,
                'message' => sprintf(
                    /* translators: %s: comma-separated list of missing fields */
                    __( 'Missing required fields: %s. Save your settings first, then test.', 'cloudflare-r2-offload' ),
                    implode( ', ', $missing )
                ),
            ];
        }

        $account_id = $this->settings->get_account_id();
        $key_id     = $this->settings->get_access_key_id();
        $secret     = $this->settings->get_secret_access_key();
        $bucket     = $this->settings->get_bucket();

        $client = $this->get_client( true );
        if ( ! $client ) {
            return [ 'success' => false, 'message' => __( 'Could not build R2 client — check credentials.', 'cloudflare-r2-offload' ) ];
        }
        try {
            // HeadBucket requires Admin Read on R2 tokens and will 403 with standard
            // Object Read & Write tokens. ListObjectsV2 (MaxKeys=1) works with any
            // token that has object-level read access and is the correct test for R2.
            $client->listObjectsV2( [
                'Bucket'  => $bucket,
                'MaxKeys' => 1,
            ] );
            return [ 'success' => true, 'message' => __( 'Connection successful.', 'cloudflare-r2-offload' ) ];
        } catch ( AwsException $e ) {
            return [
                'success' => false,
                'message' => sprintf(
                    /* translators: %s: AWS error code */
                    __( 'R2 error: %s', 'cloudflare-r2-offload' ),
                    $e->getAwsErrorCode() ?: $e->getMessage()
                ),
                'debug' => [
                    'account_id'    => $account_id,
                    'access_key_id' => $key_id,
                    'secret_set'    => $secret !== '',
                    'bucket'        => $bucket,
                ],
            ];
        }
    }

    /**
     * List objects under a prefix (paginated).
     *
     * @param string $prefix
     * @param int    $max_keys Max results per page (1–1000).
     * @param string $continuation_token For pagination.
     * @return array{ objects: array, next_token: string|null }
     */
    public function list_objects( string $prefix = '', int $max_keys = 50, string $continuation_token = '' ): array {
        $client = $this->get_client();
        if ( ! $client ) {
            return [ 'objects' => [], 'next_token' => null ];
        }

        $params = [
            'Bucket'  => $this->settings->get_bucket(),
            'MaxKeys' => $max_keys,
        ];
        if ( $prefix !== '' ) {
            $params['Prefix'] = $prefix;
        }
        if ( $continuation_token !== '' ) {
            $params['ContinuationToken'] = $continuation_token;
        }

        try {
            $result = $client->listObjectsV2( $params );
            return [
                'objects'    => $result->get( 'Contents' ) ?? [],
                'next_token' => $result->get( 'NextContinuationToken' ),
            ];
        } catch ( AwsException $e ) {
            // R2 continuation tokens expire quickly. If the token is invalid,
            // retry once from the beginning rather than showing an empty page.
            if ( $continuation_token !== '' && $e->getAwsErrorCode() === 'InvalidContinuation' ) {
                unset( $params['ContinuationToken'] );
                try {
                    $result = $client->listObjectsV2( $params );
                    return [
                        'objects'    => $result->get( 'Contents' ) ?? [],
                        'next_token' => $result->get( 'NextContinuationToken' ),
                    ];
                } catch ( AwsException $retry_e ) {
                    // Fall through to the error below.
                }
            }
            $this->logger->error( 'R2 listObjectsV2 failed.', [ 'message' => $e->getMessage() ] );
            return [ 'objects' => [], 'next_token' => null ];
        }
    }

    /**
     * Delete all objects under a given prefix (used for log cleanup).
     */
    public function delete_by_prefix( string $prefix ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }

        $token   = '';
        $success = true;

        do {
            $result = $this->list_objects( $prefix, 1000, $token );
            $keys   = array_column( $result['objects'], 'Key' );
            if ( $keys ) {
                if ( ! $this->delete_files( $keys ) ) {
                    $success = false;
                }
            }
            $token = $result['next_token'] ?? '';
        } while ( $token );

        return $success;
    }

    /**
     * Upload log content (string) to R2 under the r2-offload-logs/ prefix.
     */
    public function upload_log( string $r2_key, string $content ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }
        try {
            $client->putObject( [
                'Bucket'      => $this->settings->get_bucket(),
                'Key'         => $r2_key,
                'Body'        => $content,
                'ContentType' => 'application/x-ndjson',
            ] );
            return true;
        } catch ( AwsException $e ) {
            return false;
        }
    }

    // -------------------------------------------------------------------------
    // Upload implementations
    // -------------------------------------------------------------------------

    private function single_upload( string $local_path, string $r2_key, string $mime_type, array $extra_args ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }

        $args = array_merge( [
            'Bucket'      => $this->settings->get_bucket(),
            'Key'         => $r2_key,
            'SourceFile'  => $local_path,
            'ContentType' => $mime_type,
        ], $extra_args );

        $attempts = 0;
        $max      = 3;

        while ( $attempts < $max ) {
            $attempts++;
            try {
                $client->putObject( $args );
                $this->logger->debug( 'Single upload successful.', [ 'key' => $r2_key ] );
                return true;
            } catch ( AwsException $e ) {
                $this->logger->warning( "Single upload attempt {$attempts} failed.", [
                    'key'  => $r2_key,
                    'code' => $e->getAwsErrorCode(),
                ] );
                if ( $attempts < $max ) {
                    sleep( $attempts ); // exponential-ish backoff: 1s, 2s
                }
            }
        }

        $this->logger->error( 'Single upload failed after max attempts.', [ 'key' => $r2_key ] );
        return false;
    }

    private function multipart_upload( string $local_path, string $r2_key, string $mime_type, array $extra_args ): bool {
        $client = $this->get_client();
        if ( ! $client ) {
            return false;
        }

        $part_size   = (int) apply_filters( 'r2_offload_multipart_part_size', 5 * 1024 * 1024 );
        $concurrency = $this->settings->get_multipart_concurrency();

        $uploader_args = array_merge( [
            'bucket'      => $this->settings->get_bucket(),
            'key'         => $r2_key,
            'ContentType' => $mime_type,
            'part_size'   => $part_size,
            'concurrency' => $concurrency,
        ], $extra_args );

        $attempts = 0;
        $max      = 3;

        while ( $attempts < $max ) {
            $attempts++;
            try {
                $uploader = new MultipartUploader( $client, $local_path, $uploader_args );
                $uploader->upload();
                $this->logger->debug( 'Multipart upload successful.', [ 'key' => $r2_key ] );
                return true;
            } catch ( \Exception $e ) {
                $this->logger->warning( "Multipart upload attempt {$attempts} failed.", [
                    'key'     => $r2_key,
                    'message' => $e->getMessage(),
                ] );
                if ( $attempts < $max ) {
                    sleep( $attempts * 2 );
                }
            }
        }

        $this->logger->error( 'Multipart upload failed after max attempts.', [ 'key' => $r2_key ] );
        return false;
    }

    // -------------------------------------------------------------------------
    // Client factory
    // -------------------------------------------------------------------------

    /**
     * Build (or return cached) the S3Client pointed at R2.
     *
     * @param bool $force_new Bypass cache (useful for connection tests after saving settings).
     */
    private function get_client( bool $force_new = false ): ?S3Client {
        if ( $this->client && ! $force_new ) {
            return $this->client;
        }

        $account_id = $this->settings->get_account_id();
        $key        = $this->settings->get_access_key_id();
        $secret     = $this->settings->get_secret_access_key();

        if ( ! $account_id || ! $key || ! $secret ) {
            $this->logger->warning( 'R2 client not built: missing credentials.' );
            return null;
        }

        try {
            $this->client = new S3Client( [
                'version'                 => 'latest',
                'region'                  => 'auto',
                'endpoint'                => "https://{$account_id}.r2.cloudflarestorage.com",
                'use_path_style_endpoint' => true,
                'credentials'             => [
                    'key'    => $key,
                    'secret' => $secret,
                ],
            ] );
        } catch ( \Exception $e ) {
            $this->logger->error( 'Failed to instantiate S3Client.', [ 'message' => $e->getMessage() ] );
            return null;
        }

        return $this->client;
    }
}
