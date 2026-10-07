<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\InspectorScan;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Inspector Scan** service.
 * @method \R2Offload\Vendor\Aws\Result scanSbom(array $args = [])
 * @phpstan-method \Aws\Result scanSbom(array{sbom?: array, outputFormat?: 'CYCLONE_DX_1_5'|'INSPECTOR'|'INSPECTOR_ALT', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise scanSbomAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise scanSbomAsync(array{sbom?: array, outputFormat?: 'CYCLONE_DX_1_5'|'INSPECTOR'|'INSPECTOR_ALT', ...} $args = [])
 */
class InspectorScanClient extends AwsClient {}
