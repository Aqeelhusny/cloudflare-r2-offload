<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Invoicing;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Invoicing** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetInvoiceProfile(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetInvoiceProfileAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createInvoiceUnit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInvoiceUnitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProcurementPortalPreference(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProcurementPortalPreferenceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInvoiceUnit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInvoiceUnitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProcurementPortalPreference(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProcurementPortalPreferenceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvoicePDF(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvoicePDFAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInvoiceUnit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInvoiceUnitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProcurementPortalPreference(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProcurementPortalPreferenceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvoiceSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvoiceSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvoiceUnits(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvoiceUnitsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProcurementPortalPreferences(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProcurementPortalPreferencesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putProcurementPortalPreference(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putProcurementPortalPreferenceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateInvoiceUnit(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateInvoiceUnitAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProcurementPortalPreferenceStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProcurementPortalPreferenceStatusAsync(array $args = [])
 */
class InvoicingClient extends AwsClient {}
