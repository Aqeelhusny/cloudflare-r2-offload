<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\VoiceID;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Voice ID** service.
 * @method \R2Offload\Vendor\Aws\Result associateFraudster(array $args = [])
 * @phpstan-method \Aws\Result associateFraudster(array{DomainId?: string, FraudsterId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateFraudsterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateFraudsterAsync(array{DomainId?: string, FraudsterId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Name?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{
 *     ClientToken?: string,
 *     Description?: string,
 *     Name?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWatchlist(array $args = [])
 * @phpstan-method \Aws\Result createWatchlist(array{ClientToken?: string, Description?: string, DomainId?: string, Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWatchlistAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createWatchlistAsync(array{ClientToken?: string, Description?: string, DomainId?: string, Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{DomainId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{DomainId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFraudster(array $args = [])
 * @phpstan-method \Aws\Result deleteFraudster(array{DomainId?: string, FraudsterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFraudsterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteFraudsterAsync(array{DomainId?: string, FraudsterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSpeaker(array $args = [])
 * @phpstan-method \Aws\Result deleteSpeaker(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSpeakerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSpeakerAsync(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWatchlist(array $args = [])
 * @phpstan-method \Aws\Result deleteWatchlist(array{DomainId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWatchlistAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteWatchlistAsync(array{DomainId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDomain(array $args = [])
 * @phpstan-method \Aws\Result describeDomain(array{DomainId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAsync(array{DomainId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFraudster(array $args = [])
 * @phpstan-method \Aws\Result describeFraudster(array{DomainId?: string, FraudsterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFraudsterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFraudsterAsync(array{DomainId?: string, FraudsterId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFraudsterRegistrationJob(array $args = [])
 * @phpstan-method \Aws\Result describeFraudsterRegistrationJob(array{DomainId?: string, JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFraudsterRegistrationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeFraudsterRegistrationJobAsync(array{DomainId?: string, JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSpeaker(array $args = [])
 * @phpstan-method \Aws\Result describeSpeaker(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSpeakerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpeakerAsync(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSpeakerEnrollmentJob(array $args = [])
 * @phpstan-method \Aws\Result describeSpeakerEnrollmentJob(array{DomainId?: string, JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSpeakerEnrollmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSpeakerEnrollmentJobAsync(array{DomainId?: string, JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWatchlist(array $args = [])
 * @phpstan-method \Aws\Result describeWatchlist(array{DomainId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWatchlistAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeWatchlistAsync(array{DomainId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateFraudster(array $args = [])
 * @phpstan-method \Aws\Result disassociateFraudster(array{DomainId?: string, FraudsterId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateFraudsterAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateFraudsterAsync(array{DomainId?: string, FraudsterId?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result evaluateSession(array $args = [])
 * @phpstan-method \Aws\Result evaluateSession(array{DomainId?: string, SessionNameOrId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise evaluateSessionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise evaluateSessionAsync(array{DomainId?: string, SessionNameOrId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFraudsterRegistrationJobs(array $args = [])
 * @phpstan-method \Aws\Result listFraudsterRegistrationJobs(array{
 *     DomainId?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFraudsterRegistrationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFraudsterRegistrationJobsAsync(array{
 *     DomainId?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFraudsters(array $args = [])
 * @phpstan-method \Aws\Result listFraudsters(array{DomainId?: string, MaxResults?: int, NextToken?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFraudstersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listFraudstersAsync(array{DomainId?: string, MaxResults?: int, NextToken?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpeakerEnrollmentJobs(array $args = [])
 * @phpstan-method \Aws\Result listSpeakerEnrollmentJobs(array{
 *     DomainId?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpeakerEnrollmentJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpeakerEnrollmentJobsAsync(array{
 *     DomainId?: string,
 *     JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERRORS'|'FAILED'|'IN_PROGRESS'|'SUBMITTED',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpeakers(array $args = [])
 * @phpstan-method \Aws\Result listSpeakers(array{DomainId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpeakersAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSpeakersAsync(array{DomainId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWatchlists(array $args = [])
 * @phpstan-method \Aws\Result listWatchlists(array{DomainId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWatchlistsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listWatchlistsAsync(array{DomainId?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result optOutSpeaker(array $args = [])
 * @phpstan-method \Aws\Result optOutSpeaker(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise optOutSpeakerAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise optOutSpeakerAsync(array{DomainId?: string, SpeakerId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startFraudsterRegistrationJob(array $args = [])
 * @phpstan-method \Aws\Result startFraudsterRegistrationJob(array{
 *     ClientToken?: string,
 *     DataAccessRoleArn?: string,
 *     DomainId?: string,
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobName?: string,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3Uri?: string, ...},
 *     RegistrationConfig?: array{
 *         DuplicateRegistrationAction?: 'REGISTER_AS_NEW'|'SKIP',
 *         FraudsterSimilarityThreshold?: int,
 *         WatchlistIds?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startFraudsterRegistrationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startFraudsterRegistrationJobAsync(array{
 *     ClientToken?: string,
 *     DataAccessRoleArn?: string,
 *     DomainId?: string,
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobName?: string,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3Uri?: string, ...},
 *     RegistrationConfig?: array{
 *         DuplicateRegistrationAction?: 'REGISTER_AS_NEW'|'SKIP',
 *         FraudsterSimilarityThreshold?: int,
 *         WatchlistIds?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSpeakerEnrollmentJob(array $args = [])
 * @phpstan-method \Aws\Result startSpeakerEnrollmentJob(array{
 *     ClientToken?: string,
 *     DataAccessRoleArn?: string,
 *     DomainId?: string,
 *     EnrollmentConfig?: array{
 *         ExistingEnrollmentAction?: 'OVERWRITE'|'SKIP',
 *         FraudDetectionConfig?: array{FraudDetectionAction?: 'FAIL'|'IGNORE', RiskThreshold?: int, WatchlistIds?: list<string>, ...},
 *         ...,
 *     },
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobName?: string,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSpeakerEnrollmentJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSpeakerEnrollmentJobAsync(array{
 *     ClientToken?: string,
 *     DataAccessRoleArn?: string,
 *     DomainId?: string,
 *     EnrollmentConfig?: array{
 *         ExistingEnrollmentAction?: 'OVERWRITE'|'SKIP',
 *         FraudDetectionConfig?: array{FraudDetectionAction?: 'FAIL'|'IGNORE', RiskThreshold?: int, WatchlistIds?: list<string>, ...},
 *         ...,
 *     },
 *     InputDataConfig?: array{S3Uri?: string, ...},
 *     JobName?: string,
 *     OutputDataConfig?: array{KmsKeyId?: string, S3Uri?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDomain(array $args = [])
 * @phpstan-method \Aws\Result updateDomain(array{
 *     Description?: string,
 *     DomainId?: string,
 *     Name?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDomainAsync(array{
 *     Description?: string,
 *     DomainId?: string,
 *     Name?: string,
 *     ServerSideEncryptionConfiguration?: array{KmsKeyId?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWatchlist(array $args = [])
 * @phpstan-method \Aws\Result updateWatchlist(array{Description?: string, DomainId?: string, Name?: string, WatchlistId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWatchlistAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateWatchlistAsync(array{Description?: string, DomainId?: string, Name?: string, WatchlistId?: string, ...} $args = [])
 */
class VoiceIDClient extends AwsClient {}
