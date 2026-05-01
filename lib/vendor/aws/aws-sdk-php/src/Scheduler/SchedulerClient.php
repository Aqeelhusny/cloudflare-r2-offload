<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Scheduler;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridge Scheduler** service.
 * @method \R2Offload\Vendor\Aws\Result createSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScheduleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScheduleGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScheduleGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScheduleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScheduleGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScheduleGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScheduleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScheduleGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScheduleGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScheduleGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScheduleGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSchedules(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSchedulesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScheduleAsync(array $args = [])
 */
class SchedulerClient extends AwsClient {}
