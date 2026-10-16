<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CodeArtifact;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **CodeArtifact** service.
 * @method \R2Offload\Vendor\Aws\Result associateExternalConnection(array $args = [])
 * @phpstan-method \Aws\Result associateExternalConnection(array{domain?: string, domainOwner?: string, repository?: string, externalConnection?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateExternalConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise associateExternalConnectionAsync(array{domain?: string, domainOwner?: string, repository?: string, externalConnection?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyPackageVersions(array $args = [])
 * @phpstan-method \Aws\Result copyPackageVersions(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     sourceRepository?: string,
 *     destinationRepository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     allowOverwrite?: bool,
 *     includeFromUpstream?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyPackageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise copyPackageVersionsAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     sourceRepository?: string,
 *     destinationRepository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     allowOverwrite?: bool,
 *     includeFromUpstream?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDomain(array $args = [])
 * @phpstan-method \Aws\Result createDomain(array{domain?: string, encryptionKey?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createDomainAsync(array{domain?: string, encryptionKey?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPackageGroup(array $args = [])
 * @phpstan-method \Aws\Result createPackageGroup(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     contactInfo?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createPackageGroupAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     contactInfo?: string,
 *     description?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRepository(array $args = [])
 * @phpstan-method \Aws\Result createRepository(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     description?: string,
 *     upstreams?: list<array{repositoryName?: string, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRepositoryAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     description?: string,
 *     upstreams?: list<array{repositoryName?: string, ...}>,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomain(array $args = [])
 * @phpstan-method \Aws\Result deleteDomain(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainAsync(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDomainPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteDomainPermissionsPolicy(array{domain?: string, domainOwner?: string, policyRevision?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDomainPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDomainPermissionsPolicyAsync(array{domain?: string, domainOwner?: string, policyRevision?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePackage(array $args = [])
 * @phpstan-method \Aws\Result deletePackage(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePackageGroup(array $args = [])
 * @phpstan-method \Aws\Result deletePackageGroup(array{domain?: string, domainOwner?: string, packageGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageGroupAsync(array{domain?: string, domainOwner?: string, packageGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePackageVersions(array $args = [])
 * @phpstan-method \Aws\Result deletePackageVersions(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePackageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deletePackageVersionsAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepository(array $args = [])
 * @phpstan-method \Aws\Result deleteRepository(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryAsync(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRepositoryPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result deleteRepositoryPermissionsPolicy(array{domain?: string, domainOwner?: string, repository?: string, policyRevision?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRepositoryPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRepositoryPermissionsPolicyAsync(array{domain?: string, domainOwner?: string, repository?: string, policyRevision?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDomain(array $args = [])
 * @phpstan-method \Aws\Result describeDomain(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeDomainAsync(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePackage(array $args = [])
 * @phpstan-method \Aws\Result describePackage(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePackageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackageAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePackageGroup(array $args = [])
 * @phpstan-method \Aws\Result describePackageGroup(array{domain?: string, domainOwner?: string, packageGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackageGroupAsync(array{domain?: string, domainOwner?: string, packageGroup?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePackageVersion(array $args = [])
 * @phpstan-method \Aws\Result describePackageVersion(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describePackageVersionAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeRepository(array $args = [])
 * @phpstan-method \Aws\Result describeRepository(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise describeRepositoryAsync(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateExternalConnection(array $args = [])
 * @phpstan-method \Aws\Result disassociateExternalConnection(array{domain?: string, domainOwner?: string, repository?: string, externalConnection?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateExternalConnectionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disassociateExternalConnectionAsync(array{domain?: string, domainOwner?: string, repository?: string, externalConnection?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result disposePackageVersions(array $args = [])
 * @phpstan-method \Aws\Result disposePackageVersions(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disposePackageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise disposePackageVersionsAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAssociatedPackageGroup(array $args = [])
 * @phpstan-method \Aws\Result getAssociatedPackageGroup(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAssociatedPackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAssociatedPackageGroupAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAuthorizationToken(array $args = [])
 * @phpstan-method \Aws\Result getAuthorizationToken(array{domain?: string, domainOwner?: string, durationSeconds?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array{domain?: string, domainOwner?: string, durationSeconds?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDomainPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result getDomainPermissionsPolicy(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDomainPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDomainPermissionsPolicyAsync(array{domain?: string, domainOwner?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPackageVersionAsset(array $args = [])
 * @phpstan-method \Aws\Result getPackageVersionAsset(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     asset?: string,
 *     packageVersionRevision?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPackageVersionAssetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageVersionAssetAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     asset?: string,
 *     packageVersionRevision?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPackageVersionReadme(array $args = [])
 * @phpstan-method \Aws\Result getPackageVersionReadme(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPackageVersionReadmeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getPackageVersionReadmeAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryEndpoint(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryEndpoint(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     endpointType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryEndpointAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryEndpointAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     endpointType?: 'dualstack'|'ipv4',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRepositoryPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result getRepositoryPermissionsPolicy(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRepositoryPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRepositoryPermissionsPolicyAsync(array{domain?: string, domainOwner?: string, repository?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAllowedRepositoriesForGroup(array $args = [])
 * @phpstan-method \Aws\Result listAllowedRepositoriesForGroup(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAllowedRepositoriesForGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAllowedRepositoriesForGroupAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH',
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAssociatedPackages(array $args = [])
 * @phpstan-method \Aws\Result listAssociatedPackages(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     preview?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAssociatedPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listAssociatedPackagesAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     preview?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackageGroups(array $args = [])
 * @phpstan-method \Aws\Result listPackageGroups(array{domain?: string, domainOwner?: string, maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackageGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackageGroupsAsync(array{domain?: string, domainOwner?: string, maxResults?: int, nextToken?: string, prefix?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackageVersionAssets(array $args = [])
 * @phpstan-method \Aws\Result listPackageVersionAssets(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackageVersionAssetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackageVersionAssetsAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackageVersionDependencies(array $args = [])
 * @phpstan-method \Aws\Result listPackageVersionDependencies(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackageVersionDependenciesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackageVersionDependenciesAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackageVersions(array $args = [])
 * @phpstan-method \Aws\Result listPackageVersions(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     status?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     sortBy?: 'PUBLISHED_TIME',
 *     maxResults?: int,
 *     nextToken?: string,
 *     originType?: 'EXTERNAL'|'INTERNAL'|'UNKNOWN',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackageVersionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackageVersionsAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     status?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     sortBy?: 'PUBLISHED_TIME',
 *     maxResults?: int,
 *     nextToken?: string,
 *     originType?: 'EXTERNAL'|'INTERNAL'|'UNKNOWN',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPackages(array $args = [])
 * @phpstan-method \Aws\Result listPackages(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     packagePrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     publish?: 'ALLOW'|'BLOCK',
 *     upstream?: 'ALLOW'|'BLOCK',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPackagesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listPackagesAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     packagePrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     publish?: 'ALLOW'|'BLOCK',
 *     upstream?: 'ALLOW'|'BLOCK',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRepositories(array $args = [])
 * @phpstan-method \Aws\Result listRepositories(array{repositoryPrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRepositoriesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoriesAsync(array{repositoryPrefix?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRepositoriesInDomain(array $args = [])
 * @phpstan-method \Aws\Result listRepositoriesInDomain(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     administratorAccount?: string,
 *     repositoryPrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRepositoriesInDomainAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRepositoriesInDomainAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     administratorAccount?: string,
 *     repositoryPrefix?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSubPackageGroups(array $args = [])
 * @phpstan-method \Aws\Result listSubPackageGroups(array{domain?: string, domainOwner?: string, packageGroup?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSubPackageGroupsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSubPackageGroupsAsync(array{domain?: string, domainOwner?: string, packageGroup?: string, maxResults?: int, nextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result publishPackageVersion(array $args = [])
 * @phpstan-method \Aws\Result publishPackageVersion(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     assetContent?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     assetName?: string,
 *     assetSHA256?: string,
 *     unfinished?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise publishPackageVersionAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise publishPackageVersionAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     packageVersion?: string,
 *     assetContent?: string|resource|\R2Offload\Vendor\Psr\Http\Message\StreamInterface,
 *     assetName?: string,
 *     assetSHA256?: string,
 *     unfinished?: bool,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putDomainPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result putDomainPermissionsPolicy(array{domain?: string, domainOwner?: string, policyRevision?: string, policyDocument?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putDomainPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putDomainPermissionsPolicyAsync(array{domain?: string, domainOwner?: string, policyRevision?: string, policyDocument?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result putPackageOriginConfiguration(array $args = [])
 * @phpstan-method \Aws\Result putPackageOriginConfiguration(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     restrictions?: array{publish?: 'ALLOW'|'BLOCK', upstream?: 'ALLOW'|'BLOCK', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putPackageOriginConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putPackageOriginConfigurationAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     restrictions?: array{publish?: 'ALLOW'|'BLOCK', upstream?: 'ALLOW'|'BLOCK', ...},
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result putRepositoryPermissionsPolicy(array $args = [])
 * @phpstan-method \Aws\Result putRepositoryPermissionsPolicy(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     policyRevision?: string,
 *     policyDocument?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putRepositoryPermissionsPolicyAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise putRepositoryPermissionsPolicyAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     policyRevision?: string,
 *     policyDocument?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePackageGroup(array $args = [])
 * @phpstan-method \Aws\Result updatePackageGroup(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     contactInfo?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePackageGroupAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageGroupAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     contactInfo?: string,
 *     description?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePackageGroupOriginConfiguration(array $args = [])
 * @phpstan-method \Aws\Result updatePackageGroupOriginConfiguration(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     restrictions?: array<string, 'ALLOW'|'ALLOW_SPECIFIC_REPOSITORIES'|'BLOCK'|'INHERIT'>,
 *     addAllowedRepositories?: list<array{repositoryName?: string, originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH', ...}>,
 *     removeAllowedRepositories?: list<array{repositoryName?: string, originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePackageGroupOriginConfigurationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageGroupOriginConfigurationAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     packageGroup?: string,
 *     restrictions?: array<string, 'ALLOW'|'ALLOW_SPECIFIC_REPOSITORIES'|'BLOCK'|'INHERIT'>,
 *     addAllowedRepositories?: list<array{repositoryName?: string, originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH', ...}>,
 *     removeAllowedRepositories?: list<array{repositoryName?: string, originRestrictionType?: 'EXTERNAL_UPSTREAM'|'INTERNAL_UPSTREAM'|'PUBLISH', ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePackageVersionsStatus(array $args = [])
 * @phpstan-method \Aws\Result updatePackageVersionsStatus(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     targetStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePackageVersionsStatusAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updatePackageVersionsStatusAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     format?: 'cargo'|'generic'|'maven'|'npm'|'nuget'|'pypi'|'ruby'|'swift',
 *     namespace?: string,
 *     package?: string,
 *     versions?: list<string>,
 *     versionRevisions?: array<string, string>,
 *     expectedStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     targetStatus?: 'Archived'|'Deleted'|'Disposed'|'Published'|'Unfinished'|'Unlisted',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRepository(array $args = [])
 * @phpstan-method \Aws\Result updateRepository(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     description?: string,
 *     upstreams?: list<array{repositoryName?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRepositoryAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRepositoryAsync(array{
 *     domain?: string,
 *     domainOwner?: string,
 *     repository?: string,
 *     description?: string,
 *     upstreams?: list<array{repositoryName?: string, ...}>,
 *     ...,
 * } $args = [])
 */
class CodeArtifactClient extends AwsClient {}
