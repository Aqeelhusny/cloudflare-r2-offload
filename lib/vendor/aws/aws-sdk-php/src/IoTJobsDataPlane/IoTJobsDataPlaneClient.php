<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTJobsDataPlane;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Jobs Data Plane** service.
 * @method \R2Offload\Vendor\Aws\Result describeJobExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPendingJobExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPendingJobExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCommandExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCommandExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startNextPendingJobExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startNextPendingJobExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJobExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobExecutionAsync(array $args = [])
 */
class IoTJobsDataPlaneClient extends AwsClient {}
