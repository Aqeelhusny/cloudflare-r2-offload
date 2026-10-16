<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\EntityResolution;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS EntityResolution** service.
 * @method \R2Offload\Vendor\Aws\Result addPolicyStatement(array $args = [])
 * @phpstan-method \Aws\Result addPolicyStatement(array{
 *     arn?: string,
 *     statementId?: string,
 *     effect?: 'Allow'|'Deny',
 *     action?: list<string>,
 *     principal?: list<string>,
 *     condition?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addPolicyStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise addPolicyStatementAsync(array{
 *     arn?: string,
 *     statementId?: string,
 *     effect?: 'Allow'|'Deny',
 *     action?: list<string>,
 *     principal?: list<string>,
 *     condition?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDeleteUniqueId(array $args = [])
 * @phpstan-method \Aws\Result batchDeleteUniqueId(array{workflowName?: string, inputSource?: string, uniqueIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDeleteUniqueIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchDeleteUniqueIdAsync(array{workflowName?: string, inputSource?: string, uniqueIds?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIdMappingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createIdMappingWorkflow(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, type?: 'SOURCE'|'TARGET', ...}>,
 *     outputSourceConfig?: list<array{KMSArn?: string, outputS3Path?: string, ...}>,
 *     idMappingTechniques?: array{
 *         idMappingType?: 'PROVIDER'|'RULE_BASED',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             ruleDefinitionType?: 'SOURCE'|'TARGET',
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             recordMatchingModel?: 'MANY_SOURCE_TO_ONE_TARGET'|'ONE_SOURCE_TO_ONE_TARGET',
 *             ...,
 *         },
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'ON_DEMAND', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIdMappingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdMappingWorkflowAsync(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, type?: 'SOURCE'|'TARGET', ...}>,
 *     outputSourceConfig?: list<array{KMSArn?: string, outputS3Path?: string, ...}>,
 *     idMappingTechniques?: array{
 *         idMappingType?: 'PROVIDER'|'RULE_BASED',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             ruleDefinitionType?: 'SOURCE'|'TARGET',
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             recordMatchingModel?: 'MANY_SOURCE_TO_ONE_TARGET'|'ONE_SOURCE_TO_ONE_TARGET',
 *             ...,
 *         },
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'ON_DEMAND', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createIdNamespace(array $args = [])
 * @phpstan-method \Aws\Result createIdNamespace(array{
 *     idNamespaceName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, ...}>,
 *     idMappingWorkflowProperties?: list<array{idMappingType?: 'PROVIDER'|'RULE_BASED', ruleBasedProperties?: array, providerProperties?: array, ...}>,
 *     type?: 'SOURCE'|'TARGET',
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIdNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createIdNamespaceAsync(array{
 *     idNamespaceName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, ...}>,
 *     idMappingWorkflowProperties?: list<array{idMappingType?: 'PROVIDER'|'RULE_BASED', ruleBasedProperties?: array, providerProperties?: array, ...}>,
 *     type?: 'SOURCE'|'TARGET',
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMatchingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result createMatchingWorkflow(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, applyNormalization?: bool, ...}>,
 *     outputSourceConfig?: list<array{
 *         KMSArn?: string,
 *         outputS3Path?: string,
 *         output?: list<array>,
 *         applyNormalization?: bool,
 *         customerProfilesIntegrationConfig?: array,
 *         ...,
 *     }>,
 *     resolutionTechniques?: array{
 *         resolutionType?: 'ML_MATCHING'|'PROVIDER'|'RULE_MATCHING',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             matchPurpose?: 'IDENTIFIER_GENERATION'|'INDEXING',
 *             ...,
 *         },
 *         ruleConditionProperties?: array{rules?: list<array>, matchingConfig?: array, ...},
 *         enableRealTimeMatching?: bool,
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'IMMEDIATE', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMatchingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createMatchingWorkflowAsync(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, applyNormalization?: bool, ...}>,
 *     outputSourceConfig?: list<array{
 *         KMSArn?: string,
 *         outputS3Path?: string,
 *         output?: list<array>,
 *         applyNormalization?: bool,
 *         customerProfilesIntegrationConfig?: array,
 *         ...,
 *     }>,
 *     resolutionTechniques?: array{
 *         resolutionType?: 'ML_MATCHING'|'PROVIDER'|'RULE_MATCHING',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             matchPurpose?: 'IDENTIFIER_GENERATION'|'INDEXING',
 *             ...,
 *         },
 *         ruleConditionProperties?: array{rules?: list<array>, matchingConfig?: array, ...},
 *         enableRealTimeMatching?: bool,
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'IMMEDIATE', ...},
 *     roleArn?: string,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSchemaMapping(array $args = [])
 * @phpstan-method \Aws\Result createSchemaMapping(array{
 *     schemaName?: string,
 *     description?: string,
 *     mappedInputFields?: list<array{
 *         fieldName?: string,
 *         type?: 'ADDRESS'|'ADDRESS_CITY'|'ADDRESS_COUNTRY'|'ADDRESS_POSTALCODE'|'ADDRESS_STATE'|'ADDRESS_STREET1'|'ADDRESS_STREET2'|'ADDRESS_STREET3'|'DATE'|'EMAIL_ADDRESS'|'IPV4'|'IPV6'|'MAID'|'NAME'|'NAME_FIRST'|'NAME_LAST'|'NAME_MIDDLE'|'PHONE'|'PHONE_COUNTRYCODE'|'PHONE_NUMBER'|'PROVIDER_ID'|'STRING'|'UNIQUE_ID',
 *         groupName?: string,
 *         matchKey?: string,
 *         subType?: string,
 *         hashed?: bool,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSchemaMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createSchemaMappingAsync(array{
 *     schemaName?: string,
 *     description?: string,
 *     mappedInputFields?: list<array{
 *         fieldName?: string,
 *         type?: 'ADDRESS'|'ADDRESS_CITY'|'ADDRESS_COUNTRY'|'ADDRESS_POSTALCODE'|'ADDRESS_STATE'|'ADDRESS_STREET1'|'ADDRESS_STREET2'|'ADDRESS_STREET3'|'DATE'|'EMAIL_ADDRESS'|'IPV4'|'IPV6'|'MAID'|'NAME'|'NAME_FIRST'|'NAME_LAST'|'NAME_MIDDLE'|'PHONE'|'PHONE_COUNTRYCODE'|'PHONE_NUMBER'|'PROVIDER_ID'|'STRING'|'UNIQUE_ID',
 *         groupName?: string,
 *         matchKey?: string,
 *         subType?: string,
 *         hashed?: bool,
 *         ...,
 *     }>,
 *     tags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdMappingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteIdMappingWorkflow(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdMappingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdMappingWorkflowAsync(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteIdNamespace(array $args = [])
 * @phpstan-method \Aws\Result deleteIdNamespace(array{idNamespaceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIdNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteIdNamespaceAsync(array{idNamespaceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMatchingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result deleteMatchingWorkflow(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMatchingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteMatchingWorkflowAsync(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePolicyStatement(array $args = [])
 * @phpstan-method \Aws\Result deletePolicyStatement(array{arn?: string, statementId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePolicyStatementAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePolicyStatementAsync(array{arn?: string, statementId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSchemaMapping(array $args = [])
 * @phpstan-method \Aws\Result deleteSchemaMapping(array{schemaName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSchemaMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteSchemaMappingAsync(array{schemaName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result generateMatchId(array $args = [])
 * @phpstan-method \Aws\Result generateMatchId(array{
 *     workflowName?: string,
 *     records?: list<array{inputSourceARN?: string, uniqueId?: string, recordAttributeMap?: array<string, string>, ...}>,
 *     processingType?: 'CONSISTENT'|'EVENTUAL'|'EVENTUAL_NO_LOOKUP',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise generateMatchIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise generateMatchIdAsync(array{
 *     workflowName?: string,
 *     records?: list<array{inputSourceARN?: string, uniqueId?: string, recordAttributeMap?: array<string, string>, ...}>,
 *     processingType?: 'CONSISTENT'|'EVENTUAL'|'EVENTUAL_NO_LOOKUP',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdMappingJob(array $args = [])
 * @phpstan-method \Aws\Result getIdMappingJob(array{workflowName?: string, jobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdMappingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdMappingJobAsync(array{workflowName?: string, jobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdMappingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getIdMappingWorkflow(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdMappingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdMappingWorkflowAsync(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getIdNamespace(array $args = [])
 * @phpstan-method \Aws\Result getIdNamespace(array{idNamespaceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getIdNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getIdNamespaceAsync(array{idNamespaceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMatchId(array $args = [])
 * @phpstan-method \Aws\Result getMatchId(array{workflowName?: string, record?: array<string, string>, applyNormalization?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMatchIdAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMatchIdAsync(array{workflowName?: string, record?: array<string, string>, applyNormalization?: bool, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMatchingJob(array $args = [])
 * @phpstan-method \Aws\Result getMatchingJob(array{workflowName?: string, jobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMatchingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMatchingJobAsync(array{workflowName?: string, jobId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMatchingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result getMatchingWorkflow(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMatchingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getMatchingWorkflowAsync(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPolicy(array $args = [])
 * @phpstan-method \Aws\Result getPolicy(array{arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPolicyAsync(array{arn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProviderService(array $args = [])
 * @phpstan-method \Aws\Result getProviderService(array{providerName?: string, providerServiceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProviderServiceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getProviderServiceAsync(array{providerName?: string, providerServiceName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSchemaMapping(array $args = [])
 * @phpstan-method \Aws\Result getSchemaMapping(array{schemaName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSchemaMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSchemaMappingAsync(array{schemaName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdMappingJobs(array $args = [])
 * @phpstan-method \Aws\Result listIdMappingJobs(array{workflowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdMappingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdMappingJobsAsync(array{workflowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdMappingWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listIdMappingWorkflows(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdMappingWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdMappingWorkflowsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listIdNamespaces(array $args = [])
 * @phpstan-method \Aws\Result listIdNamespaces(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listIdNamespacesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listIdNamespacesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMatchingJobs(array $args = [])
 * @phpstan-method \Aws\Result listMatchingJobs(array{workflowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMatchingJobsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMatchingJobsAsync(array{workflowName?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMatchingWorkflows(array $args = [])
 * @phpstan-method \Aws\Result listMatchingWorkflows(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMatchingWorkflowsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listMatchingWorkflowsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProviderServices(array $args = [])
 * @phpstan-method \Aws\Result listProviderServices(array{nextToken?: string, maxResults?: int, providerName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProviderServicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProviderServicesAsync(array{nextToken?: string, maxResults?: int, providerName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSchemaMappings(array $args = [])
 * @phpstan-method \Aws\Result listSchemaMappings(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSchemaMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSchemaMappingsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPolicy(array $args = [])
 * @phpstan-method \Aws\Result putPolicy(array{arn?: string, token?: string, policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPolicyAsync(array{arn?: string, token?: string, policy?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result startIdMappingJob(array $args = [])
 * @phpstan-method \Aws\Result startIdMappingJob(array{
 *     workflowName?: string,
 *     outputSourceConfig?: list<array{roleArn?: string, outputS3Path?: string, KMSArn?: string, ...}>,
 *     jobType?: 'BATCH'|'DELETE_ONLY'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startIdMappingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startIdMappingJobAsync(array{
 *     workflowName?: string,
 *     outputSourceConfig?: list<array{roleArn?: string, outputS3Path?: string, KMSArn?: string, ...}>,
 *     jobType?: 'BATCH'|'DELETE_ONLY'|'INCREMENTAL',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result startMatchingJob(array $args = [])
 * @phpstan-method \Aws\Result startMatchingJob(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startMatchingJobAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise startMatchingJobAsync(array{workflowName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateIdMappingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateIdMappingWorkflow(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, type?: 'SOURCE'|'TARGET', ...}>,
 *     outputSourceConfig?: list<array{KMSArn?: string, outputS3Path?: string, ...}>,
 *     idMappingTechniques?: array{
 *         idMappingType?: 'PROVIDER'|'RULE_BASED',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             ruleDefinitionType?: 'SOURCE'|'TARGET',
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             recordMatchingModel?: 'MANY_SOURCE_TO_ONE_TARGET'|'ONE_SOURCE_TO_ONE_TARGET',
 *             ...,
 *         },
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'ON_DEMAND', ...},
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateIdMappingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdMappingWorkflowAsync(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, type?: 'SOURCE'|'TARGET', ...}>,
 *     outputSourceConfig?: list<array{KMSArn?: string, outputS3Path?: string, ...}>,
 *     idMappingTechniques?: array{
 *         idMappingType?: 'PROVIDER'|'RULE_BASED',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             ruleDefinitionType?: 'SOURCE'|'TARGET',
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             recordMatchingModel?: 'MANY_SOURCE_TO_ONE_TARGET'|'ONE_SOURCE_TO_ONE_TARGET',
 *             ...,
 *         },
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'ON_DEMAND', ...},
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateIdNamespace(array $args = [])
 * @phpstan-method \Aws\Result updateIdNamespace(array{
 *     idNamespaceName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, ...}>,
 *     idMappingWorkflowProperties?: list<array{idMappingType?: 'PROVIDER'|'RULE_BASED', ruleBasedProperties?: array, providerProperties?: array, ...}>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateIdNamespaceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateIdNamespaceAsync(array{
 *     idNamespaceName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, ...}>,
 *     idMappingWorkflowProperties?: list<array{idMappingType?: 'PROVIDER'|'RULE_BASED', ruleBasedProperties?: array, providerProperties?: array, ...}>,
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMatchingWorkflow(array $args = [])
 * @phpstan-method \Aws\Result updateMatchingWorkflow(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, applyNormalization?: bool, ...}>,
 *     outputSourceConfig?: list<array{
 *         KMSArn?: string,
 *         outputS3Path?: string,
 *         output?: list<array>,
 *         applyNormalization?: bool,
 *         customerProfilesIntegrationConfig?: array,
 *         ...,
 *     }>,
 *     resolutionTechniques?: array{
 *         resolutionType?: 'ML_MATCHING'|'PROVIDER'|'RULE_MATCHING',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             matchPurpose?: 'IDENTIFIER_GENERATION'|'INDEXING',
 *             ...,
 *         },
 *         ruleConditionProperties?: array{rules?: list<array>, matchingConfig?: array, ...},
 *         enableRealTimeMatching?: bool,
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'IMMEDIATE', ...},
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMatchingWorkflowAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateMatchingWorkflowAsync(array{
 *     workflowName?: string,
 *     description?: string,
 *     inputSourceConfig?: list<array{inputSourceARN?: string, schemaName?: string, applyNormalization?: bool, ...}>,
 *     outputSourceConfig?: list<array{
 *         KMSArn?: string,
 *         outputS3Path?: string,
 *         output?: list<array>,
 *         applyNormalization?: bool,
 *         customerProfilesIntegrationConfig?: array,
 *         ...,
 *     }>,
 *     resolutionTechniques?: array{
 *         resolutionType?: 'ML_MATCHING'|'PROVIDER'|'RULE_MATCHING',
 *         ruleBasedProperties?: array{
 *             rules?: list<array>,
 *             attributeMatchingModel?: 'MANY_TO_MANY'|'ONE_TO_ONE',
 *             matchPurpose?: 'IDENTIFIER_GENERATION'|'INDEXING',
 *             ...,
 *         },
 *         ruleConditionProperties?: array{rules?: list<array>, matchingConfig?: array, ...},
 *         enableRealTimeMatching?: bool,
 *         providerProperties?: array{
 *             providerServiceArn?: string,
 *             providerConfiguration?: array,
 *             intermediateSourceConfiguration?: array,
 *             ...,
 *         },
 *         ...,
 *     },
 *     incrementalRunConfig?: array{incrementalRunType?: 'IMMEDIATE', ...},
 *     roleArn?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSchemaMapping(array $args = [])
 * @phpstan-method \Aws\Result updateSchemaMapping(array{
 *     schemaName?: string,
 *     description?: string,
 *     mappedInputFields?: list<array{
 *         fieldName?: string,
 *         type?: 'ADDRESS'|'ADDRESS_CITY'|'ADDRESS_COUNTRY'|'ADDRESS_POSTALCODE'|'ADDRESS_STATE'|'ADDRESS_STREET1'|'ADDRESS_STREET2'|'ADDRESS_STREET3'|'DATE'|'EMAIL_ADDRESS'|'IPV4'|'IPV6'|'MAID'|'NAME'|'NAME_FIRST'|'NAME_LAST'|'NAME_MIDDLE'|'PHONE'|'PHONE_COUNTRYCODE'|'PHONE_NUMBER'|'PROVIDER_ID'|'STRING'|'UNIQUE_ID',
 *         groupName?: string,
 *         matchKey?: string,
 *         subType?: string,
 *         hashed?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSchemaMappingAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSchemaMappingAsync(array{
 *     schemaName?: string,
 *     description?: string,
 *     mappedInputFields?: list<array{
 *         fieldName?: string,
 *         type?: 'ADDRESS'|'ADDRESS_CITY'|'ADDRESS_COUNTRY'|'ADDRESS_POSTALCODE'|'ADDRESS_STATE'|'ADDRESS_STREET1'|'ADDRESS_STREET2'|'ADDRESS_STREET3'|'DATE'|'EMAIL_ADDRESS'|'IPV4'|'IPV6'|'MAID'|'NAME'|'NAME_FIRST'|'NAME_LAST'|'NAME_MIDDLE'|'PHONE'|'PHONE_COUNTRYCODE'|'PHONE_NUMBER'|'PROVIDER_ID'|'STRING'|'UNIQUE_ID',
 *         groupName?: string,
 *         matchKey?: string,
 *         subType?: string,
 *         hashed?: bool,
 *         ...,
 *     }>,
 *     ...,
 * } $args = [])
 */
class EntityResolutionClient extends AwsClient {}
