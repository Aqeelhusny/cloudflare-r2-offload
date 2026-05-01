<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTDeviceAdvisor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Core Device Advisor** service.
 * @method \R2Offload\Vendor\Aws\Result createSuiteDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSuiteDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSuiteDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSuiteDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeviceAdvisorEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceAdvisorEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSuiteDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSuiteDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSuiteRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSuiteRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSuiteRunReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSuiteRunReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSuiteDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSuiteDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSuiteRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSuiteRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSuiteRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSuiteRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopSuiteRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopSuiteRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSuiteDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSuiteDefinitionAsync(array $args = [])
 */
class IoTDeviceAdvisorClient extends AwsClient {}
