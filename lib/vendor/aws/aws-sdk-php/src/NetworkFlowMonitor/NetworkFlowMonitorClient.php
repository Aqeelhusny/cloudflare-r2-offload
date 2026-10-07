<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\NetworkFlowMonitor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Network Flow Monitor** service.
 * @method \R2Offload\Vendor\Aws\Result createMonitor(array $args = [])
 * @phpstan-method \Aws\Result createMonitor(array{
 *     monitorName?: string,
 *     localResources?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResources?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     scopeArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMonitorAsync(array{
 *     monitorName?: string,
 *     localResources?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResources?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     scopeArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScope(array $args = [])
 * @phpstan-method \Aws\Result createScope(array{
 *     targets?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScopeAsync(array{
 *     targets?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMonitor(array $args = [])
 * @phpstan-method \Aws\Result deleteMonitor(array{monitorName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMonitorAsync(array{monitorName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScope(array $args = [])
 * @phpstan-method \Aws\Result deleteScope(array{scopeId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScopeAsync(array{scopeId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMonitor(array $args = [])
 * @phpstan-method \Aws\Result getMonitor(array{monitorName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMonitorAsync(array{monitorName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsMonitorTopContributors(array $args = [])
 * @phpstan-method \Aws\Result getQueryResultsMonitorTopContributors(array{monitorName?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsMonitorTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsMonitorTopContributorsAsync(array{monitorName?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsWorkloadInsightsTopContributors(array $args = [])
 * @phpstan-method \Aws\Result getQueryResultsWorkloadInsightsTopContributors(array{scopeId?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsAsync(array{scopeId?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryResultsWorkloadInsightsTopContributorsData(array $args = [])
 * @phpstan-method \Aws\Result getQueryResultsWorkloadInsightsTopContributorsData(array{scopeId?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryResultsWorkloadInsightsTopContributorsDataAsync(array{scopeId?: string, queryId?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusMonitorTopContributors(array $args = [])
 * @phpstan-method \Aws\Result getQueryStatusMonitorTopContributors(array{monitorName?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusMonitorTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStatusMonitorTopContributorsAsync(array{monitorName?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusWorkloadInsightsTopContributors(array $args = [])
 * @phpstan-method \Aws\Result getQueryStatusWorkloadInsightsTopContributors(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsAsync(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryStatusWorkloadInsightsTopContributorsData(array $args = [])
 * @phpstan-method \Aws\Result getQueryStatusWorkloadInsightsTopContributorsData(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getQueryStatusWorkloadInsightsTopContributorsDataAsync(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScope(array $args = [])
 * @phpstan-method \Aws\Result getScope(array{scopeId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScopeAsync(array{scopeId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMonitors(array $args = [])
 * @phpstan-method \Aws\Result listMonitors(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     monitorStatus?: 'ACTIVE'|'DELETING'|'ERROR'|'INACTIVE'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMonitorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMonitorsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     monitorStatus?: 'ACTIVE'|'DELETING'|'ERROR'|'INACTIVE'|'PENDING',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScopes(array $args = [])
 * @phpstan-method \Aws\Result listScopes(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScopesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScopesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryMonitorTopContributors(array $args = [])
 * @phpstan-method \Aws\Result startQueryMonitorTopContributors(array{
 *     monitorName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'ROUND_TRIP_TIME'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryMonitorTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryMonitorTopContributorsAsync(array{
 *     monitorName?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'ROUND_TRIP_TIME'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryWorkloadInsightsTopContributors(array $args = [])
 * @phpstan-method \Aws\Result startQueryWorkloadInsightsTopContributors(array{
 *     scopeId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsAsync(array{
 *     scopeId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     limit?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startQueryWorkloadInsightsTopContributorsData(array $args = [])
 * @phpstan-method \Aws\Result startQueryWorkloadInsightsTopContributorsData(array{
 *     scopeId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startQueryWorkloadInsightsTopContributorsDataAsync(array{
 *     scopeId?: string,
 *     startTime?: int|string|\DateTimeInterface,
 *     endTime?: int|string|\DateTimeInterface,
 *     metricName?: 'DATA_TRANSFERRED'|'RETRANSMISSIONS'|'TIMEOUTS',
 *     destinationCategory?: 'AMAZON_DYNAMODB'|'AMAZON_S3'|'INTER_AZ'|'INTER_REGION'|'INTER_VPC'|'INTRA_AZ'|'UNCLASSIFIED',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryMonitorTopContributors(array $args = [])
 * @phpstan-method \Aws\Result stopQueryMonitorTopContributors(array{monitorName?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryMonitorTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryMonitorTopContributorsAsync(array{monitorName?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryWorkloadInsightsTopContributors(array $args = [])
 * @phpstan-method \Aws\Result stopQueryWorkloadInsightsTopContributors(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsAsync(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopQueryWorkloadInsightsTopContributorsData(array $args = [])
 * @phpstan-method \Aws\Result stopQueryWorkloadInsightsTopContributorsData(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopQueryWorkloadInsightsTopContributorsDataAsync(array{scopeId?: string, queryId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMonitor(array $args = [])
 * @phpstan-method \Aws\Result updateMonitor(array{
 *     monitorName?: string,
 *     localResourcesToAdd?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     localResourcesToRemove?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResourcesToAdd?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResourcesToRemove?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMonitorAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMonitorAsync(array{
 *     monitorName?: string,
 *     localResourcesToAdd?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     localResourcesToRemove?: list<array{
 *         type?: 'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::EKS::Cluster'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResourcesToAdd?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     remoteResourcesToRemove?: list<array{
 *         type?: 'AWS::AWSService'|'AWS::AvailabilityZone'|'AWS::EC2::Subnet'|'AWS::EC2::VPC'|'AWS::Region',
 *         identifier?: string,
 *         ...,
 *     }>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScope(array $args = [])
 * @phpstan-method \Aws\Result updateScope(array{
 *     scopeId?: string,
 *     resourcesToAdd?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     resourcesToDelete?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScopeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScopeAsync(array{
 *     scopeId?: string,
 *     resourcesToAdd?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     resourcesToDelete?: list<array{targetIdentifier?: array, region?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class NetworkFlowMonitorClient extends AwsClient {}
