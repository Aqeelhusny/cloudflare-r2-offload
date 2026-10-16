<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\WorkMailMessageFlow;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkMail Message Flow** service.
 * @method \R2Offload\Vendor\Aws\Result getRawMessageContent(array $args = [])
 * @phpstan-method \Aws\Result getRawMessageContent(array{messageId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRawMessageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRawMessageContentAsync(array{messageId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRawMessageContent(array $args = [])
 * @phpstan-method \Aws\Result putRawMessageContent(array{
 *     messageId?: string,
 *     content?: array{s3Reference?: array{bucket?: string, key?: string, objectVersion?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRawMessageContentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRawMessageContentAsync(array{
 *     messageId?: string,
 *     content?: array{s3Reference?: array{bucket?: string, key?: string, objectVersion?: string, ...}, ...},
 *     ...,
 * } $args = [])
 */
class WorkMailMessageFlowClient extends AwsClient {}
