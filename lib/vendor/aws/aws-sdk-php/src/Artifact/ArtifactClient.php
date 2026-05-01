<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Artifact;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Artifact** service.
 * @method \R2Offload\Vendor\Aws\Result getAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReportMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReportMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTermForReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTermForReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCustomerAgreements(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCustomerAgreementsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listReportVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listReportVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listReports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listReportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountSettingsAsync(array $args = [])
 */
class ArtifactClient extends AwsClient {}
