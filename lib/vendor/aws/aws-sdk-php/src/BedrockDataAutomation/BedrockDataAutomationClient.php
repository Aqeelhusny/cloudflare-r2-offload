<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BedrockDataAutomation;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Data Automation for Amazon Bedrock** service.
 * @method \R2Offload\Vendor\Aws\Result copyBlueprintStage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyBlueprintStageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBlueprint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBlueprintAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createBlueprintVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBlueprintVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataAutomationLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataAutomationLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataAutomationProject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataAutomationProjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBlueprint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBlueprintAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataAutomationLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataAutomationLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataAutomationProject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataAutomationProjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBlueprint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBlueprintAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBlueprintOptimizationStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBlueprintOptimizationStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationLibraryEntity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationLibraryEntityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationLibraryIngestionJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationLibraryIngestionJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataAutomationProject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataAutomationProjectAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeBlueprintOptimizationAsync(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeBlueprintOptimizationAsyncAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result invokeDataAutomationLibraryIngestionJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise invokeDataAutomationLibraryIngestionJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBlueprints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBlueprintsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataAutomationLibraries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataAutomationLibrariesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataAutomationLibraryEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataAutomationLibraryEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataAutomationLibraryIngestionJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataAutomationLibraryIngestionJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataAutomationProjects(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataAutomationProjectsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBlueprint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBlueprintAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataAutomationLibrary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataAutomationLibraryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataAutomationProject(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataAutomationProjectAsync(array $args = [])
 */
class BedrockDataAutomationClient extends AwsClient {}
