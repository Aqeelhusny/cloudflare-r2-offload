<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ECRPublic;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Container Registry Public** service.
 * @method \R2Offload\Vendor\Aws\Result batchCheckLayerAvailability(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteImage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteImageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result completeLayerUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeLayerUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRepository(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepository(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepositoryPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImageTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImageTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRegistries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRegistriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRepositories(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRepositoriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAuthorizationToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRegistryCatalogData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRegistryCatalogDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryCatalogData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryCatalogDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result initiateLayerUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putImage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putImageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRegistryCatalogData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRegistryCatalogDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRepositoryCatalogData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRepositoryCatalogDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result setRepositoryPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result uploadLayerPart(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise uploadLayerPartAsync(array $args = [])
 */
class ECRPublicClient extends AwsClient {}
