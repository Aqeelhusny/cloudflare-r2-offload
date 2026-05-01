<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudControlApi;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Cloud Control API** service.
 * @method \R2Offload\Vendor\Aws\Result cancelResourceRequest(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelResourceRequestAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceRequestStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceRequestStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResourceRequests(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourceRequestsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateResourceAsync(array $args = [])
 */
class CloudControlApiClient extends AwsClient {}
