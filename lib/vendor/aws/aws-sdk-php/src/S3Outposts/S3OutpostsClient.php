<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3Outposts;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon S3 on Outposts** service.
 * @method \R2Offload\Vendor\Aws\Result createEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listOutpostsWithS3(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listOutpostsWithS3Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSharedEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSharedEndpointsAsync(array $args = [])
 */
class S3OutpostsClient extends AwsClient {}
