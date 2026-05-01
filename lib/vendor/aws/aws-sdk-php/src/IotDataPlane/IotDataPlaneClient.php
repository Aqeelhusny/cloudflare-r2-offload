<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IotDataPlane;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Data Plane** service.
 *
 * @method \R2Offload\Vendor\Aws\Result deleteConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteThingShadow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteThingShadowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRetainedMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRetainedMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getThingShadow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getThingShadowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNamedShadowsForThing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNamedShadowsForThingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRetainedMessages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRetainedMessagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result publish(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateThingShadow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateThingShadowAsync(array $args = [])
 */
class IotDataPlaneClient extends AwsClient {}
