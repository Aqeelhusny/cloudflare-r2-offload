<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MPA;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Multi-party Approval** service.
 * @method \R2Offload\Vendor\Aws\Result cancelSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApprovalTeam(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApprovalTeamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIdentitySource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIdentitySourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdentitySource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdentitySourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInactiveApprovalTeamVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInactiveApprovalTeamVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApprovalTeam(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApprovalTeamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdentitySource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdentitySourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicyVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApprovalTeams(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApprovalTeamsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentitySources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentitySourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPolicyVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourcePolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourcePoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSessions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSessionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startActiveApprovalTeamDeletion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startActiveApprovalTeamDeletionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApprovalTeamBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startApprovalTeamBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApprovalTeam(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApprovalTeamAsync(array $args = [])
 */
class MPAClient extends AwsClient {}
