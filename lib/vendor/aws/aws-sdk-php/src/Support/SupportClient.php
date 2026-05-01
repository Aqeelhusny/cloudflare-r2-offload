<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Support;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * AWS Support client.
 *
 * @method \R2Offload\Vendor\Aws\Result addAttachmentsToSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addAttachmentsToSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addCommunicationToCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addCommunicationToCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAttachment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAttachmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCommunications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCommunicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCreateCaseOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCreateCaseOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSeverityLevels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSeverityLevelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSupportedLanguages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSupportedLanguagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTrustedAdvisorCheckRefreshStatuses(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckRefreshStatusesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTrustedAdvisorCheckResult(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckResultAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTrustedAdvisorCheckSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTrustedAdvisorChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTrustedAdvisorChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result refreshTrustedAdvisorCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise refreshTrustedAdvisorCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resolveCase(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resolveCaseAsync(array $args = [])
 */
class SupportClient extends AwsClient {}
