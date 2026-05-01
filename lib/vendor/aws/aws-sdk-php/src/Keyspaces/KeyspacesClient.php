<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Keyspaces;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Keyspaces** service.
 * @method \R2Offload\Vendor\Aws\Result createKeyspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createKeyspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createType(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTypeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteKeyspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeyspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteType(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTypeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getKeyspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getKeyspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTableAutoScalingSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTableAutoScalingSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getType(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTypeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listKeyspaces(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listKeyspacesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTables(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreTableAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateKeyspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateKeyspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTable(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 */
class KeyspacesClient extends AwsClient {}
