<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Acm;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager** service.
 *
 * @method \R2Offload\Vendor\Aws\Result addTagsToCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsToCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCertificates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTagsFromCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsFromCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result renewCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise renewCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result requestCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise requestCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resendValidationEmail(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resendValidationEmailAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokeCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokeCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchCertificates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchCertificatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCertificateOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCertificateOptionsAsync(array $args = [])
 */
class AcmClient extends AwsClient {}
