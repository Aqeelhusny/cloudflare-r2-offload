<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ChimeSDKIdentity;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Identity** service.
 * @method \R2Offload\Vendor\Aws\Result createAppInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppInstanceAdmin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppInstanceAdminAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppInstanceBot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppInstanceBotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppInstanceUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppInstanceUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppInstanceAdmin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppInstanceAdminAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppInstanceBot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppInstanceBotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppInstanceUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppInstanceUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterAppInstanceUserEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterAppInstanceUserEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAppInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAppInstanceAdmin(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppInstanceAdminAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAppInstanceBot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppInstanceBotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAppInstanceUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppInstanceUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAppInstanceUserEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppInstanceUserEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppInstanceRetentionSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppInstanceAdmins(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppInstanceAdminsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppInstanceBots(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppInstanceBotsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppInstanceUserEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppInstanceUserEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppInstanceUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppInstanceUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAppInstanceRetentionSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAppInstanceUserExpirationSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAppInstanceUserExpirationSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerAppInstanceUserEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerAppInstanceUserEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppInstanceBot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppInstanceBotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppInstanceUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppInstanceUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppInstanceUserEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppInstanceUserEndpointAsync(array $args = [])
 */
class ChimeSDKIdentityClient extends AwsClient {}
