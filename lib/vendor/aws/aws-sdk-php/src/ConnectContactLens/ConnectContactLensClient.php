<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ConnectContactLens;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Contact Lens** service.
 * @method \R2Offload\Vendor\Aws\Result listRealtimeContactAnalysisSegments(array $args = [])
 * @phpstan-method \Aws\Result listRealtimeContactAnalysisSegments(array{InstanceId?: string, ContactId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRealtimeContactAnalysisSegmentsAsync(array{InstanceId?: string, ContactId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 */
class ConnectContactLensClient extends AwsClient {}
