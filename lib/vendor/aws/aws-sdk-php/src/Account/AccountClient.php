<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Account;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Account** service.
 * @method \R2Offload\Vendor\Aws\Result acceptPrimaryEmailUpdate(array $args = [])
 * @phpstan-method \Aws\Result acceptPrimaryEmailUpdate(array{AccountId?: string, PrimaryEmail?: string, Otp?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptPrimaryEmailUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptPrimaryEmailUpdateAsync(array{AccountId?: string, PrimaryEmail?: string, Otp?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result deleteAlternateContact(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAlternateContactAsync(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableRegion(array $args = [])
 * @phpstan-method \Aws\Result disableRegion(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disableRegionAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableRegion(array $args = [])
 * @phpstan-method \Aws\Result enableRegion(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise enableRegionAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountInformation(array $args = [])
 * @phpstan-method \Aws\Result getAccountInformation(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccountInformationAsync(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result getAlternateContact(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAlternateContactAsync(array{AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY', AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getContactInformation(array $args = [])
 * @phpstan-method \Aws\Result getContactInformation(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getContactInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getContactInformationAsync(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGovCloudAccountInformation(array $args = [])
 * @phpstan-method \Aws\Result getGovCloudAccountInformation(array{StandardAccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGovCloudAccountInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getGovCloudAccountInformationAsync(array{StandardAccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPrimaryEmail(array $args = [])
 * @phpstan-method \Aws\Result getPrimaryEmail(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPrimaryEmailAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrimaryEmailAsync(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPrimaryEmailUpdateStatus(array $args = [])
 * @phpstan-method \Aws\Result getPrimaryEmailUpdateStatus(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPrimaryEmailUpdateStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPrimaryEmailUpdateStatusAsync(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRegionOptStatus(array $args = [])
 * @phpstan-method \Aws\Result getRegionOptStatus(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRegionOptStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRegionOptStatusAsync(array{AccountId?: string, RegionName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRegions(array $args = [])
 * @phpstan-method \Aws\Result listRegions(array{
 *     AccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RegionOptStatusContains?: list<'DISABLED'|'DISABLING'|'ENABLED'|'ENABLED_BY_DEFAULT'|'ENABLING'>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRegionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRegionsAsync(array{
 *     AccountId?: string,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     RegionOptStatusContains?: list<'DISABLED'|'DISABLING'|'ENABLED'|'ENABLED_BY_DEFAULT'|'ENABLING'>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAccountName(array $args = [])
 * @phpstan-method \Aws\Result putAccountName(array{AccountName?: string, AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAccountNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAccountNameAsync(array{AccountName?: string, AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putAlternateContact(array $args = [])
 * @phpstan-method \Aws\Result putAlternateContact(array{
 *     Name?: string,
 *     Title?: string,
 *     EmailAddress?: string,
 *     PhoneNumber?: string,
 *     AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAlternateContactAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAlternateContactAsync(array{
 *     Name?: string,
 *     Title?: string,
 *     EmailAddress?: string,
 *     PhoneNumber?: string,
 *     AlternateContactType?: 'BILLING'|'OPERATIONS'|'SECURITY',
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putContactInformation(array $args = [])
 * @phpstan-method \Aws\Result putContactInformation(array{
 *     ContactInformation?: array{
 *         FullName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         PhoneNumber?: string,
 *         CompanyName?: string,
 *         WebsiteUrl?: string,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putContactInformationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putContactInformationAsync(array{
 *     ContactInformation?: array{
 *         FullName?: string,
 *         AddressLine1?: string,
 *         AddressLine2?: string,
 *         AddressLine3?: string,
 *         City?: string,
 *         StateOrRegion?: string,
 *         DistrictOrCounty?: string,
 *         PostalCode?: string,
 *         CountryCode?: string,
 *         PhoneNumber?: string,
 *         CompanyName?: string,
 *         WebsiteUrl?: string,
 *         ...,
 *     },
 *     AccountId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendPhoneNumberVerification(array $args = [])
 * @phpstan-method \Aws\Result sendPhoneNumberVerification(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendPhoneNumberVerificationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendPhoneNumberVerificationAsync(array{AccountId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPrimaryEmailUpdate(array $args = [])
 * @phpstan-method \Aws\Result startPrimaryEmailUpdate(array{AccountId?: string, PrimaryEmail?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPrimaryEmailUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPrimaryEmailUpdateAsync(array{AccountId?: string, PrimaryEmail?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result verifyPhoneNumber(array $args = [])
 * @phpstan-method \Aws\Result verifyPhoneNumber(array{AccountId?: string, Otp?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise verifyPhoneNumberAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise verifyPhoneNumberAsync(array{AccountId?: string, Otp?: string, ...} $args = [])
 */
class AccountClient extends AwsClient {}
