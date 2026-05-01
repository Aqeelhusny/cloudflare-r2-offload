<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\RDSDataService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS RDS DataService** service.
 * @method \R2Offload\Vendor\Aws\Result batchExecuteStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchExecuteStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result beginTransaction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise beginTransactionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result commitTransaction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise commitTransactionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeSql(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeSqlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeStatement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeStatementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rollbackTransaction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rollbackTransactionAsync(array $args = [])
 */
class RDSDataServiceClient extends AwsClient {}
