<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceMetering;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWSMarketplace Metering** service.
 * @method \R2Offload\Vendor\Aws\Result batchMeterUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchMeterUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result meterUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise meterUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resolveCustomer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resolveCustomerAsync(array $args = [])
 */
class MarketplaceMeteringClient extends AwsClient {}
