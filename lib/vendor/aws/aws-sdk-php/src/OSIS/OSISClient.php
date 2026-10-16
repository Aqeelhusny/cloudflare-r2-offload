<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\OSIS;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon OpenSearch Ingestion** service.
 * @method \R2Offload\Vendor\Aws\Result createPipeline(array $args = [])
 * @phpstan-method \Aws\Result createPipeline(array{
 *     PipelineName?: string,
 *     MinUnits?: int,
 *     MaxUnits?: int,
 *     PipelineConfigurationBody?: string,
 *     LogPublishingOptions?: array{IsLoggingEnabled?: bool, CloudWatchLogDestination?: array{LogGroup?: string, ...}, ...},
 *     VpcOptions?: array{
 *         SubnetIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         VpcAttachmentOptions?: array{AttachToVpc?: bool, CidrBlock?: string, ...},
 *         VpcEndpointManagement?: 'CUSTOMER'|'SERVICE',
 *         ...,
 *     },
 *     BufferOptions?: array{PersistentBufferEnabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{KmsKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PipelineRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineAsync(array{
 *     PipelineName?: string,
 *     MinUnits?: int,
 *     MaxUnits?: int,
 *     PipelineConfigurationBody?: string,
 *     LogPublishingOptions?: array{IsLoggingEnabled?: bool, CloudWatchLogDestination?: array{LogGroup?: string, ...}, ...},
 *     VpcOptions?: array{
 *         SubnetIds?: list<string>,
 *         SecurityGroupIds?: list<string>,
 *         VpcAttachmentOptions?: array{AttachToVpc?: bool, CidrBlock?: string, ...},
 *         VpcEndpointManagement?: 'CUSTOMER'|'SERVICE',
 *         ...,
 *     },
 *     BufferOptions?: array{PersistentBufferEnabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{KmsKeyArn?: string, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     PipelineRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPipelineEndpoint(array $args = [])
 * @phpstan-method \Aws\Result createPipelineEndpoint(array{
 *     PipelineArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPipelineEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPipelineEndpointAsync(array{
 *     PipelineArn?: string,
 *     VpcOptions?: array{SubnetIds?: list<string>, SecurityGroupIds?: list<string>, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipeline(array $args = [])
 * @phpstan-method \Aws\Result deletePipeline(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineAsync(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePipelineEndpoint(array $args = [])
 * @phpstan-method \Aws\Result deletePipelineEndpoint(array{EndpointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePipelineEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePipelineEndpointAsync(array{EndpointId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipeline(array $args = [])
 * @phpstan-method \Aws\Result getPipeline(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineAsync(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipelineBlueprint(array $args = [])
 * @phpstan-method \Aws\Result getPipelineBlueprint(array{BlueprintName?: string, Format?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineBlueprintAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineBlueprintAsync(array{BlueprintName?: string, Format?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPipelineChangeProgress(array $args = [])
 * @phpstan-method \Aws\Result getPipelineChangeProgress(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPipelineChangeProgressAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPipelineChangeProgressAsync(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result getResourcePolicy(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getResourcePolicyAsync(array{ResourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineBlueprints(array $args = [])
 * @phpstan-method \Aws\Result listPipelineBlueprints(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineBlueprintsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineBlueprintsAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineEndpointConnections(array $args = [])
 * @phpstan-method \Aws\Result listPipelineEndpointConnections(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineEndpointConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineEndpointConnectionsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelineEndpoints(array $args = [])
 * @phpstan-method \Aws\Result listPipelineEndpoints(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelineEndpointsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelineEndpointsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPipelines(array $args = [])
 * @phpstan-method \Aws\Result listPipelines(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPipelinesAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{Arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @phpstan-method \Aws\Result putResourcePolicy(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putResourcePolicyAsync(array{ResourceArn?: string, Policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokePipelineEndpointConnections(array $args = [])
 * @phpstan-method \Aws\Result revokePipelineEndpointConnections(array{PipelineArn?: string, EndpointIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokePipelineEndpointConnectionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise revokePipelineEndpointConnectionsAsync(array{PipelineArn?: string, EndpointIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startPipeline(array $args = [])
 * @phpstan-method \Aws\Result startPipeline(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startPipelineAsync(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopPipeline(array $args = [])
 * @phpstan-method \Aws\Result stopPipeline(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopPipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopPipelineAsync(array{PipelineName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{Arn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{Arn?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{Arn?: string, TagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePipeline(array $args = [])
 * @phpstan-method \Aws\Result updatePipeline(array{
 *     PipelineName?: string,
 *     MinUnits?: int,
 *     MaxUnits?: int,
 *     PipelineConfigurationBody?: string,
 *     LogPublishingOptions?: array{IsLoggingEnabled?: bool, CloudWatchLogDestination?: array{LogGroup?: string, ...}, ...},
 *     BufferOptions?: array{PersistentBufferEnabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{KmsKeyArn?: string, ...},
 *     PipelineRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePipelineAsync(array{
 *     PipelineName?: string,
 *     MinUnits?: int,
 *     MaxUnits?: int,
 *     PipelineConfigurationBody?: string,
 *     LogPublishingOptions?: array{IsLoggingEnabled?: bool, CloudWatchLogDestination?: array{LogGroup?: string, ...}, ...},
 *     BufferOptions?: array{PersistentBufferEnabled?: bool, ...},
 *     EncryptionAtRestOptions?: array{KmsKeyArn?: string, ...},
 *     PipelineRoleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result validatePipeline(array $args = [])
 * @phpstan-method \Aws\Result validatePipeline(array{PipelineConfigurationBody?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise validatePipelineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validatePipelineAsync(array{PipelineConfigurationBody?: string, ...} $args = [])
 */
class OSISClient extends AwsClient {}
