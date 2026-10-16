<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Efs;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with **Amazon EFS**.
 *
 * @method \R2Offload\Vendor\Aws\Result createAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result createAccessPoint(array{
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileSystemId?: string,
 *     PosixUser?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     RootDirectory?: array{Path?: string, CreationInfo?: array{OwnerUid?: int, OwnerGid?: int, Permissions?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPointAsync(array{
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     FileSystemId?: string,
 *     PosixUser?: array{Uid?: int, Gid?: int, SecondaryGids?: list<int>, ...},
 *     RootDirectory?: array{Path?: string, CreationInfo?: array{OwnerUid?: int, OwnerGid?: int, Permissions?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFileSystem(array $args = [])
 * @phpstan-method \Aws\Result createFileSystem(array{
 *     CreationToken?: string,
 *     PerformanceMode?: 'generalPurpose'|'maxIO',
 *     Encrypted?: bool,
 *     KmsKeyId?: string,
 *     ThroughputMode?: 'bursting'|'elastic'|'provisioned',
 *     ProvisionedThroughputInMibps?: float,
 *     AvailabilityZoneName?: string,
 *     Backup?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFileSystemAsync(array{
 *     CreationToken?: string,
 *     PerformanceMode?: 'generalPurpose'|'maxIO',
 *     Encrypted?: bool,
 *     KmsKeyId?: string,
 *     ThroughputMode?: 'bursting'|'elastic'|'provisioned',
 *     ProvisionedThroughputInMibps?: float,
 *     AvailabilityZoneName?: string,
 *     Backup?: bool,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMountTarget(array $args = [])
 * @phpstan-method \Aws\Result createMountTarget(array{
 *     FileSystemId?: string,
 *     SubnetId?: string,
 *     IpAddress?: string,
 *     Ipv6Address?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4_ONLY'|'IPV6_ONLY',
 *     SecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMountTargetAsync(array{
 *     FileSystemId?: string,
 *     SubnetId?: string,
 *     IpAddress?: string,
 *     Ipv6Address?: string,
 *     IpAddressType?: 'DUAL_STACK'|'IPV4_ONLY'|'IPV6_ONLY',
 *     SecurityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createReplicationConfiguration(array{
 *     SourceFileSystemId?: string,
 *     Destinations?: list<array{
 *         Region?: string,
 *         AvailabilityZoneName?: string,
 *         KmsKeyId?: string,
 *         FileSystemId?: string,
 *         RoleArn?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReplicationConfigurationAsync(array{
 *     SourceFileSystemId?: string,
 *     Destinations?: list<array{
 *         Region?: string,
 *         AvailabilityZoneName?: string,
 *         KmsKeyId?: string,
 *         FileSystemId?: string,
 *         RoleArn?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTags(array $args = [])
 * @phpstan-method \Aws\Result createTags(array{FileSystemId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createTagsAsync(array{FileSystemId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPoint(array{AccessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointAsync(array{AccessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystem(array $args = [])
 * @phpstan-method \Aws\Result deleteFileSystem(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileSystemAsync(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteFileSystemPolicy(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMountTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteMountTarget(array{MountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMountTargetAsync(array{MountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteReplicationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteReplicationConfiguration(array{SourceFileSystemId?: string, DeletionMode?: 'ALL_CONFIGURATIONS'|'LOCAL_CONFIGURATION_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReplicationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReplicationConfigurationAsync(array{SourceFileSystemId?: string, DeletionMode?: 'ALL_CONFIGURATIONS'|'LOCAL_CONFIGURATION_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTags(array $args = [])
 * @phpstan-method \Aws\Result deleteTags(array{FileSystemId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTagsAsync(array{FileSystemId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccessPoints(array $args = [])
 * @phpstan-method \Aws\Result describeAccessPoints(array{MaxResults?: int, NextToken?: string, AccessPointId?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccessPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccessPointsAsync(array{MaxResults?: int, NextToken?: string, AccessPointId?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccountPreferences(array $args = [])
 * @phpstan-method \Aws\Result describeAccountPreferences(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccountPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAccountPreferencesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBackupPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeBackupPolicy(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBackupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupPolicyAsync(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result describeFileSystemPolicy(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileSystemPolicyAsync(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFileSystems(array $args = [])
 * @phpstan-method \Aws\Result describeFileSystems(array{MaxItems?: int, Marker?: string, CreationToken?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFileSystemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFileSystemsAsync(array{MaxItems?: int, Marker?: string, CreationToken?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeLifecycleConfiguration(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeLifecycleConfigurationAsync(array{FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMountTargetSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result describeMountTargetSecurityGroups(array{MountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMountTargetSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMountTargetSecurityGroupsAsync(array{MountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMountTargets(array $args = [])
 * @phpstan-method \Aws\Result describeMountTargets(array{
 *     MaxItems?: int,
 *     Marker?: string,
 *     FileSystemId?: string,
 *     MountTargetId?: string,
 *     AccessPointId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMountTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMountTargetsAsync(array{
 *     MaxItems?: int,
 *     Marker?: string,
 *     FileSystemId?: string,
 *     MountTargetId?: string,
 *     AccessPointId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReplicationConfigurations(array $args = [])
 * @phpstan-method \Aws\Result describeReplicationConfigurations(array{FileSystemId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReplicationConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReplicationConfigurationsAsync(array{FileSystemId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTags(array $args = [])
 * @phpstan-method \Aws\Result describeTags(array{MaxItems?: int, Marker?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTagsAsync(array{MaxItems?: int, Marker?: string, FileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyMountTargetSecurityGroups(array $args = [])
 * @phpstan-method \Aws\Result modifyMountTargetSecurityGroups(array{MountTargetId?: string, SecurityGroups?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyMountTargetSecurityGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyMountTargetSecurityGroupsAsync(array{MountTargetId?: string, SecurityGroups?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountPreferences(array $args = [])
 * @phpstan-method \Aws\Result putAccountPreferences(array{ResourceIdType?: 'LONG_ID'|'SHORT_ID', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountPreferencesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountPreferencesAsync(array{ResourceIdType?: 'LONG_ID'|'SHORT_ID', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBackupPolicy(array $args = [])
 * @phpstan-method \Aws\Result putBackupPolicy(array{
 *     FileSystemId?: string,
 *     BackupPolicy?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBackupPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putBackupPolicyAsync(array{
 *     FileSystemId?: string,
 *     BackupPolicy?: array{Status?: 'DISABLED'|'DISABLING'|'ENABLED'|'ENABLING', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result putFileSystemPolicy(array{FileSystemId?: string, Policy?: string, BypassPolicyLockoutSafetyCheck?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array{FileSystemId?: string, Policy?: string, BypassPolicyLockoutSafetyCheck?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putLifecycleConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putLifecycleConfiguration(array{
 *     FileSystemId?: string,
 *     LifecyclePolicies?: list<array{
 *         TransitionToIA?: 'AFTER_14_DAYS'|'AFTER_180_DAYS'|'AFTER_1_DAY'|'AFTER_270_DAYS'|'AFTER_30_DAYS'|'AFTER_365_DAYS'|'AFTER_60_DAYS'|'AFTER_7_DAYS'|'AFTER_90_DAYS',
 *         TransitionToPrimaryStorageClass?: 'AFTER_1_ACCESS',
 *         TransitionToArchive?: 'AFTER_14_DAYS'|'AFTER_180_DAYS'|'AFTER_1_DAY'|'AFTER_270_DAYS'|'AFTER_30_DAYS'|'AFTER_365_DAYS'|'AFTER_60_DAYS'|'AFTER_7_DAYS'|'AFTER_90_DAYS',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putLifecycleConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putLifecycleConfigurationAsync(array{
 *     FileSystemId?: string,
 *     LifecyclePolicies?: list<array{
 *         TransitionToIA?: 'AFTER_14_DAYS'|'AFTER_180_DAYS'|'AFTER_1_DAY'|'AFTER_270_DAYS'|'AFTER_30_DAYS'|'AFTER_365_DAYS'|'AFTER_60_DAYS'|'AFTER_7_DAYS'|'AFTER_90_DAYS',
 *         TransitionToPrimaryStorageClass?: 'AFTER_1_ACCESS',
 *         TransitionToArchive?: 'AFTER_14_DAYS'|'AFTER_180_DAYS'|'AFTER_1_DAY'|'AFTER_270_DAYS'|'AFTER_30_DAYS'|'AFTER_365_DAYS'|'AFTER_60_DAYS'|'AFTER_7_DAYS'|'AFTER_90_DAYS',
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceId?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceId?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFileSystem(array $args = [])
 * @phpstan-method \Aws\Result updateFileSystem(array{
 *     FileSystemId?: string,
 *     ThroughputMode?: 'bursting'|'elastic'|'provisioned',
 *     ProvisionedThroughputInMibps?: float,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFileSystemAsync(array{
 *     FileSystemId?: string,
 *     ThroughputMode?: 'bursting'|'elastic'|'provisioned',
 *     ProvisionedThroughputInMibps?: float,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFileSystemProtection(array $args = [])
 * @phpstan-method \Aws\Result updateFileSystemProtection(array{FileSystemId?: string, ReplicationOverwriteProtection?: 'DISABLED'|'ENABLED'|'REPLICATING', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFileSystemProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateFileSystemProtectionAsync(array{FileSystemId?: string, ReplicationOverwriteProtection?: 'DISABLED'|'ENABLED'|'REPLICATING', ...} $args = [])
 */
class EfsClient extends AwsClient {}
