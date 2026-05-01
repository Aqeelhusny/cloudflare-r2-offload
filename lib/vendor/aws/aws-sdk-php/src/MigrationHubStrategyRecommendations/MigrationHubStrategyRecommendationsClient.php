<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MigrationHubStrategyRecommendations;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Migration Hub Strategy Recommendations** service.
 * @method \R2Offload\Vendor\Aws\Result getApplicationComponentDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationComponentDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplicationComponentStrategies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationComponentStrategiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssessment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssessmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getImportFileTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getImportFileTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLatestAssessmentId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLatestAssessmentIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPortfolioPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPortfolioPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPortfolioSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPortfolioSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendationReportDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationReportDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServerDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServerDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServerStrategies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServerStrategiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAnalyzableServers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAnalyzableServersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplicationComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCollectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCollectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listImportFileTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listImportFileTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPortfolioPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPortfolioPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAssessment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAssessmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startImportFileTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startImportFileTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startRecommendationReportGeneration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startRecommendationReportGenerationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopAssessment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopAssessmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplicationComponentConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationComponentConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServerConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServerConfigAsync(array $args = [])
 */
class MigrationHubStrategyRecommendationsClient extends AwsClient {}
