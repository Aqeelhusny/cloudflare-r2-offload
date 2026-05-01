<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\OSIS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon OpenSearch Ingestion** service.
 * @method \R2Offload\Vendor\Aws\Result createPipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPipelineEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipelineEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipelineEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipelineEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipelineBlueprint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineBlueprintAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipelineChangeProgress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineChangeProgressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineBlueprints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineBlueprintsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineEndpointConnections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineEndpointConnectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokePipelineEndpointConnections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokePipelineEndpointConnectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopPipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopPipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result validatePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise validatePipelineAsync(array $args = [])
 */
class OSISClient extends AwsClient {}
