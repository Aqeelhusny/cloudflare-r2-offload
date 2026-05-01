<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Account;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Account** service.
 * @method \R2Offload\Vendor\Aws\Result acceptPrimaryEmailUpdate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptPrimaryEmailUpdateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAlternateContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAlternateContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountInformation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountInformationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAlternateContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAlternateContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getContactInformation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getContactInformationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGovCloudAccountInformation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGovCloudAccountInformationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPrimaryEmail(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPrimaryEmailAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRegionOptStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRegionOptStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAlternateContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAlternateContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putContactInformation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putContactInformationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPrimaryEmailUpdate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPrimaryEmailUpdateAsync(array $args = [])
 */
class AccountClient extends AwsClient {}
