<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideoMedia;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams Media** service.
 * @method \R2Offload\Vendor\Aws\Result getMedia(array $args = [])
 * @phpstan-method \Aws\Result getMedia(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StartSelector?: array{
 *         StartSelectorType?: 'CONTINUATION_TOKEN'|'EARLIEST'|'FRAGMENT_NUMBER'|'NOW'|'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         AfterFragmentNumber?: string,
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         ContinuationToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMediaAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMediaAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     StartSelector?: array{
 *         StartSelectorType?: 'CONTINUATION_TOKEN'|'EARLIEST'|'FRAGMENT_NUMBER'|'NOW'|'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         AfterFragmentNumber?: string,
 *         StartTimestamp?: int|string|\DateTimeInterface,
 *         ContinuationToken?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class KinesisVideoMediaClient extends AwsClient {}
