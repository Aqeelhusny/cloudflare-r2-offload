<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MigrationHubRefactorSpaces;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub Refactor Spaces** service.
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRoute(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRouteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRoute(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRouteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRoute(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRouteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getService(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironmentVpcs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentVpcsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRoutes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRoutesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRoute(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRouteAsync(array $args = [])
 */
class MigrationHubRefactorSpacesClient extends AwsClient {}
