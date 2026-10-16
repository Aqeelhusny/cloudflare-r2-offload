<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Shield;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Shield** service.
 * @method \R2Offload\Vendor\Aws\Result associateDRTLogBucket(array $args = [])
 * @phpstan-method \Aws\Result associateDRTLogBucket(array{LogBucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateDRTLogBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDRTLogBucketAsync(array{LogBucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateDRTRole(array $args = [])
 * @phpstan-method \Aws\Result associateDRTRole(array{RoleArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateDRTRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateDRTRoleAsync(array{RoleArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result associateHealthCheck(array{ProtectionId?: string, HealthCheckArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateHealthCheckAsync(array{ProtectionId?: string, HealthCheckArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateProactiveEngagementDetails(array $args = [])
 * @phpstan-method \Aws\Result associateProactiveEngagementDetails(array{
 *     EmergencyContactList?: list<array{EmailAddress?: string, PhoneNumber?: string, ContactNotes?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateProactiveEngagementDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateProactiveEngagementDetailsAsync(array{
 *     EmergencyContactList?: list<array{EmailAddress?: string, PhoneNumber?: string, ContactNotes?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProtection(array $args = [])
 * @phpstan-method \Aws\Result createProtection(array{Name?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProtectionAsync(array{Name?: string, ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProtectionGroup(array $args = [])
 * @phpstan-method \Aws\Result createProtectionGroup(array{
 *     ProtectionGroupId?: string,
 *     Aggregation?: 'MAX'|'MEAN'|'SUM',
 *     Pattern?: 'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE',
 *     ResourceType?: 'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE',
 *     Members?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProtectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProtectionGroupAsync(array{
 *     ProtectionGroupId?: string,
 *     Aggregation?: 'MAX'|'MEAN'|'SUM',
 *     Pattern?: 'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE',
 *     ResourceType?: 'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE',
 *     Members?: list<string>,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSubscription(array $args = [])
 * @phpstan-method \Aws\Result createSubscription(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSubscriptionAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProtection(array $args = [])
 * @phpstan-method \Aws\Result deleteProtection(array{ProtectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProtectionAsync(array{ProtectionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProtectionGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteProtectionGroup(array{ProtectionGroupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProtectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProtectionGroupAsync(array{ProtectionGroupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSubscription(array $args = [])
 * @phpstan-method \Aws\Result deleteSubscription(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSubscriptionAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAttack(array $args = [])
 * @phpstan-method \Aws\Result describeAttack(array{AttackId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAttackAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAttackAsync(array{AttackId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAttackStatistics(array $args = [])
 * @phpstan-method \Aws\Result describeAttackStatistics(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAttackStatisticsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeAttackStatisticsAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDRTAccess(array $args = [])
 * @phpstan-method \Aws\Result describeDRTAccess(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDRTAccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDRTAccessAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEmergencyContactSettings(array $args = [])
 * @phpstan-method \Aws\Result describeEmergencyContactSettings(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEmergencyContactSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEmergencyContactSettingsAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeProtection(array $args = [])
 * @phpstan-method \Aws\Result describeProtection(array{ProtectionId?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeProtectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProtectionAsync(array{ProtectionId?: string, ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeProtectionGroup(array $args = [])
 * @phpstan-method \Aws\Result describeProtectionGroup(array{ProtectionGroupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeProtectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeProtectionGroupAsync(array{ProtectionGroupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSubscription(array $args = [])
 * @phpstan-method \Aws\Result describeSubscription(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSubscriptionAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableApplicationLayerAutomaticResponse(array $args = [])
 * @phpstan-method \Aws\Result disableApplicationLayerAutomaticResponse(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableApplicationLayerAutomaticResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableApplicationLayerAutomaticResponseAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableProactiveEngagement(array $args = [])
 * @phpstan-method \Aws\Result disableProactiveEngagement(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableProactiveEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableProactiveEngagementAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateDRTLogBucket(array $args = [])
 * @phpstan-method \Aws\Result disassociateDRTLogBucket(array{LogBucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateDRTLogBucketAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDRTLogBucketAsync(array{LogBucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateDRTRole(array $args = [])
 * @phpstan-method \Aws\Result disassociateDRTRole(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateDRTRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateDRTRoleAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateHealthCheck(array $args = [])
 * @phpstan-method \Aws\Result disassociateHealthCheck(array{ProtectionId?: string, HealthCheckArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateHealthCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateHealthCheckAsync(array{ProtectionId?: string, HealthCheckArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableApplicationLayerAutomaticResponse(array $args = [])
 * @phpstan-method \Aws\Result enableApplicationLayerAutomaticResponse(array{ResourceArn?: string, Action?: array{Block?: array, Count?: array, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableApplicationLayerAutomaticResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableApplicationLayerAutomaticResponseAsync(array{ResourceArn?: string, Action?: array{Block?: array, Count?: array, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableProactiveEngagement(array $args = [])
 * @phpstan-method \Aws\Result enableProactiveEngagement(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableProactiveEngagementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableProactiveEngagementAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSubscriptionState(array $args = [])
 * @phpstan-method \Aws\Result getSubscriptionState(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSubscriptionStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSubscriptionStateAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttacks(array $args = [])
 * @phpstan-method \Aws\Result listAttacks(array{
 *     ResourceArns?: list<string>,
 *     StartTime?: array{FromInclusive?: int|string|\DateTimeInterface, ToExclusive?: int|string|\DateTimeInterface, ...},
 *     EndTime?: array{FromInclusive?: int|string|\DateTimeInterface, ToExclusive?: int|string|\DateTimeInterface, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttacksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttacksAsync(array{
 *     ResourceArns?: list<string>,
 *     StartTime?: array{FromInclusive?: int|string|\DateTimeInterface, ToExclusive?: int|string|\DateTimeInterface, ...},
 *     EndTime?: array{FromInclusive?: int|string|\DateTimeInterface, ToExclusive?: int|string|\DateTimeInterface, ...},
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProtectionGroups(array $args = [])
 * @phpstan-method \Aws\Result listProtectionGroups(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InclusionFilters?: array{
 *         ProtectionGroupIds?: list<string>,
 *         Patterns?: list<'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE'>,
 *         ResourceTypes?: list<'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE'>,
 *         Aggregations?: list<'MAX'|'MEAN'|'SUM'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProtectionGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectionGroupsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InclusionFilters?: array{
 *         ProtectionGroupIds?: list<string>,
 *         Patterns?: list<'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE'>,
 *         ResourceTypes?: list<'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE'>,
 *         Aggregations?: list<'MAX'|'MEAN'|'SUM'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProtections(array $args = [])
 * @phpstan-method \Aws\Result listProtections(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InclusionFilters?: array{
 *         ResourceArns?: list<string>,
 *         ProtectionNames?: list<string>,
 *         ResourceTypes?: list<'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProtectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProtectionsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     InclusionFilters?: array{
 *         ResourceArns?: list<string>,
 *         ProtectionNames?: list<string>,
 *         ResourceTypes?: list<'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourcesInProtectionGroup(array $args = [])
 * @phpstan-method \Aws\Result listResourcesInProtectionGroup(array{ProtectionGroupId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourcesInProtectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcesInProtectionGroupAsync(array{ProtectionGroupId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplicationLayerAutomaticResponse(array $args = [])
 * @phpstan-method \Aws\Result updateApplicationLayerAutomaticResponse(array{ResourceArn?: string, Action?: array{Block?: array, Count?: array, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationLayerAutomaticResponseAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationLayerAutomaticResponseAsync(array{ResourceArn?: string, Action?: array{Block?: array, Count?: array, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEmergencyContactSettings(array $args = [])
 * @phpstan-method \Aws\Result updateEmergencyContactSettings(array{
 *     EmergencyContactList?: list<array{EmailAddress?: string, PhoneNumber?: string, ContactNotes?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEmergencyContactSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEmergencyContactSettingsAsync(array{
 *     EmergencyContactList?: list<array{EmailAddress?: string, PhoneNumber?: string, ContactNotes?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProtectionGroup(array $args = [])
 * @phpstan-method \Aws\Result updateProtectionGroup(array{
 *     ProtectionGroupId?: string,
 *     Aggregation?: 'MAX'|'MEAN'|'SUM',
 *     Pattern?: 'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE',
 *     ResourceType?: 'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE',
 *     Members?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProtectionGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProtectionGroupAsync(array{
 *     ProtectionGroupId?: string,
 *     Aggregation?: 'MAX'|'MEAN'|'SUM',
 *     Pattern?: 'ALL'|'ARBITRARY'|'BY_RESOURCE_TYPE',
 *     ResourceType?: 'APPLICATION_LOAD_BALANCER'|'CLASSIC_LOAD_BALANCER'|'CLOUDFRONT_DISTRIBUTION'|'ELASTIC_IP_ALLOCATION'|'GLOBAL_ACCELERATOR'|'ROUTE_53_HOSTED_ZONE',
 *     Members?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSubscription(array $args = [])
 * @phpstan-method \Aws\Result updateSubscription(array{AutoRenew?: 'DISABLED'|'ENABLED', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSubscriptionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSubscriptionAsync(array{AutoRenew?: 'DISABLED'|'ENABLED', ...} $args = [])
 */
class ShieldClient extends AwsClient {}
