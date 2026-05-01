<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaPackageVod;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage VOD** service.
 * @method \R2Offload\Vendor\Aws\Result configureLogs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise configureLogsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAsset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPackagingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPackagingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPackagingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPackagingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAsset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePackagingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePackagingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePackagingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePackagingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAsset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAssetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePackagingConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePackagingConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePackagingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePackagingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackagingConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackagingConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackagingGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackagingGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePackagingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePackagingGroupAsync(array $args = [])
 */
class MediaPackageVodClient extends AwsClient {}
