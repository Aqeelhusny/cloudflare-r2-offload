<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\RedshiftDataAPIService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Redshift Data API Service** service.
 * @method \R2Offload\Vendor\Aws\Result batchExecuteStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStatementResult(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStatementResultAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStatementResultV2(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStatementResultV2Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatabases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSchemas(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSchemasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStatements(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStatementsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTables(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 */
class RedshiftDataAPIServiceClient extends AwsClient {}
