<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTSecureTunneling;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Secure Tunneling** service.
 * @method \R2Offload\Vendor\Aws\Result closeTunnel(array $args = [])
 * @phpstan-method \Aws\Result closeTunnel(array{tunnelId?: string, delete?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise closeTunnelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise closeTunnelAsync(array{tunnelId?: string, delete?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTunnel(array $args = [])
 * @phpstan-method \Aws\Result describeTunnel(array{tunnelId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTunnelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTunnelAsync(array{tunnelId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTunnels(array $args = [])
 * @phpstan-method \Aws\Result listTunnels(array{thingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTunnelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTunnelsAsync(array{thingName?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result openTunnel(array $args = [])
 * @phpstan-method \Aws\Result openTunnel(array{
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     destinationConfig?: array{thingName?: string, services?: list<string>, ...},
 *     timeoutConfig?: array{maxLifetimeTimeoutMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise openTunnelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise openTunnelAsync(array{
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     destinationConfig?: array{thingName?: string, services?: list<string>, ...},
 *     timeoutConfig?: array{maxLifetimeTimeoutMinutes?: int, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result rotateTunnelAccessToken(array $args = [])
 * @phpstan-method \Aws\Result rotateTunnelAccessToken(array{
 *     tunnelId?: string,
 *     clientMode?: 'ALL'|'DESTINATION'|'SOURCE',
 *     destinationConfig?: array{thingName?: string, services?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rotateTunnelAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rotateTunnelAccessTokenAsync(array{
 *     tunnelId?: string,
 *     clientMode?: 'ALL'|'DESTINATION'|'SOURCE',
 *     destinationConfig?: array{thingName?: string, services?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 */
class IoTSecureTunnelingClient extends AwsClient {}
