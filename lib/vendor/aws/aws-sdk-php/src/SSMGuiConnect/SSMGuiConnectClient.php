<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SSMGuiConnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSM-GUIConnect** service.
 * @method \R2Offload\Vendor\Aws\Result deleteConnectionRecordingPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionRecordingPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectionRecordingPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionRecordingPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnectionRecordingPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectionRecordingPreferencesAsync(array $args = [])
 */
class SSMGuiConnectClient extends AwsClient {}
