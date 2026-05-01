<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Route53;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Route 53** service.
 *
 * @method \R2Offload\Vendor\Aws\Result activateKeySigningKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise activateKeySigningKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateVPCWithHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateVPCWithHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result changeCidrCollection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise changeCidrCollectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result changeResourceRecordSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise changeResourceRecordSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result changeTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise changeTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCidrCollection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCidrCollectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHealthCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHealthCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createKeySigningKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createKeySigningKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createQueryLoggingConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createQueryLoggingConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createReusableDelegationSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createReusableDelegationSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTrafficPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTrafficPolicyInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTrafficPolicyInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTrafficPolicyVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTrafficPolicyVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createVPCAssociationAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createVPCAssociationAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deactivateKeySigningKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deactivateKeySigningKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCidrCollection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCidrCollectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHealthCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHealthCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteKeySigningKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeySigningKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteQueryLoggingConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteQueryLoggingConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteReusableDelegationSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteReusableDelegationSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTrafficPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTrafficPolicyInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTrafficPolicyInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVPCAssociationAuthorization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVPCAssociationAuthorizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableHostedZoneDNSSEC(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableHostedZoneDNSSECAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateVPCFromHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateVPCFromHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableHostedZoneDNSSEC(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableHostedZoneDNSSECAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountLimitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChange(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChangeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCheckerIpRanges(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCheckerIpRangesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDNSSEC(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDNSSECAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGeoLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGeoLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHealthCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHealthCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHealthCheckCount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHealthCheckCountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHealthCheckLastFailureReason(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHealthCheckLastFailureReasonAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHealthCheckStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHealthCheckStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHostedZoneCount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHostedZoneCountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHostedZoneLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHostedZoneLimitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getQueryLoggingConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getQueryLoggingConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReusableDelegationSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReusableDelegationSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getReusableDelegationSetLimit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getReusableDelegationSetLimitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTrafficPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTrafficPolicyInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTrafficPolicyInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTrafficPolicyInstanceCount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTrafficPolicyInstanceCountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCidrBlocks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCidrBlocksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCidrCollections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCidrCollectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCidrLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCidrLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGeoLocations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGeoLocationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHealthChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHealthChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHostedZones(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHostedZonesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHostedZonesByName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHostedZonesByNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHostedZonesByVPC(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHostedZonesByVPCAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listQueryLoggingConfigs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listQueryLoggingConfigsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourceRecordSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourceRecordSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listReusableDelegationSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listReusableDelegationSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrafficPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrafficPolicyInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrafficPolicyInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrafficPolicyInstancesByHostedZone(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByHostedZoneAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrafficPolicyInstancesByPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTrafficPolicyVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTrafficPolicyVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVPCAssociationAuthorizations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVPCAssociationAuthorizationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result testDNSAnswer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testDNSAnswerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHealthCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHealthCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHostedZoneComment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHostedZoneCommentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHostedZoneFeatures(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHostedZoneFeaturesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTrafficPolicyComment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTrafficPolicyCommentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTrafficPolicyInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTrafficPolicyInstanceAsync(array $args = [])
 */
class Route53Client extends AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->getHandlerList()->appendInit($this->cleanIdFn(), 'route53.clean_id');
    }

    private function cleanIdFn()
    {
        return function (callable $handler) {
            return function (CommandInterface $c, ?RequestInterface $r = null) use ($handler) {
                foreach (['Id', 'HostedZoneId', 'DelegationSetId'] as $clean) {
                    if ($c->hasParam($clean)) {
                        $c[$clean] = $this->cleanId($c[$clean]);
                    }
                }
                return $handler($c, $r);
            };
        };
    }

    private function cleanId($id)
    {
        static $toClean = ['/hostedzone/', '/change/', '/delegationset/'];

        return str_replace($toClean, '', $id);
    }
}
