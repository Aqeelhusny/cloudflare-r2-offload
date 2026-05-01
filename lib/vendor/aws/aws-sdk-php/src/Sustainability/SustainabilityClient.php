<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Sustainability;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Sustainability** service.
 * @method \R2Offload\Vendor\Aws\Result getEstimatedCarbonEmissions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEstimatedCarbonEmissionsDimensionValues(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsDimensionValuesAsync(array $args = [])
 */
class SustainabilityClient extends AwsClient {}
