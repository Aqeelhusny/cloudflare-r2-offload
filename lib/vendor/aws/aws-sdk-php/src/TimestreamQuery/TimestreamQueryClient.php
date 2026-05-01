<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\TimestreamQuery;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Timestream Query** service.
 * @method \R2Offload\Vendor\Aws\Result cancelQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScheduledQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScheduledQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScheduledQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScheduledQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScheduledQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScheduledQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeScheduledQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeScheduledQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScheduledQueries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScheduledQueriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result prepareQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise prepareQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result query(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise queryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScheduledQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScheduledQueryAsync(array $args = [])
 */
class TimestreamQueryClient extends AwsClient {}
