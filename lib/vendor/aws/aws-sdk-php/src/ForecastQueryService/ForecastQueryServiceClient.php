<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ForecastQueryService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Forecast Query Service** service.
 * @method \R2Offload\Vendor\Aws\Result queryForecast(array $args = [])
 * @phpstan-method \Aws\Result queryForecast(array{
 *     ForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise queryForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryForecastAsync(array{
 *     ForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result queryWhatIfForecast(array $args = [])
 * @phpstan-method \Aws\Result queryWhatIfForecast(array{
 *     WhatIfForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise queryWhatIfForecastAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise queryWhatIfForecastAsync(array{
 *     WhatIfForecastArn?: string,
 *     StartDate?: string,
 *     EndDate?: string,
 *     Filters?: array<string, string>,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 */
class ForecastQueryServiceClient extends AwsClient {}
