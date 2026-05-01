<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ACMPCA;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager Private Certificate Authority** service.
 * @method \R2Offload\Vendor\Aws\Result createCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCertificateAuthorityAuditReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCertificateAuthorityAuditReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePermission(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePermissionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCertificateAuthorityAuditReport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCertificateAuthorityAuditReportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCertificateAuthorityCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCertificateAuthorityCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCertificateAuthorityCsr(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCertificateAuthorityCsrAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importCertificateAuthorityCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importCertificateAuthorityCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result issueCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise issueCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCertificateAuthorities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCertificateAuthoritiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPermissions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokeCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokeCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagCertificateAuthorityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCertificateAuthority(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCertificateAuthorityAsync(array $args = [])
 */
class ACMPCAClient extends AwsClient {}
