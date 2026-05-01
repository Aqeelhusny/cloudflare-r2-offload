<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ControlTower;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Control Tower** service.
 * @method \R2Offload\Vendor\Aws\Result createLandingZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLandingZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLandingZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLandingZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBaselineOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBaselineOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getControlOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getControlOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnabledBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnabledBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnabledControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnabledControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLandingZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLandingZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLandingZoneOperation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLandingZoneOperationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBaselines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBaselinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControlOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnabledBaselines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnabledBaselinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnabledControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnabledControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLandingZoneOperations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLandingZoneOperationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLandingZones(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLandingZonesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetEnabledBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetEnabledBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetEnabledControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetEnabledControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetLandingZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetLandingZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnabledBaseline(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnabledBaselineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnabledControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnabledControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLandingZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLandingZoneAsync(array $args = [])
 */
class ControlTowerClient extends AwsClient {}
