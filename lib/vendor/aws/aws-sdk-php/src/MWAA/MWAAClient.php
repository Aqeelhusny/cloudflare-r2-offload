<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MWAA;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonMWAA** service.
 * @method \R2Offload\Vendor\Aws\Result createCliToken(array $args = [])
 * @phpstan-method \Aws\Result createCliToken(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCliTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCliTokenAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     Name?: string,
 *     ExecutionRoleArn?: string,
 *     SourceBucketArn?: string,
 *     DagS3Path?: string,
 *     NetworkConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     PluginsS3Path?: string,
 *     PluginsS3ObjectVersion?: string,
 *     RequirementsS3Path?: string,
 *     RequirementsS3ObjectVersion?: string,
 *     StartupScriptS3Path?: string,
 *     StartupScriptS3ObjectVersion?: string,
 *     AirflowConfigurationOptions?: array<string, string>,
 *     EnvironmentClass?: string,
 *     MaxWorkers?: int,
 *     KmsKey?: string,
 *     AirflowVersion?: string,
 *     LoggingConfiguration?: array{
 *         DagProcessingLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         SchedulerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WebserverLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WorkerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         TaskLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         ...,
 *     },
 *     WeeklyMaintenanceWindowStart?: string,
 *     Tags?: array<string, string>,
 *     WebserverAccessMode?: 'PRIVATE_ONLY'|'PUBLIC_AND_PRIVATE'|'PUBLIC_ONLY',
 *     MinWorkers?: int,
 *     Schedulers?: int,
 *     EndpointManagement?: 'CUSTOMER'|'SERVICE',
 *     MinWebservers?: int,
 *     MaxWebservers?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     Name?: string,
 *     ExecutionRoleArn?: string,
 *     SourceBucketArn?: string,
 *     DagS3Path?: string,
 *     NetworkConfiguration?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     PluginsS3Path?: string,
 *     PluginsS3ObjectVersion?: string,
 *     RequirementsS3Path?: string,
 *     RequirementsS3ObjectVersion?: string,
 *     StartupScriptS3Path?: string,
 *     StartupScriptS3ObjectVersion?: string,
 *     AirflowConfigurationOptions?: array<string, string>,
 *     EnvironmentClass?: string,
 *     MaxWorkers?: int,
 *     KmsKey?: string,
 *     AirflowVersion?: string,
 *     LoggingConfiguration?: array{
 *         DagProcessingLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         SchedulerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WebserverLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WorkerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         TaskLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         ...,
 *     },
 *     WeeklyMaintenanceWindowStart?: string,
 *     Tags?: array<string, string>,
 *     WebserverAccessMode?: 'PRIVATE_ONLY'|'PUBLIC_AND_PRIVATE'|'PUBLIC_ONLY',
 *     MinWorkers?: int,
 *     Schedulers?: int,
 *     EndpointManagement?: 'CUSTOMER'|'SERVICE',
 *     MinWebservers?: int,
 *     MaxWebservers?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWebLoginToken(array $args = [])
 * @phpstan-method \Aws\Result createWebLoginToken(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWebLoginTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWebLoginTokenAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeRestApi(array $args = [])
 * @phpstan-method \Aws\Result invokeRestApi(array{
 *     Name?: string,
 *     Path?: string,
 *     Method?: 'DELETE'|'GET'|'PATCH'|'POST'|'PUT',
 *     QueryParameters?: array,
 *     Body?: array,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeRestApiAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeRestApiAsync(array{
 *     Name?: string,
 *     Path?: string,
 *     Method?: 'DELETE'|'GET'|'PATCH'|'POST'|'PUT',
 *     QueryParameters?: array,
 *     Body?: array,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result publishMetrics(array $args = [])
 * @phpstan-method \Aws\Result publishMetrics(array{
 *     EnvironmentName?: string,
 *     MetricData?: list<array{
 *         MetricName?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         Dimensions?: list<array>,
 *         Value?: float,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         StatisticValues?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishMetricsAsync(array{
 *     EnvironmentName?: string,
 *     MetricData?: list<array{
 *         MetricName?: string,
 *         Timestamp?: int|string|\DateTimeInterface,
 *         Dimensions?: list<array>,
 *         Value?: float,
 *         Unit?: 'Bits'|'Bits/Second'|'Bytes'|'Bytes/Second'|'Count'|'Count/Second'|'Gigabits'|'Gigabits/Second'|'Gigabytes'|'Gigabytes/Second'|'Kilobits'|'Kilobits/Second'|'Kilobytes'|'Kilobytes/Second'|'Megabits'|'Megabits/Second'|'Megabytes'|'Megabytes/Second'|'Microseconds'|'Milliseconds'|'None'|'Percent'|'Seconds'|'Terabits'|'Terabits/Second'|'Terabytes'|'Terabytes/Second',
 *         StatisticValues?: array,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     Name?: string,
 *     ExecutionRoleArn?: string,
 *     AirflowConfigurationOptions?: array<string, string>,
 *     AirflowVersion?: string,
 *     DagS3Path?: string,
 *     EnvironmentClass?: string,
 *     LoggingConfiguration?: array{
 *         DagProcessingLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         SchedulerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WebserverLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WorkerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         TaskLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         ...,
 *     },
 *     MaxWorkers?: int,
 *     MinWorkers?: int,
 *     MaxWebservers?: int,
 *     MinWebservers?: int,
 *     WorkerReplacementStrategy?: 'FORCED'|'GRACEFUL',
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, ...},
 *     PluginsS3Path?: string,
 *     PluginsS3ObjectVersion?: string,
 *     RequirementsS3Path?: string,
 *     RequirementsS3ObjectVersion?: string,
 *     Schedulers?: int,
 *     SourceBucketArn?: string,
 *     StartupScriptS3Path?: string,
 *     StartupScriptS3ObjectVersion?: string,
 *     WebserverAccessMode?: 'PRIVATE_ONLY'|'PUBLIC_AND_PRIVATE'|'PUBLIC_ONLY',
 *     WeeklyMaintenanceWindowStart?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     Name?: string,
 *     ExecutionRoleArn?: string,
 *     AirflowConfigurationOptions?: array<string, string>,
 *     AirflowVersion?: string,
 *     DagS3Path?: string,
 *     EnvironmentClass?: string,
 *     LoggingConfiguration?: array{
 *         DagProcessingLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         SchedulerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WebserverLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         WorkerLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         TaskLogs?: array{Enabled?: bool, LogLevel?: 'CRITICAL'|'DEBUG'|'ERROR'|'INFO'|'WARNING', ...},
 *         ...,
 *     },
 *     MaxWorkers?: int,
 *     MinWorkers?: int,
 *     MaxWebservers?: int,
 *     MinWebservers?: int,
 *     WorkerReplacementStrategy?: 'FORCED'|'GRACEFUL',
 *     NetworkConfiguration?: array{SecurityGroupIds?: list<string>, ...},
 *     PluginsS3Path?: string,
 *     PluginsS3ObjectVersion?: string,
 *     RequirementsS3Path?: string,
 *     RequirementsS3ObjectVersion?: string,
 *     Schedulers?: int,
 *     SourceBucketArn?: string,
 *     StartupScriptS3Path?: string,
 *     StartupScriptS3ObjectVersion?: string,
 *     WebserverAccessMode?: 'PRIVATE_ONLY'|'PUBLIC_AND_PRIVATE'|'PUBLIC_ONLY',
 *     WeeklyMaintenanceWindowStart?: string,
 *     ...,
 * } $args = [])
 */
class MWAAClient extends AwsClient {}
