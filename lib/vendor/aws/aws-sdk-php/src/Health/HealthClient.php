<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Health;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Health APIs and Notifications** service.
 * @method \R2Offload\Vendor\Aws\Result describeAffectedAccountsForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAffectedAccountsForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAffectedEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAffectedEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeAffectedEntitiesForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAffectedEntitiesForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEntityAggregates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEntityAggregatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEntityAggregatesForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEntityAggregatesForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventAggregates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventAggregatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventDetailsForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventDetailsForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventsForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventsForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHealthServiceStatusForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHealthServiceStatusForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableHealthServiceAccessForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableHealthServiceAccessForOrganizationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableHealthServiceAccessForOrganization(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableHealthServiceAccessForOrganizationAsync(array $args = [])
 */
class HealthClient extends AwsClient {}
