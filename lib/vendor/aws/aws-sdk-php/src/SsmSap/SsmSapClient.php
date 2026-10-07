<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SsmSap;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Systems Manager for SAP** service.
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePermission(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePermission(array{ActionType?: 'RESTORE', SourceResourceArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePermissionAsync(array{ActionType?: 'RESTORE', SourceResourceArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterApplication(array $args = [])
 * @phpstan-method \Aws\Result deregisterApplication(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterApplicationAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{ApplicationId?: string, ApplicationArn?: string, AppRegistryArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{ApplicationId?: string, ApplicationArn?: string, AppRegistryArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComponent(array $args = [])
 * @phpstan-method \Aws\Result getComponent(array{ApplicationId?: string, ComponentId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComponentAsync(array{ApplicationId?: string, ComponentId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigurationCheckOperation(array $args = [])
 * @phpstan-method \Aws\Result getConfigurationCheckOperation(array{OperationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationCheckOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationCheckOperationAsync(array{OperationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDatabase(array $args = [])
 * @phpstan-method \Aws\Result getDatabase(array{ApplicationId?: string, ComponentId?: string, DatabaseId?: string, DatabaseArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDatabaseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDatabaseAsync(array{ApplicationId?: string, ComponentId?: string, DatabaseId?: string, DatabaseArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOperation(array $args = [])
 * @phpstan-method \Aws\Result getOperation(array{OperationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOperationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getOperationAsync(array{OperationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePermission(array $args = [])
 * @phpstan-method \Aws\Result getResourcePermission(array{ActionType?: 'RESTORE', ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePermissionAsync(array{ActionType?: 'RESTORE', ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComponents(array $args = [])
 * @phpstan-method \Aws\Result listComponents(array{ApplicationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listComponentsAsync(array{ApplicationId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationCheckDefinitions(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationCheckDefinitions(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationCheckDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationCheckDefinitionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationCheckOperations(array $args = [])
 * @phpstan-method \Aws\Result listConfigurationCheckOperations(array{
 *     ApplicationId?: string,
 *     ListMode?: 'ALL_OPERATIONS'|'LATEST_PER_CHECK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationCheckOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listConfigurationCheckOperationsAsync(array{
 *     ApplicationId?: string,
 *     ListMode?: 'ALL_OPERATIONS'|'LATEST_PER_CHECK',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatabases(array $args = [])
 * @phpstan-method \Aws\Result listDatabases(array{ApplicationId?: string, ComponentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatabasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDatabasesAsync(array{ApplicationId?: string, ComponentId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOperationEvents(array $args = [])
 * @phpstan-method \Aws\Result listOperationEvents(array{
 *     OperationId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOperationEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOperationEventsAsync(array{
 *     OperationId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOperations(array $args = [])
 * @phpstan-method \Aws\Result listOperations(array{
 *     ApplicationId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listOperationsAsync(array{
 *     ApplicationId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{Name?: string, Value?: string, Operator?: 'Equals'|'GreaterThanOrEquals'|'LessThanOrEquals', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubCheckResults(array $args = [])
 * @phpstan-method \Aws\Result listSubCheckResults(array{OperationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubCheckResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubCheckResultsAsync(array{OperationId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubCheckRuleResults(array $args = [])
 * @phpstan-method \Aws\Result listSubCheckRuleResults(array{SubCheckResultId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubCheckRuleResultsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubCheckRuleResultsAsync(array{SubCheckResultId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePermission(array $args = [])
 * @phpstan-method \Aws\Result putResourcePermission(array{ActionType?: 'RESTORE', SourceResourceArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePermissionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePermissionAsync(array{ActionType?: 'RESTORE', SourceResourceArn?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerApplication(array $args = [])
 * @phpstan-method \Aws\Result registerApplication(array{
 *     ApplicationId?: string,
 *     ApplicationType?: 'HANA'|'SAP_ABAP',
 *     Instances?: list<string>,
 *     SapInstanceNumber?: string,
 *     Sid?: string,
 *     Tags?: array<string, string>,
 *     Credentials?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     DatabaseArn?: string,
 *     ComponentsInfo?: list<array{
 *         ComponentType?: 'ABAP'|'ASCS'|'DIALOG'|'ERS'|'HANA'|'HANA_NODE'|'WD'|'WEBDISP',
 *         Sid?: string,
 *         Ec2InstanceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise registerApplicationAsync(array{
 *     ApplicationId?: string,
 *     ApplicationType?: 'HANA'|'SAP_ABAP',
 *     Instances?: list<string>,
 *     SapInstanceNumber?: string,
 *     Sid?: string,
 *     Tags?: array<string, string>,
 *     Credentials?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     DatabaseArn?: string,
 *     ComponentsInfo?: list<array{
 *         ComponentType?: 'ABAP'|'ASCS'|'DIALOG'|'ERS'|'HANA'|'HANA_NODE'|'WD'|'WEBDISP',
 *         Sid?: string,
 *         Ec2InstanceId?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApplication(array $args = [])
 * @phpstan-method \Aws\Result startApplication(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApplicationRefresh(array $args = [])
 * @phpstan-method \Aws\Result startApplicationRefresh(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApplicationRefreshAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApplicationRefreshAsync(array{ApplicationId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startConfigurationChecks(array $args = [])
 * @phpstan-method \Aws\Result startConfigurationChecks(array{ApplicationId?: string, ConfigurationCheckIds?: list<'SAP_CHECK_01'|'SAP_CHECK_02'|'SAP_CHECK_03'>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startConfigurationChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConfigurationChecksAsync(array{ApplicationId?: string, ConfigurationCheckIds?: list<'SAP_CHECK_01'|'SAP_CHECK_02'|'SAP_CHECK_03'>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopApplication(array $args = [])
 * @phpstan-method \Aws\Result stopApplication(array{ApplicationId?: string, StopConnectedEntity?: 'DBMS', IncludeEc2InstanceShutdown?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopApplicationAsync(array{ApplicationId?: string, StopConnectedEntity?: 'DBMS', IncludeEc2InstanceShutdown?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplicationSettings(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationSettings(array{
 *     ApplicationId?: string,
 *     CredentialsToAddOrUpdate?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     CredentialsToRemove?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     Backint?: array{BackintMode?: 'AWSBackup', EnsureNoBackupInProcess?: bool, ...},
 *     DatabaseArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationSettingsAsync(array{
 *     ApplicationId?: string,
 *     CredentialsToAddOrUpdate?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     CredentialsToRemove?: list<array{DatabaseName?: string, CredentialType?: 'ADMIN', SecretId?: string, ...}>,
 *     Backint?: array{BackintMode?: 'AWSBackup', EnsureNoBackupInProcess?: bool, ...},
 *     DatabaseArn?: string,
 *     ...,
 * } $args = [])
 */
class SsmSapClient extends AwsClient {}
