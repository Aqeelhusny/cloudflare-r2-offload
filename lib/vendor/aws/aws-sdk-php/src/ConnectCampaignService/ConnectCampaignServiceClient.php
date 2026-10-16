<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ConnectCampaignService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonConnectCampaignService** service.
 * @method \R2Offload\Vendor\Aws\Result createCampaign(array $args = [])
 * @phpstan-method \Aws\Result createCampaign(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     outboundCallConfig?: array{
 *         connectContactFlowId?: string,
 *         connectSourcePhoneNumber?: string,
 *         connectQueueId?: string,
 *         answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createCampaignAsync(array{
 *     name?: string,
 *     connectInstanceId?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     outboundCallConfig?: array{
 *         connectContactFlowId?: string,
 *         connectSourcePhoneNumber?: string,
 *         connectQueueId?: string,
 *         answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *         ...,
 *     },
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCampaign(array $args = [])
 * @phpstan-method \Aws\Result deleteCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnectInstanceConfig(array $args = [])
 * @phpstan-method \Aws\Result deleteConnectInstanceConfig(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteConnectInstanceConfigAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteInstanceOnboardingJob(array $args = [])
 * @phpstan-method \Aws\Result deleteInstanceOnboardingJob(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteInstanceOnboardingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteInstanceOnboardingJobAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeCampaign(array $args = [])
 * @phpstan-method \Aws\Result describeCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCampaignState(array $args = [])
 * @phpstan-method \Aws\Result getCampaignState(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCampaignStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignStateAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCampaignStateBatch(array $args = [])
 * @phpstan-method \Aws\Result getCampaignStateBatch(array{campaignIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCampaignStateBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCampaignStateBatchAsync(array{campaignIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectInstanceConfig(array $args = [])
 * @phpstan-method \Aws\Result getConnectInstanceConfig(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectInstanceConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConnectInstanceConfigAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getInstanceOnboardingJobStatus(array $args = [])
 * @phpstan-method \Aws\Result getInstanceOnboardingJobStatus(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getInstanceOnboardingJobStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getInstanceOnboardingJobStatusAsync(array{connectInstanceId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCampaigns(array $args = [])
 * @phpstan-method \Aws\Result listCampaigns(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{instanceIdFilter?: array{value?: string, operator?: 'Eq', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCampaignsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCampaignsAsync(array{
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: array{instanceIdFilter?: array{value?: string, operator?: 'Eq', ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result pauseCampaign(array $args = [])
 * @phpstan-method \Aws\Result pauseCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise pauseCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise pauseCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putDialRequestBatch(array $args = [])
 * @phpstan-method \Aws\Result putDialRequestBatch(array{
 *     id?: string,
 *     dialRequests?: list<array{
 *         clientToken?: string,
 *         phoneNumber?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         attributes?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putDialRequestBatchAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDialRequestBatchAsync(array{
 *     id?: string,
 *     dialRequests?: list<array{
 *         clientToken?: string,
 *         phoneNumber?: string,
 *         expirationTime?: int|string|\DateTimeInterface,
 *         attributes?: array<string, string>,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result resumeCampaign(array $args = [])
 * @phpstan-method \Aws\Result resumeCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resumeCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise resumeCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startCampaign(array $args = [])
 * @phpstan-method \Aws\Result startCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startInstanceOnboardingJob(array $args = [])
 * @phpstan-method \Aws\Result startInstanceOnboardingJob(array{
 *     connectInstanceId?: string,
 *     encryptionConfig?: array{enabled?: bool, encryptionType?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startInstanceOnboardingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startInstanceOnboardingJobAsync(array{
 *     connectInstanceId?: string,
 *     encryptionConfig?: array{enabled?: bool, encryptionType?: 'KMS', keyArn?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopCampaign(array $args = [])
 * @phpstan-method \Aws\Result stopCampaign(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopCampaignAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopCampaignAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{arn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{arn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignDialerConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignDialerConfig(array{
 *     id?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignDialerConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignDialerConfigAsync(array{
 *     id?: string,
 *     dialerConfig?: array{
 *         progressiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         predictiveDialerConfig?: array{bandwidthAllocation?: float, dialingCapacity?: float, ...},
 *         agentlessDialerConfig?: array{dialingCapacity?: float, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignName(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignName(array{id?: string, name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignNameAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignNameAsync(array{id?: string, name?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateCampaignOutboundCallConfig(array $args = [])
 * @phpstan-method \Aws\Result updateCampaignOutboundCallConfig(array{
 *     id?: string,
 *     connectContactFlowId?: string,
 *     connectSourcePhoneNumber?: string,
 *     answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateCampaignOutboundCallConfigAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateCampaignOutboundCallConfigAsync(array{
 *     id?: string,
 *     connectContactFlowId?: string,
 *     connectSourcePhoneNumber?: string,
 *     answerMachineDetectionConfig?: array{enableAnswerMachineDetection?: bool, awaitAnswerMachinePrompt?: bool, ...},
 *     ...,
 * } $args = [])
 */
class ConnectCampaignServiceClient extends AwsClient {}
