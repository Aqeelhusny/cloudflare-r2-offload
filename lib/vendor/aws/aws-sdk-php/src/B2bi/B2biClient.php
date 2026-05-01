<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\B2bi;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS B2B Data Interchange** service.
 * @method \R2Offload\Vendor\Aws\Result createCapability(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCapabilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPartnership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPartnershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStarterMappingTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStarterMappingTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTransformer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTransformerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCapability(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCapabilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePartnership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePartnershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTransformer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTransformerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCapability(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCapabilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPartnership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPartnershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTransformer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTransformerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTransformerJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTransformerJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCapabilities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCapabilitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPartnerships(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPartnershipsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProfiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProfilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTransformers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTransformersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startTransformerJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startTransformerJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result testConversion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testConversionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result testMapping(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testMappingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result testParsing(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testParsingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCapability(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCapabilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePartnership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePartnershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTransformer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTransformerAsync(array $args = [])
 */
class B2biClient extends AwsClient {}
