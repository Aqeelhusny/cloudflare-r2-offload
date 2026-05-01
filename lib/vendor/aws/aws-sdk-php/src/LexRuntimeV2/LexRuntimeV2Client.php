<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\LexRuntimeV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Runtime V2** service.
 * @method \R2Offload\Vendor\Aws\Result deleteSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result recognizeText(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise recognizeTextAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result recognizeUtterance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise recognizeUtteranceAsync(array $args = [])
 */
class LexRuntimeV2Client extends AwsClient {}
