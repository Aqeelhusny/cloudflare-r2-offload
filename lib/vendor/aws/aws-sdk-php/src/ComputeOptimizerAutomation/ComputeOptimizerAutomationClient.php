<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ComputeOptimizerAutomation;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Compute Optimizer Automation** service.
 * @method \R2Offload\Vendor\Aws\Result associateAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAutomationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAutomationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAutomationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAutomationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAutomationEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAutomationEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAutomationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAutomationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnrollmentConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnrollmentConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationEventSteps(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationEventStepsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationEventSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationEventSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationRulePreview(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationRulePreviewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationRulePreviewSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationRulePreviewSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAutomationRules(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAutomationRulesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendedActionSummaries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendedActionSummariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRecommendedActions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRecommendedActionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rollbackAutomationEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rollbackAutomationEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAutomationEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAutomationEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAutomationRule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAutomationRuleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnrollmentConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnrollmentConfigurationAsync(array $args = [])
 */
class ComputeOptimizerAutomationClient extends AwsClient {}
