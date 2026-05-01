<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\OAM;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **CloudWatch Observability Access Manager** service.
 * @method \R2Offload\Vendor\Aws\Result createLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSinkPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSinkPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttachedLinks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttachedLinksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLinks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLinksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSinks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSinksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSinkPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSinkPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 */
class OAMClient extends AwsClient {}
