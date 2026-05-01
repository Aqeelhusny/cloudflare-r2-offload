<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Cloud9;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cloud9** service.
 * @method \R2Offload\Vendor\Aws\Result createEnvironmentEC2(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentEC2Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironmentMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironmentMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEnvironmentMemberships(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEnvironmentMembershipsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEnvironmentStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEnvironmentStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironmentMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentMembershipAsync(array $args = [])
 */
class Cloud9Client extends AwsClient {}
