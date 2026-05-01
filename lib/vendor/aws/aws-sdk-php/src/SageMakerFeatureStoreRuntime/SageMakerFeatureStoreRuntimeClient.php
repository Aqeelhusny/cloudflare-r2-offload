<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SageMakerFeatureStoreRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Feature Store Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetRecord(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetRecordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRecord(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRecordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecord(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRecord(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 */
class SageMakerFeatureStoreRuntimeClient extends AwsClient {}
