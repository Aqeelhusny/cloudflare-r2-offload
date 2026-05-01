<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Pricing;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Price List Service** service.
 * @method \R2Offload\Vendor\Aws\Result describeServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAttributeValues(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAttributeValuesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPriceListFileUrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPriceListFileUrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProducts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProductsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPriceLists(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPriceListsAsync(array $args = [])
 */
class PricingClient extends AwsClient {}
