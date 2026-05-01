<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SagemakerEdgeManager;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Sagemaker Edge Manager** service.
 * @method \R2Offload\Vendor\Aws\Result getDeployments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeviceRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendHeartbeat(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendHeartbeatAsync(array $args = [])
 */
class SagemakerEdgeManagerClient extends AwsClient {}
