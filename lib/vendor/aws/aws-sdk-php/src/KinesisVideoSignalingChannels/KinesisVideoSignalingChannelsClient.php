<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideoSignalingChannels;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Signaling Channels** service.
 * @method \R2Offload\Vendor\Aws\Result getIceServerConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIceServerConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendAlexaOfferToMaster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendAlexaOfferToMasterAsync(array $args = [])
 */
class KinesisVideoSignalingChannelsClient extends AwsClient {}
