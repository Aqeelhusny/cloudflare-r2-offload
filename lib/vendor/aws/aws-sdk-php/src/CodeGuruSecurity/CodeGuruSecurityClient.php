<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeGuruSecurity;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Security** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetFindings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetFindingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUploadUrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUploadUrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFindings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMetricsSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMetricsSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFindingsMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFindingsMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountConfigurationAsync(array $args = [])
 */
class CodeGuruSecurityClient extends AwsClient {}
