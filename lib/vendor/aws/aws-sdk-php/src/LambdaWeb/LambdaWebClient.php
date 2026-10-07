<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LambdaWeb;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Lambda Web** service.
 * @method \R2Offload\Vendor\Aws\Result getWebAccountSettings(array $args = [])
 * @phpstan-method \Aws\Result getWebAccountSettings(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebAccountSettingsAsync(array{...} $args = [])
 */
class LambdaWebClient extends AwsClient {}
