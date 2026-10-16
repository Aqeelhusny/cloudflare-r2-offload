<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeGuruSecurity;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Security** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetFindings(array $args = [])
 * @phpstan-method \Aws\Result batchGetFindings(array{findingIdentifiers?: list<array{scanName?: string, findingId?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetFindingsAsync(array{findingIdentifiers?: list<array{scanName?: string, findingId?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createScan(array $args = [])
 * @phpstan-method \Aws\Result createScan(array{
 *     clientToken?: string,
 *     resourceId?: array{codeArtifactId?: string, ...},
 *     scanName?: string,
 *     scanType?: 'Express'|'Standard',
 *     analysisType?: 'All'|'Security',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScanAsync(array{
 *     clientToken?: string,
 *     resourceId?: array{codeArtifactId?: string, ...},
 *     scanName?: string,
 *     scanType?: 'Express'|'Standard',
 *     analysisType?: 'All'|'Security',
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUploadUrl(array $args = [])
 * @phpstan-method \Aws\Result createUploadUrl(array{scanName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUploadUrlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createUploadUrlAsync(array{scanName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getAccountConfiguration(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFindings(array $args = [])
 * @phpstan-method \Aws\Result getFindings(array{scanName?: string, nextToken?: string, maxResults?: int, status?: 'All'|'Closed'|'Open', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFindingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFindingsAsync(array{scanName?: string, nextToken?: string, maxResults?: int, status?: 'All'|'Closed'|'Open', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMetricsSummary(array $args = [])
 * @phpstan-method \Aws\Result getMetricsSummary(array{date?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMetricsSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMetricsSummaryAsync(array{date?: int|string|\DateTimeInterface, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScan(array $args = [])
 * @phpstan-method \Aws\Result getScan(array{scanName?: string, runId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScanAsync(array{scanName?: string, runId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFindingsMetrics(array $args = [])
 * @phpstan-method \Aws\Result listFindingsMetrics(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFindingsMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFindingsMetricsAsync(array{
 *     nextToken?: string,
 *     maxResults?: int,
 *     startDate?: int|string|\DateTimeInterface,
 *     endDate?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listScans(array $args = [])
 * @phpstan-method \Aws\Result listScans(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listScansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listScansAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateAccountConfiguration(array{encryptionConfig?: array{kmsKeyArn?: string, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountConfigurationAsync(array{encryptionConfig?: array{kmsKeyArn?: string, ...}, ...} $args = [])
 */
class CodeGuruSecurityClient extends AwsClient {}
