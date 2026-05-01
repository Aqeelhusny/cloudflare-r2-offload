<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\FIS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Fault Injection Simulator** service.
 * @method \R2Offload\Vendor\Aws\Result createExperimentTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createExperimentTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTargetAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTargetAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteExperimentTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteExperimentTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTargetAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTargetAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExperiment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExperimentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExperimentTargetAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExperimentTargetAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExperimentTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExperimentTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSafetyLever(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSafetyLeverAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTargetAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTargetAccountConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTargetResourceType(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTargetResourceTypeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listActions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExperimentResolvedTargets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExperimentResolvedTargetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExperimentTargetAccountConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExperimentTargetAccountConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExperimentTemplates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExperimentTemplatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExperiments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExperimentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTargetAccountConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTargetAccountConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTargetResourceTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTargetResourceTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startExperiment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startExperimentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopExperiment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopExperimentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateExperimentTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateExperimentTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSafetyLeverState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSafetyLeverStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTargetAccountConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTargetAccountConfigurationAsync(array $args = [])
 */
class FISClient extends AwsClient {}
