<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\TimestreamInfluxDB;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Timestream InfluxDB** service.
 * @method \R2Offload\Vendor\Aws\Result createDbCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDbClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDbInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDbInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDbParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDbParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDbCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDbClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDbInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDbInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDbCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDbClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDbInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDbInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDbParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDbParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDbClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDbClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDbInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDbInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDbInstancesForCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDbInstancesForClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDbParameterGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDbParameterGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootDbCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDbClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootDbInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDbInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDbCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDbClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDbInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDbInstanceAsync(array $args = [])
 */
class TimestreamInfluxDBClient extends AwsClient {}
