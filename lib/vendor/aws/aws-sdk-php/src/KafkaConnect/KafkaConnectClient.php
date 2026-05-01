<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KafkaConnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Managed Streaming for Kafka Connect** service.
 * @method \R2Offload\Vendor\Aws\Result createConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCustomPlugin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCustomPluginAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkerConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkerConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCustomPlugin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCustomPluginAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkerConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkerConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConnectorOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectorOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCustomPlugin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCustomPluginAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWorkerConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWorkerConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectorOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCustomPlugins(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCustomPluginsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkerConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkerConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectorAsync(array $args = [])
 */
class KafkaConnectClient extends AwsClient {}
