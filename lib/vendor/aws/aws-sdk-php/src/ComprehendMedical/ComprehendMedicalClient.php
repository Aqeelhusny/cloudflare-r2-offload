<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ComprehendMedical;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Comprehend Medical** service.
 * @method \R2Offload\Vendor\Aws\Result describeEntitiesDetectionV2Job(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEntitiesDetectionV2JobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeICD10CMInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeICD10CMInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePHIDetectionJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePHIDetectionJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRxNormInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRxNormInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSNOMEDCTInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSNOMEDCTInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result detectEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise detectEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result detectEntitiesV2(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise detectEntitiesV2Async(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result detectPHI(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise detectPHIAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result inferICD10CM(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise inferICD10CMAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result inferRxNorm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise inferRxNormAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result inferSNOMEDCT(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise inferSNOMEDCTAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEntitiesDetectionV2Jobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEntitiesDetectionV2JobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listICD10CMInferenceJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listICD10CMInferenceJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPHIDetectionJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPHIDetectionJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRxNormInferenceJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRxNormInferenceJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSNOMEDCTInferenceJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSNOMEDCTInferenceJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startEntitiesDetectionV2Job(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startEntitiesDetectionV2JobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startICD10CMInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startICD10CMInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPHIDetectionJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPHIDetectionJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startRxNormInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startRxNormInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSNOMEDCTInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSNOMEDCTInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopEntitiesDetectionV2Job(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopEntitiesDetectionV2JobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopICD10CMInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopICD10CMInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopPHIDetectionJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopPHIDetectionJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopRxNormInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopRxNormInferenceJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopSNOMEDCTInferenceJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopSNOMEDCTInferenceJobAsync(array $args = [])
 */
class ComprehendMedicalClient extends AwsClient {}
