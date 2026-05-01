<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ChimeSDKMeetings;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime SDK Meetings** service.
 * @method \R2Offload\Vendor\Aws\Result batchCreateAttendee(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchCreateAttendeeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchUpdateAttendeeCapabilitiesExcept(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchUpdateAttendeeCapabilitiesExceptAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAttendee(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAttendeeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMeeting(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMeetingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMeetingWithAttendees(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMeetingWithAttendeesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAttendee(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAttendeeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMeeting(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMeetingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAttendee(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAttendeeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMeeting(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMeetingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttendees(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttendeesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startMeetingTranscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startMeetingTranscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopMeetingTranscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopMeetingTranscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAttendeeCapabilities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAttendeeCapabilitiesAsync(array $args = [])
 */
class ChimeSDKMeetingsClient extends AwsClient {}
