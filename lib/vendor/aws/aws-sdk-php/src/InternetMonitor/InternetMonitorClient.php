<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\InternetMonitor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Internet Monitor** service.
 * @method \R2Offload\Vendor\Aws\Result createMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHealthEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHealthEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInternetEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInternetEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResults(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHealthEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHealthEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInternetEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInternetEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMonitors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 */
class InternetMonitorClient extends AwsClient {}
