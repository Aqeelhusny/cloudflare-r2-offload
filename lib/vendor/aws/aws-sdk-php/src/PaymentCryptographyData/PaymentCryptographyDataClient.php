<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PaymentCryptographyData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Payment Cryptography Data Plane** service.
 * @method \R2Offload\Vendor\Aws\Result decryptData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise decryptDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result encryptData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise encryptDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateAs2805KekValidation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateAs2805KekValidationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateCardValidationData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateCardValidationDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateMac(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateMacAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateMacEmvPinChange(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateMacEmvPinChangeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result generatePinData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generatePinDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result reEncryptData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise reEncryptDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result translateKeyMaterial(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translateKeyMaterialAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result translatePinData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translatePinDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result verifyAuthRequestCryptogram(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyAuthRequestCryptogramAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result verifyCardValidationData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyCardValidationDataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result verifyMac(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyMacAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result verifyPinData(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyPinDataAsync(array $args = [])
 */
class PaymentCryptographyDataClient extends AwsClient {}
