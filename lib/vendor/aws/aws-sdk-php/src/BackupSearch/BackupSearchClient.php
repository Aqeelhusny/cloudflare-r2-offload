<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BackupSearch;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Backup Search** service.
 * @method \R2Offload\Vendor\Aws\Result getSearchJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSearchJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSearchResultExportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSearchResultExportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSearchJobBackups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSearchJobBackupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSearchJobResults(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSearchJobResultsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSearchJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSearchJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSearchResultExportJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSearchResultExportJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSearchJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSearchJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSearchResultExportJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSearchResultExportJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopSearchJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopSearchJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class BackupSearchClient extends AwsClient {}
