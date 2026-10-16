<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BCMDataExports;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Data Exports** service.
 * @method \R2Offload\Vendor\Aws\Result createExport(array $args = [])
 * @phpstan-method \Aws\Result createExport(array{
 *     Export?: array{
 *         ExportArn?: string,
 *         Name?: string,
 *         Description?: string,
 *         DataQuery?: array{QueryStatement?: string, TableConfigurations?: array<string, array<string, string>>, ...},
 *         DestinationConfigurations?: array{S3Destination?: array, ...},
 *         RefreshCadence?: array{Frequency?: 'SYNCHRONOUS', ...},
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createExportAsync(array{
 *     Export?: array{
 *         ExportArn?: string,
 *         Name?: string,
 *         Description?: string,
 *         DataQuery?: array{QueryStatement?: string, TableConfigurations?: array<string, array<string, string>>, ...},
 *         DestinationConfigurations?: array{S3Destination?: array, ...},
 *         RefreshCadence?: array{Frequency?: 'SYNCHRONOUS', ...},
 *         ...,
 *     },
 *     ResourceTags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteExport(array $args = [])
 * @phpstan-method \Aws\Result deleteExport(array{ExportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteExportAsync(array{ExportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExecution(array $args = [])
 * @phpstan-method \Aws\Result getExecution(array{ExportArn?: string, ExecutionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExecutionAsync(array{ExportArn?: string, ExecutionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExport(array $args = [])
 * @phpstan-method \Aws\Result getExport(array{ExportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExportAsync(array{ExportArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTable(array $args = [])
 * @phpstan-method \Aws\Result getTable(array{TableName?: string, TableProperties?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTableAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTableAsync(array{TableName?: string, TableProperties?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{ExportArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{ExportArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExports(array $args = [])
 * @phpstan-method \Aws\Result listExports(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExportsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTables(array $args = [])
 * @phpstan-method \Aws\Result listTables(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTablesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, ResourceTags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, ResourceTagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateExport(array $args = [])
 * @phpstan-method \Aws\Result updateExport(array{
 *     ExportArn?: string,
 *     Export?: array{
 *         ExportArn?: string,
 *         Name?: string,
 *         Description?: string,
 *         DataQuery?: array{QueryStatement?: string, TableConfigurations?: array<string, array<string, string>>, ...},
 *         DestinationConfigurations?: array{S3Destination?: array, ...},
 *         RefreshCadence?: array{Frequency?: 'SYNCHRONOUS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateExportAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateExportAsync(array{
 *     ExportArn?: string,
 *     Export?: array{
 *         ExportArn?: string,
 *         Name?: string,
 *         Description?: string,
 *         DataQuery?: array{QueryStatement?: string, TableConfigurations?: array<string, array<string, string>>, ...},
 *         DestinationConfigurations?: array{S3Destination?: array, ...},
 *         RefreshCadence?: array{Frequency?: 'SYNCHRONOUS', ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class BCMDataExportsClient extends AwsClient {}
