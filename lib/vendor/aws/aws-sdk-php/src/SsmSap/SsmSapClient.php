<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SsmSap;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager for SAP** service.
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigurationCheckOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationCheckOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDatabase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDatabaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationCheckDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationCheckDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationCheckOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationCheckOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatabases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOperationEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOperationEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubCheckResults(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubCheckResultsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubCheckRuleResults(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubCheckRuleResultsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApplicationRefresh(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApplicationRefreshAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startConfigurationChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startConfigurationChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplicationSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationSettingsAsync(array $args = [])
 */
class SsmSapClient extends AwsClient {}
