<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Firehose;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Firehose** service.
 *
 * @method \R2Offload\Vendor\Aws\Result createDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeliveryStreams(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeliveryStreamsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRecord(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRecordBatch(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRecordBatchAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDeliveryStreamEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDeliveryStreamEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopDeliveryStreamEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDeliveryStreamEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagDeliveryStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagDeliveryStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDestinationAsync(array $args = [])
 */
class FirehoseClient extends AwsClient {}
