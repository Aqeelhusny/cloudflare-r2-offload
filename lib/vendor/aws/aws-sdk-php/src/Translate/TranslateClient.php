<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Translate;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Translate** service.
 * @method \R2Offload\Vendor\Aws\Result createParallelData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createParallelDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteParallelData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteParallelDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTerminology(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTerminologyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTextTranslationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTextTranslationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getParallelData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getParallelDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTerminology(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTerminologyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importTerminology(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importTerminologyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLanguages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLanguagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listParallelData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listParallelDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTerminologies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTerminologiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTextTranslationJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTextTranslationJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startTextTranslationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startTextTranslationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopTextTranslationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopTextTranslationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result translateDocument(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translateDocumentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result translateText(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translateTextAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateParallelData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateParallelDataAsync(array $args = [])
 */
class TranslateClient extends AwsClient {}
