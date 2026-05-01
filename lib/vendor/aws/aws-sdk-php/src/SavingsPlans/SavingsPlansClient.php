<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SavingsPlans;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Savings Plans** service.
 * @method \R2Offload\Vendor\Aws\Result createSavingsPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSavingsPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteQueuedSavingsPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteQueuedSavingsPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSavingsPlanRates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSavingsPlanRatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSavingsPlans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSavingsPlansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSavingsPlansOfferingRates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSavingsPlansOfferingRatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSavingsPlansOfferings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSavingsPlansOfferingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result returnSavingsPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise returnSavingsPlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class SavingsPlansClient extends AwsClient {}
