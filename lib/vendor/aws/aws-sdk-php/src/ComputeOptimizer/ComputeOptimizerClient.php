<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ComputeOptimizer;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Compute Optimizer** service.
 * @method \R2Offload\Vendor\Aws\Result deleteRecommendationPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRecommendationPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRecommendationExportJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRecommendationExportJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportAutoScalingGroupRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportAutoScalingGroupRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportEBSVolumeRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportEBSVolumeRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportEC2InstanceRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportEC2InstanceRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportECSServiceRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportECSServiceRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportIdleRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportIdleRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportLambdaFunctionRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportLambdaFunctionRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportLicenseRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportLicenseRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportRDSDatabaseRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportRDSDatabaseRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAutoScalingGroupRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAutoScalingGroupRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEBSVolumeRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEBSVolumeRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEC2InstanceRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEC2InstanceRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEC2RecommendationProjectedMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEC2RecommendationProjectedMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getECSServiceRecommendationProjectedMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getECSServiceRecommendationProjectedMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getECSServiceRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getECSServiceRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEffectiveRecommendationPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEffectiveRecommendationPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnrollmentStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnrollmentStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnrollmentStatusesForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnrollmentStatusesForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdleRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdleRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLambdaFunctionRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLambdaFunctionRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLicenseRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLicenseRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRDSDatabaseRecommendationProjectedMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationProjectedMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRDSDatabaseRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRDSDatabaseRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendationPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendationSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRecommendationPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRecommendationPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnrollmentStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnrollmentStatusAsync(array $args = [])
 */
class ComputeOptimizerClient extends AwsClient {}
