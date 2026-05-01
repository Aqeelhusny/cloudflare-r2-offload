<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BedrockDataAutomationRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Runtime for Amazon Bedrock Data Automation** service.
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeDataAutomation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeDataAutomationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeDataAutomationAsync(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeDataAutomationAsyncAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class BedrockDataAutomationRuntimeClient extends AwsClient {}
