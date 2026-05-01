<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ConnectHealth;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Connect Health** service.
 * @method \R2Offload\Vendor\Aws\Result activateSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise activateSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deactivateSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deactivateSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMedicalScribeListeningSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMedicalScribeListeningSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPatientInsightsJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPatientInsightsJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubscriptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubscriptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPatientInsightsJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPatientInsightsJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class ConnectHealthClient extends AwsClient {}
