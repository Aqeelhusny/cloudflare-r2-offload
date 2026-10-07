<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideoWebRTCStorage;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video WebRTC Storage** service.
 * @method \R2Offload\Vendor\Aws\Result joinStorageSession(array $args = [])
 * @phpstan-method \Aws\Result joinStorageSession(array{channelArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise joinStorageSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise joinStorageSessionAsync(array{channelArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result joinStorageSessionAsViewer(array $args = [])
 * @phpstan-method \Aws\Result joinStorageSessionAsViewer(array{channelArn?: string, clientId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise joinStorageSessionAsViewerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise joinStorageSessionAsViewerAsync(array{channelArn?: string, clientId?: string, ...} $args = [])
 */
class KinesisVideoWebRTCStorageClient extends AwsClient {}
