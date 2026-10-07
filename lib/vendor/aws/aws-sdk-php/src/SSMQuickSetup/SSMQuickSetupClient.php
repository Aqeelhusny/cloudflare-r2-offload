<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SSMQuickSetup;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager QuickSetup** service.
 * @method \R2Offload\Vendor\Aws\Result createConfigurationManager(array $args = [])
 * @phpstan-method \Aws\Result createConfigurationManager(array{
 *     ConfigurationDefinitions?: list<array{
 *         LocalDeploymentAdministrationRoleArn?: string,
 *         LocalDeploymentExecutionRoleName?: string,
 *         Parameters?: array<string, string>,
 *         Type?: string,
 *         TypeVersion?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConfigurationManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createConfigurationManagerAsync(array{
 *     ConfigurationDefinitions?: list<array{
 *         LocalDeploymentAdministrationRoleArn?: string,
 *         LocalDeploymentExecutionRoleName?: string,
 *         Parameters?: array<string, string>,
 *         Type?: string,
 *         TypeVersion?: string,
 *         ...,
 *     }>,
 *     Description?: string,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConfigurationManager(array $args = [])
 * @phpstan-method \Aws\Result deleteConfigurationManager(array{ManagerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConfigurationManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConfigurationManagerAsync(array{ManagerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConfiguration(array{ConfigurationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationAsync(array{ConfigurationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigurationManager(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationManager(array{ManagerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationManagerAsync(array{ManagerArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result getServiceSettings(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getServiceSettingsAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationManagers(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationManagers(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxItems?: int,
 *     StartingToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationManagersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationManagersAsync(array{
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     MaxItems?: int,
 *     StartingToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurations(array{
 *     ConfigurationDefinitionId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ManagerArn?: string,
 *     MaxItems?: int,
 *     StartingToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationsAsync(array{
 *     ConfigurationDefinitionId?: string,
 *     Filters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ManagerArn?: string,
 *     MaxItems?: int,
 *     StartingToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listQuickSetupTypes(array $args = [])
 * @phpstan-method \Aws\Result listQuickSetupTypes(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listQuickSetupTypesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listQuickSetupTypesAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfigurationDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationDefinition(array{
 *     Id?: string,
 *     LocalDeploymentAdministrationRoleArn?: string,
 *     LocalDeploymentExecutionRoleName?: string,
 *     ManagerArn?: string,
 *     Parameters?: array<string, string>,
 *     TypeVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationDefinitionAsync(array{
 *     Id?: string,
 *     LocalDeploymentAdministrationRoleArn?: string,
 *     LocalDeploymentExecutionRoleName?: string,
 *     ManagerArn?: string,
 *     Parameters?: array<string, string>,
 *     TypeVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfigurationManager(array $args = [])
 * @phpstan-method \Aws\Result updateConfigurationManager(array{Description?: string, ManagerArn?: string, Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationManagerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateConfigurationManagerAsync(array{Description?: string, ManagerArn?: string, Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceSettings(array $args = [])
 * @phpstan-method \Aws\Result updateServiceSettings(array{ExplorerEnablingRoleArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array{ExplorerEnablingRoleArn?: string, ...} $args = [])
 */
class SSMQuickSetupClient extends AwsClient {}
