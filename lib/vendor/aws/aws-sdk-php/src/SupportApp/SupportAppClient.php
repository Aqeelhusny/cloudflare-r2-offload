<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SupportApp;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Support App** service.
 * @method \R2Offload\Vendor\Aws\Result createSlackChannelConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSlackChannelConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccountAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccountAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSlackChannelConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSlackChannelConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSlackWorkspaceConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSlackWorkspaceConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSlackChannelConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSlackChannelConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSlackWorkspaceConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSlackWorkspaceConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerSlackWorkspaceForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerSlackWorkspaceForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSlackChannelConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSlackChannelConfigurationAsync(array $args = [])
 */
class SupportAppClient extends AwsClient {}
