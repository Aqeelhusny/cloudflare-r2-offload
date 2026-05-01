<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DynamoDbStreams;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\DynamoDb\DynamoDbClient;

/**
 * This client is used to interact with the **Amazon DynamoDb Streams** service.
 *
 * @method \R2Offload\Vendor\Aws\Result describeStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getShardIterator(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreams(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 */
class DynamoDbStreamsClient extends AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['default'] = 11;
        $args['retries']['fn'] = [DynamoDbClient::class, '_applyRetryConfig'];

        return $args;
    }
}