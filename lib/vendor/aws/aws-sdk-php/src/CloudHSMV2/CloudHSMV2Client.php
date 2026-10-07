<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudHSMV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CloudHSM V2** service.
 * @method \R2Offload\Vendor\Aws\Result copyBackupToRegion(array $args = [])
 * @phpstan-method \Aws\Result copyBackupToRegion(array{
 *     DestinationRegion?: string,
 *     BackupId?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyBackupToRegionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyBackupToRegionAsync(array{
 *     DestinationRegion?: string,
 *     BackupId?: string,
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createCluster(array $args = [])
 * @phpstan-method \Aws\Result createCluster(array{
 *     BackupRetentionPolicy?: array{Type?: 'DAYS', Value?: string, ...},
 *     HsmType?: string,
 *     SourceBackupId?: string,
 *     SubnetIds?: list<string>,
 *     NetworkType?: 'DUALSTACK'|'IPV4',
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     Mode?: 'FIPS'|'NON_FIPS',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createClusterAsync(array{
 *     BackupRetentionPolicy?: array{Type?: 'DAYS', Value?: string, ...},
 *     HsmType?: string,
 *     SourceBackupId?: string,
 *     SubnetIds?: list<string>,
 *     NetworkType?: 'DUALSTACK'|'IPV4',
 *     TagList?: list<array{Key?: string, Value?: string, ...}>,
 *     Mode?: 'FIPS'|'NON_FIPS',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHsm(array $args = [])
 * @phpstan-method \Aws\Result createHsm(array{ClusterId?: string, AvailabilityZone?: string, IpAddress?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createHsmAsync(array{ClusterId?: string, AvailabilityZone?: string, IpAddress?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBackup(array $args = [])
 * @phpstan-method \Aws\Result deleteBackup(array{BackupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteBackupAsync(array{BackupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCluster(array $args = [])
 * @phpstan-method \Aws\Result deleteCluster(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteClusterAsync(array{ClusterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHsm(array $args = [])
 * @phpstan-method \Aws\Result deleteHsm(array{ClusterId?: string, HsmId?: string, EniId?: string, EniIp?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteHsmAsync(array{ClusterId?: string, HsmId?: string, EniId?: string, EniIp?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBackups(array $args = [])
 * @phpstan-method \Aws\Result describeBackups(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array<string, list<string>>,
 *     Shared?: bool,
 *     SortAscending?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBackupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeBackupsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filters?: array<string, list<string>>,
 *     Shared?: bool,
 *     SortAscending?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeClusters(array $args = [])
 * @phpstan-method \Aws\Result describeClusters(array{Filters?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeClustersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeClustersAsync(array{Filters?: array<string, list<string>>, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result initializeCluster(array $args = [])
 * @phpstan-method \Aws\Result initializeCluster(array{ClusterId?: string, SignedCert?: string, TrustAnchor?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise initializeClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise initializeClusterAsync(array{ClusterId?: string, SignedCert?: string, TrustAnchor?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @phpstan-method \Aws\Result listTags(array{ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsAsync(array{ResourceId?: string, NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyBackupAttributes(array $args = [])
 * @phpstan-method \Aws\Result modifyBackupAttributes(array{BackupId?: string, NeverExpires?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyBackupAttributesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyBackupAttributesAsync(array{BackupId?: string, NeverExpires?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyCluster(array $args = [])
 * @phpstan-method \Aws\Result modifyCluster(array{
 *     HsmType?: string,
 *     BackupRetentionPolicy?: array{Type?: 'DAYS', Value?: string, ...},
 *     ClusterId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyClusterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise modifyClusterAsync(array{
 *     HsmType?: string,
 *     BackupRetentionPolicy?: array{Type?: 'DAYS', Value?: string, ...},
 *     ClusterId?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreBackup(array $args = [])
 * @phpstan-method \Aws\Result restoreBackup(array{BackupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreBackupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise restoreBackupAsync(array{BackupId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceId?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceId?: string, TagList?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceId?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceId?: string, TagKeyList?: list<string>, ...} $args = [])
 */
class CloudHSMV2Client extends AwsClient {}
