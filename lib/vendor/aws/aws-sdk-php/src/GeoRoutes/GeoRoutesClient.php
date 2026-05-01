<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GeoRoutes;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Routes V2** service.
 * @method \R2Offload\Vendor\Aws\Result calculateIsolines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise calculateIsolinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result calculateRouteMatrix(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise calculateRouteMatrixAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result calculateRoutes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise calculateRoutesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result optimizeWaypoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise optimizeWaypointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result snapToRoads(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise snapToRoadsAsync(array $args = [])
 */
class GeoRoutesClient extends AwsClient {}
