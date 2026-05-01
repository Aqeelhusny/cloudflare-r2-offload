<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ApplicationCostProfiler;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Application Cost Profiler** service.
 * @method \R2Offload\Vendor\Aws\Result deleteReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importApplicationUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importApplicationUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listReportDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listReportDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateReportDefinitionAsync(array $args = [])
 */
class ApplicationCostProfilerClient extends AwsClient {}
