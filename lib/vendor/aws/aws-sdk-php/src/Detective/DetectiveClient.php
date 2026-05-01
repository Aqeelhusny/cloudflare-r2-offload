<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Detective;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Detective** service.
 * @method \R2Offload\Vendor\Aws\Result acceptInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetGraphMemberDatasources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetGraphMemberDatasourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetMembershipDatasources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetMembershipDatasourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGraph(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGraphAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGraph(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGraphAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOrganizationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOrganizationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableOrganizationAdminAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableOrganizationAdminAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableOrganizationAdminAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableOrganizationAdminAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvestigation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvestigationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasourcePackages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasourcePackagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGraphs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGraphsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIndicators(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIndicatorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvestigations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvestigationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvitations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOrganizationAdminAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOrganizationAdminAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startInvestigation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startInvestigationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startMonitoringMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startMonitoringMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDatasourcePackages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDatasourcePackagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInvestigationState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInvestigationStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateOrganizationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOrganizationConfigurationAsync(array $args = [])
 */
class DetectiveClient extends AwsClient {}
