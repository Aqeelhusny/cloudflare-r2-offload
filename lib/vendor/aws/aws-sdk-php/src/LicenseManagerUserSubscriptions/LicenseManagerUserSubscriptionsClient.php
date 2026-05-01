<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LicenseManagerUserSubscriptions;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS License Manager User Subscriptions** service.
 * @method \R2Offload\Vendor\Aws\Result associateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLicenseServerEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLicenseServerEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLicenseServerEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLicenseServerEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterIdentityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterIdentityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdentityProviders(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdentityProvidersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLicenseServerEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLicenseServerEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProductSubscriptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProductSubscriptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUserAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUserAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerIdentityProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerIdentityProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startProductSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startProductSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopProductSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopProductSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateIdentityProviderSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateIdentityProviderSettingsAsync(array $args = [])
 */
class LicenseManagerUserSubscriptionsClient extends AwsClient {}
