<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MedicalImaging;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Health Imaging** service.
 * @method \R2Offload\Vendor\Aws\Result copyImageSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyImageSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteImageSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteImageSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDICOMImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDICOMImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getImageFrame(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getImageFrameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getImageSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getImageSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getImageSetMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getImageSetMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDICOMImportJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDICOMImportJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatastores(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatastoresAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listImageSetVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listImageSetVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchImageSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchImageSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDICOMImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDICOMImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateImageSetMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateImageSetMetadataAsync(array $args = [])
 */
class MedicalImagingClient extends AwsClient {}
