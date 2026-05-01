<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ARCRegionSwitch;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **ARC - Region switch** service.
 * @method \R2Offload\Vendor\Aws\Result approvePlanExecutionStep(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise approvePlanExecutionStepAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelPlanExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelPlanExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPlanEvaluationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPlanEvaluationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPlanExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPlanExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPlanInRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPlanInRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPlanExecutionEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPlanExecutionEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPlanExecutions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPlanExecutionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPlans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPlansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPlansInRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPlansInRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRoute53HealthChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoute53HealthChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRoute53HealthChecksInRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoute53HealthChecksInRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPlanExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPlanExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePlanExecution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePlanExecutionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePlanExecutionStep(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePlanExecutionStepAsync(array $args = [])
 */
class ARCRegionSwitchClient extends AwsClient {}
