<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SimpleDBv2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SimpleDB v2** service.
 * @method \R2Offload\Vendor\Aws\Result getExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExports(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExportsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDomainExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDomainExportAsync(array $args = [])
 */
class SimpleDBv2Client extends AwsClient {}
