<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EC2InstanceConnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS EC2 Instance Connect** service.
 * @method \R2Offload\Vendor\Aws\Result sendSSHPublicKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendSSHPublicKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendSerialConsoleSSHPublicKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendSerialConsoleSSHPublicKeyAsync(array $args = [])
 */
class EC2InstanceConnectClient extends AwsClient {}
