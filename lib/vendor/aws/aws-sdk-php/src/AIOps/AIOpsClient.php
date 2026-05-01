<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AIOps;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AI Ops** service.
 * @method \R2Offload\Vendor\Aws\Result createInvestigationGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInvestigationGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInvestigationGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInvestigationGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInvestigationGroupPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInvestigationGroupPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvestigationGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvestigationGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvestigationGroupPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvestigationGroupPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvestigationGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvestigationGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putInvestigationGroupPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putInvestigationGroupPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInvestigationGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInvestigationGroupAsync(array $args = [])
 */
class AIOpsClient extends AwsClient {}
