<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Textract;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Textract** service.
 * @method \R2Offload\Vendor\Aws\Result analyzeDocument(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise analyzeDocumentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result analyzeExpense(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise analyzeExpenseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result analyzeID(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise analyzeIDAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAdapter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAdapterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAdapterVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAdapterVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAdapter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAdapterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAdapterVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAdapterVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result detectDocumentText(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise detectDocumentTextAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAdapter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAdapterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAdapterVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAdapterVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDocumentAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDocumentAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDocumentTextDetection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDocumentTextDetectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExpenseAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExpenseAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLendingAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLendingAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLendingAnalysisSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLendingAnalysisSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAdapterVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAdapterVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAdapters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAdaptersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDocumentAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDocumentAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDocumentTextDetection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDocumentTextDetectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startExpenseAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startExpenseAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startLendingAnalysis(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startLendingAnalysisAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAdapter(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAdapterAsync(array $args = [])
 */
class TextractClient extends AwsClient {}
