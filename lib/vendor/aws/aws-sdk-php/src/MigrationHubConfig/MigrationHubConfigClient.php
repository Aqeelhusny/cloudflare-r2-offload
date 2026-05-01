<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MigrationHubConfig;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Config** service.
 * @method \R2Offload\Vendor\Aws\Result createHomeRegionControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHomeRegionControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHomeRegionControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHomeRegionControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHomeRegionControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHomeRegionControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHomeRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHomeRegionAsync(array $args = [])
 */
class MigrationHubConfigClient extends AwsClient {}
