<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ApiGatewayManagementApi;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonApiGatewayManagementApi** service.
 * @method \R2Offload\Vendor\Aws\Result deleteConnection(array $args = [])
 * @phpstan-method \Aws\Result deleteConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnection(array $args = [])
 * @phpstan-method \Aws\Result getConnection(array{ConnectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectionAsync(array{ConnectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result postToConnection(array $args = [])
 * @phpstan-method \Aws\Result postToConnection(array{Data?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ConnectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise postToConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise postToConnectionAsync(array{Data?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ConnectionId?: string, ...} $args = [])
 */
class ApiGatewayManagementApiClient extends AwsClient {}
