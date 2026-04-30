<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\signer;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Signer** service.
 * @method \R2Offload\Vendor\Aws\Result addProfilePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addProfilePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelSigningProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelSigningProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSigningJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSigningJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRevocationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRevocationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSigningPlatform(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSigningPlatformAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSigningProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSigningProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfilePermissions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfilePermissionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSigningJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSigningJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSigningPlatforms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSigningPlatformsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSigningProfiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSigningProfilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSigningProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSigningProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeProfilePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeProfilePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokeSignature(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokeSignatureAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokeSigningProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokeSigningProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result signPayload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise signPayloadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSigningJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSigningJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class signerClient extends AwsClient {}
