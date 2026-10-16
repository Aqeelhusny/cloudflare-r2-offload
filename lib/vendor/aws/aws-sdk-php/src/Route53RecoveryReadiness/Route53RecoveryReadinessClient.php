<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Route53RecoveryReadiness;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Route53 Recovery Readiness** service.
 * @method \R2Offload\Vendor\Aws\Result createCell(array $args = [])
 * @phpstan-method \Aws\Result createCell(array{CellName?: string, Cells?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCellAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCellAsync(array{CellName?: string, Cells?: list<string>, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCrossAccountAuthorization(array $args = [])
 * @phpstan-method \Aws\Result createCrossAccountAuthorization(array{CrossAccountAuthorization?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCrossAccountAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCrossAccountAuthorizationAsync(array{CrossAccountAuthorization?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReadinessCheck(array $args = [])
 * @phpstan-method \Aws\Result createReadinessCheck(array{ReadinessCheckName?: string, ResourceSetName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReadinessCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createReadinessCheckAsync(array{ReadinessCheckName?: string, ResourceSetName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRecoveryGroup(array $args = [])
 * @phpstan-method \Aws\Result createRecoveryGroup(array{Cells?: list<string>, RecoveryGroupName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRecoveryGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRecoveryGroupAsync(array{Cells?: list<string>, RecoveryGroupName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createResourceSet(array $args = [])
 * @phpstan-method \Aws\Result createResourceSet(array{
 *     ResourceSetName?: string,
 *     ResourceSetType?: string,
 *     Resources?: list<array{
 *         ComponentId?: string,
 *         DnsTargetResource?: array,
 *         ReadinessScopes?: list<string>,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createResourceSetAsync(array{
 *     ResourceSetName?: string,
 *     ResourceSetType?: string,
 *     Resources?: list<array{
 *         ComponentId?: string,
 *         DnsTargetResource?: array,
 *         ReadinessScopes?: list<string>,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCell(array $args = [])
 * @phpstan-method \Aws\Result deleteCell(array{CellName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCellAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCellAsync(array{CellName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCrossAccountAuthorization(array $args = [])
 * @phpstan-method \Aws\Result deleteCrossAccountAuthorization(array{CrossAccountAuthorization?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCrossAccountAuthorizationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCrossAccountAuthorizationAsync(array{CrossAccountAuthorization?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteReadinessCheck(array $args = [])
 * @phpstan-method \Aws\Result deleteReadinessCheck(array{ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReadinessCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteReadinessCheckAsync(array{ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRecoveryGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteRecoveryGroup(array{RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRecoveryGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRecoveryGroupAsync(array{RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourceSet(array $args = [])
 * @phpstan-method \Aws\Result deleteResourceSet(array{ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourceSetAsync(array{ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getArchitectureRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getArchitectureRecommendations(array{MaxResults?: int, NextToken?: string, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getArchitectureRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getArchitectureRecommendationsAsync(array{MaxResults?: int, NextToken?: string, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCell(array $args = [])
 * @phpstan-method \Aws\Result getCell(array{CellName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCellAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCellAsync(array{CellName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCellReadinessSummary(array $args = [])
 * @phpstan-method \Aws\Result getCellReadinessSummary(array{CellName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCellReadinessSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCellReadinessSummaryAsync(array{CellName?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReadinessCheck(array $args = [])
 * @phpstan-method \Aws\Result getReadinessCheck(array{ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReadinessCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadinessCheckAsync(array{ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReadinessCheckResourceStatus(array $args = [])
 * @phpstan-method \Aws\Result getReadinessCheckResourceStatus(array{MaxResults?: int, NextToken?: string, ReadinessCheckName?: string, ResourceIdentifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReadinessCheckResourceStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadinessCheckResourceStatusAsync(array{MaxResults?: int, NextToken?: string, ReadinessCheckName?: string, ResourceIdentifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReadinessCheckStatus(array $args = [])
 * @phpstan-method \Aws\Result getReadinessCheckStatus(array{MaxResults?: int, NextToken?: string, ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReadinessCheckStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getReadinessCheckStatusAsync(array{MaxResults?: int, NextToken?: string, ReadinessCheckName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecoveryGroup(array $args = [])
 * @phpstan-method \Aws\Result getRecoveryGroup(array{RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecoveryGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecoveryGroupAsync(array{RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecoveryGroupReadinessSummary(array $args = [])
 * @phpstan-method \Aws\Result getRecoveryGroupReadinessSummary(array{MaxResults?: int, NextToken?: string, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecoveryGroupReadinessSummaryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecoveryGroupReadinessSummaryAsync(array{MaxResults?: int, NextToken?: string, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceSet(array $args = [])
 * @phpstan-method \Aws\Result getResourceSet(array{ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourceSetAsync(array{ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCells(array $args = [])
 * @phpstan-method \Aws\Result listCells(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCellsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCellsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCrossAccountAuthorizations(array $args = [])
 * @phpstan-method \Aws\Result listCrossAccountAuthorizations(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCrossAccountAuthorizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCrossAccountAuthorizationsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listReadinessChecks(array $args = [])
 * @phpstan-method \Aws\Result listReadinessChecks(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listReadinessChecksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listReadinessChecksAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecoveryGroups(array $args = [])
 * @phpstan-method \Aws\Result listRecoveryGroups(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecoveryGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecoveryGroupsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourceSets(array $args = [])
 * @phpstan-method \Aws\Result listResourceSets(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourceSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourceSetsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRules(array $args = [])
 * @phpstan-method \Aws\Result listRules(array{MaxResults?: int, NextToken?: string, ResourceType?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRulesAsync(array{MaxResults?: int, NextToken?: string, ResourceType?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResources(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResources(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCell(array $args = [])
 * @phpstan-method \Aws\Result updateCell(array{CellName?: string, Cells?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCellAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCellAsync(array{CellName?: string, Cells?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateReadinessCheck(array $args = [])
 * @phpstan-method \Aws\Result updateReadinessCheck(array{ReadinessCheckName?: string, ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateReadinessCheckAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateReadinessCheckAsync(array{ReadinessCheckName?: string, ResourceSetName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRecoveryGroup(array $args = [])
 * @phpstan-method \Aws\Result updateRecoveryGroup(array{Cells?: list<string>, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRecoveryGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRecoveryGroupAsync(array{Cells?: list<string>, RecoveryGroupName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateResourceSet(array $args = [])
 * @phpstan-method \Aws\Result updateResourceSet(array{
 *     ResourceSetName?: string,
 *     ResourceSetType?: string,
 *     Resources?: list<array{
 *         ComponentId?: string,
 *         DnsTargetResource?: array,
 *         ReadinessScopes?: list<string>,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateResourceSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateResourceSetAsync(array{
 *     ResourceSetName?: string,
 *     ResourceSetType?: string,
 *     Resources?: list<array{
 *         ComponentId?: string,
 *         DnsTargetResource?: array,
 *         ReadinessScopes?: list<string>,
 *         ResourceArn?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class Route53RecoveryReadinessClient extends AwsClient {}
