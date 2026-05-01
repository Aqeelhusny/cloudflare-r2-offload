<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CostOptimizationHub;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Cost Optimization Hub** service.
 * @method \R2Offload\Vendor\Aws\Result getPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEfficiencyMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEfficiencyMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnrollmentStatuses(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnrollmentStatusesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendationSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnrollmentStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePreferencesAsync(array $args = [])
 */
class CostOptimizationHubClient extends AwsClient {}
