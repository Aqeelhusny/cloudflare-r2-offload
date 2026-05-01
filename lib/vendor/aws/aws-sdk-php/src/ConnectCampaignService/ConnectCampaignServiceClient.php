<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ConnectCampaignService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonConnectCampaignService** service.
 * @method \R2Offload\Vendor\Aws\Result createCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnectInstanceConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInstanceOnboardingJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInstanceOnboardingJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCampaignState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCampaignStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCampaignStateBatch(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCampaignStateBatchAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectInstanceConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectInstanceConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInstanceOnboardingJobStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInstanceOnboardingJobStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCampaigns(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result pauseCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise pauseCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putDialRequestBatch(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putDialRequestBatchAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resumeCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resumeCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startInstanceOnboardingJob(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startInstanceOnboardingJobAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopCampaign(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopCampaignAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignDialerConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignDialerConfigAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignOutboundCallConfig(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignOutboundCallConfigAsync(array $args = [])
 */
class ConnectCampaignServiceClient extends AwsClient {}
