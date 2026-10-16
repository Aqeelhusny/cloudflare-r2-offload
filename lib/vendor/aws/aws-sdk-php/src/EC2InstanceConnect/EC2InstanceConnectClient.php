<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EC2InstanceConnect;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS EC2 Instance Connect** service.
 * @method \R2Offload\Vendor\Aws\Result sendSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result sendSSHPublicKey(array{InstanceId?: string, InstanceOSUser?: string, SSHPublicKey?: string, AvailabilityZone?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendSSHPublicKeyAsync(array{InstanceId?: string, InstanceOSUser?: string, SSHPublicKey?: string, AvailabilityZone?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendSerialConsoleSSHPublicKey(array $args = [])
 * @phpstan-method \Aws\Result sendSerialConsoleSSHPublicKey(array{InstanceId?: string, SerialPort?: int, SSHPublicKey?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendSerialConsoleSSHPublicKeyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendSerialConsoleSSHPublicKeyAsync(array{InstanceId?: string, SerialPort?: int, SSHPublicKey?: string, ...} $args = [])
 */
class EC2InstanceConnectClient extends AwsClient {}
