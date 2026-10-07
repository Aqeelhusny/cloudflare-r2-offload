<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ResourceGroupsTaggingAPI;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Groups Tagging API** service.
 * @method \R2Offload\Vendor\Aws\Result describeReportCreation(array $args = [])
 * @phpstan-method \Aws\Result describeReportCreation(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReportCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeReportCreationAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComplianceSummary(array $args = [])
 * @phpstan-method \Aws\Result getComplianceSummary(array{
 *     TargetIdFilters?: list<string>,
 *     RegionFilters?: list<string>,
 *     ResourceTypeFilters?: list<string>,
 *     TagKeyFilters?: list<string>,
 *     GroupBy?: list<'REGION'|'RESOURCE_TYPE'|'TARGET_ID'>,
 *     MaxResults?: int,
 *     PaginationToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComplianceSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getComplianceSummaryAsync(array{
 *     TargetIdFilters?: list<string>,
 *     RegionFilters?: list<string>,
 *     ResourceTypeFilters?: list<string>,
 *     TagKeyFilters?: list<string>,
 *     GroupBy?: list<'REGION'|'RESOURCE_TYPE'|'TARGET_ID'>,
 *     MaxResults?: int,
 *     PaginationToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResources(array $args = [])
 * @phpstan-method \Aws\Result getResources(array{
 *     PaginationToken?: string,
 *     TagFilters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourcesPerPage?: int,
 *     TagsPerPage?: int,
 *     ResourceTypeFilters?: list<string>,
 *     IncludeComplianceDetails?: bool,
 *     ExcludeCompliantResources?: bool,
 *     ResourceARNList?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcesAsync(array{
 *     PaginationToken?: string,
 *     TagFilters?: list<array{Key?: string, Values?: list<string>, ...}>,
 *     ResourcesPerPage?: int,
 *     TagsPerPage?: int,
 *     ResourceTypeFilters?: list<string>,
 *     IncludeComplianceDetails?: bool,
 *     ExcludeCompliantResources?: bool,
 *     ResourceARNList?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTagKeys(array $args = [])
 * @phpstan-method \Aws\Result getTagKeys(array{PaginationToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagKeysAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagKeysAsync(array{PaginationToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTagValues(array $args = [])
 * @phpstan-method \Aws\Result getTagValues(array{PaginationToken?: string, Key?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTagValuesAsync(array{PaginationToken?: string, Key?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRequiredTags(array $args = [])
 * @phpstan-method \Aws\Result listRequiredTags(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRequiredTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRequiredTagsAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startReportCreation(array $args = [])
 * @phpstan-method \Aws\Result startReportCreation(array{S3Bucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startReportCreationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startReportCreationAsync(array{S3Bucket?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResources(array $args = [])
 * @phpstan-method \Aws\Result tagResources(array{ResourceARNList?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourcesAsync(array{ResourceARNList?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResources(array $args = [])
 * @phpstan-method \Aws\Result untagResources(array{ResourceARNList?: list<string>, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourcesAsync(array{ResourceARNList?: list<string>, TagKeys?: list<string>, ...} $args = [])
 */
class ResourceGroupsTaggingAPIClient extends AwsClient {}
