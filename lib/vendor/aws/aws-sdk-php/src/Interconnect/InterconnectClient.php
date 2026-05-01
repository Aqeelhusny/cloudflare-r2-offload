<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Interconnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Interconnect** service.
 * @method \R2Offload\Vendor\Aws\Result acceptConnectionProposal(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptConnectionProposalAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectionProposal(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectionProposalAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttachPoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttachPointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectionAsync(array $args = [])
 */
class InterconnectClient extends AwsClient {}
