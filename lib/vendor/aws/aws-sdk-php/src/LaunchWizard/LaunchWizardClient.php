<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LaunchWizard;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Launch Wizard** service.
 * @method \R2Offload\Vendor\Aws\Result createDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeploymentPatternVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeploymentPatternVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkloadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkloadDeploymentPattern(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkloadDeploymentPatternAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeploymentEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeploymentEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeploymentPatternVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeploymentPatternVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeployments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkloadDeploymentPatterns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkloadDeploymentPatternsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkloads(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkloadsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDeploymentAsync(array $args = [])
 */
class LaunchWizardClient extends AwsClient {}
