<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SSOOIDC;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSO OIDC** service.
 * @method \R2Offload\Vendor\Aws\Result createToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTokenWithIAM(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTokenWithIAMAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerClient(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerClientAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDeviceAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDeviceAuthorizationAsync(array $args = [])
 */
class SSOOIDCClient extends AwsClient {}
