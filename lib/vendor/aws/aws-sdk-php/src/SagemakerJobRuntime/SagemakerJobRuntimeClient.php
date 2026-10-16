<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SagemakerJobRuntime;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Sagemaker Job Runtime Service** service.
 * @method \R2Offload\Vendor\Aws\Result completeRollout(array $args = [])
 * @phpstan-method \Aws\Result completeRollout(array{JobArn?: string, TrajectoryId?: string, Status?: 'failed'|'ready', ClientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeRolloutAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeRolloutAsync(array{JobArn?: string, TrajectoryId?: string, Status?: 'failed'|'ready', ClientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sample(array $args = [])
 * @phpstan-method \Aws\Result sample(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sampleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleAsync(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sampleWithResponseStream(array $args = [])
 * @phpstan-method \Aws\Result sampleWithResponseStream(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sampleWithResponseStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sampleWithResponseStreamAsync(array{JobArn?: string, TrajectoryId?: string, Body?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateReward(array $args = [])
 * @phpstan-method \Aws\Result updateReward(array{JobArn?: string, TrajectoryId?: string, Rewards?: list<float>, ClientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRewardAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRewardAsync(array{JobArn?: string, TrajectoryId?: string, Rewards?: list<float>, ClientToken?: string, ...} $args = [])
 */
class SagemakerJobRuntimeClient extends AwsClient {}
