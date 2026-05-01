<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SSO;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Single Sign-On** service.
 * @method \R2Offload\Vendor\Aws\Result getRoleCredentials(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRoleCredentialsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccountRoles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccountRolesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result logout(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise logoutAsync(array $args = [])
 */
class SSOClient extends AwsClient {}
