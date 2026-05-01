<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceAgreement;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Agreement Service** service.
 * @method \R2Offload\Vendor\Aws\Result batchCreateBillingAdjustmentRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCreateBillingAdjustmentRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelAgreementCancellationRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelAgreementCancellationRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelAgreementPaymentRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelAgreementPaymentRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAgreement(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAgreementAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAgreementCancellationRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAgreementCancellationRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAgreementPaymentRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAgreementPaymentRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAgreementTerms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAgreementTermsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBillingAdjustmentRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBillingAdjustmentRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAgreementCancellationRequests(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAgreementCancellationRequestsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAgreementInvoiceLineItems(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAgreementInvoiceLineItemsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAgreementPaymentRequests(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAgreementPaymentRequestsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBillingAdjustmentRequests(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBillingAdjustmentRequestsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchAgreements(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchAgreementsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendAgreementCancellationRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendAgreementCancellationRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendAgreementPaymentRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendAgreementPaymentRequestAsync(array $args = [])
 */
class MarketplaceAgreementClient extends AwsClient {}
