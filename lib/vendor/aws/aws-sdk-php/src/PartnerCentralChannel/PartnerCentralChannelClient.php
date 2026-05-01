<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PartnerCentralChannel;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Channel API** service.
 * @method \R2Offload\Vendor\Aws\Result acceptChannelHandshake(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptChannelHandshakeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelChannelHandshake(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelChannelHandshakeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannelHandshake(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelHandshakeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProgramManagementAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProgramManagementAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRelationship(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRelationshipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProgramManagementAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProgramManagementAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRelationship(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRelationshipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRelationship(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRelationshipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannelHandshakes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelHandshakesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProgramManagementAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProgramManagementAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRelationships(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRelationshipsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectChannelHandshake(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectChannelHandshakeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProgramManagementAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProgramManagementAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRelationship(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRelationshipAsync(array $args = [])
 */
class PartnerCentralChannelClient extends AwsClient {}
