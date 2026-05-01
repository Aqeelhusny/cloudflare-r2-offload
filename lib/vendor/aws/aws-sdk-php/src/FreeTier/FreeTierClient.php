<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\FreeTier;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Free Tier** service.
 * @method \R2Offload\Vendor\Aws\Result getAccountActivity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountActivityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccountPlanState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccountPlanStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFreeTierUsage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFreeTierUsageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccountActivities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccountActivitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result upgradeAccountPlan(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise upgradeAccountPlanAsync(array $args = [])
 */
class FreeTierClient extends AwsClient {}
