<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceReporting;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Reporting Service** service.
 * @method \R2Offload\Vendor\Aws\Result getBuyerDashboard(array $args = [])
 * @phpstan-method \Aws\Result getBuyerDashboard(array{dashboardIdentifier?: string, embeddingDomains?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBuyerDashboardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getBuyerDashboardAsync(array{dashboardIdentifier?: string, embeddingDomains?: list<string>, ...} $args = [])
 */
class MarketplaceReportingClient extends AwsClient {}
