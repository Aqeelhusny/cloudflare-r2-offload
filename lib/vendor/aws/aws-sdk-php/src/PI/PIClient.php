<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PI;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Performance Insights** service.
 * @method \R2Offload\Vendor\Aws\Result createPerformanceAnalysisReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPerformanceAnalysisReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePerformanceAnalysisReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePerformanceAnalysisReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDimensionKeys(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDimensionKeysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDimensionKeyDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDimensionKeyDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPerformanceAnalysisReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPerformanceAnalysisReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAvailableResourceDimensions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAvailableResourceDimensionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAvailableResourceMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAvailableResourceMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPerformanceAnalysisReports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPerformanceAnalysisReportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class PIClient extends AwsClient {}
