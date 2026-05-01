<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeConnections;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS CodeConnections** service.
 * @method \R2Offload\Vendor\Aws\Result createConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRepositoryLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRepositoryLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSyncConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSyncConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepositoryLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSyncConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSyncConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnection(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositorySyncStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositorySyncStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourceSyncStatus(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourceSyncStatusAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSyncBlockerSummary(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSyncBlockerSummaryAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSyncConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSyncConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConnections(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConnectionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHosts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHostsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRepositoryLinks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRepositoryLinksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRepositorySyncDefinitions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRepositorySyncDefinitionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSyncConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSyncConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHost(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHostAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRepositoryLink(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRepositoryLinkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSyncBlocker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSyncBlockerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSyncConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSyncConfigurationAsync(array $args = [])
 */
class CodeConnectionsClient extends AwsClient {}
