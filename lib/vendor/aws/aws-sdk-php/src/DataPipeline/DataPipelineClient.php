<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DataPipeline;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Data Pipeline** service.
 *
 * @method \R2Offload\Vendor\Aws\Result activatePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise activatePipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deactivatePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deactivatePipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipeline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeObjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeObjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePipelines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePipelinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result evaluateExpression(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise evaluateExpressionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipelineDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result pollForTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise pollForTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPipelineDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPipelineDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result queryObjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise queryObjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result reportTaskProgress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise reportTaskProgressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result reportTaskRunnerHeartbeat(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise reportTaskRunnerHeartbeatAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setTaskStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setTaskStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result validatePipelineDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise validatePipelineDefinitionAsync(array $args = [])
 */
class DataPipelineClient extends AwsClient {}
