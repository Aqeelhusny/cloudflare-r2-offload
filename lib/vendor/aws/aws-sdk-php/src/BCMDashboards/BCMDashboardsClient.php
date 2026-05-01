<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BCMDashboards;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Dashboards** service.
 * @method \R2Offload\Vendor\Aws\Result createDashboard(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScheduledReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScheduledReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDashboard(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScheduledReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScheduledReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeScheduledReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeScheduledReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDashboard(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDashboardAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScheduledReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScheduledReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDashboards(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScheduledReports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScheduledReportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDashboard(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScheduledReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScheduledReportAsync(array $args = [])
 */
class BCMDashboardsClient extends AwsClient {}
