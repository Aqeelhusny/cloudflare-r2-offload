<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\VoiceID;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Voice ID** service.
 * @method \R2Offload\Vendor\Aws\Result associateFraudster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateFraudsterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWatchlist(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWatchlistAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteFraudster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFraudsterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSpeaker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSpeakerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWatchlist(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWatchlistAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFraudster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFraudsterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeFraudsterRegistrationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeFraudsterRegistrationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSpeaker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSpeakerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSpeakerEnrollmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSpeakerEnrollmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWatchlist(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWatchlistAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateFraudster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateFraudsterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result evaluateSession(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise evaluateSessionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFraudsterRegistrationJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFraudsterRegistrationJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listFraudsters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFraudstersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpeakerEnrollmentJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpeakerEnrollmentJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSpeakers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSpeakersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWatchlists(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWatchlistsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result optOutSpeaker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise optOutSpeakerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startFraudsterRegistrationJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startFraudsterRegistrationJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSpeakerEnrollmentJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSpeakerEnrollmentJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDomain(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDomainAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWatchlist(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWatchlistAsync(array $args = [])
 */
class VoiceIDClient extends AwsClient {}
