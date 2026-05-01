<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KeyspacesStreams;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Keyspaces Streams** service.
 * @method \R2Offload\Vendor\Aws\Result getRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getShardIterator(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreams(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 */
class KeyspacesStreamsClient extends AwsClient {}
