<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Rds;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\Api\Service;
use R2Offload\Vendor\Aws\Api\DocModel;
use R2Offload\Vendor\Aws\Api\ApiProvider;
use R2Offload\Vendor\Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon Relational Database Service (Amazon RDS)**.
 *
 * @method \R2Offload\Vendor\Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addTagsToResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result authorizeDBSecurityGroupIngress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise authorizeDBSecurityGroupIngressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyDBSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyOptionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyOptionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBInstanceReadReplica(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBInstanceReadReplicaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBSecurityGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBSecurityGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createOptionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createOptionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBSecurityGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBSecurityGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteOptionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteOptionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBEngineVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBLogFiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBLogFilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBParameterGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBParameterGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBSecurityGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSecurityGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBSnapshots(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSnapshotsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBSubnetGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventCategories(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventSubscriptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOptionGroupOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOptionGroupOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOptionGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOptionGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReservedDBInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReservedDBInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeReservedDBInstancesOfferings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeReservedDBInstancesOfferingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result downloadDBLogFilePortion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise downloadDBLogFilePortionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyOptionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyOptionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result promoteReadReplica(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise promoteReadReplicaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result purchaseReservedDBInstancesOffering(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise purchaseReservedDBInstancesOfferingAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTagsFromResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreDBInstanceFromDBSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBInstanceFromDBSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreDBInstanceToPointInTime(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBInstanceToPointInTimeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result revokeDBSecurityGroupIngress(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise revokeDBSecurityGroupIngressAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addRoleToDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addRoleToDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result addRoleToDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addRoleToDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result applyPendingMaintenanceAction(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result backtrackDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise backtrackDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result cancelExportTask(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result copyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result copyDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createIntegration(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result createTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterAutomatedBackup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterAutomatedBackupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBInstanceAutomatedBackup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBInstanceAutomatedBackupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteIntegration(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deleteTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result deregisterDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeAccountAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeBlueGreenDeployments(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBlueGreenDeploymentsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeCertificates(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterAutomatedBackups(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterAutomatedBackupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterBacktracks(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterBacktracksAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterParameterGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterSnapshots(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBClusters(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBInstanceAutomatedBackups(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBInstanceAutomatedBackupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBMajorEngineVersions(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBMajorEngineVersionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBProxies(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBProxiesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBProxyEndpoints(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBProxyEndpointsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBProxyTargetGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBProxyTargetGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBRecommendations(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBRecommendationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBShardGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBShardGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeDBSnapshotTenantDatabases(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSnapshotTenantDatabasesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeEngineDefaultClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeExportTasks(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeGlobalClusters(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeIntegrations(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeIntegrationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describePendingMaintenanceActions(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeServerlessV2PlatformVersions(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeServerlessV2PlatformVersionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeSourceRegions(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSourceRegionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeTenantDatabases(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeTenantDatabasesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result describeValidDBInstanceModifications(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeValidDBInstanceModificationsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result disableHttpEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableHttpEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result enableHttpEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableHttpEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result failoverDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise failoverDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result failoverGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyCertificates(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyCurrentDBClusterCapacity(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyCurrentDBClusterCapacityAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyCustomDBEngineVersion(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyCustomDBEngineVersionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBProxy(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBProxyAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBProxyEndpoint(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBProxyEndpointAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBProxyTargetGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBProxyTargetGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBRecommendation(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBRecommendationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyDBSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyIntegration(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyIntegrationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result modifyTenantDatabase(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyTenantDatabaseAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result promoteReadReplicaDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result rebootDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result rebootDBShardGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDBShardGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result registerDBProxyTargets(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise registerDBProxyTargetsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result removeFromGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result removeRoleFromDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeRoleFromDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result removeRoleFromDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeRoleFromDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result resetDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result restoreDBClusterFromS3(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBClusterFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result restoreDBClusterFromSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result restoreDBClusterToPointInTime(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result restoreDBInstanceFromS3(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBInstanceFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result startActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result startDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result startDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result startDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result startExportTask(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result stopActivityStream(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopActivityStreamAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result stopDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result stopDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result stopDBInstanceAutomatedBackupsReplication(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDBInstanceAutomatedBackupsReplicationAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result switchoverBlueGreenDeployment(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise switchoverBlueGreenDeploymentAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result switchoverGlobalCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\Aws\Result switchoverReadReplica(array $args = []) (supported in versions 2014-10-31)
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise switchoverReadReplicaAsync(array $args = []) (supported in versions 2014-10-31)
 */
class RdsClient extends AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBSnapshot',
                            'CreateDBInstanceReadReplica',
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster',
                            'StartDBInstanceAutomatedBackupsReplication'
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                        'require_different_region' => true,
                        'extra_query_params' => [
                            'CopyDBSnapshot' => ['DestinationRegion'],
                            'CreateDBInstanceReadReplica' => ['DestinationRegion'],
                            'CopyDBClusterSnapshot' => ['DestinationRegion'],
                            'CreateDBCluster' => ['DestinationRegion'],
                            'StartDBInstanceAutomatedBackupsReplication' => ['DestinationRegion']
                        ]
                    ]
                ),
                'rds.presigner'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Add the SourceRegion parameter
        $docs['shapes']['SourceRegion']['base'] = 'A required parameter that indicates '
            . 'the region that the DB snapshot will be copied from.';
        $api['shapes']['SourceRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

        // Add the DestinationRegion parameter
        $docs['shapes']['DestinationRegion']['base']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';
        $api['shapes']['DestinationRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        if ($api['metadata']['apiVersion'] != '2014-09-01') {
            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['DestinationRegion'] = ['shape' => 'DestinationRegion'];

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';
        }

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
