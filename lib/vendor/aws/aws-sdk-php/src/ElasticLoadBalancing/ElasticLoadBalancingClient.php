<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ElasticLoadBalancing;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Elastic Load Balancing** service.
 *
 * @method \R2Offload\Vendor\Aws\Result addTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result applySecurityGroupsToLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise applySecurityGroupsToLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result attachLoadBalancerToSubnets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise attachLoadBalancerToSubnetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result configureHealthCheck(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise configureHealthCheckAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAppCookieStickinessPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAppCookieStickinessPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLBCookieStickinessPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLBCookieStickinessPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLoadBalancerListeners(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLoadBalancerListenersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLoadBalancerPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLoadBalancerPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLoadBalancerListeners(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLoadBalancerListenersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLoadBalancerPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLoadBalancerPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterInstancesFromLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterInstancesFromLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAccountLimits(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccountLimitsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeInstanceHealth(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeInstanceHealthAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLoadBalancerAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLoadBalancerAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLoadBalancerPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLoadBalancerPoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLoadBalancerPolicyTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLoadBalancerPolicyTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLoadBalancers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLoadBalancersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result detachLoadBalancerFromSubnets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise detachLoadBalancerFromSubnetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableAvailabilityZonesForLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableAvailabilityZonesForLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableAvailabilityZonesForLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableAvailabilityZonesForLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyLoadBalancerAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyLoadBalancerAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerInstancesWithLoadBalancer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerInstancesWithLoadBalancerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setLoadBalancerListenerSSLCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setLoadBalancerListenerSSLCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setLoadBalancerPoliciesForBackendServer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setLoadBalancerPoliciesForBackendServerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setLoadBalancerPoliciesOfListener(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setLoadBalancerPoliciesOfListenerAsync(array $args = [])
 */
class ElasticLoadBalancingClient extends AwsClient {}
