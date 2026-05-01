<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudFront;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront** service.
 *
 * @method \R2Offload\Vendor\Aws\Result createCloudFrontOriginAccessIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createInvalidation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInvalidationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStreamingDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStreamingDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCloudFrontOriginAccessIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStreamingDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStreamingDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCloudFrontOriginAccessIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCloudFrontOriginAccessIdentityConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDistributionConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDistributionConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvalidation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvalidationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStreamingDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStreamingDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStreamingDistributionConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStreamingDistributionConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCloudFrontOriginAccessIdentities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCloudFrontOriginAccessIdentitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDistributions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByWebACLId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByWebACLIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvalidations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvalidationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreamingDistributions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamingDistributionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCloudFrontOriginAccessIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStreamingDistribution(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStreamingDistributionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createStreamingDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStreamingDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25, 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteServiceLinkedRole(array $args = []) (supported in versions 2017-03-25)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceLinkedRoleAsync(array $args = []) (supported in versions 2017-03-25)
 * @method \R2Offload\Vendor\Aws\Result createFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createPublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deletePublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getFieldLevelEncryption(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFieldLevelEncryptionAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getFieldLevelEncryptionProfileConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFieldLevelEncryptionProfileConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getPublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getPublicKeyConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPublicKeyConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listFieldLevelEncryptionConfigs(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFieldLevelEncryptionConfigsAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listFieldLevelEncryptionProfiles(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFieldLevelEncryptionProfilesAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listPublicKeys(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPublicKeysAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateFieldLevelEncryptionConfig(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFieldLevelEncryptionConfigAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateFieldLevelEncryptionProfile(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFieldLevelEncryptionProfileAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updatePublicKey(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePublicKeyAsync(array $args = []) (supported in versions 2017-10-30, 2018-06-18, 2018-11-05, 2019-03-26, 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result associateAlias(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAliasAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result associateDistributionTenantWebACL(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateDistributionTenantWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result associateDistributionWebACL(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateDistributionWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result copyDistribution(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDistributionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createInvalidationForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInvalidationForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result createVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result deleteVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result describeConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result describeFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result describeKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result disassociateDistributionTenantWebACL(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateDistributionTenantWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result disassociateDistributionWebACL(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateDistributionWebACLAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getCachePolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCachePolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getConnectionGroupByRoutingEndpoint(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionGroupByRoutingEndpointAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getContinuousDeploymentPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getContinuousDeploymentPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getDistributionTenantByDomain(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDistributionTenantByDomainAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getInvalidationForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvalidationForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getKeyGroupConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getKeyGroupConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getManagedCertificateDetails(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getManagedCertificateDetailsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getMonitoringSubscription(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMonitoringSubscriptionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getOriginAccessControlConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginAccessControlConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getOriginRequestPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOriginRequestPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getResponseHeadersPolicyConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResponseHeadersPolicyConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result getVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listAnycastIpLists(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAnycastIpListsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listCachePolicies(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCachePoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listConflictingAliases(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConflictingAliasesAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listConnectionFunctions(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionFunctionsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listConnectionGroups(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionGroupsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listContinuousDeploymentPolicies(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listContinuousDeploymentPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionTenants(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionTenantsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionTenantsByCustomization(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionTenantsByCustomizationAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByAnycastIpListId(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByAnycastIpListIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByCachePolicyId(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByCachePolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByConnectionMode(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByConnectionModeAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByOriginRequestPolicyId(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByOriginRequestPolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByOwnedResource(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByOwnedResourceAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByResponseHeadersPolicyId(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByResponseHeadersPolicyIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDistributionsByVpcOriginId(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDistributionsByVpcOriginIdAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listDomainConflicts(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainConflictsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listFunctions(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listInvalidationsForDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvalidationsForDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listKeyGroups(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listKeyGroupsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listKeyValueStores(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listKeyValueStoresAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listOriginAccessControls(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOriginAccessControlsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listOriginRequestPolicies(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOriginRequestPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listRealtimeLogConfigs(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRealtimeLogConfigsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listResponseHeadersPolicies(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResponseHeadersPoliciesAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listTrustStores(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrustStoresAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result listVpcOrigins(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVpcOriginsAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result publishConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result publishFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result testConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result testFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateAnycastIpList(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAnycastIpListAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateCachePolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCachePolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateConnectionFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectionFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateConnectionGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectionGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateContinuousDeploymentPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateContinuousDeploymentPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateDistributionTenant(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDistributionTenantAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateDistributionWithStagingConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDistributionWithStagingConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateDomainAssociation(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDomainAssociationAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateFunction(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFunctionAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateKeyGroup(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateKeyGroupAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateKeyValueStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateKeyValueStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateOriginAccessControl(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOriginAccessControlAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateOriginRequestPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOriginRequestPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateRealtimeLogConfig(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRealtimeLogConfigAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateResponseHeadersPolicy(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateResponseHeadersPolicyAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateTrustStore(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTrustStoreAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result updateVpcOrigin(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateVpcOriginAsync(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\Aws\Result verifyDnsConfiguration(array $args = []) (supported in versions 2020-05-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyDnsConfigurationAsync(array $args = []) (supported in versions 2020-05-31)
 */
class CloudFrontClient extends AwsClient
{
    /**
     * Create a signed Amazon CloudFront URL.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *   http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath to the private key used to sign
     *   CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string Signed URL with authentication parameters
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedUrl(array $options)
    {
        foreach (['url', 'key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $urlSigner = new UrlSigner(
            $options['key_pair_id'],
            $options['private_key']
        );

        return $urlSigner->getSignedUrl(
            $options['url'],
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }

    /**
     * Create a signed Amazon CloudFront cookie.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath ot the private key used to sign
     *   CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return array Key => value pairs of signed cookies to set
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedCookie(array $options)
    {
        foreach (['key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $cookieSigner = new CookieSigner(
            $options['key_pair_id'],
            $options['private_key']
        );

        return $cookieSigner->getSignedCookie(
            isset($options['url']) ? $options['url'] : null,
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }
}
