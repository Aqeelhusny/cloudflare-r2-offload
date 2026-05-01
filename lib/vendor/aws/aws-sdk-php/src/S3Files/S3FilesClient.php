<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3Files;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 Files** service.
 * @method \R2Offload\Vendor\Aws\Result createAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMountTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMountTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessPoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessPointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFileSystem(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFileSystemAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMountTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSynchronizationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSynchronizationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessPoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessPointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFileSystems(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFileSystemsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMountTargets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMountTargetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putFileSystemPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putFileSystemPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSynchronizationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSynchronizationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMountTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMountTargetAsync(array $args = [])
 */
class S3FilesClient extends AwsClient {}
