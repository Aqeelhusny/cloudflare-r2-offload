<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTSecureTunneling;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Secure Tunneling** service.
 * @method \R2Offload\Vendor\Aws\Result closeTunnel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise closeTunnelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTunnel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTunnelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTunnels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTunnelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result openTunnel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise openTunnelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rotateTunnelAccessToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rotateTunnelAccessTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class IoTSecureTunnelingClient extends AwsClient {}
