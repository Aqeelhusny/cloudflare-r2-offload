<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaStoreData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaStore Data Plane** service.
 * @method \R2Offload\Vendor\Aws\Result deleteObject(array $args = [])
 * @phpstan-method \Aws\Result deleteObject(array{Path?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteObjectAsync(array{Path?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeObject(array $args = [])
 * @phpstan-method \Aws\Result describeObject(array{Path?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeObjectAsync(array{Path?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObject(array $args = [])
 * @phpstan-method \Aws\Result getObject(array{Path?: string, Range?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getObjectAsync(array{Path?: string, Range?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listItems(array $args = [])
 * @phpstan-method \Aws\Result listItems(array{Path?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listItemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listItemsAsync(array{Path?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObject(array $args = [])
 * @phpstan-method \Aws\Result putObject(array{
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     Path?: string,
 *     ContentType?: string,
 *     CacheControl?: string,
 *     StorageClass?: 'TEMPORAL',
 *     UploadAvailability?: 'STANDARD'|'STREAMING',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putObjectAsync(array{
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     Path?: string,
 *     ContentType?: string,
 *     CacheControl?: string,
 *     StorageClass?: 'TEMPORAL',
 *     UploadAvailability?: 'STANDARD'|'STREAMING',
 *     ...,
 * } $args = [])
 */
class MediaStoreDataClient extends AwsClient {}
