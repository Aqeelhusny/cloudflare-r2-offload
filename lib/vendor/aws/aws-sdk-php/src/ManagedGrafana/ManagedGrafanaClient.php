<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ManagedGrafana;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Grafana** service.
 * @method \R2Offload\Vendor\Aws\Result associateLicense(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateLicenseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkspaceApiKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkspaceApiKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkspaceServiceAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkspaceServiceAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createWorkspaceServiceAccountToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createWorkspaceServiceAccountTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkspaceApiKey(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkspaceApiKeyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkspaceServiceAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteWorkspaceServiceAccountToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteWorkspaceServiceAccountTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWorkspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWorkspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWorkspaceAuthentication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWorkspaceAuthenticationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeWorkspaceConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeWorkspaceConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateLicense(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateLicenseAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPermissions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPermissionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkspaceServiceAccountTokens(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkspaceServiceAccountTokensAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkspaceServiceAccounts(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkspaceServiceAccountsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listWorkspaces(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listWorkspacesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePermissions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePermissionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWorkspace(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWorkspaceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWorkspaceAuthentication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWorkspaceAuthenticationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateWorkspaceConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateWorkspaceConfigurationAsync(array $args = [])
 */
class ManagedGrafanaClient extends AwsClient {}
