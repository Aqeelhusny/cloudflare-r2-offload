<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ApplicationDiscoveryService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Application Discovery Service** service.
 * @method \R2Offload\Vendor\Aws\Result associateConfigurationItemsToApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateConfigurationItemsToApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteAgents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteAgentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteImportData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteImportDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAgents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAgentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBatchDeleteConfigurationTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBatchDeleteConfigurationTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeContinuousExports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeContinuousExportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeExportConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExportConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeExportTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImportTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImportTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateConfigurationItemsFromApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateConfigurationItemsFromApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDiscoverySummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDiscoverySummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServerNeighbors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServerNeighborsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startBatchDeleteConfigurationTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startBatchDeleteConfigurationTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startContinuousExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startContinuousExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDataCollectionByAgentIds(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDataCollectionByAgentIdsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startExportTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startImportTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startImportTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopContinuousExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopContinuousExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopDataCollectionByAgentIds(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDataCollectionByAgentIdsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 */
class ApplicationDiscoveryServiceClient extends AwsClient {}
