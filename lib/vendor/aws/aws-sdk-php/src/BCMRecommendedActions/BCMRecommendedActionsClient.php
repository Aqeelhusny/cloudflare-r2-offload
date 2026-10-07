<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BCMRecommendedActions;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Billing and Cost Management Recommended Actions** service.
 * @method \R2Offload\Vendor\Aws\Result listRecommendedActions(array $args = [])
 * @phpstan-method \Aws\Result listRecommendedActions(array{filter?: array{actions?: list<array>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array{filter?: array{actions?: list<array>, ...}, maxResults?: int, nextToken?: string, ...} $args = [])
 */
class BCMRecommendedActionsClient extends AwsClient {}
