<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Sfn;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Step Functions** service.
 * @method \R2Offload\Vendor\Aws\Result createActivity(array $args = [])
 * @phpstan-method \Aws\Result createActivity(array{
 *     name?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createActivityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createActivityAsync(array{
 *     name?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStateMachine(array $args = [])
 * @phpstan-method \Aws\Result createStateMachine(array{
 *     name?: string,
 *     definition?: string,
 *     roleArn?: string,
 *     type?: 'EXPRESS'|'STANDARD',
 *     loggingConfiguration?: array{level?: 'ALL'|'ERROR'|'FATAL'|'OFF', includeExecutionData?: bool, destinations?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     tracingConfiguration?: array{enabled?: bool, ...},
 *     publish?: bool,
 *     versionDescription?: string,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStateMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStateMachineAsync(array{
 *     name?: string,
 *     definition?: string,
 *     roleArn?: string,
 *     type?: 'EXPRESS'|'STANDARD',
 *     loggingConfiguration?: array{level?: 'ALL'|'ERROR'|'FATAL'|'OFF', includeExecutionData?: bool, destinations?: list<array>, ...},
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     tracingConfiguration?: array{enabled?: bool, ...},
 *     publish?: bool,
 *     versionDescription?: string,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createStateMachineAlias(array $args = [])
 * @phpstan-method \Aws\Result createStateMachineAlias(array{
 *     description?: string,
 *     name?: string,
 *     routingConfiguration?: list<array{stateMachineVersionArn?: string, weight?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createStateMachineAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createStateMachineAliasAsync(array{
 *     description?: string,
 *     name?: string,
 *     routingConfiguration?: list<array{stateMachineVersionArn?: string, weight?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteActivity(array $args = [])
 * @phpstan-method \Aws\Result deleteActivity(array{activityArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteActivityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteActivityAsync(array{activityArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStateMachine(array $args = [])
 * @phpstan-method \Aws\Result deleteStateMachine(array{stateMachineArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStateMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStateMachineAsync(array{stateMachineArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStateMachineAlias(array $args = [])
 * @phpstan-method \Aws\Result deleteStateMachineAlias(array{stateMachineAliasArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStateMachineAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStateMachineAliasAsync(array{stateMachineAliasArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteStateMachineVersion(array $args = [])
 * @phpstan-method \Aws\Result deleteStateMachineVersion(array{stateMachineVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteStateMachineVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteStateMachineVersionAsync(array{stateMachineVersionArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeActivity(array $args = [])
 * @phpstan-method \Aws\Result describeActivity(array{activityArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeActivityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeActivityAsync(array{activityArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeExecution(array $args = [])
 * @phpstan-method \Aws\Result describeExecution(array{executionArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeExecutionAsync(array{executionArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMapRun(array $args = [])
 * @phpstan-method \Aws\Result describeMapRun(array{mapRunArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMapRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeMapRunAsync(array{mapRunArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStateMachine(array $args = [])
 * @phpstan-method \Aws\Result describeStateMachine(array{stateMachineArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStateMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStateMachineAsync(array{stateMachineArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStateMachineAlias(array $args = [])
 * @phpstan-method \Aws\Result describeStateMachineAlias(array{stateMachineAliasArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStateMachineAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStateMachineAliasAsync(array{stateMachineAliasArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeStateMachineForExecution(array $args = [])
 * @phpstan-method \Aws\Result describeStateMachineForExecution(array{executionArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeStateMachineForExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeStateMachineForExecutionAsync(array{executionArn?: string, includedData?: 'ALL_DATA'|'METADATA_ONLY', ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getActivityTask(array $args = [])
 * @phpstan-method \Aws\Result getActivityTask(array{activityArn?: string, workerName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getActivityTaskAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getActivityTaskAsync(array{activityArn?: string, workerName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExecutionHistory(array $args = [])
 * @phpstan-method \Aws\Result getExecutionHistory(array{
 *     executionArn?: string,
 *     maxResults?: int,
 *     reverseOrder?: bool,
 *     nextToken?: string,
 *     includeExecutionData?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExecutionHistoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getExecutionHistoryAsync(array{
 *     executionArn?: string,
 *     maxResults?: int,
 *     reverseOrder?: bool,
 *     nextToken?: string,
 *     includeExecutionData?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listActivities(array $args = [])
 * @phpstan-method \Aws\Result listActivities(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listActivitiesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listActivitiesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listExecutions(array $args = [])
 * @phpstan-method \Aws\Result listExecutions(array{
 *     stateMachineArn?: string,
 *     statusFilter?: 'ABORTED'|'FAILED'|'PENDING_REDRIVE'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     mapRunArn?: string,
 *     redriveFilter?: 'NOT_REDRIVEN'|'REDRIVEN',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listExecutionsAsync(array{
 *     stateMachineArn?: string,
 *     statusFilter?: 'ABORTED'|'FAILED'|'PENDING_REDRIVE'|'RUNNING'|'SUCCEEDED'|'TIMED_OUT',
 *     maxResults?: int,
 *     nextToken?: string,
 *     mapRunArn?: string,
 *     redriveFilter?: 'NOT_REDRIVEN'|'REDRIVEN',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMapRuns(array $args = [])
 * @phpstan-method \Aws\Result listMapRuns(array{executionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMapRunsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMapRunsAsync(array{executionArn?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStateMachineAliases(array $args = [])
 * @phpstan-method \Aws\Result listStateMachineAliases(array{stateMachineArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStateMachineAliasesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStateMachineAliasesAsync(array{stateMachineArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStateMachineVersions(array $args = [])
 * @phpstan-method \Aws\Result listStateMachineVersions(array{stateMachineArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStateMachineVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStateMachineVersionsAsync(array{stateMachineArn?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listStateMachines(array $args = [])
 * @phpstan-method \Aws\Result listStateMachines(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listStateMachinesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listStateMachinesAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result publishStateMachineVersion(array $args = [])
 * @phpstan-method \Aws\Result publishStateMachineVersion(array{stateMachineArn?: string, revisionId?: string, description?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishStateMachineVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishStateMachineVersionAsync(array{stateMachineArn?: string, revisionId?: string, description?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result redriveExecution(array $args = [])
 * @phpstan-method \Aws\Result redriveExecution(array{executionArn?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise redriveExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise redriveExecutionAsync(array{executionArn?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendTaskFailure(array $args = [])
 * @phpstan-method \Aws\Result sendTaskFailure(array{taskToken?: string, error?: string, cause?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendTaskFailureAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTaskFailureAsync(array{taskToken?: string, error?: string, cause?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendTaskHeartbeat(array $args = [])
 * @phpstan-method \Aws\Result sendTaskHeartbeat(array{taskToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendTaskHeartbeatAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTaskHeartbeatAsync(array{taskToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result sendTaskSuccess(array $args = [])
 * @phpstan-method \Aws\Result sendTaskSuccess(array{taskToken?: string, output?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise sendTaskSuccessAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise sendTaskSuccessAsync(array{taskToken?: string, output?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startExecution(array $args = [])
 * @phpstan-method \Aws\Result startExecution(array{stateMachineArn?: string, name?: string, input?: string, traceHeader?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startExecutionAsync(array{stateMachineArn?: string, name?: string, input?: string, traceHeader?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startSyncExecution(array $args = [])
 * @phpstan-method \Aws\Result startSyncExecution(array{
 *     stateMachineArn?: string,
 *     name?: string,
 *     input?: string,
 *     traceHeader?: string,
 *     includedData?: 'ALL_DATA'|'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startSyncExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startSyncExecutionAsync(array{
 *     stateMachineArn?: string,
 *     name?: string,
 *     input?: string,
 *     traceHeader?: string,
 *     includedData?: 'ALL_DATA'|'METADATA_ONLY',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopExecution(array $args = [])
 * @phpstan-method \Aws\Result stopExecution(array{executionArn?: string, error?: string, cause?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopExecutionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise stopExecutionAsync(array{executionArn?: string, error?: string, cause?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result testState(array $args = [])
 * @phpstan-method \Aws\Result testState(array{
 *     definition?: string,
 *     roleArn?: string,
 *     input?: string,
 *     inspectionLevel?: 'DEBUG'|'INFO'|'TRACE',
 *     revealSecrets?: bool,
 *     variables?: string,
 *     stateName?: string,
 *     mock?: array{
 *         result?: string,
 *         errorOutput?: array{error?: string, cause?: string, ...},
 *         fieldValidationMode?: 'NONE'|'PRESENT'|'STRICT',
 *         ...,
 *     },
 *     context?: string,
 *     stateConfiguration?: array{
 *         retrierRetryCount?: int,
 *         errorCausedByState?: string,
 *         mapIterationFailureCount?: int,
 *         mapItemReaderData?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testStateAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise testStateAsync(array{
 *     definition?: string,
 *     roleArn?: string,
 *     input?: string,
 *     inspectionLevel?: 'DEBUG'|'INFO'|'TRACE',
 *     revealSecrets?: bool,
 *     variables?: string,
 *     stateName?: string,
 *     mock?: array{
 *         result?: string,
 *         errorOutput?: array{error?: string, cause?: string, ...},
 *         fieldValidationMode?: 'NONE'|'PRESENT'|'STRICT',
 *         ...,
 *     },
 *     context?: string,
 *     stateConfiguration?: array{
 *         retrierRetryCount?: int,
 *         errorCausedByState?: string,
 *         mapIterationFailureCount?: int,
 *         mapItemReaderData?: string,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMapRun(array $args = [])
 * @phpstan-method \Aws\Result updateMapRun(array{
 *     mapRunArn?: string,
 *     maxConcurrency?: int,
 *     toleratedFailurePercentage?: float,
 *     toleratedFailureCount?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMapRunAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMapRunAsync(array{
 *     mapRunArn?: string,
 *     maxConcurrency?: int,
 *     toleratedFailurePercentage?: float,
 *     toleratedFailureCount?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStateMachine(array $args = [])
 * @phpstan-method \Aws\Result updateStateMachine(array{
 *     stateMachineArn?: string,
 *     definition?: string,
 *     roleArn?: string,
 *     loggingConfiguration?: array{level?: 'ALL'|'ERROR'|'FATAL'|'OFF', includeExecutionData?: bool, destinations?: list<array>, ...},
 *     tracingConfiguration?: array{enabled?: bool, ...},
 *     publish?: bool,
 *     versionDescription?: string,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStateMachineAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStateMachineAsync(array{
 *     stateMachineArn?: string,
 *     definition?: string,
 *     roleArn?: string,
 *     loggingConfiguration?: array{level?: 'ALL'|'ERROR'|'FATAL'|'OFF', includeExecutionData?: bool, destinations?: list<array>, ...},
 *     tracingConfiguration?: array{enabled?: bool, ...},
 *     publish?: bool,
 *     versionDescription?: string,
 *     encryptionConfiguration?: array{
 *         kmsKeyId?: string,
 *         kmsDataKeyReusePeriodSeconds?: int,
 *         type?: 'AWS_OWNED_KEY'|'CUSTOMER_MANAGED_KMS_KEY',
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateStateMachineAlias(array $args = [])
 * @phpstan-method \Aws\Result updateStateMachineAlias(array{
 *     stateMachineAliasArn?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{stateMachineVersionArn?: string, weight?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateStateMachineAliasAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateStateMachineAliasAsync(array{
 *     stateMachineAliasArn?: string,
 *     description?: string,
 *     routingConfiguration?: list<array{stateMachineVersionArn?: string, weight?: int, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result validateStateMachineDefinition(array $args = [])
 * @phpstan-method \Aws\Result validateStateMachineDefinition(array{definition?: string, type?: 'EXPRESS'|'STANDARD', severity?: 'ERROR'|'WARNING', maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise validateStateMachineDefinitionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise validateStateMachineDefinitionAsync(array{definition?: string, type?: 'EXPRESS'|'STANDARD', severity?: 'ERROR'|'WARNING', maxResults?: int, ...} $args = [])
 */
class SfnClient extends AwsClient {}
