<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DocDBElastic;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon DocumentDB Elastic Clusters** service.
 * @method \R2Offload\Vendor\Aws\Result applyPendingMaintenanceAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPendingMaintenanceAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPendingMaintenanceActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusterSnapshots(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClusterSnapshotsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPendingMaintenanceActions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPendingMaintenanceActionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreClusterFromSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreClusterFromSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 */
class DocDBElasticClient extends AwsClient {}
