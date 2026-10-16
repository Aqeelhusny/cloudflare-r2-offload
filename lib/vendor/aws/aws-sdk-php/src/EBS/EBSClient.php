<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EBS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Block Store** service.
 * @method \R2Offload\Vendor\Aws\Result completeSnapshot(array $args = [])
 * @phpstan-method \Aws\Result completeSnapshot(array{
 *     SnapshotId?: string,
 *     ChangedBlocksCount?: int,
 *     Checksum?: string,
 *     ChecksumAlgorithm?: 'SHA256',
 *     ChecksumAggregationMethod?: 'LINEAR',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise completeSnapshotAsync(array{
 *     SnapshotId?: string,
 *     ChangedBlocksCount?: int,
 *     Checksum?: string,
 *     ChecksumAlgorithm?: 'SHA256',
 *     ChecksumAggregationMethod?: 'LINEAR',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSnapshotBlock(array $args = [])
 * @phpstan-method \Aws\Result getSnapshotBlock(array{SnapshotId?: string, BlockIndex?: int, BlockToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSnapshotBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSnapshotBlockAsync(array{SnapshotId?: string, BlockIndex?: int, BlockToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChangedBlocks(array $args = [])
 * @phpstan-method \Aws\Result listChangedBlocks(array{
 *     FirstSnapshotId?: string,
 *     SecondSnapshotId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartingBlockIndex?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChangedBlocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChangedBlocksAsync(array{
 *     FirstSnapshotId?: string,
 *     SecondSnapshotId?: string,
 *     NextToken?: string,
 *     MaxResults?: int,
 *     StartingBlockIndex?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSnapshotBlocks(array $args = [])
 * @phpstan-method \Aws\Result listSnapshotBlocks(array{SnapshotId?: string, NextToken?: string, MaxResults?: int, StartingBlockIndex?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSnapshotBlocksAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSnapshotBlocksAsync(array{SnapshotId?: string, NextToken?: string, MaxResults?: int, StartingBlockIndex?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSnapshotBlock(array $args = [])
 * @phpstan-method \Aws\Result putSnapshotBlock(array{
 *     SnapshotId?: string,
 *     BlockIndex?: int,
 *     BlockData?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     DataLength?: int,
 *     Progress?: int,
 *     Checksum?: string,
 *     ChecksumAlgorithm?: 'SHA256',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSnapshotBlockAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putSnapshotBlockAsync(array{
 *     SnapshotId?: string,
 *     BlockIndex?: int,
 *     BlockData?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     DataLength?: int,
 *     Progress?: int,
 *     Checksum?: string,
 *     ChecksumAlgorithm?: 'SHA256',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSnapshot(array $args = [])
 * @phpstan-method \Aws\Result startSnapshot(array{
 *     VolumeSize?: int,
 *     ParentSnapshotId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Description?: string,
 *     ClientToken?: string,
 *     Encrypted?: bool,
 *     KmsKeyArn?: string,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSnapshotAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSnapshotAsync(array{
 *     VolumeSize?: int,
 *     ParentSnapshotId?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     Description?: string,
 *     ClientToken?: string,
 *     Encrypted?: bool,
 *     KmsKeyArn?: string,
 *     Timeout?: int,
 *     ...,
 * } $args = [])
 */
class EBSClient extends AwsClient {}
