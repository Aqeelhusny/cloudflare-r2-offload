<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SnowDeviceManagement;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Snow Device Management** service.
 * @method \R2Offload\Vendor\Aws\Result cancelTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDeviceEc2Instances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDeviceEc2InstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeviceResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeviceResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDevices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class SnowDeviceManagementClient extends AwsClient {}
