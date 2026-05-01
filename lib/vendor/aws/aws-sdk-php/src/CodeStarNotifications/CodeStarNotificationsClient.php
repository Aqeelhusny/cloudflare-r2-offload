<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeStarNotifications;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeStar Notifications** service.
 * @method \R2Offload\Vendor\Aws\Result createNotificationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createNotificationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteNotificationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteNotificationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTarget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTargetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeNotificationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeNotificationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEventTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEventTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNotificationRules(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNotificationRulesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTargets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTargetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result subscribe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise subscribeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result unsubscribe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise unsubscribeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateNotificationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateNotificationRuleAsync(array $args = [])
 */
class CodeStarNotificationsClient extends AwsClient {}
