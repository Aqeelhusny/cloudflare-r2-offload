<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SSMQuickSetup;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager QuickSetup** service.
 * @method \R2Offload\Vendor\Aws\Result createConfigurationManager(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConfigurationManagerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConfigurationManager(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConfigurationManagerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigurationManager(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationManagerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationManagers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationManagersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listQuickSetupTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listQuickSetupTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfigurationDefinition(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationDefinitionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfigurationManager(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationManagerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array $args = [])
 */
class SSMQuickSetupClient extends AwsClient {}
