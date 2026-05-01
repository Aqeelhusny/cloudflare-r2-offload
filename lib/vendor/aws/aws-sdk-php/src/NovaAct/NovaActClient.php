<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\NovaAct;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Nova Act Service** service.
 * @method \R2Offload\Vendor\Aws\Result createAct(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createActAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkflowDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkflowDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkflowDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkflowDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkflowDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkflowDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkflowRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeActStep(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeActStepAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listActs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listActsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listModels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listModelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSessions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkflowDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkflowDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkflowRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkflowRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAct(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateActAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWorkflowRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWorkflowRunAsync(array $args = [])
 */
class NovaActClient extends AwsClient {}
