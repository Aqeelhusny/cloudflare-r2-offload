<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SimSpaceWeaver;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SimSpace Weaver** service.
 * @method \R2Offload\Vendor\Aws\Result createSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApp(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAppAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSimulation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSimulationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeApp(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAppAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSimulation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSimulationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApps(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAppsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSimulations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSimulationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startApp(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAppAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startClock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startClockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSimulation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSimulationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopApp(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopAppAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopClock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopClockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopSimulation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopSimulationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class SimSpaceWeaverClient extends AwsClient {}
