<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Route53Profiles;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Route 53 Profiles** service.
 * @method \R2Offload\Vendor\Aws\Result associateProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateResourceToProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateResourceToProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateResourceFromProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateResourceFromProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfileAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileAssociationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfileResourceAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileResourceAssociationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfileAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfileAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfileResourceAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfileResourceAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProfileResourceAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProfileResourceAssociationAsync(array $args = [])
 */
class Route53ProfilesClient extends AwsClient {}
