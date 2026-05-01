<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SageMakerGeospatial;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker geospatial capabilities** service.
 * @method \R2Offload\Vendor\Aws\Result deleteEarthObservationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEarthObservationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteVectorEnrichmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteVectorEnrichmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportEarthObservationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportEarthObservationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportVectorEnrichmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportVectorEnrichmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEarthObservationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEarthObservationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRasterDataCollection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRasterDataCollectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVectorEnrichmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVectorEnrichmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEarthObservationJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEarthObservationJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRasterDataCollections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRasterDataCollectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVectorEnrichmentJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVectorEnrichmentJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchRasterDataCollection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchRasterDataCollectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startEarthObservationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startEarthObservationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startVectorEnrichmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startVectorEnrichmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopEarthObservationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopEarthObservationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopVectorEnrichmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopVectorEnrichmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class SageMakerGeospatialClient extends AwsClient {}
