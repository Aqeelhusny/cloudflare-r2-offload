<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BedrockDataAutomationRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Runtime for Amazon Bedrock Data Automation** service.
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationStatus(array $args = [])
 * @phpstan-method \Aws\Result getDataAutomationStatus(array{invocationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataAutomationStatusAsync(array{invocationArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeDataAutomation(array $args = [])
 * @phpstan-method \Aws\Result invokeDataAutomation(array{
 *     inputConfiguration?: array{bytes?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeDataAutomationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeDataAutomationAsync(array{
 *     inputConfiguration?: array{bytes?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeDataAutomationAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeDataAutomationAsync(array{
 *     clientToken?: string,
 *     inputConfiguration?: array{s3Uri?: string, assetProcessingConfiguration?: array{video?: array, ...}, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeDataAutomationAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeDataAutomationAsyncAsync(array{
 *     clientToken?: string,
 *     inputConfiguration?: array{s3Uri?: string, assetProcessingConfiguration?: array{video?: array, ...}, ...},
 *     outputConfiguration?: array{s3Uri?: string, ...},
 *     dataAutomationConfiguration?: array{dataAutomationProjectArn?: string, stage?: 'DEVELOPMENT'|'LIVE', ...},
 *     encryptionConfiguration?: array{kmsKeyId?: string, kmsEncryptionContext?: array<string, string>, ...},
 *     notificationConfiguration?: array{eventBridgeConfiguration?: array{eventBridgeEnabled?: bool, ...}, ...},
 *     blueprints?: list<array{blueprintArn?: string, version?: string, stage?: 'DEVELOPMENT'|'LIVE', ...}>,
 *     dataAutomationProfileArn?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceARN?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceARN?: string, tagKeys?: list<string>, ...} $args = [])
 */
class BedrockDataAutomationRuntimeClient extends AwsClient {}
