<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\WorkSpacesThinClient;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkSpaces Thin Client** service.
 * @method \R2Offload\Vendor\Aws\Result createEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSoftwareSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSoftwareSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDevices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSoftwareSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSoftwareSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSoftwareSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSoftwareSetAsync(array $args = [])
 */
class WorkSpacesThinClientClient extends AwsClient {}
