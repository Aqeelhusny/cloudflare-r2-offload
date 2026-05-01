<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AugmentedAIRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Augmented AI Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result deleteHumanLoop(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHumanLoopAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHumanLoop(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHumanLoopAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHumanLoops(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHumanLoopsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startHumanLoop(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startHumanLoopAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopHumanLoop(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopHumanLoopAsync(array $args = [])
 */
class AugmentedAIRuntimeClient extends AwsClient {}
