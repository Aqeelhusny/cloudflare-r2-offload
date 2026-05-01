<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EBS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Block Store** service.
 * @method \R2Offload\Vendor\Aws\Result completeSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSnapshotBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSnapshotBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChangedBlocks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChangedBlocksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSnapshotBlocks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSnapshotBlocksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSnapshotBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSnapshotBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSnapshotAsync(array $args = [])
 */
class EBSClient extends AwsClient {}
