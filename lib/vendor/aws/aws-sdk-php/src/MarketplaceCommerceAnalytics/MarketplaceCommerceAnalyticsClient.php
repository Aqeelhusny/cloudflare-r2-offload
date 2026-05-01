<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceCommerceAnalytics;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Commerce Analytics** service.
 *
 * @method \R2Offload\Vendor\Aws\Result generateDataSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateDataSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSupportDataExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSupportDataExportAsync(array $args = [])
 */
class MarketplaceCommerceAnalyticsClient extends AwsClient {}
