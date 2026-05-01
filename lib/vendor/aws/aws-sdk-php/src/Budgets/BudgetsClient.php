<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Budgets;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Budgets** service.
 * @method \R2Offload\Vendor\Aws\Result createBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBudgetAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBudgetActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSubscriber(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSubscriberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBudgetAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBudgetActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSubscriber(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSubscriberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetActionHistories(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetActionHistoriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetActionsForAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetActionsForAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetActionsForBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetActionsForBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetNotificationsForAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetNotificationsForAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgetPerformanceHistory(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetPerformanceHistoryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBudgets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBudgetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeNotificationsForBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeNotificationsForBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSubscribersForNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSubscribersForNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result executeBudgetAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise executeBudgetActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBudget(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBudgetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBudgetAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBudgetActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSubscriber(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSubscriberAsync(array $args = [])
 */
class BudgetsClient extends AwsClient {}
