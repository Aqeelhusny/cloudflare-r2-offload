<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PersonalizeRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Personalize Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result getActionRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getActionRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPersonalizedRanking(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPersonalizedRankingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 */
class PersonalizeRuntimeClient extends AwsClient {}
