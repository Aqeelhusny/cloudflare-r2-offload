<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SnowBall;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Import/Export Snowball** service.
 * @method \R2Offload\Vendor\Aws\Result cancelCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAddress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAddressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLongTermPricing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLongTermPricingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReturnShippingLabel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReturnShippingLabelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAddress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAddressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAddresses(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAddressesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReturnShippingLabel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReturnShippingLabelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobManifest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobManifestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobUnlockCode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobUnlockCodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSnowballUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSnowballUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSoftwareUpdates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSoftwareUpdatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusterJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClusterJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCompatibleImages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCompatibleImagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLongTermPricing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLongTermPricingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPickupLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPickupLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServiceVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServiceVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJobShipmentState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobShipmentStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLongTermPricing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLongTermPricingAsync(array $args = [])
 */
class SnowBallClient extends AwsClient {}
