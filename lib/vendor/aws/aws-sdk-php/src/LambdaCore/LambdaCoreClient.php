<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LambdaCore;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Lambda Core** service.
 * @method \R2Offload\Vendor\Aws\Result createNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result createNetworkConnector(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createNetworkConnectorAsync(array{
 *     Name?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result getNetworkConnector(array{Identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getNetworkConnectorAsync(array{Identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNetworkConnectors(array $args = [])
 * @phpstan-method \Aws\Result listNetworkConnectors(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listNetworkConnectorsAsync(array{
 *     State?: 'ACTIVE'|'DELETE_FAILED'|'DELETING'|'FAILED'|'INACTIVE'|'PENDING',
 *     Marker?: string,
 *     MaxItems?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateNetworkConnector(array $args = [])
 * @phpstan-method \Aws\Result updateNetworkConnector(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNetworkConnectorAsync(array{
 *     Identifier?: string,
 *     Configuration?: array{
 *         VpcEgressConfiguration?: array{
 *             SubnetIds?: list<string>,
 *             SecurityGroupIds?: list<string>,
 *             NetworkProtocol?: 'DualStack'|'IPv4',
 *             AssociatedComputeResourceTypes?: list<'MicroVm'>,
 *             ...,
 *         },
 *         ...,
 *     },
 *     OperatorRole?: string,
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 */
class LambdaCoreClient extends AwsClient {}
