<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\NotificationsContacts;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS User Notifications Contacts** service.
 * @method \R2Offload\Vendor\Aws\Result activateEmailContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise activateEmailContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEmailContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEmailContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEmailContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEmailContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEmailContact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEmailContactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEmailContacts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEmailContactsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendActivationCode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendActivationCodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class NotificationsContactsClient extends AwsClient {}
