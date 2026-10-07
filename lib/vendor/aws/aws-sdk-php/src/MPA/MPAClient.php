<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MPA;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Multi-party Approval** service.
 * @method \R2Offload\Vendor\Aws\Result cancelSession(array $args = [])
 * @phpstan-method \Aws\Result cancelSession(array{SessionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelSessionAsync(array{SessionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApprovalTeam(array $args = [])
 * @phpstan-method \Aws\Result createApprovalTeam(array{
 *     ClientToken?: string,
 *     ApprovalStrategy?: array{MofN?: array{MinApprovalsRequired?: int, ...}, ...},
 *     Approvers?: list<array{PrimaryIdentityId?: string, PrimaryIdentitySourceArn?: string, ...}>,
 *     Description?: string,
 *     Policies?: list<array{PolicyArn?: string, ...}>,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApprovalTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApprovalTeamAsync(array{
 *     ClientToken?: string,
 *     ApprovalStrategy?: array{MofN?: array{MinApprovalsRequired?: int, ...}, ...},
 *     Approvers?: list<array{PrimaryIdentityId?: string, PrimaryIdentitySourceArn?: string, ...}>,
 *     Description?: string,
 *     Policies?: list<array{PolicyArn?: string, ...}>,
 *     Name?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result createIdentitySource(array{
 *     IdentitySourceParameters?: array{IamIdentityCenter?: array{InstanceArn?: string, Region?: string, ...}, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdentitySourceAsync(array{
 *     IdentitySourceParameters?: array{IamIdentityCenter?: array{InstanceArn?: string, Region?: string, ...}, ...},
 *     ClientToken?: string,
 *     Tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result deleteIdentitySource(array{IdentitySourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdentitySourceAsync(array{IdentitySourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInactiveApprovalTeamVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteInactiveApprovalTeamVersion(array{Arn?: string, VersionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInactiveApprovalTeamVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInactiveApprovalTeamVersionAsync(array{Arn?: string, VersionId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApprovalTeam(array $args = [])
 * @phpstan-method \Aws\Result getApprovalTeam(array{Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApprovalTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApprovalTeamAsync(array{Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdentitySource(array $args = [])
 * @phpstan-method \Aws\Result getIdentitySource(array{IdentitySourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdentitySourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdentitySourceAsync(array{IdentitySourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicyVersion(array $args = [])
 * @phpstan-method \Aws\Result getPolicyVersion(array{PolicyVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyVersionAsync(array{PolicyVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, PolicyName?: string, PolicyType?: 'AWS_MANAGED'|'AWS_RAM', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, PolicyName?: string, PolicyType?: 'AWS_MANAGED'|'AWS_RAM', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @phpstan-method \Aws\Result getSession(array{SessionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionAsync(array{SessionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApprovalTeams(array $args = [])
 * @phpstan-method \Aws\Result listApprovalTeams(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApprovalTeamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApprovalTeamsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentitySources(array $args = [])
 * @phpstan-method \Aws\Result listIdentitySources(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentitySourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdentitySourcesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPolicies(array $args = [])
 * @phpstan-method \Aws\Result listPolicies(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPoliciesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPolicyVersions(array $args = [])
 * @phpstan-method \Aws\Result listPolicyVersions(array{MaxResults?: int, NextToken?: string, PolicyArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array{MaxResults?: int, NextToken?: string, PolicyArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourcePolicies(array $args = [])
 * @phpstan-method \Aws\Result listResourcePolicies(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array{ResourceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSessions(array $args = [])
 * @phpstan-method \Aws\Result listSessions(array{
 *     ApprovalTeamArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         FieldName?: 'ActionName'|'ApprovalTeamName'|'InitiationTime'|'SessionStatus'|'Vote'|'VotingTime',
 *         Operator?: 'BETWEEN'|'CONTAINS'|'EQ'|'GT'|'GTE'|'LT'|'LTE'|'NE'|'NOT_CONTAINS',
 *         Value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSessionsAsync(array{
 *     ApprovalTeamArn?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     Filters?: list<array{
 *         FieldName?: 'ActionName'|'ApprovalTeamName'|'InitiationTime'|'SessionStatus'|'Vote'|'VotingTime',
 *         Operator?: 'BETWEEN'|'CONTAINS'|'EQ'|'GT'|'GTE'|'LT'|'LTE'|'NE'|'NOT_CONTAINS',
 *         Value?: string,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startActiveApprovalTeamDeletion(array $args = [])
 * @phpstan-method \Aws\Result startActiveApprovalTeamDeletion(array{PendingWindowDays?: int, Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startActiveApprovalTeamDeletionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startActiveApprovalTeamDeletionAsync(array{PendingWindowDays?: int, Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApprovalTeamBaseline(array $args = [])
 * @phpstan-method \Aws\Result startApprovalTeamBaseline(array{Arn?: string, ApproverIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApprovalTeamBaselineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startApprovalTeamBaselineAsync(array{Arn?: string, ApproverIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApprovalTeam(array $args = [])
 * @phpstan-method \Aws\Result updateApprovalTeam(array{
 *     ApprovalStrategy?: array{MofN?: array{MinApprovalsRequired?: int, ...}, ...},
 *     Approvers?: list<array{PrimaryIdentityId?: string, PrimaryIdentitySourceArn?: string, ...}>,
 *     Description?: string,
 *     Arn?: string,
 *     UpdateActions?: list<'SYNCHRONIZE_MFA_DEVICES'>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApprovalTeamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApprovalTeamAsync(array{
 *     ApprovalStrategy?: array{MofN?: array{MinApprovalsRequired?: int, ...}, ...},
 *     Approvers?: list<array{PrimaryIdentityId?: string, PrimaryIdentitySourceArn?: string, ...}>,
 *     Description?: string,
 *     Arn?: string,
 *     UpdateActions?: list<'SYNCHRONIZE_MFA_DEVICES'>,
 *     ...,
 * } $args = [])
 */
class MPAClient extends AwsClient {}
