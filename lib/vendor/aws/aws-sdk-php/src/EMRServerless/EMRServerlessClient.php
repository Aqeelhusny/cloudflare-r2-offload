<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EMRServerless;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **EMR Serverless** service.
 * @method \R2Offload\Vendor\Aws\Result cancelJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDashboardForJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDashboardForJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceDashboard(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceDashboardAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSessionEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobRunAttempts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobRunAttemptsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSessions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startJobRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startJobRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result terminateSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise terminateSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 */
class EMRServerlessClient extends AwsClient {}
