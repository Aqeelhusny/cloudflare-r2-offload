<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PCS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Parallel Computing Service** service.
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createComputeNodeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createComputeNodeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createQueue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createQueueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteComputeNodeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteComputeNodeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteQueue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteQueueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComputeNodeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComputeNodeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComputeNodeGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComputeNodeGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listQueues(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listQueuesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerComputeNodeGroupInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerComputeNodeGroupInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateComputeNodeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateComputeNodeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateQueue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateQueueAsync(array $args = [])
 */
class PCSClient extends AwsClient {}
