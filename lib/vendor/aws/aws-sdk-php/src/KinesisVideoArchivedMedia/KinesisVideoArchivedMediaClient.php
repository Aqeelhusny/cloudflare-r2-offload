<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideoArchivedMedia;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams Archived Media** service.
 * @method \R2Offload\Vendor\Aws\Result getClip(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getClipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDASHStreamingSessionURL(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDASHStreamingSessionURLAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHLSStreamingSessionURL(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHLSStreamingSessionURLAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getImages(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getImagesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMediaForFragmentList(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMediaForFragmentListAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFragments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFragmentsAsync(array $args = [])
 */
class KinesisVideoArchivedMediaClient extends AwsClient {}
