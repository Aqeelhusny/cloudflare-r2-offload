<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3Files;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 Files** service.
 * @method \R2Offload\Vendor\Aws\Result createAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result createAccessPoint(array{
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     fileSystemId?: string,
 *     posixUser?: array{uid?: int, gid?: int, secondaryGids?: list<int>, ...},
 *     rootDirectory?: array{
 *         path?: string,
 *         creationPermissions?: array{ownerUid?: int, ownerGid?: int, permissions?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAccessPointAsync(array{
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     fileSystemId?: string,
 *     posixUser?: array{uid?: int, gid?: int, secondaryGids?: list<int>, ...},
 *     rootDirectory?: array{
 *         path?: string,
 *         creationPermissions?: array{ownerUid?: int, ownerGid?: int, permissions?: string, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFileSystem(array $args = [])
 * @phpstan-method \Aws\Result createFileSystem(array{
 *     bucket?: string,
 *     prefix?: string,
 *     clientToken?: string,
 *     kmsKeyId?: string,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     acceptBucketWarning?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createFileSystemAsync(array{
 *     bucket?: string,
 *     prefix?: string,
 *     clientToken?: string,
 *     kmsKeyId?: string,
 *     roleArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     acceptBucketWarning?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMountTarget(array $args = [])
 * @phpstan-method \Aws\Result createMountTarget(array{
 *     fileSystemId?: string,
 *     subnetId?: string,
 *     ipv4Address?: string,
 *     ipv6Address?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4_ONLY'|'IPV6_ONLY',
 *     securityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMountTargetAsync(array{
 *     fileSystemId?: string,
 *     subnetId?: string,
 *     ipv4Address?: string,
 *     ipv6Address?: string,
 *     ipAddressType?: 'DUAL_STACK'|'IPV4_ONLY'|'IPV6_ONLY',
 *     securityGroups?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result deleteAccessPoint(array{accessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAccessPointAsync(array{accessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystem(array $args = [])
 * @phpstan-method \Aws\Result deleteFileSystem(array{fileSystemId?: string, forceDelete?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileSystemAsync(array{fileSystemId?: string, forceDelete?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteFileSystemPolicy(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMountTarget(array $args = [])
 * @phpstan-method \Aws\Result deleteMountTarget(array{mountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMountTargetAsync(array{mountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPoint(array $args = [])
 * @phpstan-method \Aws\Result getAccessPoint(array{accessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessPointAsync(array{accessPointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFileSystem(array $args = [])
 * @phpstan-method \Aws\Result getFileSystem(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFileSystemAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFileSystemAsync(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result getFileSystemPolicy(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFileSystemPolicyAsync(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMountTarget(array $args = [])
 * @phpstan-method \Aws\Result getMountTarget(array{mountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMountTargetAsync(array{mountTargetId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSynchronizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getSynchronizationConfiguration(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSynchronizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSynchronizationConfigurationAsync(array{fileSystemId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessPoints(array $args = [])
 * @phpstan-method \Aws\Result listAccessPoints(array{fileSystemId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessPointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAccessPointsAsync(array{fileSystemId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFileSystems(array $args = [])
 * @phpstan-method \Aws\Result listFileSystems(array{bucket?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFileSystemsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFileSystemsAsync(array{bucket?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMountTargets(array $args = [])
 * @phpstan-method \Aws\Result listMountTargets(array{fileSystemId?: string, accessPointId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMountTargetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMountTargetsAsync(array{fileSystemId?: string, accessPointId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceId?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFileSystemPolicy(array $args = [])
 * @phpstan-method \Aws\Result putFileSystemPolicy(array{fileSystemId?: string, policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array{fileSystemId?: string, policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSynchronizationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putSynchronizationConfiguration(array{
 *     fileSystemId?: string,
 *     latestVersionNumber?: int,
 *     importDataRules?: list<array{prefix?: string, trigger?: 'ON_DIRECTORY_FIRST_ACCESS'|'ON_FILE_ACCESS', sizeLessThan?: int, ...}>,
 *     expirationDataRules?: list<array{daysAfterLastAccess?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSynchronizationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSynchronizationConfigurationAsync(array{
 *     fileSystemId?: string,
 *     latestVersionNumber?: int,
 *     importDataRules?: list<array{prefix?: string, trigger?: 'ON_DIRECTORY_FIRST_ACCESS'|'ON_FILE_ACCESS', sizeLessThan?: int, ...}>,
 *     expirationDataRules?: list<array{daysAfterLastAccess?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceId?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceId?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceId?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceId?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMountTarget(array $args = [])
 * @phpstan-method \Aws\Result updateMountTarget(array{mountTargetId?: string, securityGroups?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMountTargetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMountTargetAsync(array{mountTargetId?: string, securityGroups?: list<string>, ...} $args = [])
 */
class S3FilesClient extends AwsClient {}
