<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ControlCatalog;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Control Catalog** service.
 * @method \R2Offload\Vendor\Aws\Result getControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCommonControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCommonControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControlMappings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlMappingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listObjectives(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listObjectivesAsync(array $args = [])
 */
class ControlCatalogClient extends AwsClient {}
