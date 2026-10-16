<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IAMToolbox;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **IAM Toolbox (Preview)** service.
 * @method \R2Offload\Vendor\Aws\Result getRequestAuthorizationDetails(array $args = [])
 * @phpstan-method \Aws\Result getRequestAuthorizationDetails(array{authorizationId?: string, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRequestAuthorizationDetailsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRequestAuthorizationDetailsAsync(array{authorizationId?: string, nextToken?: string, ...} $args = [])
 */
class IAMToolboxClient extends AwsClient {}
