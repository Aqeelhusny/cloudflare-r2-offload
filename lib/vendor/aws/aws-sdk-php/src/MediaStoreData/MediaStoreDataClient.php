<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaStoreData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaStore Data Plane** service.
 * @method \R2Offload\Vendor\Aws\Result deleteObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listItems(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listItemsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 */
class MediaStoreDataClient extends AwsClient {}
