<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CognitoSync;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Sync** service.
 *
 * @method \R2Offload\Vendor\Aws\Result bulkPublish(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise bulkPublishAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeIdentityPoolUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIdentityPoolUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeIdentityUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIdentityUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBulkPublishDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBulkPublishDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCognitoEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCognitoEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdentityPoolConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdentityPoolConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentityPoolUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentityPoolUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecordsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setCognitoEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setCognitoEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setIdentityPoolConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setIdentityPoolConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result subscribeToDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise subscribeToDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unsubscribeFromDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unsubscribeFromDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRecordsAsync(array $args = [])
 */
class CognitoSyncClient extends AwsClient {}
