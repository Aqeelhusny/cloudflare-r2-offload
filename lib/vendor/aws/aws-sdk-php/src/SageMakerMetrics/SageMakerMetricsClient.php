<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SageMakerMetrics;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon SageMaker Metrics Service** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetMetricsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchPutMetrics(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchPutMetricsAsync(array $args = [])
 */
class SageMakerMetricsClient extends AwsClient {}
