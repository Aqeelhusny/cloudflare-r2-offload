<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PersonalizeRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Personalize Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result getActionRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getActionRecommendations(array{
 *     campaignArn?: string,
 *     userId?: string,
 *     numResults?: int,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getActionRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActionRecommendationsAsync(array{
 *     campaignArn?: string,
 *     userId?: string,
 *     numResults?: int,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPersonalizedRanking(array $args = [])
 * @phpstan-method \Aws\Result getPersonalizedRanking(array{
 *     campaignArn?: string,
 *     inputList?: list<string>,
 *     userId?: string,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPersonalizedRankingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPersonalizedRankingAsync(array{
 *     campaignArn?: string,
 *     inputList?: list<string>,
 *     userId?: string,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRecommendations(array $args = [])
 * @phpstan-method \Aws\Result getRecommendations(array{
 *     campaignArn?: string,
 *     itemId?: string,
 *     userId?: string,
 *     numResults?: int,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     recommenderArn?: string,
 *     promotions?: list<array{
 *         name?: string,
 *         percentPromotedItems?: int,
 *         filterArn?: string,
 *         filterValues?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRecommendationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRecommendationsAsync(array{
 *     campaignArn?: string,
 *     itemId?: string,
 *     userId?: string,
 *     numResults?: int,
 *     context?: array<string, string>,
 *     filterArn?: string,
 *     filterValues?: array<string, string>,
 *     recommenderArn?: string,
 *     promotions?: list<array{
 *         name?: string,
 *         percentPromotedItems?: int,
 *         filterArn?: string,
 *         filterValues?: array<string, string>,
 *         ...,
 *     }>,
 *     metadataColumns?: array<string, list<string>>,
 *     ...,
 * } $args = [])
 */
class PersonalizeRuntimeClient extends AwsClient {}
