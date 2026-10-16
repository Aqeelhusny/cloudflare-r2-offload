<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ImportExport;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Import/Export** service.
 * @method \R2Offload\Vendor\Aws\Result cancelJob(array $args = [])
 * @phpstan-method \Aws\Result cancelJob(array{JobId?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelJobAsync(array{JobId?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createJob(array $args = [])
 * @phpstan-method \Aws\Result createJob(array{
 *     JobType?: 'Export'|'Import',
 *     Manifest?: string,
 *     ManifestAddendum?: string,
 *     ValidateOnly?: bool,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createJobAsync(array{
 *     JobType?: 'Export'|'Import',
 *     Manifest?: string,
 *     ManifestAddendum?: string,
 *     ValidateOnly?: bool,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getShippingLabel(array $args = [])
 * @phpstan-method \Aws\Result getShippingLabel(array{
 *     jobIds?: list<string>,
 *     name?: string,
 *     company?: string,
 *     phoneNumber?: string,
 *     country?: string,
 *     stateOrProvince?: string,
 *     city?: string,
 *     postalCode?: string,
 *     street1?: string,
 *     street2?: string,
 *     street3?: string,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getShippingLabelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getShippingLabelAsync(array{
 *     jobIds?: list<string>,
 *     name?: string,
 *     company?: string,
 *     phoneNumber?: string,
 *     country?: string,
 *     stateOrProvince?: string,
 *     city?: string,
 *     postalCode?: string,
 *     street1?: string,
 *     street2?: string,
 *     street3?: string,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getStatus(array $args = [])
 * @phpstan-method \Aws\Result getStatus(array{JobId?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getStatusAsync(array{JobId?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listJobs(array $args = [])
 * @phpstan-method \Aws\Result listJobs(array{MaxJobs?: int, Marker?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listJobsAsync(array{MaxJobs?: int, Marker?: string, APIVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateJob(array $args = [])
 * @phpstan-method \Aws\Result updateJob(array{
 *     JobId?: string,
 *     Manifest?: string,
 *     JobType?: 'Export'|'Import',
 *     ValidateOnly?: bool,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateJobAsync(array{
 *     JobId?: string,
 *     Manifest?: string,
 *     JobType?: 'Export'|'Import',
 *     ValidateOnly?: bool,
 *     APIVersion?: string,
 *     ...,
 * } $args = [])
 */
class ImportExportClient extends AwsClient {}
