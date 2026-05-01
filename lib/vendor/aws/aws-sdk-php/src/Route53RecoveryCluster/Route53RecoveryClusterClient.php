<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Route53RecoveryCluster;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Route53 Recovery Cluster** service.
 * @method \R2Offload\Vendor\Aws\Result getRoutingControlState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRoutingControlStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRoutingControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoutingControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRoutingControlState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRoutingControlStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRoutingControlStates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRoutingControlStatesAsync(array $args = [])
 */
class Route53RecoveryClusterClient extends AwsClient {}
