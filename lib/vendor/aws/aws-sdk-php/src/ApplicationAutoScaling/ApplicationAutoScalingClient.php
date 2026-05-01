<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ApplicationAutoScaling;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Application Auto Scaling** service.
 * @method \R2Offload\Vendor\Aws\Result deleteScalingPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScheduledAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScheduledActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterScalableTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterScalableTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalableTargets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalableTargetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingActivities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScheduledActions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScheduledActionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPredictiveScalingForecast(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPredictiveScalingForecastAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putScalingPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putScheduledAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putScheduledActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerScalableTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerScalableTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class ApplicationAutoScalingClient extends AwsClient {}
