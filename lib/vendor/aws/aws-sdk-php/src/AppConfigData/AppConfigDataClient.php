<?php
namespace R2Offload\Vendor\Aws\AppConfigData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS AppConfig Data** service.
 * @method \R2Offload\Vendor\Aws\Result getLatestConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLatestConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startConfigurationSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startConfigurationSessionAsync(array $args = [])
 */
class AppConfigDataClient extends AwsClient {}
