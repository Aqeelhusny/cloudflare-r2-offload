<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AmplifyUIBuilder;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Amplify UI Builder** service.
 * @method \R2Offload\Vendor\Aws\Result createComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createForm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createFormAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createThemeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteForm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteFormAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteThemeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exchangeCodeForToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exchangeCodeForTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportForms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportFormsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result exportThemes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise exportThemesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCodegenJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCodegenJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getForm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFormAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMetadata(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMetadataAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getThemeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCodegenJobs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCodegenJobsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listForms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listFormsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listThemes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listThemesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putMetadataFlag(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putMetadataFlagAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result refreshToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise refreshTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCodegenJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCodegenJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateForm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateFormAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTheme(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateThemeAsync(array $args = [])
 */
class AmplifyUIBuilderClient extends AwsClient {}
