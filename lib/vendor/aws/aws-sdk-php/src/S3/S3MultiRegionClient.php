<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3;

use R2Offload\Vendor\Aws\CacheInterface;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Aws\LruArrayCache;
use R2Offload\Vendor\Aws\MultiRegionClient as BaseClient;
use R2Offload\Vendor\Aws\Exception\AwsException;
use R2Offload\Vendor\Aws\S3\Exception\PermanentRedirectException;
use R2Offload\Vendor\GuzzleHttp\Promise;

/**
 * **Amazon Simple Storage Service** multi-region client.
 *
 * @method \R2Offload\Vendor\Aws\Result abortMultipartUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result completeMultipartUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBucketMetadataConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBucketMetadataConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBucketMetadataTableConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBucketMetadataTableConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMultipartUpload(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMultipartUploadAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketAnalyticsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketCors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketCorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketIntelligentTieringConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketInventoryConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketInventoryConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketLifecycle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketLifecycleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketMetadataConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketMetadataConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketMetadataTableConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketMetadataTableConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketMetricsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketMetricsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketOwnershipControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketOwnershipControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBucketWebsite(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBucketWebsiteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteObjectTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteObjectTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteObjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteObjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketAbac(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketAbacAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketAccelerateConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketAccelerateConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketAcl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketAclAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketAnalyticsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketCors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketCorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketIntelligentTieringConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketInventoryConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketInventoryConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketLifecycle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketLifecycleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketLogging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketLoggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketMetadataConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketMetadataConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketMetadataTableConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketMetadataTableConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketMetricsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketMetricsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketNotificationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketNotificationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketOwnershipControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketOwnershipControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketPolicyStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketPolicyStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketRequestPayment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketRequestPaymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketVersioning(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBucketWebsite(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBucketWebsiteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectAcl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectAclAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectLegalHold(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectLegalHoldAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectLockConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectLockConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectRetention(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectRetentionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getObjectTorrent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getObjectTorrentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result headBucket(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise headBucketAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result headObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise headObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBucketAnalyticsConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBucketAnalyticsConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBucketIntelligentTieringConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBucketIntelligentTieringConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBucketInventoryConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBucketInventoryConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBucketMetricsConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBucketMetricsConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBuckets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBucketsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDirectoryBuckets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDirectoryBucketsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMultipartUploads(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listObjectVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listObjectVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listObjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listObjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listObjectsV2(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listObjectsV2Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listParts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPartsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketAbac(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketAbacAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketAccelerateConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketAccelerateConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketAcl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketAclAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketAnalyticsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketCors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketCorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketIntelligentTieringConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketIntelligentTieringConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketInventoryConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketInventoryConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketLifecycle(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketLifecycleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketLogging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketLoggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketMetricsConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketMetricsConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketNotification(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketNotificationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketNotificationConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketNotificationConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketOwnershipControls(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketOwnershipControlsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketPolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketRequestPayment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketRequestPaymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketVersioning(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBucketWebsite(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBucketWebsiteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObjectAcl(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectAclAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObjectLegalHold(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectLegalHoldAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObjectLockConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectLockConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObjectRetention(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectRetentionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putObjectTagging(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putObjectTaggingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPublicAccessBlock(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPublicAccessBlockAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result renameObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise renameObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreObject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreObjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result selectObjectContent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise selectObjectContentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBucketMetadataInventoryTableConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBucketMetadataInventoryTableConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBucketMetadataJournalTableConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBucketMetadataJournalTableConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateObjectEncryption(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateObjectEncryptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result uploadPart(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise uploadPartAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result uploadPartCopy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise uploadPartCopyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result writeGetObjectResponse(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise writeGetObjectResponseAsync(array $args = [])
 */
class S3MultiRegionClient extends BaseClient implements S3ClientInterface
{
    use S3ClientTrait;

    /** @var CacheInterface */
    private $cache;

    public static function getArguments()
    {
        $args = parent::getArguments();
        $regionDef = $args['region'] + ['default' => function (array &$args) {
            $availableRegions = array_keys($args['partition']['regions']);
            return end($availableRegions);
        }];
        unset($args['region']);

        return $args + [
            'bucket_region_cache' => [
                'type' => 'config',
                'valid' => [CacheInterface::class],
                'doc' => 'Cache of regions in which given buckets are located.',
                'default' => function () { return new LruArrayCache; },
            ],
            'region' => $regionDef,
        ];
    }

    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->cache = $this->getConfig('bucket_region_cache');

        $this->getHandlerList()->prependInit(
            $this->determineRegionMiddleware(),
            'determine_region'
        );
    }

    private function determineRegionMiddleware()
    {
        return function (callable $handler) {
            return function (CommandInterface $command) use ($handler) {
                $cacheKey = $this->getCacheKey($command['Bucket']);
                if (
                    empty($command['@region']) &&
                    $region = $this->cache->get($cacheKey)
                ) {
                    $command['@region'] = $region;
                }

                return Promise\Coroutine::of(function () use (
                    $handler,
                    $command,
                    $cacheKey
                ) {
                    try {
                        yield $handler($command);
                    } catch (PermanentRedirectException $e) {
                        if (empty($command['Bucket'])) {
                            throw $e;
                        }
                        $result = $e->getResult();
                        $region = null;
                        if (isset($result['@metadata']['headers']['x-amz-bucket-region'])) {
                            $region = $result['@metadata']['headers']['x-amz-bucket-region'];
                            $this->cache->set($cacheKey, $region);
                        } else {
                            $region = (yield $this->determineBucketRegionAsync(
                                $command['Bucket']
                            ));
                        }

                        $command['@region'] = $region;
                        yield $handler($command);
                    } catch (AwsException $e) {
                        if ($e->getAwsErrorCode() === 'AuthorizationHeaderMalformed') {
                            $region = $this->determineBucketRegionFromExceptionBody(
                                $e->getResponse()
                            );
                            if (!empty($region)) {
                                $this->cache->set($cacheKey, $region);

                                $command['@region'] = $region;
                                yield $handler($command);
                            } else {
                                throw $e;
                            }
                        } else {
                            throw $e;
                        }
                    }
                });
            };
        };
    }

    public function createPresignedRequest(CommandInterface $command, $expires, array $options = [])
    {
        if (empty($command['Bucket'])) {
            throw new \InvalidArgumentException('The S3\\MultiRegionClient'
                . ' cannot create presigned requests for commands without a'
                . ' specified bucket.');
        }

        /** @var S3ClientInterface $client */
        $client = $this->getClientFromPool(
            $this->determineBucketRegion($command['Bucket'])
        );
        return $client->createPresignedRequest(
            $client->getCommand($command->getName(), $command->toArray()),
            $expires,
            $options
        );
    }

    public function getObjectUrl($bucket, $key)
    {
        /** @var S3Client $regionalClient */
        $regionalClient = $this->getClientFromPool(
            $this->determineBucketRegion($bucket)
        );

        return $regionalClient->getObjectUrl($bucket, $key);
    }

    public function determineBucketRegionAsync($bucketName)
    {
        $cacheKey = $this->getCacheKey($bucketName);
        if ($cached = $this->cache->get($cacheKey)) {
            return Promise\Create::promiseFor($cached);
        }

        /** @var S3ClientInterface $regionalClient */
        $regionalClient = $this->getClientFromPool();
        return $regionalClient->determineBucketRegionAsync($bucketName)
            ->then(
                function ($region) use ($cacheKey) {
                    $this->cache->set($cacheKey, $region);

                    return $region;
                }
            );
    }

    private function getCacheKey($bucketName)
    {
        return "aws:s3:{$bucketName}:location";
    }
}
