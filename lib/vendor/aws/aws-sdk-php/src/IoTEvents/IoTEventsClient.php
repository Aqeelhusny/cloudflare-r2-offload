<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTEvents;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Events** service.
 * @method \R2Offload\Vendor\Aws\Result createAlarmModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAlarmModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDetectorModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDetectorModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createInput(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInputAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAlarmModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAlarmModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDetectorModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDetectorModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInput(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInputAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAlarmModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAlarmModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDetectorModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDetectorModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDetectorModelAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDetectorModelAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeInput(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeInputAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLoggingOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLoggingOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDetectorModelAnalysisResults(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDetectorModelAnalysisResultsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAlarmModelVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAlarmModelVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAlarmModels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAlarmModelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDetectorModelVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDetectorModelVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDetectorModels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDetectorModelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInputRoutings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInputRoutingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInputs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInputsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putLoggingOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDetectorModelAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDetectorModelAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAlarmModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAlarmModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDetectorModel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDetectorModelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInput(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInputAsync(array $args = [])
 */
class IoTEventsClient extends AwsClient {}
