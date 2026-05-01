<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AppRegistry;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Service Catalog App Registry** service.
 * @method \R2Offload\Vendor\Aws\Result associateAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateAttributeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAttributeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAttributeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateAttributeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssociatedResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssociatedResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAttributeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedAttributeGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedAttributeGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttributeGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttributeGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAttributeGroupsForApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAttributeGroupsForApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result syncResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise syncResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateAttributeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateAttributeGroupAsync(array $args = [])
 */
class AppRegistryClient extends AwsClient {}
