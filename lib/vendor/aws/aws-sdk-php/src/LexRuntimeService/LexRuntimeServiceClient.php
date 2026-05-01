<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LexRuntimeService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Runtime Service** service.
 * @method \R2Offload\Vendor\Aws\Result deleteSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result postContent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise postContentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result postText(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise postTextAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSessionAsync(array $args = [])
 */
class LexRuntimeServiceClient extends AwsClient {}
