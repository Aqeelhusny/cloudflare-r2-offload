<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MediaPackageV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental MediaPackage v2** service.
 * @method \R2Offload\Vendor\Aws\Result cancelHarvestJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelHarvestJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannelGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHarvestJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHarvestJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteChannelGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteChannelGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteChannelPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteChannelPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteOriginEndpointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOriginEndpointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChannelGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChannelGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChannelPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChannelPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHarvestJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHarvestJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOriginEndpointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginEndpointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannelGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHarvestJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHarvestJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOriginEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOriginEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putChannelPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putChannelPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putOriginEndpointPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putOriginEndpointPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetChannelState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetChannelStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetOriginEndpointState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetOriginEndpointStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateChannelGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateChannelGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateOriginEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOriginEndpointAsync(array $args = [])
 */
class MediaPackageV2Client extends AwsClient {}
