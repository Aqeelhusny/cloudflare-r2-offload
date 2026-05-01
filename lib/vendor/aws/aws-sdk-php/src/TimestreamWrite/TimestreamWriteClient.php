<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\TimestreamWrite;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Timestream Write** service.
 * @method \R2Offload\Vendor\Aws\Result createBatchLoadTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBatchLoadTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDatabase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatabaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDatabase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatabaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBatchLoadTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBatchLoadTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDatabase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDatabaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBatchLoadTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBatchLoadTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatabases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTables(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resumeBatchLoadTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resumeBatchLoadTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDatabase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDatabaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result writeRecords(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise writeRecordsAsync(array $args = [])
 */
class TimestreamWriteClient extends AwsClient {}
