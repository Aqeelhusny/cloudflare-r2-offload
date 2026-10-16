<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\KinesisVideo;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Video Streams** service.
 * @method \R2Offload\Vendor\Aws\Result createSignalingChannel(array $args = [])
 * @phpstan-method \Aws\Result createSignalingChannel(array{
 *     ChannelName?: string,
 *     ChannelType?: 'FULL_MESH'|'SINGLE_MASTER',
 *     SingleMasterConfiguration?: array{MessageTtlSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSignalingChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSignalingChannelAsync(array{
 *     ChannelName?: string,
 *     ChannelType?: 'FULL_MESH'|'SINGLE_MASTER',
 *     SingleMasterConfiguration?: array{MessageTtlSeconds?: int, ...},
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStream(array $args = [])
 * @phpstan-method \Aws\Result createStream(array{
 *     DeviceName?: string,
 *     StreamName?: string,
 *     MediaType?: string,
 *     KmsKeyId?: string,
 *     DataRetentionInHours?: int,
 *     Tags?: array<string, string>,
 *     StreamStorageConfiguration?: array{DefaultStorageTier?: 'HOT'|'WARM', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStreamAsync(array{
 *     DeviceName?: string,
 *     StreamName?: string,
 *     MediaType?: string,
 *     KmsKeyId?: string,
 *     DataRetentionInHours?: int,
 *     Tags?: array<string, string>,
 *     StreamStorageConfiguration?: array{DefaultStorageTier?: 'HOT'|'WARM', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEdgeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result deleteEdgeConfiguration(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEdgeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEdgeConfigurationAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSignalingChannel(array $args = [])
 * @phpstan-method \Aws\Result deleteSignalingChannel(array{ChannelARN?: string, CurrentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSignalingChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSignalingChannelAsync(array{ChannelARN?: string, CurrentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStream(array $args = [])
 * @phpstan-method \Aws\Result deleteStream(array{StreamARN?: string, CurrentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStreamAsync(array{StreamARN?: string, CurrentVersion?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEdgeConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeEdgeConfiguration(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEdgeConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeEdgeConfigurationAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeImageGenerationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeImageGenerationConfiguration(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeImageGenerationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeImageGenerationConfigurationAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMappedResourceConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeMappedResourceConfiguration(array{StreamName?: string, StreamARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMappedResourceConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMappedResourceConfigurationAsync(array{StreamName?: string, StreamARN?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMediaStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeMediaStorageConfiguration(array{ChannelName?: string, ChannelARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMediaStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMediaStorageConfigurationAsync(array{ChannelName?: string, ChannelARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeNotificationConfiguration(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeNotificationConfigurationAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSignalingChannel(array $args = [])
 * @phpstan-method \Aws\Result describeSignalingChannel(array{ChannelName?: string, ChannelARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSignalingChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeSignalingChannelAsync(array{ChannelName?: string, ChannelARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStream(array $args = [])
 * @phpstan-method \Aws\Result describeStream(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStreamStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result describeStreamStorageConfiguration(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStreamStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStreamStorageConfigurationAsync(array{StreamName?: string, StreamARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getDataEndpoint(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     APIName?: 'GET_CLIP'|'GET_DASH_STREAMING_SESSION_URL'|'GET_HLS_STREAMING_SESSION_URL'|'GET_IMAGES'|'GET_MEDIA'|'GET_MEDIA_FOR_FRAGMENT_LIST'|'LIST_FRAGMENTS'|'PUT_MEDIA',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDataEndpointAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     APIName?: 'GET_CLIP'|'GET_DASH_STREAMING_SESSION_URL'|'GET_HLS_STREAMING_SESSION_URL'|'GET_IMAGES'|'GET_MEDIA'|'GET_MEDIA_FOR_FRAGMENT_LIST'|'LIST_FRAGMENTS'|'PUT_MEDIA',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSignalingChannelEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getSignalingChannelEndpoint(array{
 *     ChannelARN?: string,
 *     SingleMasterChannelEndpointConfiguration?: array{Protocols?: list<'HTTPS'|'WEBRTC'|'WSS'>, Role?: 'MASTER'|'VIEWER', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSignalingChannelEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSignalingChannelEndpointAsync(array{
 *     ChannelARN?: string,
 *     SingleMasterChannelEndpointConfiguration?: array{Protocols?: list<'HTTPS'|'WEBRTC'|'WSS'>, Role?: 'MASTER'|'VIEWER', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEdgeAgentConfigurations(array $args = [])
 * @phpstan-method \Aws\Result listEdgeAgentConfigurations(array{HubDeviceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEdgeAgentConfigurationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEdgeAgentConfigurationsAsync(array{HubDeviceArn?: string, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSignalingChannels(array $args = [])
 * @phpstan-method \Aws\Result listSignalingChannels(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChannelNameCondition?: array{ComparisonOperator?: 'BEGINS_WITH', ComparisonValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSignalingChannelsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSignalingChannelsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ChannelNameCondition?: array{ComparisonOperator?: 'BEGINS_WITH', ComparisonValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStreams(array $args = [])
 * @phpstan-method \Aws\Result listStreams(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StreamNameCondition?: array{ComparisonOperator?: 'BEGINS_WITH', ComparisonValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStreamsAsync(array{
 *     MaxResults?: int,
 *     NextToken?: string,
 *     StreamNameCondition?: array{ComparisonOperator?: 'BEGINS_WITH', ComparisonValue?: string, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{NextToken?: string, ResourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{NextToken?: string, ResourceARN?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForStream(array $args = [])
 * @phpstan-method \Aws\Result listTagsForStream(array{NextToken?: string, StreamARN?: string, StreamName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForStreamAsync(array{NextToken?: string, StreamARN?: string, StreamName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startEdgeConfigurationUpdate(array $args = [])
 * @phpstan-method \Aws\Result startEdgeConfigurationUpdate(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     EdgeConfig?: array{
 *         HubDeviceArn?: string,
 *         RecorderConfig?: array{MediaSourceConfig?: array, ScheduleConfig?: array, ...},
 *         UploaderConfig?: array{ScheduleConfig?: array, ...},
 *         DeletionConfig?: array{EdgeRetentionInHours?: int, LocalSizeConfig?: array, DeleteAfterUpload?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startEdgeConfigurationUpdateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startEdgeConfigurationUpdateAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     EdgeConfig?: array{
 *         HubDeviceArn?: string,
 *         RecorderConfig?: array{MediaSourceConfig?: array, ScheduleConfig?: array, ...},
 *         UploaderConfig?: array{ScheduleConfig?: array, ...},
 *         DeletionConfig?: array{EdgeRetentionInHours?: int, LocalSizeConfig?: array, DeleteAfterUpload?: bool, ...},
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{ResourceARN?: string, Tags?: list<array{Key?: string, Value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagStream(array $args = [])
 * @phpstan-method \Aws\Result tagStream(array{StreamARN?: string, StreamName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagStreamAsync(array{StreamARN?: string, StreamName?: string, Tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{ResourceARN?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{ResourceARN?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagStream(array $args = [])
 * @phpstan-method \Aws\Result untagStream(array{StreamARN?: string, StreamName?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagStreamAsync(array{StreamARN?: string, StreamName?: string, TagKeyList?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataRetention(array $args = [])
 * @phpstan-method \Aws\Result updateDataRetention(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     Operation?: 'DECREASE_DATA_RETENTION'|'INCREASE_DATA_RETENTION',
 *     DataRetentionChangeInHours?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataRetentionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDataRetentionAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     Operation?: 'DECREASE_DATA_RETENTION'|'INCREASE_DATA_RETENTION',
 *     DataRetentionChangeInHours?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateImageGenerationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateImageGenerationConfiguration(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ImageGenerationConfiguration?: array{
 *         Status?: 'DISABLED'|'ENABLED',
 *         ImageSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         DestinationConfig?: array{Uri?: string, DestinationRegion?: string, ...},
 *         SamplingInterval?: int,
 *         Format?: 'JPEG'|'PNG',
 *         FormatConfig?: array<string, string>,
 *         WidthPixels?: int,
 *         HeightPixels?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateImageGenerationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateImageGenerationConfigurationAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     ImageGenerationConfiguration?: array{
 *         Status?: 'DISABLED'|'ENABLED',
 *         ImageSelectorType?: 'PRODUCER_TIMESTAMP'|'SERVER_TIMESTAMP',
 *         DestinationConfig?: array{Uri?: string, DestinationRegion?: string, ...},
 *         SamplingInterval?: int,
 *         Format?: 'JPEG'|'PNG',
 *         FormatConfig?: array<string, string>,
 *         WidthPixels?: int,
 *         HeightPixels?: int,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMediaStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateMediaStorageConfiguration(array{
 *     ChannelARN?: string,
 *     MediaStorageConfiguration?: array{StreamARN?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMediaStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMediaStorageConfigurationAsync(array{
 *     ChannelARN?: string,
 *     MediaStorageConfiguration?: array{StreamARN?: string, Status?: 'DISABLED'|'ENABLED', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateNotificationConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateNotificationConfiguration(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     NotificationConfiguration?: array{Status?: 'DISABLED'|'ENABLED', DestinationConfig?: array{Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateNotificationConfigurationAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     NotificationConfiguration?: array{Status?: 'DISABLED'|'ENABLED', DestinationConfig?: array{Uri?: string, ...}, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSignalingChannel(array $args = [])
 * @phpstan-method \Aws\Result updateSignalingChannel(array{
 *     ChannelARN?: string,
 *     CurrentVersion?: string,
 *     SingleMasterConfiguration?: array{MessageTtlSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSignalingChannelAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSignalingChannelAsync(array{
 *     ChannelARN?: string,
 *     CurrentVersion?: string,
 *     SingleMasterConfiguration?: array{MessageTtlSeconds?: int, ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStream(array $args = [])
 * @phpstan-method \Aws\Result updateStream(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     DeviceName?: string,
 *     MediaType?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStreamAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     DeviceName?: string,
 *     MediaType?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStreamStorageConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updateStreamStorageConfiguration(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     StreamStorageConfiguration?: array{DefaultStorageTier?: 'HOT'|'WARM', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStreamStorageConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStreamStorageConfigurationAsync(array{
 *     StreamName?: string,
 *     StreamARN?: string,
 *     CurrentVersion?: string,
 *     StreamStorageConfiguration?: array{DefaultStorageTier?: 'HOT'|'WARM', ...},
 *     ...,
 * } $args = [])
 */
class KinesisVideoClient extends AwsClient {}
