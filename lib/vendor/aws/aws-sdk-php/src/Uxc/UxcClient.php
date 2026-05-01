<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Uxc;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Experience Customization** service.
 * @method \R2Offload\Vendor\Aws\Result getAccountCustomizations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountCustomizationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountCustomizations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountCustomizationsAsync(array $args = [])
 */
class UxcClient extends AwsClient {}
