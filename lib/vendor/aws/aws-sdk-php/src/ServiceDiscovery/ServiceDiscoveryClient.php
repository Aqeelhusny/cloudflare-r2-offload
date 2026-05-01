<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ServiceDiscovery;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Auto Naming** service.
 * @method \R2Offload\Vendor\Aws\Result createHttpNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHttpNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPrivateDnsNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPrivateDnsNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPublicDnsNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPublicDnsNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteServiceAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result discoverInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise discoverInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result discoverInstancesRevision(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise discoverInstancesRevisionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInstancesHealthStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInstancesHealthStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNamespaces(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNamespacesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHttpNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHttpNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInstanceCustomHealthStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInstanceCustomHealthStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePrivateDnsNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePrivateDnsNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePublicDnsNamespace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePublicDnsNamespaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceAttributesAsync(array $args = [])
 */
class ServiceDiscoveryClient extends AwsClient {}
