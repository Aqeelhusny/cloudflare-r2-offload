<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PaymentCryptography;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Payment Cryptography Control Plane** service.
 * @method \R2Offload\Vendor\Aws\Result addKeyReplicationRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addKeyReplicationRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableDefaultKeyReplicationRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableDefaultKeyReplicationRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableDefaultKeyReplicationRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableDefaultKeyReplicationRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAliasAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCertificateSigningRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCertificateSigningRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDefaultKeyReplicationRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDefaultKeyReplicationRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getParametersForExport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getParametersForExportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getParametersForImport(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getParametersForImportAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPublicKeyCertificate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPublicKeyCertificateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAliases(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listKeys(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeKeyReplicationRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeKeyReplicationRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startKeyUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startKeyUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopKeyUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopKeyUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAlias(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 */
class PaymentCryptographyClient extends AwsClient {}
