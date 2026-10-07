<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AutoScalingPlans;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Auto Scaling Plans** service.
 * @method \R2Offload\Vendor\Aws\Result createScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result createScalingPlan(array{
 *     ScalingPlanName?: string,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createScalingPlanAsync(array{
 *     ScalingPlanName?: string,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result deleteScalingPlan(array{ScalingPlanName?: string, ScalingPlanVersion?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteScalingPlanAsync(array{ScalingPlanName?: string, ScalingPlanVersion?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingPlanResources(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPlanResources(array{ScalingPlanName?: string, ScalingPlanVersion?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingPlanResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPlanResourcesAsync(array{ScalingPlanName?: string, ScalingPlanVersion?: int, MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeScalingPlans(array $args = [])
 * @phpstan-method \Aws\Result describeScalingPlans(array{
 *     ScalingPlanNames?: list<string>,
 *     ScalingPlanVersion?: int,
 *     ApplicationSources?: list<array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeScalingPlansAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeScalingPlansAsync(array{
 *     ScalingPlanNames?: list<string>,
 *     ScalingPlanVersion?: int,
 *     ApplicationSources?: list<array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...}>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getScalingPlanResourceForecastData(array $args = [])
 * @phpstan-method \Aws\Result getScalingPlanResourceForecastData(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *     ResourceId?: string,
 *     ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *     ForecastDataType?: 'CapacityForecast'|'LoadForecast'|'ScheduledActionMaxCapacity'|'ScheduledActionMinCapacity',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getScalingPlanResourceForecastDataAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getScalingPlanResourceForecastDataAsync(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *     ResourceId?: string,
 *     ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *     ForecastDataType?: 'CapacityForecast'|'LoadForecast'|'ScheduledActionMaxCapacity'|'ScheduledActionMinCapacity',
 *     StartTime?: int|string|\DateTimeInterface,
 *     EndTime?: int|string|\DateTimeInterface,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateScalingPlan(array $args = [])
 * @phpstan-method \Aws\Result updateScalingPlan(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateScalingPlanAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateScalingPlanAsync(array{
 *     ScalingPlanName?: string,
 *     ScalingPlanVersion?: int,
 *     ApplicationSource?: array{CloudFormationStackARN?: string, TagFilters?: list<array>, ...},
 *     ScalingInstructions?: list<array{
 *         ServiceNamespace?: 'autoscaling'|'dynamodb'|'ec2'|'ecs'|'rds',
 *         ResourceId?: string,
 *         ScalableDimension?: 'autoscaling:autoScalingGroup:DesiredCapacity'|'dynamodb:index:ReadCapacityUnits'|'dynamodb:index:WriteCapacityUnits'|'dynamodb:table:ReadCapacityUnits'|'dynamodb:table:WriteCapacityUnits'|'ec2:spot-fleet-request:TargetCapacity'|'ecs:service:DesiredCount'|'rds:cluster:ReadReplicaCount',
 *         MinCapacity?: int,
 *         MaxCapacity?: int,
 *         TargetTrackingConfigurations?: list<array>,
 *         PredefinedLoadMetricSpecification?: array,
 *         CustomizedLoadMetricSpecification?: array,
 *         ScheduledActionBufferTime?: int,
 *         PredictiveScalingMaxCapacityBehavior?: 'SetForecastCapacityToMaxCapacity'|'SetMaxCapacityAboveForecastCapacity'|'SetMaxCapacityToForecastCapacity',
 *         PredictiveScalingMaxCapacityBuffer?: int,
 *         PredictiveScalingMode?: 'ForecastAndScale'|'ForecastOnly',
 *         ScalingPolicyUpdateBehavior?: 'KeepExternalPolicies'|'ReplaceExternalPolicies',
 *         DisableDynamicScaling?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class AutoScalingPlansClient extends AwsClient {}
