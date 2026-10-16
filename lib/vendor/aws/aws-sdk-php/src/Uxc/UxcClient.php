<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Uxc;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Experience Customization** service.
 * @method \R2Offload\Vendor\Aws\Result getAccountCustomizations(array $args = [])
 * @phpstan-method \Aws\Result getAccountCustomizations(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountCustomizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountCustomizationsAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @phpstan-method \Aws\Result listServices(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listServicesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAccountCustomizations(array $args = [])
 * @phpstan-method \Aws\Result updateAccountCustomizations(array{
 *     accountColor?: 'darkBlue'|'green'|'lightBlue'|'none'|'orange'|'pink'|'purple'|'red'|'teal'|'yellow',
 *     visibleServices?: list<string>,
 *     visibleRegions?: list<string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAccountCustomizationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAccountCustomizationsAsync(array{
 *     accountColor?: 'darkBlue'|'green'|'lightBlue'|'none'|'orange'|'pink'|'purple'|'red'|'teal'|'yellow',
 *     visibleServices?: list<string>,
 *     visibleRegions?: list<string>,
 *     ...,
 * } $args = [])
 */
class UxcClient extends AwsClient {}
