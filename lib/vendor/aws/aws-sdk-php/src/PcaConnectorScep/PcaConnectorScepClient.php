<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PcaConnectorScep;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Private CA Connector for SCEP** service.
 * @method \R2Offload\Vendor\Aws\Result createChallenge(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChallengeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteChallenge(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteChallengeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChallengeMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChallengeMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChallengePassword(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChallengePasswordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChallengeMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChallengeMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class PcaConnectorScepClient extends AwsClient {}
