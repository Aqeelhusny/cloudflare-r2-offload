<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EKSAuth;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EKS Auth** service.
 * @method \R2Offload\Vendor\Aws\Result assumeRoleForPodIdentity(array $args = [])
 * @phpstan-method \Aws\Result assumeRoleForPodIdentity(array{clusterName?: string, token?: string, eksNodeName?: string, instanceId?: string, zone?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleForPodIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRoleForPodIdentityAsync(array{clusterName?: string, token?: string, eksNodeName?: string, instanceId?: string, zone?: string, ...} $args = [])
 */
class EKSAuthClient extends AwsClient {}
