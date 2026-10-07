<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SageMakerRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Runtime** service.
 * @method \R2Offload\Vendor\Aws\Result invokeEndpoint(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpoint(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetModel?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     EnableExplanations?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     PrefixAwareId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointAsync(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetModel?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     EnableExplanations?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     PrefixAwareId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeEndpointAsync(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpointAsync(array{
 *     EndpointName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeEndpointAsyncAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointAsyncAsync(array{
 *     EndpointName?: string,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     InferenceId?: string,
 *     InputLocation?: string,
 *     S3OutputPathExtension?: string,
 *     Filename?: string,
 *     RequestTTLSeconds?: int,
 *     InvocationTimeoutSeconds?: int,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeEndpointWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result invokeEndpointWithResponseStream(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     PrefixAwareId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeEndpointWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise invokeEndpointWithResponseStreamAsync(array{
 *     EndpointName?: string,
 *     Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     ContentType?: string,
 *     Accept?: string,
 *     CustomAttributes?: string,
 *     TargetVariant?: string,
 *     TargetContainerHostname?: string,
 *     InferenceId?: string,
 *     InferenceComponentName?: string,
 *     SessionId?: string,
 *     PrefixAwareId?: string,
 *     ...,
 * } $args = [])
 */
class SageMakerRuntimeClient extends AwsClient {}
