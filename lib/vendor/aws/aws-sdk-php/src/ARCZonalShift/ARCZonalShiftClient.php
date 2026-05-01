<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ARCZonalShift;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS ARC - Zonal Shift** service.
 * @method \R2Offload\Vendor\Aws\Result cancelPracticeRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelPracticeRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelZonalShift(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelZonalShiftAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPracticeRunConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPracticeRunConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePracticeRunConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePracticeRunConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAutoshiftObserverNotificationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAutoshiftObserverNotificationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getManagedResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getManagedResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutoshifts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutoshiftsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listManagedResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listManagedResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listZonalShifts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listZonalShiftsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPracticeRun(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPracticeRunAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startZonalShift(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startZonalShiftAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAutoshiftObserverNotificationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAutoshiftObserverNotificationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePracticeRunConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePracticeRunConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateZonalAutoshiftConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateZonalAutoshiftConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateZonalShift(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateZonalShiftAsync(array $args = [])
 */
class ARCZonalShiftClient extends AwsClient {}
