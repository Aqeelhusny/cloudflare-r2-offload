<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\NetworkFlowMonitor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Network Flow Monitor** service.
 * @method \R2Offload\Vendor\Aws\Result createMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsMonitorTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsMonitorTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsWorkloadInsightsTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsWorkloadInsightsTopContributorsData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusMonitorTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusMonitorTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusWorkloadInsightsTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusWorkloadInsightsTopContributorsData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScopeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMonitors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScopes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScopesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryMonitorTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryMonitorTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryWorkloadInsightsTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryWorkloadInsightsTopContributorsData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryMonitorTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryMonitorTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryWorkloadInsightsTopContributors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryWorkloadInsightsTopContributorsData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScope(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScopeAsync(array $args = [])
 */
class NetworkFlowMonitorClient extends AwsClient {}
