<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ApplicationSignals;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Application Signals** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetServiceLevelObjectiveBudgetReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetServiceLevelObjectiveBudgetReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchUpdateExclusionWindows(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchUpdateExclusionWindowsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createServiceLevelObjective(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createServiceLevelObjectiveAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroupingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteServiceLevelObjective(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceLevelObjectiveAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceLevelObjective(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceLevelObjectiveAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAuditFindings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAuditFindingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEntityEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEntityEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupingAttributeDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupingAttributeDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceDependencies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceDependenciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceDependents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceDependentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceLevelObjectiveExclusionWindows(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceLevelObjectiveExclusionWindowsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceLevelObjectives(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceLevelObjectivesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceStates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceStatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putGroupingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putGroupingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDiscovery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDiscoveryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceLevelObjective(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceLevelObjectiveAsync(array $args = [])
 */
class ApplicationSignalsClient extends AwsClient {}
