<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Billing;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing** service.
 * @method \R2Offload\Vendor\Aws\Result associateSourceViews(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateSourceViewsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBillingView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBillingViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBillingView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBillingViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateSourceViews(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateSourceViewsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBillingView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBillingViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBillingViews(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBillingViewsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSourceViewsForBillingView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSourceViewsForBillingViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBillingView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBillingViewAsync(array $args = [])
 */
class BillingClient extends AwsClient {}
