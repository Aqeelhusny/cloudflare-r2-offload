<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Evs;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic VMware Service** service.
 * @method \R2Offload\Vendor\Aws\Result associateEipToVlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateEipToVlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEntitlement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEntitlementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironmentConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironmentHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEntitlement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEntitlementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironmentConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironmentHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateEipFromVlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateEipFromVlanAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironmentConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironmentHosts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentHostsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironmentVlans(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentVlansAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVmEntitlements(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVmEntitlementsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironmentConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentConnectorAsync(array $args = [])
 */
class EvsClient extends AwsClient {}
