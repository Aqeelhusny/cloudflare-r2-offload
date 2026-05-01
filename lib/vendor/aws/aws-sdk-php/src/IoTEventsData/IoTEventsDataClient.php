<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IoTEventsData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Events Data** service.
 * @method \R2Offload\Vendor\Aws\Result batchAcknowledgeAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchAcknowledgeAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteDetector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteDetectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDisableAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDisableAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchEnableAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchEnableAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchPutMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchPutMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchResetAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchResetAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchSnoozeAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchSnoozeAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchUpdateDetector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchUpdateDetectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAlarm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAlarmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDetector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDetectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAlarms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAlarmsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDetectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDetectorsAsync(array $args = [])
 */
class IoTEventsDataClient extends AwsClient {}
