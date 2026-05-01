<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudSearch;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon CloudSearch** service.
 *
 * @method \R2Offload\Vendor\Aws\Result buildSuggesters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise buildSuggestersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result defineAnalysisScheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise defineAnalysisSchemeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result defineExpression(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise defineExpressionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result defineIndexField(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise defineIndexFieldAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result defineSuggester(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise defineSuggesterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAnalysisScheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAnalysisSchemeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteExpression(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteExpressionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIndexField(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIndexFieldAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSuggester(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSuggesterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAnalysisSchemes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAnalysisSchemesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAvailabilityOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAvailabilityOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDomainEndpointOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDomainEndpointOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDomains(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDomainsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeExpressions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExpressionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeIndexFields(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIndexFieldsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeServiceAccessPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeServiceAccessPoliciesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSuggesters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSuggestersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result indexDocuments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise indexDocumentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomainNames(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAvailabilityOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAvailabilityOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDomainEndpointOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDomainEndpointOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScalingParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScalingParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceAccessPolicies(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceAccessPoliciesAsync(array $args = [])
 */
class CloudSearchClient extends AwsClient {}
