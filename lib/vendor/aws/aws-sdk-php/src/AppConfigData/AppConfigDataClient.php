<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AppConfigData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AppConfig Data** service.
 * @method \R2Offload\Vendor\Aws\Result getLatestConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getLatestConfiguration(array{ConfigurationToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLatestConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getLatestConfigurationAsync(array{ConfigurationToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startConfigurationSession(array $args = [])
 * @phpstan-method \Aws\Result startConfigurationSession(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     RequiredMinimumPollIntervalInSeconds?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startConfigurationSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startConfigurationSessionAsync(array{
 *     ApplicationIdentifier?: string,
 *     EnvironmentIdentifier?: string,
 *     ConfigurationProfileIdentifier?: string,
 *     RequiredMinimumPollIntervalInSeconds?: int,
 *     ...,
 * } $args = [])
 */
class AppConfigDataClient extends AwsClient {}
