<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\HealthLake;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon HealthLake** service.
 * @method \R2Offload\Vendor\Aws\Result createFHIRDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFHIRDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFHIRDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFHIRDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFHIRDatastore(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFHIRDatastoreAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFHIRExportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFHIRExportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFHIRImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFHIRImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFHIRDatastores(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFHIRDatastoresAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFHIRExportJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFHIRExportJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFHIRImportJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFHIRImportJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startFHIRExportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startFHIRExportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startFHIRImportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startFHIRImportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class HealthLakeClient extends AwsClient {}
