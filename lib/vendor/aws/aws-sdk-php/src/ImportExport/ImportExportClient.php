<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ImportExport;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Import/Export** service.
 * @method \R2Offload\Vendor\Aws\Result cancelJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getShippingLabel(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getShippingLabelAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 */
class ImportExportClient extends AwsClient {}
