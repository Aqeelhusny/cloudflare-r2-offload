<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\RecycleBin;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Recycle Bin** service.
 * @method \R2Offload\Vendor\Aws\Result createRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRules(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result lockRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise lockRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unlockRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unlockRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 */
class RecycleBinClient extends AwsClient {}
