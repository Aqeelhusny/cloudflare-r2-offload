<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ResourceGroups;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Groups** service.
 * @method \R2Offload\Vendor\Aws\Result cancelTagSyncTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelTagSyncTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroupConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroupQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupQueryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTagSyncTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagSyncTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result groupResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise groupResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupingStatuses(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupingStatusesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagSyncTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagSyncTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putGroupConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putGroupConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startTagSyncTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startTagSyncTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tag(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result ungroupResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise ungroupResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untag(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGroupQuery(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGroupQueryAsync(array $args = [])
 */
class ResourceGroupsClient extends AwsClient {}
