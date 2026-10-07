<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SignerData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Signer Data Plane** service.
 * @method \R2Offload\Vendor\Aws\Result getRevocationStatus(array $args = [])
 * @phpstan-method \Aws\Result getRevocationStatus(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRevocationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRevocationStatusAsync(array{
 *     signatureTimestamp?: int|string|\DateTimeInterface,
 *     platformId?: string,
 *     profileVersionArn?: string,
 *     jobArn?: string,
 *     certificateHashes?: list<string>,
 *     ...,
 * } $args = [])
 */
class SignerDataClient extends AwsClient {}
