<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CostandUsageReportService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cost and Usage Report Service** service.
 * @method \R2Offload\Vendor\Aws\Result deleteReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReportDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReportDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putReportDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putReportDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class CostandUsageReportServiceClient extends AwsClient {}
