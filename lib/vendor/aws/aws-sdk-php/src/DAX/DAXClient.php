<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DAX;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DynamoDB Accelerator (DAX)** service.
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result decreaseReplicationFactor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise decreaseReplicationFactorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDefaultParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDefaultParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeParameterGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeParameterGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSubnetGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSubnetGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result increaseReplicationFactor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise increaseReplicationFactorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootNode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootNodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSubnetGroupAsync(array $args = [])
 */
class DAXClient extends AwsClient {}
