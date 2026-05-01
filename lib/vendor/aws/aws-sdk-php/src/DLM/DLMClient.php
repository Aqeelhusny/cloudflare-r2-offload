<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DLM;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Data Lifecycle Manager** service.
 * @method \R2Offload\Vendor\Aws\Result createLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLifecyclePolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLifecyclePoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLifecyclePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLifecyclePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLifecyclePolicyAsync(array $args = [])
 */
class DLMClient extends AwsClient {}
