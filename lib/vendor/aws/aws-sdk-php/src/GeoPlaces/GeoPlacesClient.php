<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GeoPlaces;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Location Service Places V2** service.
 * @method \R2Offload\Vendor\Aws\Result autocomplete(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise autocompleteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result geocode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise geocodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPlace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPlaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result reverseGeocode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise reverseGeocodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchNearby(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchNearbyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchText(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchTextAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result suggest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise suggestAsync(array $args = [])
 */
class GeoPlacesClient extends AwsClient {}
