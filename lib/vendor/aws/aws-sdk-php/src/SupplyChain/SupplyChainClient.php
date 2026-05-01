<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SupplyChain;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Supply Chain** service.
 * @method \R2Offload\Vendor\Aws\Result createBillOfMaterialsImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBillOfMaterialsImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataIntegrationFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataIntegrationFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataLakeDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataLakeDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataLakeNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataLakeNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataIntegrationFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataIntegrationFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataLakeDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataLakeDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataLakeNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataLakeNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBillOfMaterialsImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBillOfMaterialsImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataIntegrationEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataIntegrationEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataIntegrationFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataIntegrationFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataIntegrationFlowExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataIntegrationFlowExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataLakeDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataLakeDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataLakeNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataLakeNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataIntegrationEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataIntegrationEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataIntegrationFlowExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataIntegrationFlowExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataIntegrationFlows(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataIntegrationFlowsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataLakeDatasets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataLakeDatasetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataLakeNamespaces(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataLakeNamespacesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendDataIntegrationEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendDataIntegrationEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataIntegrationFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataIntegrationFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataLakeDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataLakeDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataLakeNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataLakeNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInstanceAsync(array $args = [])
 */
class SupplyChainClient extends AwsClient {}
