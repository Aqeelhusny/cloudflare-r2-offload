<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\NetworkMonitor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Network Monitor** service.
 * @method \R2Offload\Vendor\Aws\Result createMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProbe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProbeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProbe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProbeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProbe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProbeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMonitors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMonitor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProbe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProbeAsync(array $args = [])
 */
class NetworkMonitorClient extends AwsClient {}
