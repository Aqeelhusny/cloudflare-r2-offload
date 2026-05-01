<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PinpointSMSVoice;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Pinpoint SMS and Voice Service** service.
 * @method \R2Offload\Vendor\Aws\Result createConfigurationSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConfigurationSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigurationSetEventDestinations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationSetEventDestinationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendVoiceMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendVoiceMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 */
class PinpointSMSVoiceClient extends AwsClient {}
