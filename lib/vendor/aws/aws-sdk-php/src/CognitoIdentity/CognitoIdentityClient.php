<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CognitoIdentity;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Identity** service.
 *
 * @method \R2Offload\Vendor\Aws\Result createIdentityPool(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIdentityPoolAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdentities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdentitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdentityPool(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdentityPoolAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeIdentityPool(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIdentityPoolAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCredentialsForIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCredentialsForIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdentityPoolRoles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdentityPoolRolesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOpenIdToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOpenIdTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOpenIdTokenForDeveloperIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOpenIdTokenForDeveloperIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPrincipalTagAttributeMap(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPrincipalTagAttributeMapAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentityPools(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentityPoolsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result lookupDeveloperIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise lookupDeveloperIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result mergeDeveloperIdentities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise mergeDeveloperIdentitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setIdentityPoolRoles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setIdentityPoolRolesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setPrincipalTagAttributeMap(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setPrincipalTagAttributeMapAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unlinkDeveloperIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unlinkDeveloperIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unlinkIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unlinkIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateIdentityPool(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateIdentityPoolAsync(array $args = [])
 */
class CognitoIdentityClient extends AwsClient {}
