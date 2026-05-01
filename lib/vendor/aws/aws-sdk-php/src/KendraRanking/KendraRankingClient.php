<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KendraRanking;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kendra Intelligent Ranking** service.
 * @method \R2Offload\Vendor\Aws\Result createRescoreExecutionPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRescoreExecutionPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRescoreExecutionPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRescoreExecutionPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRescoreExecutionPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRescoreExecutionPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRescoreExecutionPlans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRescoreExecutionPlansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rescore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rescoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRescoreExecutionPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRescoreExecutionPlanAsync(array $args = [])
 */
class KendraRankingClient extends AwsClient {}
