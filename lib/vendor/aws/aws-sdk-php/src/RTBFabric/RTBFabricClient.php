<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\RTBFabric;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **RTBFabric** service.
 * @method \R2Offload\Vendor\Aws\Result acceptLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createInboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createInboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createOutboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOutboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRequesterGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRequesterGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createResponderGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createResponderGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteOutboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOutboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRequesterGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRequesterGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResponderGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResponderGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getOutboundExternalLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getOutboundExternalLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRequesterGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRequesterGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResponderGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResponderGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLinks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLinksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRequesterGateways(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRequesterGatewaysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listResponderGateways(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listResponderGatewaysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateLinkModuleFlow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateLinkModuleFlowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRequesterGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRequesterGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateResponderGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateResponderGatewayAsync(array $args = [])
 */
class RTBFabricClient extends AwsClient {}
