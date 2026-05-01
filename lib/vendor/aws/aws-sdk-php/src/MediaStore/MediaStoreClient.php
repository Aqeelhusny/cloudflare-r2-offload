<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaStore;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaStore** service.
 * @method \R2Offload\Vendor\Aws\Result createContainer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createContainerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteContainer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteContainerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteContainerPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteContainerPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCorsPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCorsPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMetricPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMetricPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeContainer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeContainerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getContainerPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getContainerPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCorsPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCorsPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMetricPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMetricPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listContainers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listContainersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putContainerPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putContainerPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putCorsPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putCorsPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putMetricPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putMetricPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAccessLogging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAccessLoggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopAccessLogging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopAccessLoggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class MediaStoreClient extends AwsClient {}
