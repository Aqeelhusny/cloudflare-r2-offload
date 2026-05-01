<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SecurityIR;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Security Incident Response** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetMemberAccountDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetMemberAccountDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result closeCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise closeCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCaseComment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCaseCommentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCaseAttachmentDownloadUrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCaseAttachmentDownloadUrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCaseAttachmentUploadUrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCaseAttachmentUploadUrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCaseEdits(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCaseEditsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCommentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvestigations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvestigationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMemberships(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMembershipsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendFeedback(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendFeedbackAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCaseComment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCaseCommentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCaseStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCaseStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateResolverType(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateResolverTypeAsync(array $args = [])
 */
class SecurityIRClient extends AwsClient {}
