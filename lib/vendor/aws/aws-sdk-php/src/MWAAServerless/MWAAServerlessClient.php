<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MWAAServerless;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonMWAAServerless** service.
 * @method \R2Offload\Vendor\Aws\Result createWorkflow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkflowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkflow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkflowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTaskInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTaskInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkflow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkflowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTaskInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTaskInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkflowRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkflowVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkflowVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkflows(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkflowsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWorkflow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWorkflowAsync(array $args = [])
 */
class MWAAServerlessClient extends AwsClient {}
