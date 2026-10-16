<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AppRegistry;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Service Catalog App Registry** service.
 * @method \R2Offload\Vendor\Aws\Result associateAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result associateAttributeGroup(array{application?: string, attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateAttributeGroupAsync(array{application?: string, attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateResource(array $args = [])
 * @phpstan-method \Aws\Result associateResource(array{
 *     application?: string,
 *     resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE',
 *     resource?: string,
 *     options?: list<'APPLY_APPLICATION_TAG'|'SKIP_APPLICATION_TAG'>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateResourceAsync(array{
 *     application?: string,
 *     resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE',
 *     resource?: string,
 *     options?: list<'APPLY_APPLICATION_TAG'|'SKIP_APPLICATION_TAG'>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @phpstan-method \Aws\Result createApplication(array{name?: string, description?: string, tags?: array<string, string>, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createApplicationAsync(array{name?: string, description?: string, tags?: array<string, string>, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result createAttributeGroup(array{
 *     name?: string,
 *     description?: string,
 *     attributes?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createAttributeGroupAsync(array{
 *     name?: string,
 *     description?: string,
 *     attributes?: string,
 *     tags?: array<string, string>,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @phpstan-method \Aws\Result deleteApplication(array{application?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteApplicationAsync(array{application?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result deleteAttributeGroup(array{attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteAttributeGroupAsync(array{attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result disassociateAttributeGroup(array{application?: string, attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateAttributeGroupAsync(array{application?: string, attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateResource(array $args = [])
 * @phpstan-method \Aws\Result disassociateResource(array{application?: string, resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE', resource?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateResourceAsync(array{application?: string, resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE', resource?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @phpstan-method \Aws\Result getApplication(array{application?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getApplicationAsync(array{application?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssociatedResource(array $args = [])
 * @phpstan-method \Aws\Result getAssociatedResource(array{
 *     application?: string,
 *     resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE',
 *     resource?: string,
 *     nextToken?: string,
 *     resourceTagStatus?: list<'FAILED'|'IN_PROGRESS'|'SKIPPED'|'SUCCESS'>,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssociatedResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssociatedResourceAsync(array{
 *     application?: string,
 *     resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE',
 *     resource?: string,
 *     nextToken?: string,
 *     resourceTagStatus?: list<'FAILED'|'IN_PROGRESS'|'SKIPPED'|'SUCCESS'>,
 *     maxResults?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result getAttributeGroup(array{attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAttributeGroupAsync(array{attributeGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfiguration(array $args = [])
 * @phpstan-method \Aws\Result getConfiguration(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getConfigurationAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @phpstan-method \Aws\Result listApplications(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listApplicationsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedAttributeGroups(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedAttributeGroups(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedAttributeGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedAttributeGroupsAsync(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedResources(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedResources(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedResourcesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedResourcesAsync(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttributeGroups(array $args = [])
 * @phpstan-method \Aws\Result listAttributeGroups(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttributeGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttributeGroupsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttributeGroupsForApplication(array $args = [])
 * @phpstan-method \Aws\Result listAttributeGroupsForApplication(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttributeGroupsForApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAttributeGroupsForApplicationAsync(array{application?: string, nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putConfiguration(array{configuration?: array{tagQueryConfiguration?: array{tagKey?: string, ...}, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putConfigurationAsync(array{configuration?: array{tagQueryConfiguration?: array{tagKey?: string, ...}, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result syncResource(array $args = [])
 * @phpstan-method \Aws\Result syncResource(array{resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE', resource?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise syncResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise syncResourceAsync(array{resourceType?: 'CFN_STACK'|'RESOURCE_TAG_VALUE', resource?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @phpstan-method \Aws\Result updateApplication(array{application?: string, name?: string, description?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateApplicationAsync(array{application?: string, name?: string, description?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAttributeGroup(array $args = [])
 * @phpstan-method \Aws\Result updateAttributeGroup(array{attributeGroup?: string, name?: string, description?: string, attributes?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAttributeGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateAttributeGroupAsync(array{attributeGroup?: string, name?: string, description?: string, attributes?: string, ...} $args = [])
 */
class AppRegistryClient extends AwsClient {}
