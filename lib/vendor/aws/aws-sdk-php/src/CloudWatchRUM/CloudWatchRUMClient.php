<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudWatchRUM;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch RUM** service.
 * @method \R2Offload\Vendor\Aws\Result batchCreateRumMetricDefinitions(array $args = [])
 * @phpstan-method \Aws\Result batchCreateRumMetricDefinitions(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinitions?: list<array{
 *         Name?: string,
 *         ValueKey?: string,
 *         UnitLabel?: string,
 *         DimensionKeys?: array<string, string>,
 *         EventPattern?: string,
 *         Namespace?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCreateRumMetricDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCreateRumMetricDefinitionsAsync(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinitions?: list<array{
 *         Name?: string,
 *         ValueKey?: string,
 *         UnitLabel?: string,
 *         DimensionKeys?: array<string, string>,
 *         EventPattern?: string,
 *         Namespace?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteRumMetricDefinitions(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteRumMetricDefinitions(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinitionIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteRumMetricDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteRumMetricDefinitionsAsync(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinitionIds?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetRumMetricDefinitions(array $args = [])
 * @phpstan-method \Aws\Result batchGetRumMetricDefinitions(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetRumMetricDefinitionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetRumMetricDefinitionsAsync(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppMonitor(array $args = [])
 * @phpstan-method \Aws\Result createAppMonitor(array{
 *     Name?: string,
 *     Domain?: string,
 *     DomainList?: list<string>,
 *     Tags?: array<string, string>,
 *     AppMonitorConfiguration?: array{
 *         IdentityPoolId?: string,
 *         ExcludedPages?: list<string>,
 *         IncludedPages?: list<string>,
 *         FavoritePages?: list<string>,
 *         SessionSampleRate?: float,
 *         GuestRoleArn?: string,
 *         AllowCookies?: bool,
 *         Telemetries?: list<'errors'|'http'|'performance'>,
 *         EnableXRay?: bool,
 *         ...,
 *     },
 *     CwLogEnabled?: bool,
 *     CustomEvents?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *     DeobfuscationConfiguration?: array{JavaScriptSourceMaps?: array{Status?: 'DISABLED'|'ENABLED', S3Uri?: string, ...}, ...},
 *     Platform?: 'Android'|'Web'|'iOS',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAppMonitorAsync(array{
 *     Name?: string,
 *     Domain?: string,
 *     DomainList?: list<string>,
 *     Tags?: array<string, string>,
 *     AppMonitorConfiguration?: array{
 *         IdentityPoolId?: string,
 *         ExcludedPages?: list<string>,
 *         IncludedPages?: list<string>,
 *         FavoritePages?: list<string>,
 *         SessionSampleRate?: float,
 *         GuestRoleArn?: string,
 *         AllowCookies?: bool,
 *         Telemetries?: list<'errors'|'http'|'performance'>,
 *         EnableXRay?: bool,
 *         ...,
 *     },
 *     CwLogEnabled?: bool,
 *     CustomEvents?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *     DeobfuscationConfiguration?: array{JavaScriptSourceMaps?: array{Status?: 'DISABLED'|'ENABLED', S3Uri?: string, ...}, ...},
 *     Platform?: 'Android'|'Web'|'iOS',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAppMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteAppMonitor(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAppMonitorAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{Name?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{Name?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRumMetricsDestination(array $args = [])
 * @phpstan-method \Aws\Result deleteRumMetricsDestination(array{AppMonitorName?: string, Destination?: 'CloudWatch'|'Evidently', DestinationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRumMetricsDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRumMetricsDestinationAsync(array{AppMonitorName?: string, Destination?: 'CloudWatch'|'Evidently', DestinationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppMonitor(array $args = [])
 * @phpstan-method \Aws\Result getAppMonitor(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppMonitorAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAppMonitorData(array $args = [])
 * @phpstan-method \Aws\Result getAppMonitorData(array{
 *     Name?: string,
 *     TimeRange?: array{After?: int, Before?: int, ...},
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAppMonitorDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAppMonitorDataAsync(array{
 *     Name?: string,
 *     TimeRange?: array{After?: int, Before?: int, ...},
 *     Filters?: list<array{Name?: string, Values?: list<string>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAppMonitors(array $args = [])
 * @phpstan-method \Aws\Result listAppMonitors(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAppMonitorsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRumMetricsDestinations(array $args = [])
 * @phpstan-method \Aws\Result listRumMetricsDestinations(array{AppMonitorName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRumMetricsDestinationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRumMetricsDestinationsAsync(array{AppMonitorName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{Name?: string, PolicyDocument?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{Name?: string, PolicyDocument?: string, PolicyRevisionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRumEvents(array $args = [])
 * @phpstan-method \Aws\Result putRumEvents(array{
 *     Id?: string,
 *     BatchId?: string,
 *     AppMonitorDetails?: array{name?: string, id?: string, version?: string, ...},
 *     UserDetails?: array{userId?: string, sessionId?: string, ...},
 *     RumEvents?: list<array{
 *         id?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         type?: string,
 *         metadata?: string,
 *         details?: string,
 *         ...,
 *     }>,
 *     Alias?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRumEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRumEventsAsync(array{
 *     Id?: string,
 *     BatchId?: string,
 *     AppMonitorDetails?: array{name?: string, id?: string, version?: string, ...},
 *     UserDetails?: array{userId?: string, sessionId?: string, ...},
 *     RumEvents?: list<array{
 *         id?: string,
 *         timestamp?: int|string|\DateTimeInterface,
 *         type?: string,
 *         metadata?: string,
 *         details?: string,
 *         ...,
 *     }>,
 *     Alias?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRumMetricsDestination(array $args = [])
 * @phpstan-method \Aws\Result putRumMetricsDestination(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     IamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRumMetricsDestinationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRumMetricsDestinationAsync(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     IamRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAppMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateAppMonitor(array{
 *     Name?: string,
 *     Domain?: string,
 *     DomainList?: list<string>,
 *     AppMonitorConfiguration?: array{
 *         IdentityPoolId?: string,
 *         ExcludedPages?: list<string>,
 *         IncludedPages?: list<string>,
 *         FavoritePages?: list<string>,
 *         SessionSampleRate?: float,
 *         GuestRoleArn?: string,
 *         AllowCookies?: bool,
 *         Telemetries?: list<'errors'|'http'|'performance'>,
 *         EnableXRay?: bool,
 *         ...,
 *     },
 *     CwLogEnabled?: bool,
 *     CustomEvents?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *     DeobfuscationConfiguration?: array{JavaScriptSourceMaps?: array{Status?: 'DISABLED'|'ENABLED', S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAppMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAppMonitorAsync(array{
 *     Name?: string,
 *     Domain?: string,
 *     DomainList?: list<string>,
 *     AppMonitorConfiguration?: array{
 *         IdentityPoolId?: string,
 *         ExcludedPages?: list<string>,
 *         IncludedPages?: list<string>,
 *         FavoritePages?: list<string>,
 *         SessionSampleRate?: float,
 *         GuestRoleArn?: string,
 *         AllowCookies?: bool,
 *         Telemetries?: list<'errors'|'http'|'performance'>,
 *         EnableXRay?: bool,
 *         ...,
 *     },
 *     CwLogEnabled?: bool,
 *     CustomEvents?: array{Status?: 'DISABLED'|'ENABLED', ...},
 *     DeobfuscationConfiguration?: array{JavaScriptSourceMaps?: array{Status?: 'DISABLED'|'ENABLED', S3Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRumMetricDefinition(array $args = [])
 * @phpstan-method \Aws\Result updateRumMetricDefinition(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinition?: array{
 *         Name?: string,
 *         ValueKey?: string,
 *         UnitLabel?: string,
 *         DimensionKeys?: array<string, string>,
 *         EventPattern?: string,
 *         Namespace?: string,
 *         ...,
 *     },
 *     MetricDefinitionId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRumMetricDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRumMetricDefinitionAsync(array{
 *     AppMonitorName?: string,
 *     Destination?: 'CloudWatch'|'Evidently',
 *     DestinationArn?: string,
 *     MetricDefinition?: array{
 *         Name?: string,
 *         ValueKey?: string,
 *         UnitLabel?: string,
 *         DimensionKeys?: array<string, string>,
 *         EventPattern?: string,
 *         Namespace?: string,
 *         ...,
 *     },
 *     MetricDefinitionId?: string,
 *     ...,
 * } $args = [])
 */
class CloudWatchRUMClient extends AwsClient {}
