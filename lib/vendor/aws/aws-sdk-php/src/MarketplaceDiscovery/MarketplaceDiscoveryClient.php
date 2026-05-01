<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceDiscovery;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Discovery** service.
 * @method \R2Offload\Vendor\Aws\Result getListing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getListingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOffer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOfferAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOfferSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOfferSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOfferTerms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOfferTermsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProduct(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProductAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFulfillmentOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFulfillmentOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPurchaseOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPurchaseOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchFacets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchFacetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchListings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchListingsAsync(array $args = [])
 */
class MarketplaceDiscoveryClient extends AwsClient {}
