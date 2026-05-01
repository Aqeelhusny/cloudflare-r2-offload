<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ivschat;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Interactive Video Service Chat** service.
 * @method \R2Offload\Vendor\Aws\Result createChatToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChatTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLoggingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLoggingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRoom(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRoomAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLoggingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLoggingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRoom(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRoomAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disconnectUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disconnectUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLoggingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLoggingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRoom(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRoomAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLoggingConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLoggingConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRooms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoomsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLoggingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLoggingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRoom(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRoomAsync(array $args = [])
 */
class ivschatClient extends AwsClient {}
