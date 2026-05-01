<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudWatchRUM;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch RUM** service.
 * @method \R2Offload\Vendor\Aws\Result batchCreateRumMetricDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCreateRumMetricDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteRumMetricDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteRumMetricDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetRumMetricDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetRumMetricDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRumMetricsDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRumMetricsDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppMonitorData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppMonitorDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppMonitors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppMonitorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRumMetricsDestinations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRumMetricsDestinationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRumEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRumEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRumMetricsDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRumMetricsDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRumMetricDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRumMetricDefinitionAsync(array $args = [])
 */
class CloudWatchRUMClient extends AwsClient {}
