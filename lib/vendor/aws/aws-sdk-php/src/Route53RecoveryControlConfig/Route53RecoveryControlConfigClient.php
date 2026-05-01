<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Route53RecoveryControlConfig;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Route53 Recovery Control Config** service.
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createControlPanel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createControlPanelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRoutingControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRoutingControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSafetyRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSafetyRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteControlPanel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteControlPanelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRoutingControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRoutingControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSafetyRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSafetyRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeControlPanel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeControlPanelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRoutingControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRoutingControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSafetyRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSafetyRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedRoute53HealthChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedRoute53HealthChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControlPanels(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlPanelsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRoutingControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoutingControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSafetyRules(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSafetyRulesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateControlPanel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateControlPanelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRoutingControl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRoutingControlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSafetyRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSafetyRuleAsync(array $args = [])
 */
class Route53RecoveryControlConfigClient extends AwsClient {}
