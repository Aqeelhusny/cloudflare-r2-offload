<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EKSAuth;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EKS Auth** service.
 * @method \R2Offload\Vendor\Aws\Result assumeRoleForPodIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleForPodIdentityAsync(array $args = [])
 */
class EKSAuthClient extends AwsClient {}
