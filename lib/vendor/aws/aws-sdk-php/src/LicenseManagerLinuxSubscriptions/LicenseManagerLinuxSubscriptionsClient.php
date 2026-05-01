<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LicenseManagerLinuxSubscriptions;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS License Manager Linux Subscriptions** service.
 * @method \R2Offload\Vendor\Aws\Result deregisterSubscriptionProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterSubscriptionProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRegisteredSubscriptionProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRegisteredSubscriptionProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceSettingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLinuxSubscriptionInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLinuxSubscriptionInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLinuxSubscriptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLinuxSubscriptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRegisteredSubscriptionProviders(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRegisteredSubscriptionProvidersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result registerSubscriptionProvider(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerSubscriptionProviderAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateServiceSettings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateServiceSettingsAsync(array $args = [])
 */
class LicenseManagerLinuxSubscriptionsClient extends AwsClient {}
