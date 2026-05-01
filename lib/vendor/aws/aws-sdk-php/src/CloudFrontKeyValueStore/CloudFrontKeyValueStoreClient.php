<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudFrontKeyValueStore;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront KeyValueStore** service.
 * @method \R2Offload\Vendor\Aws\Result deleteKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeKeyValueStore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listKeys(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateKeys(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateKeysAsync(array $args = [])
 */
class CloudFrontKeyValueStoreClient extends AwsClient {}
