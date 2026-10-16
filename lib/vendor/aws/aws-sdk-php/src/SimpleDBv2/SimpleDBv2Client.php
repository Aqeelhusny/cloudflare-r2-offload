<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SimpleDBv2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SimpleDB v2** service.
 * @method \R2Offload\Vendor\Aws\Result getExport(array $args = [])
 * @phpstan-method \Aws\Result getExport(array{exportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportAsync(array{exportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{domainName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{domainName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDomainExport(array $args = [])
 * @phpstan-method \Aws\Result startDomainExport(array{
 *     clientToken?: string,
 *     domainName?: string,
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     s3SseAlgorithm?: 'AES256'|'KMS',
 *     s3SseKmsKeyId?: string,
 *     s3BucketOwner?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDomainExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startDomainExportAsync(array{
 *     clientToken?: string,
 *     domainName?: string,
 *     s3Bucket?: string,
 *     s3KeyPrefix?: string,
 *     s3SseAlgorithm?: 'AES256'|'KMS',
 *     s3SseKmsKeyId?: string,
 *     s3BucketOwner?: string,
 *     ...,
 * } $args = [])
 */
class SimpleDBv2Client extends AwsClient {}
