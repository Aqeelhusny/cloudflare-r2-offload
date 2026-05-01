<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EMRContainers;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EMR Containers** service.
 * @method \R2Offload\Vendor\Aws\Result cancelJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJobTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createManagedEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createManagedEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSecurityConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createVirtualCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createVirtualClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteJobTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteJobTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteManagedEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteManagedEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVirtualCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVirtualClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeJobTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeJobTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeManagedEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeManagedEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSecurityConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeVirtualCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeVirtualClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getManagedEndpointSessionCredentials(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getManagedEndpointSessionCredentialsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobTemplates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobTemplatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listManagedEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listManagedEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSecurityConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVirtualClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVirtualClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class EMRContainersClient extends AwsClient {}
