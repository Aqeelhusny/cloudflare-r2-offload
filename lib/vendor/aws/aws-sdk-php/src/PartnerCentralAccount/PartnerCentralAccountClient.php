<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PartnerCentralAccount;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Account API** service.
 * @method \R2Offload\Vendor\Aws\Result acceptConnectionInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptConnectionInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateAwsTrainingCertificationEmailDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAwsTrainingCertificationEmailDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelConnectionInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelConnectionInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelProfileUpdateTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelProfileUpdateTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConnectionInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectionInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPartner(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPartnerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateAwsTrainingCertificationEmailDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateAwsTrainingCertificationEmailDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAllianceLeadContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAllianceLeadContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectionInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectionPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPartner(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPartnerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfileUpdateTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileUpdateTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfileVisibility(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileVisibilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVerification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVerificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectionInvitations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionInvitationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPartners(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPartnersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAllianceLeadContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAllianceLeadContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putProfileVisibility(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putProfileVisibilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectConnectionInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectConnectionInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendEmailVerificationCode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendEmailVerificationCodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startProfileUpdateTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startProfileUpdateTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startVerification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startVerificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnectionPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectionPreferencesAsync(array $args = [])
 */
class PartnerCentralAccountClient extends AwsClient {}
