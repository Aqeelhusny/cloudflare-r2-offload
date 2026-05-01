<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3Vectors;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 Vectors** service.
 * @method \R2Offload\Vendor\Aws\Result createIndex(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIndexAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createVectorBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createVectorBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIndex(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIndexAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVectorBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVectorBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVectorBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVectorBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIndex(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIndexAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVectorBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVectorBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVectorBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVectorBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIndexes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIndexesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVectorBuckets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVectorBucketsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putVectorBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putVectorBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putVectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putVectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result queryVectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise queryVectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class S3VectorsClient extends AwsClient {}
