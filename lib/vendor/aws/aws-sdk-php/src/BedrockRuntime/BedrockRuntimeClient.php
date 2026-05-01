<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BedrockRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Bedrock Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result applyGuardrail(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise applyGuardrailAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result converse(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise converseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result converseStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise converseStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result countTokens(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise countTokensAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAsyncInvoke(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAsyncInvokeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeModelWithResponseStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeModelWithResponseStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAsyncInvokes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAsyncInvokesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAsyncInvoke(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAsyncInvokeAsync(array $args = [])
 */
class BedrockRuntimeClient extends AwsClient {}
