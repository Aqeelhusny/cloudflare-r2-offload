<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PcaConnectorAd;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **PcaConnectorAd** service.
 * @method \R2Offload\Vendor\Aws\Result createConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDirectoryRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDirectoryRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createServicePrincipalName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createServicePrincipalNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTemplateGroupAccessControlEntry(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTemplateGroupAccessControlEntryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDirectoryRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDirectoryRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteServicePrincipalName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteServicePrincipalNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTemplateGroupAccessControlEntry(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTemplateGroupAccessControlEntryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnector(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDirectoryRegistration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDirectoryRegistrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServicePrincipalName(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServicePrincipalNameAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getTemplateGroupAccessControlEntry(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getTemplateGroupAccessControlEntryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnectors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDirectoryRegistrations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDirectoryRegistrationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listServicePrincipalNames(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listServicePrincipalNamesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTemplateGroupAccessControlEntries(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTemplateGroupAccessControlEntriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTemplates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTemplatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTemplate(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTemplateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateTemplateGroupAccessControlEntry(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateTemplateGroupAccessControlEntryAsync(array $args = [])
 */
class PcaConnectorAdClient extends AwsClient {}
