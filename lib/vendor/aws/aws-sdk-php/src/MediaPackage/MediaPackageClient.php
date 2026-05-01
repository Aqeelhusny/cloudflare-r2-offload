<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaPackage;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage** service.
 * @method \R2Offload\Vendor\Aws\Result configureLogs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise configureLogsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHarvestJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHarvestJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHarvestJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHarvestJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHarvestJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHarvestJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOriginEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rotateChannelCredentials(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rotateChannelCredentialsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rotateIngestEndpointCredentials(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rotateIngestEndpointCredentialsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array $args = [])
 */
class MediaPackageClient extends AwsClient {}
