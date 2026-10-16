<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SagemakerEdgeManager;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Sagemaker Edge Manager** service.
 * @method \R2Offload\Vendor\Aws\Result getDeployments(array $args = [])
 * @phpstan-method \Aws\Result getDeployments(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeploymentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeploymentsAsync(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeviceRegistration(array $args = [])
 * @phpstan-method \Aws\Result getDeviceRegistration(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceRegistrationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceRegistrationAsync(array{DeviceName?: string, DeviceFleetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result sendHeartbeat(array{
 *     AgentMetrics?: list<array{Dimension?: string, MetricName?: string, Value?: float, Timestamp?: int|string|\DateTimeInterface, ...}>,
 *     Models?: list<array{
 *         ModelName?: string,
 *         ModelVersion?: string,
 *         LatestSampleTime?: int|string|\DateTimeInterface,
 *         LatestInference?: int|string|\DateTimeInterface,
 *         ModelMetrics?: list<array>,
 *         ...,
 *     }>,
 *     AgentVersion?: string,
 *     DeviceName?: string,
 *     DeviceFleetName?: string,
 *     DeploymentResult?: array{
 *         DeploymentName?: string,
 *         DeploymentStatus?: string,
 *         DeploymentStatusMessage?: string,
 *         DeploymentStartTime?: int|string|\DateTimeInterface,
 *         DeploymentEndTime?: int|string|\DateTimeInterface,
 *         DeploymentModels?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendHeartbeatAsync(array{
 *     AgentMetrics?: list<array{Dimension?: string, MetricName?: string, Value?: float, Timestamp?: int|string|\DateTimeInterface, ...}>,
 *     Models?: list<array{
 *         ModelName?: string,
 *         ModelVersion?: string,
 *         LatestSampleTime?: int|string|\DateTimeInterface,
 *         LatestInference?: int|string|\DateTimeInterface,
 *         ModelMetrics?: list<array>,
 *         ...,
 *     }>,
 *     AgentVersion?: string,
 *     DeviceName?: string,
 *     DeviceFleetName?: string,
 *     DeploymentResult?: array{
 *         DeploymentName?: string,
 *         DeploymentStatus?: string,
 *         DeploymentStatusMessage?: string,
 *         DeploymentStartTime?: int|string|\DateTimeInterface,
 *         DeploymentEndTime?: int|string|\DateTimeInterface,
 *         DeploymentModels?: list<array>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class SagemakerEdgeManagerClient extends AwsClient {}
