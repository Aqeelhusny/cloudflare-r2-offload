<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Pipes;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon EventBridge Pipes** service.
 * @method \R2Offload\Vendor\Aws\Result createPipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePipeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPipeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopPipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopPipeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePipe(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePipeAsync(array $args = [])
 */
class PipesClient extends AwsClient {}
