<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\TrustedAdvisor;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **TrustedAdvisor Public API** service.
 * @method \R2Offload\Vendor\Aws\Result batchUpdateRecommendationResourceExclusion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchUpdateRecommendationResourceExclusionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOrganizationRecommendation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOrganizationRecommendationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChecks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChecksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOrganizationRecommendationAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOrganizationRecommendationAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOrganizationRecommendationResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOrganizationRecommendationResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOrganizationRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOrganizationRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendationResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateOrganizationRecommendationLifecycle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateOrganizationRecommendationLifecycleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRecommendationLifecycle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRecommendationLifecycleAsync(array $args = [])
 */
class TrustedAdvisorClient extends AwsClient {}
