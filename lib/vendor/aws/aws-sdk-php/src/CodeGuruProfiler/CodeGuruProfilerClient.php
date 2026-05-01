<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeGuruProfiler;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Profiler** service.
 * @method \R2Offload\Vendor\Aws\Result addNotificationChannels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addNotificationChannelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetFrameMetricData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetFrameMetricDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result configureAgent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise configureAgentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProfilingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProfilingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProfilingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProfilingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeProfilingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeProfilingGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFindingsReportAccountSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFindingsReportAccountSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getNotificationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getNotificationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFindingsReports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFindingsReportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfileTimes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfileTimesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfilingGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfilingGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result postAgentProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise postAgentProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeNotificationChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeNotificationChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result submitFeedback(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise submitFeedbackAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProfilingGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProfilingGroupAsync(array $args = [])
 */
class CodeGuruProfilerClient extends AwsClient {}
