<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Braket;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Braket** service.
 * @method \R2Offload\Vendor\Aws\Result cancelJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelQuantumTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelQuantumTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createQuantumTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createQuantumTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSpendingLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSpendingLimitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSpendingLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSpendingLimitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQuantumTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQuantumTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchDevices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchDevicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchQuantumTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchQuantumTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchSpendingLimits(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchSpendingLimitsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSpendingLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSpendingLimitAsync(array $args = [])
 */
class BraketClient extends AwsClient {}
