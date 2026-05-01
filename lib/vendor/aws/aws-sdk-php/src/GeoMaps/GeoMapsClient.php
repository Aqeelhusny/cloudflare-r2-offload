<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GeoMaps;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Maps V2** service.
 * @method \R2Offload\Vendor\Aws\Result getGlyphs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGlyphsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSprites(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSpritesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStaticMap(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStaticMapAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStyleDescriptor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStyleDescriptorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTileAsync(array $args = [])
 */
class GeoMapsClient extends AwsClient {}
