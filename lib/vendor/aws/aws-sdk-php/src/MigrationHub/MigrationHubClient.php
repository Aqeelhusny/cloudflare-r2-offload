<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MigrationHub;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Migration Hub** service.
 * @method \R2Offload\Vendor\Aws\Result associateCreatedArtifact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateCreatedArtifactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateDiscoveredResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateDiscoveredResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result associateSourceResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateSourceResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProgressUpdateStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProgressUpdateStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProgressUpdateStream(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProgressUpdateStreamAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeApplicationState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeApplicationStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeMigrationTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeMigrationTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateCreatedArtifact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateCreatedArtifactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateDiscoveredResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateDiscoveredResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateSourceResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateSourceResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importMigrationTask(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importMigrationTaskAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listApplicationStates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listApplicationStatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCreatedArtifacts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCreatedArtifactsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDiscoveredResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDiscoveredResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMigrationTaskUpdates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMigrationTaskUpdatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMigrationTasks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMigrationTasksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProgressUpdateStreams(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProgressUpdateStreamsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSourceResources(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSourceResourcesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result notifyApplicationState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise notifyApplicationStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result notifyMigrationTaskState(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise notifyMigrationTaskStateAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourceAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourceAttributesAsync(array $args = [])
 */
class MigrationHubClient extends AwsClient {}
