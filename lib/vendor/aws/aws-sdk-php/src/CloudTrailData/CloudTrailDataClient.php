<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudTrailData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail Data Service** service.
 * @method \R2Offload\Vendor\Aws\Result putAuditEvents(array $args = [])
 * @phpstan-method \Aws\Result putAuditEvents(array{
 *     auditEvents?: list<array{eventData?: string, eventDataChecksum?: string, id?: string, ...}>,
 *     channelArn?: string,
 *     externalId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putAuditEventsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putAuditEventsAsync(array{
 *     auditEvents?: list<array{eventData?: string, eventDataChecksum?: string, id?: string, ...}>,
 *     channelArn?: string,
 *     externalId?: string,
 *     ...,
 * } $args = [])
 */
class CloudTrailDataClient extends AwsClient {}
