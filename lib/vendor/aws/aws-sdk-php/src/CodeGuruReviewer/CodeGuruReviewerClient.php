<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeGuruReviewer;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CodeGuru Reviewer** service.
 * @method \R2Offload\Vendor\Aws\Result associateRepository(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateRepositoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCodeReview(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCodeReviewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCodeReview(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCodeReviewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRecommendationFeedback(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRecommendationFeedbackAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRepositoryAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRepositoryAssociationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateRepository(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateRepositoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCodeReviews(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCodeReviewsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendationFeedback(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationFeedbackAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRepositoryAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRepositoryAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRecommendationFeedback(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRecommendationFeedbackAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class CodeGuruReviewerClient extends AwsClient {}
