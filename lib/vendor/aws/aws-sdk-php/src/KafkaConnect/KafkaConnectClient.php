<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KafkaConnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Managed Streaming for Kafka Connect** service.
 * @method \R2Offload\Vendor\Aws\Result createConnector(array $args = [])
 * @phpstan-method \Aws\Result createConnector(array{
 *     capacity?: array{
 *         autoScaling?: array{
 *             maxWorkerCount?: int,
 *             mcuCount?: int,
 *             minWorkerCount?: int,
 *             scaleInPolicy?: array,
 *             scaleOutPolicy?: array,
 *             maxAutoscalingTaskCount?: int,
 *             ...,
 *         },
 *         provisionedCapacity?: array{mcuCount?: int, workerCount?: int, ...},
 *         ...,
 *     },
 *     connectorConfiguration?: array<string, string>,
 *     connectorDescription?: string,
 *     connectorName?: string,
 *     kafkaCluster?: array{apacheKafkaCluster?: array{bootstrapServers?: string, vpc?: array, ...}, ...},
 *     kafkaClusterClientAuthentication?: array{authenticationType?: 'IAM'|'NONE', ...},
 *     kafkaClusterEncryptionInTransit?: array{encryptionType?: 'PLAINTEXT'|'TLS', ...},
 *     kafkaConnectVersion?: string,
 *     logDelivery?: array{workerLogDelivery?: array{cloudWatchLogs?: array, firehose?: array, s3?: array, ...}, ...},
 *     networkType?: 'DUAL'|'IPV4',
 *     plugins?: list<array{customPlugin?: array, ...}>,
 *     serviceExecutionRoleArn?: string,
 *     workerConfiguration?: array{revision?: int, workerConfigurationArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConnectorAsync(array{
 *     capacity?: array{
 *         autoScaling?: array{
 *             maxWorkerCount?: int,
 *             mcuCount?: int,
 *             minWorkerCount?: int,
 *             scaleInPolicy?: array,
 *             scaleOutPolicy?: array,
 *             maxAutoscalingTaskCount?: int,
 *             ...,
 *         },
 *         provisionedCapacity?: array{mcuCount?: int, workerCount?: int, ...},
 *         ...,
 *     },
 *     connectorConfiguration?: array<string, string>,
 *     connectorDescription?: string,
 *     connectorName?: string,
 *     kafkaCluster?: array{apacheKafkaCluster?: array{bootstrapServers?: string, vpc?: array, ...}, ...},
 *     kafkaClusterClientAuthentication?: array{authenticationType?: 'IAM'|'NONE', ...},
 *     kafkaClusterEncryptionInTransit?: array{encryptionType?: 'PLAINTEXT'|'TLS', ...},
 *     kafkaConnectVersion?: string,
 *     logDelivery?: array{workerLogDelivery?: array{cloudWatchLogs?: array, firehose?: array, s3?: array, ...}, ...},
 *     networkType?: 'DUAL'|'IPV4',
 *     plugins?: list<array{customPlugin?: array, ...}>,
 *     serviceExecutionRoleArn?: string,
 *     workerConfiguration?: array{revision?: int, workerConfigurationArn?: string, ...},
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCustomPlugin(array $args = [])
 * @phpstan-method \Aws\Result createCustomPlugin(array{
 *     contentType?: 'JAR'|'ZIP',
 *     description?: string,
 *     location?: array{s3Location?: array{bucketArn?: string, fileKey?: string, objectVersion?: string, ...}, ...},
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCustomPluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCustomPluginAsync(array{
 *     contentType?: 'JAR'|'ZIP',
 *     description?: string,
 *     location?: array{s3Location?: array{bucketArn?: string, fileKey?: string, objectVersion?: string, ...}, ...},
 *     name?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result createWorkerConfiguration(array{description?: string, name?: string, propertiesFileContent?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWorkerConfigurationAsync(array{description?: string, name?: string, propertiesFileContent?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnector(array $args = [])
 * @phpstan-method \Aws\Result deleteConnector(array{connectorArn?: string, currentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectorAsync(array{connectorArn?: string, currentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCustomPlugin(array $args = [])
 * @phpstan-method \Aws\Result deleteCustomPlugin(array{customPluginArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCustomPluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCustomPluginAsync(array{customPluginArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteWorkerConfiguration(array{workerConfigurationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWorkerConfigurationAsync(array{workerConfigurationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnector(array $args = [])
 * @phpstan-method \Aws\Result describeConnector(array{connectorArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorAsync(array{connectorArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectorOperation(array $args = [])
 * @phpstan-method \Aws\Result describeConnectorOperation(array{connectorOperationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeConnectorOperationAsync(array{connectorOperationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCustomPlugin(array $args = [])
 * @phpstan-method \Aws\Result describeCustomPlugin(array{customPluginArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCustomPluginAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCustomPluginAsync(array{customPluginArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWorkerConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeWorkerConfiguration(array{workerConfigurationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWorkerConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWorkerConfigurationAsync(array{workerConfigurationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectorOperations(array $args = [])
 * @phpstan-method \Aws\Result listConnectorOperations(array{connectorArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorOperationsAsync(array{connectorArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectors(array $args = [])
 * @phpstan-method \Aws\Result listConnectors(array{connectorNamePrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConnectorsAsync(array{connectorNamePrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCustomPlugins(array $args = [])
 * @phpstan-method \Aws\Result listCustomPlugins(array{maxResults?: int, nextToken?: string, namePrefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCustomPluginsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCustomPluginsAsync(array{maxResults?: int, nextToken?: string, namePrefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkerConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listWorkerConfigurations(array{maxResults?: int, nextToken?: string, namePrefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkerConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWorkerConfigurationsAsync(array{maxResults?: int, nextToken?: string, namePrefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result restartConnector(array $args = [])
 * @phpstan-method \Aws\Result restartConnector(array{connectorArn?: string, onlyFailedTasks?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restartConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restartConnectorAsync(array{connectorArn?: string, onlyFailedTasks?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnector(array $args = [])
 * @phpstan-method \Aws\Result updateConnector(array{
 *     capacity?: array{
 *         autoScaling?: array{
 *             maxWorkerCount?: int,
 *             mcuCount?: int,
 *             minWorkerCount?: int,
 *             scaleInPolicy?: array,
 *             scaleOutPolicy?: array,
 *             maxAutoscalingTaskCount?: int,
 *             ...,
 *         },
 *         provisionedCapacity?: array{mcuCount?: int, workerCount?: int, ...},
 *         ...,
 *     },
 *     connectorConfiguration?: array<string, string>,
 *     connectorArn?: string,
 *     currentVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConnectorAsync(array{
 *     capacity?: array{
 *         autoScaling?: array{
 *             maxWorkerCount?: int,
 *             mcuCount?: int,
 *             minWorkerCount?: int,
 *             scaleInPolicy?: array,
 *             scaleOutPolicy?: array,
 *             maxAutoscalingTaskCount?: int,
 *             ...,
 *         },
 *         provisionedCapacity?: array{mcuCount?: int, workerCount?: int, ...},
 *         ...,
 *     },
 *     connectorConfiguration?: array<string, string>,
 *     connectorArn?: string,
 *     currentVersion?: string,
 *     ...,
 * } $args = [])
 */
class KafkaConnectClient extends AwsClient {}
