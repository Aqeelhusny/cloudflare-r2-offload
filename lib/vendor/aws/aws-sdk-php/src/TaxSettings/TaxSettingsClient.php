<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\TaxSettings;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Tax Settings** service.
 * @method \R2Offload\Vendor\Aws\Result batchDeleteTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchGetTaxExemptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetTaxExemptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchPutTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchPutTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSupplementalTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSupplementalTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTaxExemptionTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTaxExemptionTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTaxInheritance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTaxInheritanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTaxRegistrationDocument(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTaxRegistrationDocumentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSupplementalTaxRegistrations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSupplementalTaxRegistrationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTaxExemptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTaxExemptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTaxRegistrations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTaxRegistrationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSupplementalTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSupplementalTaxRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putTaxExemption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putTaxExemptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putTaxInheritance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putTaxInheritanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putTaxRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putTaxRegistrationAsync(array $args = [])
 */
class TaxSettingsClient extends AwsClient {}
