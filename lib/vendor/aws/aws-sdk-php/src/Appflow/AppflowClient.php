<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Appflow;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Appflow** service.
 * @method \R2Offload\Vendor\Aws\Result cancelFlowExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelFlowExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConnectorProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectorProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnectorProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectorProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectorEntity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorEntityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectorProfiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorProfilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFlowExecutionRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFlowExecutionRecordsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectorEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFlows(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFlowsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetConnectorMetadataCache(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetConnectorMetadataCacheAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unregisterConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unregisterConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnectorProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectorProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnectorRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectorRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFlowAsync(array $args = [])
 */
class AppflowClient extends AwsClient {}
