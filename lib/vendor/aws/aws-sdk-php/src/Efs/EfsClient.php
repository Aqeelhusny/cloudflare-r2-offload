<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Efs;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with **Amazon EFS**.
 *
 * @method \R2Offload\Vendor\Aws\Result createAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMountTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReplicationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReplicationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMountTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteReplicationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReplicationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccessPoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccessPointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccountPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccountPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBackupPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBackupPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFileSystems(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFileSystemsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMountTargetSecurityGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMountTargetSecurityGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMountTargets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMountTargetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReplicationConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReplicationConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyMountTargetSecurityGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyMountTargetSecurityGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBackupPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBackupPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFileSystemProtection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFileSystemProtectionAsync(array $args = [])
 */
class EfsClient extends AwsClient {}
