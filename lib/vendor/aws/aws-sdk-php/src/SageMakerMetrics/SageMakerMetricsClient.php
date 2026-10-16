<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SageMakerMetrics;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Metrics Service** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetMetrics(array $args = [])
 * @phpstan-method \Aws\Result batchGetMetrics(array{
 *     MetricQueries?: list<array{
 *         MetricName?: string,
 *         ResourceArn?: string,
 *         MetricStat?: 'Avg'|'Count'|'Last'|'Max'|'Min'|'StdDev',
 *         Period?: 'FiveMinute'|'IterationNumber'|'OneHour'|'OneMinute',
 *         XAxisType?: 'IterationNumber'|'Timestamp',
 *         Start?: int,
 *         End?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetMetricsAsync(array{
 *     MetricQueries?: list<array{
 *         MetricName?: string,
 *         ResourceArn?: string,
 *         MetricStat?: 'Avg'|'Count'|'Last'|'Max'|'Min'|'StdDev',
 *         Period?: 'FiveMinute'|'IterationNumber'|'OneHour'|'OneMinute',
 *         XAxisType?: 'IterationNumber'|'Timestamp',
 *         Start?: int,
 *         End?: int,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchPutMetrics(array $args = [])
 * @phpstan-method \Aws\Result batchPutMetrics(array{
 *     TrialComponentName?: string,
 *     MetricData?: list<array{MetricName?: string, Timestamp?: int|string|\DateTimeInterface, Step?: int, Value?: float, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchPutMetricsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchPutMetricsAsync(array{
 *     TrialComponentName?: string,
 *     MetricData?: list<array{MetricName?: string, Timestamp?: int|string|\DateTimeInterface, Step?: int, Value?: float, ...}>,
 *     ...,
 * } $args = [])
 */
class SageMakerMetricsClient extends AwsClient {}
