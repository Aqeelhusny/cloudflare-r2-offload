<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideoSignalingChannels;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Signaling Channels** service.
 * @method \R2Offload\Vendor\Aws\Result getIceServerConfig(array $args = [])
 * @phpstan-method \Aws\Result getIceServerConfig(array{ChannelARN?: string, ClientId?: string, Service?: 'TURN', Username?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIceServerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIceServerConfigAsync(array{ChannelARN?: string, ClientId?: string, Service?: 'TURN', Username?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendAlexaOfferToMaster(array $args = [])
 * @phpstan-method \Aws\Result sendAlexaOfferToMaster(array{ChannelARN?: string, SenderClientId?: string, MessagePayload?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendAlexaOfferToMasterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendAlexaOfferToMasterAsync(array{ChannelARN?: string, SenderClientId?: string, MessagePayload?: string, ...} $args = [])
 */
class KinesisVideoSignalingChannelsClient extends AwsClient {}
