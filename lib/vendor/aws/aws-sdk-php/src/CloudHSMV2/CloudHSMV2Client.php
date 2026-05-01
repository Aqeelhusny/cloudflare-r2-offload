<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudHSMV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudHSM V2** service.
 * @method \R2Offload\Vendor\Aws\Result copyBackupToRegion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyBackupToRegionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBackup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBackupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBackups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBackupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result initializeCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise initializeClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyBackupAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyBackupAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreBackup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreBackupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class CloudHSMV2Client extends AwsClient {}
