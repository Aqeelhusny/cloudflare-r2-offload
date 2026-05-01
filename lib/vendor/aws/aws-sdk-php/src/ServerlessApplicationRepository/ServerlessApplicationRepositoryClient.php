<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ServerlessApplicationRepository;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWSServerlessApplicationRepository** service.
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplicationVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCloudFormationChangeSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCloudFormationChangeSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCloudFormationTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCloudFormationTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplicationPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCloudFormationTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCloudFormationTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplicationDependencies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationDependenciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplicationVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putApplicationPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putApplicationPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unshareApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unshareApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 */
class ServerlessApplicationRepositoryClient extends AwsClient {}
