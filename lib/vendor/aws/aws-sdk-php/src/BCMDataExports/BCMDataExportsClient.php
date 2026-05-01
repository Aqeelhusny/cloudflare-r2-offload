<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BCMDataExports;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Data Exports** service.
 * @method \R2Offload\Vendor\Aws\Result createExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTables(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateExportAsync(array $args = [])
 */
class BCMDataExportsClient extends AwsClient {}
