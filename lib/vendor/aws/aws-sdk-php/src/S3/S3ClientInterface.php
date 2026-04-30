<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3;

use R2Offload\Vendor\Aws\AwsClientInterface;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Aws\ResultInterface;
use R2Offload\Vendor\Aws\S3\Exception\S3Exception;
use R2Offload\Vendor\GuzzleHttp\Promise\PromiseInterface;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;

/**
 * **Amazon Simple Storage Service** client.
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
interface S3ClientInterface extends AwsClientInterface
{
    /**
     * Create a pre-signed URL for the given S3 command object.
     *
     * @param CommandInterface              $command Command to create a pre-signed
     *                                               URL for.
     * @param int|string|\DateTimeInterface $expires The time at which the URL should
     *                                               expire. This can be a Unix
     *                                               timestamp, a PHP DateTime object,
     *                                               or a string that can be evaluated
     *                                               by strtotime().
     *
     * @return RequestInterface
     */
    public function createPresignedRequest(CommandInterface $command, $expires, array $options = []);

    /**
     * Returns the URL to an object identified by its bucket and key.
     *
     * The URL returned by this method is not signed nor does it ensure that the
     * bucket and key given to the method exist. If you need a signed URL, then
     * use the {@see \Aws\S3\S3Client::createPresignedRequest} method and get
     * the URI of the signed request.
     *
     * @param string $bucket  The name of the bucket where the object is located
     * @param string $key     The key of the object
     *
     * @return string The URL to the object
     */
    public function getObjectUrl($bucket, $key);

    /**
     * @deprecated Use doesBucketExistV2() instead
     *
     * Determines whether or not a bucket exists by name.
     *
     * @param string $bucket  The name of the bucket
     *
     * @return bool
     */
    public function doesBucketExist($bucket);

    /**
     * Determines whether or not a bucket exists by name. This method uses S3's
     * HeadBucket operation and requires the relevant bucket permissions in the
     * default case to prevent errors.
     *
     * @param string $bucket  The name of the bucket
     * @param bool $accept403 Set to true for this method to return true in the case of
     *                        invalid bucket-level permissions. Credentials MUST be valid
     *                        to avoid inaccuracies. Using the default value of false will
     *                        cause an exception to be thrown instead.
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    public function doesBucketExistV2($bucket, $accept403);

    /**
     * @deprecated Use doesObjectExistV2() instead
     *
     * Determines whether or not an object exists by name.
     *
     * @param string $bucket  The name of the bucket
     * @param string $key     The key of the object
     * @param array  $options Additional options available in the HeadObject
     *                        operation (e.g., VersionId).
     *
     * @return bool
     */
    public function doesObjectExist($bucket, $key, array $options = []);

    /**
     * Determines whether or not an object exists by name. This method uses S3's HeadObject
     * operation and requires the relevant bucket and object permissions to prevent errors.
     *
     * @param string $bucket The name of the bucket
     * @param string $key The key of the object
     * @param bool $includeDeleteMarkers Set to true to consider delete markers
     *                                   existing objects. Using the default value
     *                                   of false will ignore delete markers and
     *                                   return false.
     * @param array $options Additional options available in the HeadObject
     *                        operation (e.g., VersionId).
     *
     * @return bool
     * @throws S3Exception|\Exception if there is an unhandled exception
     */
    public function doesObjectExistV2($bucket, $key, $includeDeleteMarkers = false, array $options = []);

    /**
     * Register the Amazon S3 stream wrapper with this client instance.
     */
    public function registerStreamWrapper();

    /**
     * Registers the Amazon S3 stream wrapper with this client instance.
     *
     *This version uses doesObjectExistV2 and doesBucketExistV2 to check
     * resource existence.
     */
    public function registerStreamWrapperV2();

    /**
     * Deletes objects from Amazon S3 that match the result of a ListObjects
     * operation. For example, this allows you to do things like delete all
     * objects that match a specific key prefix.
     *
     * @param string $bucket  Bucket that contains the object keys
     * @param string $prefix  Optionally delete only objects under this key prefix
     * @param string $regex   Delete only objects that match this regex
     * @param array  $options Aws\S3\BatchDelete options array.
     *
     * @see R2Offload\Vendor\Aws\S3\S3Client::listObjects
     * @throws \RuntimeException if no prefix and no regex is given
     */
    public function deleteMatchingObjects(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    );

    /**
     * Deletes objects from Amazon S3 that match the result of a ListObjects
     * operation. For example, this allows you to do things like delete all
     * objects that match a specific key prefix.
     *
     * @param string $bucket  Bucket that contains the object keys
     * @param string $prefix  Optionally delete only objects under this key prefix
     * @param string $regex   Delete only objects that match this regex
     * @param array  $options Aws\S3\BatchDelete options array.
     *
     * @see R2Offload\Vendor\Aws\S3\S3Client::listObjects
     *
     * @return PromiseInterface     A promise that is settled when matching
     *                              objects are deleted.
     */
    public function deleteMatchingObjectsAsync(
        $bucket,
        $prefix = '',
        $regex = '',
        array $options = []
    );

    /**
     * Upload a file, stream, or string to a bucket.
     *
     * If the upload size exceeds the specified threshold, the upload will be
     * performed using concurrent multipart uploads.
     *
     * The options array accepts the following options:
     *
     * - before_upload: (callable) Callback to invoke before any upload
     *   operations during the upload process. The callback should have a
     *   function signature like `function (R2Offload\Vendor\Aws\Command $command) {...}`.
     * - concurrency: (int, default=int(3)) Maximum number of concurrent
     *   `UploadPart` operations allowed during a multipart upload.
     * - mup_threshold: (int, default=int(16777216)) The size, in bytes, allowed
     *   before the upload must be sent via a multipart upload. Default: 16 MB.
     * - params: (array, default=array([])) Custom parameters to use with the
     *   upload. For single uploads, they must correspond to those used for the
     *   `PutObject` operation. For multipart uploads, they correspond to the
     *   parameters of the `CreateMultipartUpload` operation.
     * - part_size: (int) Part size to use when doing a multipart upload.
     *
     * @param string $bucket  Bucket to upload the object.
     * @param string $key     Key of the object.
     * @param mixed  $body    Object data to upload. Can be a
     *                        StreamInterface, PHP stream resource, or a
     *                        string of data to upload.
     * @param string $acl     ACL to apply to the object (default: private).
     * @param array  $options Options used to configure the upload process.
     *
     * @see R2Offload\Vendor\Aws\S3\MultipartUploader for more info about multipart uploads.
     * @return ResultInterface Returns the result of the upload.
     */
    public function upload(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    );

    /**
     * Upload a file, stream, or string to a bucket asynchronously.
     *
     * @param string $bucket  Bucket to upload the object.
     * @param string $key     Key of the object.
     * @param mixed  $body    Object data to upload. Can be a
     *                        StreamInterface, PHP stream resource, or a
     *                        string of data to upload.
     * @param string $acl     ACL to apply to the object (default: private).
     * @param array  $options Options used to configure the upload process.
     *
     * @see self::upload
     * @return PromiseInterface     Returns a promise that will be fulfilled
     *                              with the result of the upload.
     */
    public function uploadAsync(
        $bucket,
        $key,
        $body,
        $acl = 'private',
        array $options = []
    );

    /**
     * Copy an object of any size to a different location.
     *
     * If the upload size exceeds the maximum allowable size for direct S3
     * copying, a multipart copy will be used.
     *
     * The options array accepts the following options:
     *
     * - before_upload: (callable) Callback to invoke before any upload
     *   operations during the upload process. The callback should have a
     *   function signature like `function (R2Offload\Vendor\Aws\Command $command) {...}`.
     * - concurrency: (int, default=int(5)) Maximum number of concurrent
     *   `UploadPart` operations allowed during a multipart upload.
     * - params: (array, default=array([])) Custom parameters to use with the
     *   upload. For single uploads, they must correspond to those used for the
     *   `CopyObject` operation. For multipart uploads, they correspond to the
     *   parameters of the `CreateMultipartUpload` operation.
     * - part_size: (int) Part size to use when doing a multipart upload.
     *
     * @param string $fromBucket    Bucket where the copy source resides.
     * @param string $fromKey       Key of the copy source.
     * @param string $destBucket    Bucket to which to copy the object.
     * @param string $destKey       Key to which to copy the object.
     * @param string $acl           ACL to apply to the copy (default: private).
     * @param array  $options       Options used to configure the upload process.
     *
     * @see R2Offload\Vendor\Aws\S3\MultipartCopy for more info about multipart uploads.
     * @return ResultInterface Returns the result of the copy.
     */
    public function copy(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    );

    /**
     * Copy an object of any size to a different location asynchronously.
     *
     * @param string $fromBucket    Bucket where the copy source resides.
     * @param string $fromKey       Key of the copy source.
     * @param string $destBucket    Bucket to which to copy the object.
     * @param string $destKey       Key to which to copy the object.
     * @param string $acl           ACL to apply to the copy (default: private).
     * @param array  $options       Options used to configure the upload process.
     *
     * @see self::copy for more info about the parameters above.
     * @return PromiseInterface     Returns a promise that will be fulfilled
     *                              with the result of the copy.
     */
    public function copyAsync(
        $fromBucket,
        $fromKey,
        $destBucket,
        $destKey,
        $acl = 'private',
        array $options = []
    );

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @param string $directory Full path to a directory to upload
     * @param string $bucket    Name of the bucket
     * @param string $keyPrefix Virtual directory key prefix to add to each upload
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @see R2Offload\Vendor\Aws\S3\Transfer for more options and customization
     */
    public function uploadDirectory(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    );

    /**
     * Recursively uploads all files in a given directory to a given bucket.
     *
     * @param string $directory Full path to a directory to upload
     * @param string $bucket    Name of the bucket
     * @param string $keyPrefix Virtual directory key prefix to add to each upload
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @see R2Offload\Vendor\Aws\S3\Transfer for more options and customization
     *
     * @return PromiseInterface A promise that is settled when the upload is
     *                          complete.
     */
    public function uploadDirectoryAsync(
        $directory,
        $bucket,
        $keyPrefix = null,
        array $options = []
    );

    /**
     * Downloads a bucket to the local filesystem
     *
     * @param string $directory Directory to download to
     * @param string $bucket    Bucket to download from
     * @param string $keyPrefix Only download objects that use this key prefix
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     */
    public function downloadBucket(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    );

    /**
     * Downloads a bucket to the local filesystem
     *
     * @param string $directory Directory to download to
     * @param string $bucket    Bucket to download from
     * @param string $keyPrefix Only download objects that use this key prefix
     * @param array  $options   Options available in Aws\S3\Transfer::__construct
     *
     * @return PromiseInterface A promise that is settled when the download is
     *                          complete.
     */
    public function downloadBucketAsync(
        $directory,
        $bucket,
        $keyPrefix = '',
        array $options = []
    );

    /**
     * Returns the region in which a given bucket is located.
     *
     * @param string $bucketName
     *
     * @return string
     */
    public function determineBucketRegion($bucketName);

    /**
     * Returns a promise fulfilled with the region in which a given bucket is
     * located.
     *
     * @param string $bucketName
     *
     * @return PromiseInterface
     */
    public function determineBucketRegionAsync($bucketName);
}
