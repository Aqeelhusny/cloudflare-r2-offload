<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ResourceGroupsTaggingAPI;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Resource Groups Tagging API** service.
 * @method \R2Offload\Vendor\Aws\Result describeReportCreation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReportCreationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComplianceSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComplianceSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTagKeys(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagKeysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTagValues(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTagValuesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRequiredTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRequiredTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startReportCreation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startReportCreationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourcesAsync(array $args = [])
 */
class ResourceGroupsTaggingAPIClient extends AwsClient {}
