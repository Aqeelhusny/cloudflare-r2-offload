<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ElementalInference;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Elemental Inference** service.
 * @method \R2Offload\Vendor\Aws\Result associateFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateFeedAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFeedAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFeedAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateFeedAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFeedAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFeeds(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFeedsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateFeed(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFeedAsync(array $args = [])
 */
class ElementalInferenceClient extends AwsClient {}
