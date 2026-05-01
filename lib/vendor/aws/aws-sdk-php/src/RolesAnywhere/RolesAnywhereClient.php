<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\RolesAnywhere;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **IAM Roles Anywhere** service.
 * @method \R2Offload\Vendor\Aws\Result createProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTrustAnchorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAttributeMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAttributeMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTrustAnchorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableTrustAnchorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableTrustAnchorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSubject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSubjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTrustAnchorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCrls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCrlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrustAnchors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrustAnchorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAttributeMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAttributeMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putNotificationSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putNotificationSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetNotificationSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetNotificationSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTrustAnchor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTrustAnchorAsync(array $args = [])
 */
class RolesAnywhereClient extends AwsClient {}
