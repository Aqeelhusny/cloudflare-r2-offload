<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MigrationHubConfig;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Config** service.
 * @method \R2Offload\Vendor\Aws\Result createHomeRegionControl(array $args = [])
 * @phpstan-method \Aws\Result createHomeRegionControl(array{HomeRegion?: string, Target?: array{Type?: 'ACCOUNT', Id?: string, ...}, DryRun?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHomeRegionControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHomeRegionControlAsync(array{HomeRegion?: string, Target?: array{Type?: 'ACCOUNT', Id?: string, ...}, DryRun?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHomeRegionControl(array $args = [])
 * @phpstan-method \Aws\Result deleteHomeRegionControl(array{ControlId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHomeRegionControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHomeRegionControlAsync(array{ControlId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHomeRegionControls(array $args = [])
 * @phpstan-method \Aws\Result describeHomeRegionControls(array{
 *     ControlId?: string,
 *     HomeRegion?: string,
 *     Target?: array{Type?: 'ACCOUNT', Id?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHomeRegionControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeHomeRegionControlsAsync(array{
 *     ControlId?: string,
 *     HomeRegion?: string,
 *     Target?: array{Type?: 'ACCOUNT', Id?: string, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHomeRegion(array $args = [])
 * @phpstan-method \Aws\Result getHomeRegion(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHomeRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getHomeRegionAsync(array{...} $args = [])
 */
class MigrationHubConfigClient extends AwsClient {}
