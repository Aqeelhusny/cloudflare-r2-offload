<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GameLiftStreams;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon GameLift Streams** service.
 * @method \R2Offload\Vendor\Aws\Result addStreamGroupLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addStreamGroupLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStreamGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStreamGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStreamSessionConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStreamSessionConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStreamGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStreamGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportStreamSessionFiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportStreamSessionFilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStreamGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStreamGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStreamSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStreamSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreamGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreamSessions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamSessionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreamSessionsByAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamSessionsByAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeStreamGroupLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeStreamGroupLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startStreamSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startStreamSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result terminateStreamSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise terminateStreamSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStreamGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStreamGroupAsync(array $args = [])
 */
class GameLiftStreamsClient extends AwsClient {}
