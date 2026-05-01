<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Synthetics;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Synthetics** service.
 * @method \R2Offload\Vendor\Aws\Result associateResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCanaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCanaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCanaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCanariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCanariesLastRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCanariesLastRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRuntimeVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRuntimeVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCanaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCanaryRuns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCanaryRunsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCanaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCanaryDryRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCanaryDryRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopCanaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCanary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCanaryAsync(array $args = [])
 */
class SyntheticsClient extends AwsClient {}
