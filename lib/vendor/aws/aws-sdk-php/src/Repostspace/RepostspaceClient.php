<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Repostspace;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS re:Post Private** service.
 * @method \R2Offload\Vendor\Aws\Result batchAddChannelRoleToAccessors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchAddChannelRoleToAccessorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchAddRole(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchAddRoleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchRemoveChannelRoleFromAccessors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchRemoveChannelRoleFromAccessorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchRemoveRole(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchRemoveRoleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSpace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSpaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSpace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSpaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterAdmin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterAdminAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSpace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSpaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpaces(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpacesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerAdmin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerAdminAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendInvites(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendInvitesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateChannel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSpace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSpaceAsync(array $args = [])
 */
class RepostspaceClient extends AwsClient {}
