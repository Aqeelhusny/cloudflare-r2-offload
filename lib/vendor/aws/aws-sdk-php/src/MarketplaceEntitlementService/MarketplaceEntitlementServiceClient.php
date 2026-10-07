<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceEntitlementService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Entitlement Service** service.
 * @method \R2Offload\Vendor\Aws\Result getEntitlements(array $args = [])
 * @phpstan-method \Aws\Result getEntitlements(array{ProductCode?: string, Filter?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEntitlementsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEntitlementsAsync(array{ProductCode?: string, Filter?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 */
class MarketplaceEntitlementServiceClient extends AwsClient {}
