<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Translate;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Translate** service.
 * @method \R2Offload\Vendor\Aws\Result createParallelData(array $args = [])
 * @phpstan-method \Aws\Result createParallelData(array{
 *     Name?: string,
 *     Description?: string,
 *     ParallelDataConfig?: array{S3Uri?: string, Format?: 'CSV'|'TMX'|'TSV', ...},
 *     EncryptionKey?: array{Type?: 'KMS', Id?: string, ...},
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createParallelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createParallelDataAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ParallelDataConfig?: array{S3Uri?: string, Format?: 'CSV'|'TMX'|'TSV', ...},
 *     EncryptionKey?: array{Type?: 'KMS', Id?: string, ...},
 *     ClientToken?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteParallelData(array $args = [])
 * @phpstan-method \Aws\Result deleteParallelData(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteParallelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteParallelDataAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTerminology(array $args = [])
 * @phpstan-method \Aws\Result deleteTerminology(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTerminologyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteTerminologyAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeTextTranslationJob(array $args = [])
 * @phpstan-method \Aws\Result describeTextTranslationJob(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTextTranslationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeTextTranslationJobAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getParallelData(array $args = [])
 * @phpstan-method \Aws\Result getParallelData(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getParallelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getParallelDataAsync(array{Name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTerminology(array $args = [])
 * @phpstan-method \Aws\Result getTerminology(array{Name?: string, TerminologyDataFormat?: 'CSV'|'TMX'|'TSV', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTerminologyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getTerminologyAsync(array{Name?: string, TerminologyDataFormat?: 'CSV'|'TMX'|'TSV', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result importTerminology(array $args = [])
 * @phpstan-method \Aws\Result importTerminology(array{
 *     Name?: string,
 *     MergeStrategy?: 'OVERWRITE',
 *     Description?: string,
 *     TerminologyData?: array{
 *         File?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         Format?: 'CSV'|'TMX'|'TSV',
 *         Directionality?: 'MULTI'|'UNI',
 *         ...,
 *     },
 *     EncryptionKey?: array{Type?: 'KMS', Id?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importTerminologyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise importTerminologyAsync(array{
 *     Name?: string,
 *     MergeStrategy?: 'OVERWRITE',
 *     Description?: string,
 *     TerminologyData?: array{
 *         File?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *         Format?: 'CSV'|'TMX'|'TSV',
 *         Directionality?: 'MULTI'|'UNI',
 *         ...,
 *     },
 *     EncryptionKey?: array{Type?: 'KMS', Id?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLanguages(array $args = [])
 * @phpstan-method \Aws\Result listLanguages(array{
 *     DisplayLanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLanguagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listLanguagesAsync(array{
 *     DisplayLanguageCode?: 'de'|'en'|'es'|'fr'|'it'|'ja'|'ko'|'pt'|'zh'|'zh-TW',
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listParallelData(array $args = [])
 * @phpstan-method \Aws\Result listParallelData(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listParallelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listParallelDataAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTerminologies(array $args = [])
 * @phpstan-method \Aws\Result listTerminologies(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTerminologiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTerminologiesAsync(array{NextToken?: string, MaxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTextTranslationJobs(array $args = [])
 * @phpstan-method \Aws\Result listTextTranslationJobs(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERROR'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmittedBeforeTime?: int|string|\DateTimeInterface,
 *         SubmittedAfterTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTextTranslationJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTextTranslationJobsAsync(array{
 *     Filter?: array{
 *         JobName?: string,
 *         JobStatus?: 'COMPLETED'|'COMPLETED_WITH_ERROR'|'FAILED'|'IN_PROGRESS'|'STOPPED'|'STOP_REQUESTED'|'SUBMITTED',
 *         SubmittedBeforeTime?: int|string|\DateTimeInterface,
 *         SubmittedAfterTime?: int|string|\DateTimeInterface,
 *         ...,
 *     },
 *     NextToken?: string,
 *     MaxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startTextTranslationJob(array $args = [])
 * @phpstan-method \Aws\Result startTextTranslationJob(array{
 *     JobName?: string,
 *     InputDataConfig?: array{S3Uri?: string, ContentType?: string, ...},
 *     OutputDataConfig?: array{S3Uri?: string, EncryptionKey?: array{Type?: 'KMS', Id?: string, ...}, ...},
 *     DataAccessRoleArn?: string,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCodes?: list<string>,
 *     TerminologyNames?: list<string>,
 *     ParallelDataNames?: list<string>,
 *     ClientToken?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startTextTranslationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startTextTranslationJobAsync(array{
 *     JobName?: string,
 *     InputDataConfig?: array{S3Uri?: string, ContentType?: string, ...},
 *     OutputDataConfig?: array{S3Uri?: string, EncryptionKey?: array{Type?: 'KMS', Id?: string, ...}, ...},
 *     DataAccessRoleArn?: string,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCodes?: list<string>,
 *     TerminologyNames?: list<string>,
 *     ParallelDataNames?: list<string>,
 *     ClientToken?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopTextTranslationJob(array $args = [])
 * @phpstan-method \Aws\Result stopTextTranslationJob(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopTextTranslationJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopTextTranslationJobAsync(array{JobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceArn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result translateDocument(array $args = [])
 * @phpstan-method \Aws\Result translateDocument(array{
 *     Document?: array{Content?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ContentType?: string, ...},
 *     TerminologyNames?: list<string>,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCode?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translateDocumentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise translateDocumentAsync(array{
 *     Document?: array{Content?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface, ContentType?: string, ...},
 *     TerminologyNames?: list<string>,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCode?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result translateText(array $args = [])
 * @phpstan-method \Aws\Result translateText(array{
 *     Text?: string,
 *     TerminologyNames?: list<string>,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCode?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise translateTextAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise translateTextAsync(array{
 *     Text?: string,
 *     TerminologyNames?: list<string>,
 *     SourceLanguageCode?: string,
 *     TargetLanguageCode?: string,
 *     Settings?: array{Formality?: 'FORMAL'|'INFORMAL', Profanity?: 'MASK', Brevity?: 'ON', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceArn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateParallelData(array $args = [])
 * @phpstan-method \Aws\Result updateParallelData(array{
 *     Name?: string,
 *     Description?: string,
 *     ParallelDataConfig?: array{S3Uri?: string, Format?: 'CSV'|'TMX'|'TSV', ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateParallelDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateParallelDataAsync(array{
 *     Name?: string,
 *     Description?: string,
 *     ParallelDataConfig?: array{S3Uri?: string, Format?: 'CSV'|'TMX'|'TSV', ...},
 *     ClientToken?: string,
 *     ...,
 * } $args = [])
 */
class TranslateClient extends AwsClient {}
