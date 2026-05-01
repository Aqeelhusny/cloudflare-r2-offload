<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AppIntegrationsService;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon AppIntegrations Service** service.
 * @method \R2Offload\Vendor\Aws\Result createApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataIntegrationAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataIntegrationAssociationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEventIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEventIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDataIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEventIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEventIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEventIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEventIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplicationAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataIntegrationAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataIntegrationAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataIntegrations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataIntegrationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEventIntegrationAssociations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEventIntegrationAssociationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEventIntegrations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEventIntegrationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateApplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataIntegrationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataIntegrationAssociation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDataIntegrationAssociationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEventIntegration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEventIntegrationAsync(array $args = [])
 */
class AppIntegrationsServiceClient extends AwsClient {}
