<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AutoScalingPlans;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Auto Scaling Plans** service.
 * @method \R2Offload\Vendor\Aws\Result createScalingPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScalingPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScalingPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScalingPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingPlanResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingPlanResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingPlans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingPlansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScalingPlanResourceForecastData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScalingPlanResourceForecastDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScalingPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScalingPlanAsync(array $args = [])
 */
class AutoScalingPlansClient extends AwsClient {}
