<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ConnectParticipant;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Connect Participant Service** service.
 * @method \R2Offload\Vendor\Aws\Result cancelParticipantAuthentication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelParticipantAuthenticationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result completeAttachmentUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeAttachmentUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createParticipantConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createParticipantConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disconnectParticipant(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disconnectParticipantAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAttachment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAttachmentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAuthenticationUrl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAuthenticationUrlAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTranscript(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTranscriptAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendEvent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendEventAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startAttachmentUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startAttachmentUploadAsync(array $args = [])
 */
class ConnectParticipantClient extends AwsClient {}
