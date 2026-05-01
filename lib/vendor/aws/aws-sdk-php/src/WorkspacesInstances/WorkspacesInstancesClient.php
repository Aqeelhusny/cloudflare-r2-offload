<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\WorkspacesInstances;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Workspaces Instances** service.
 * @method \R2Offload\Vendor\Aws\Result associateVolume(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateVolumeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createVolume(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createVolumeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkspaceInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkspaceInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVolume(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVolumeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkspaceInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkspaceInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateVolume(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateVolumeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkspaceInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkspaceInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInstanceTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInstanceTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkspaceInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkspaceInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class WorkspacesInstancesClient extends AwsClient {}
