<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ECRPublic;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Container Registry Public** service.
 * @method \R2Offload\Vendor\Aws\Result batchCheckLayerAvailability(array $args = [])
 * @phpstan-method \Aws\Result batchCheckLayerAvailability(array{registryId?: string, repositoryName?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array{registryId?: string, repositoryName?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteImage(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteImage(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteImageAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result completeLayerUpload(array $args = [])
 * @phpstan-method \Aws\Result completeLayerUpload(array{registryId?: string, repositoryName?: string, uploadId?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeLayerUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeLayerUploadAsync(array{registryId?: string, repositoryName?: string, uploadId?: string, layerDigests?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRepository(array $args = [])
 * @phpstan-method \Aws\Result createRepository(array{
 *     repositoryName?: string,
 *     catalogData?: array{
 *         description?: string,
 *         architectures?: list<string>,
 *         operatingSystems?: list<string>,
 *         logoImageBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         aboutText?: string,
 *         usageText?: string,
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryAsync(array{
 *     repositoryName?: string,
 *     catalogData?: array{
 *         description?: string,
 *         architectures?: list<string>,
 *         operatingSystems?: list<string>,
 *         logoImageBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         aboutText?: string,
 *         usageText?: string,
 *         ...,
 *     },
 *     tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteRepository(array{registryId?: string, repositoryName?: string, force?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array{registryId?: string, repositoryName?: string, force?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRepositoryPolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImageTags(array $args = [])
 * @phpstan-method \Aws\Result describeImageTags(array{registryId?: string, repositoryName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImageTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageTagsAsync(array{registryId?: string, repositoryName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImages(array $args = [])
 * @phpstan-method \Aws\Result describeImages(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImagesAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageIds?: list<array{imageDigest?: string, imageTag?: string, ...}>,
 *     nextToken?: string,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRegistries(array $args = [])
 * @phpstan-method \Aws\Result describeRegistries(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRegistriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRegistriesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRepositories(array $args = [])
 * @phpstan-method \Aws\Result describeRepositories(array{registryId?: string, repositoryNames?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRepositoriesAsync(array{registryId?: string, repositoryNames?: list<string>, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAuthorizationToken(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizationToken(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRegistryCatalogData(array $args = [])
 * @phpstan-method \Aws\Result getRegistryCatalogData(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRegistryCatalogDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegistryCatalogDataAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryCatalogData(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryCatalogData(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryCatalogDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryCatalogDataAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryPolicy(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result initiateLayerUpload(array $args = [])
 * @phpstan-method \Aws\Result initiateLayerUpload(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array{registryId?: string, repositoryName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putImage(array $args = [])
 * @phpstan-method \Aws\Result putImage(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageManifest?: string,
 *     imageManifestMediaType?: string,
 *     imageTag?: string,
 *     imageDigest?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putImageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putImageAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     imageManifest?: string,
 *     imageManifestMediaType?: string,
 *     imageTag?: string,
 *     imageDigest?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRegistryCatalogData(array $args = [])
 * @phpstan-method \Aws\Result putRegistryCatalogData(array{displayName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRegistryCatalogDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRegistryCatalogDataAsync(array{displayName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRepositoryCatalogData(array $args = [])
 * @phpstan-method \Aws\Result putRepositoryCatalogData(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     catalogData?: array{
 *         description?: string,
 *         architectures?: list<string>,
 *         operatingSystems?: list<string>,
 *         logoImageBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         aboutText?: string,
 *         usageText?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRepositoryCatalogDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRepositoryCatalogDataAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     catalogData?: array{
 *         description?: string,
 *         architectures?: list<string>,
 *         operatingSystems?: list<string>,
 *         logoImageBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         aboutText?: string,
 *         usageText?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result setRepositoryPolicy(array $args = [])
 * @phpstan-method \Aws\Result setRepositoryPolicy(array{registryId?: string, repositoryName?: string, policyText?: string, force?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array{registryId?: string, repositoryName?: string, policyText?: string, force?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result uploadLayerPart(array $args = [])
 * @phpstan-method \Aws\Result uploadLayerPart(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     uploadId?: string,
 *     partFirstByte?: int,
 *     partLastByte?: int,
 *     layerPartBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise uploadLayerPartAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise uploadLayerPartAsync(array{
 *     registryId?: string,
 *     repositoryName?: string,
 *     uploadId?: string,
 *     partFirstByte?: int,
 *     partLastByte?: int,
 *     layerPartBlob?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 */
class ECRPublicClient extends AwsClient {}
