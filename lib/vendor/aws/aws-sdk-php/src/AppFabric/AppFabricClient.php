<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AppFabric;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AppFabric** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetUserAccessTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetUserAccessTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result connectAppAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise connectAppAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppBundle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppBundleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIngestion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIngestionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIngestionDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIngestionDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppBundle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppBundleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIngestion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIngestionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIngestionDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIngestionDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppBundle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppBundleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIngestion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIngestionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIngestionDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIngestionDestinationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppAuthorizations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppAuthorizationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppBundles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppBundlesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIngestionDestinations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIngestionDestinationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIngestions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIngestionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startIngestion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startIngestionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startUserAccessTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startUserAccessTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopIngestion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopIngestionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateIngestionDestination(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateIngestionDestinationAsync(array $args = [])
 */
class AppFabricClient extends AwsClient {}
