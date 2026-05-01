<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Neptune;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon Neptune** service.
 * @method \R2Offload\Vendor\Aws\Result addRoleToDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addRoleToDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result addTagsToResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result applyPendingMaintenanceAction(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyDBClusterParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyDBClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result copyDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise copyDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBClusterEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBClusterParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGlobalClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBClusterSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGlobalClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterEndpoints(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterEndpointsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterParameterGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterSnapshotAttributes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusterSnapshots(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBEngineVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBInstances(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBParameterGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBParameterGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeDBSubnetGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEngineDefaultClusterParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventCategories(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEventSubscriptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEvents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeGlobalClusters(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeGlobalClustersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describePendingMaintenanceActions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeValidDBInstanceModifications(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeValidDBInstanceModificationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result failoverDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise failoverDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result failoverGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise failoverGlobalClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterEndpoint(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterEndpointAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBClusterSnapshotAttribute(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyDBSubnetGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyEventSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyGlobalClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result promoteReadReplicaDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootDBInstance(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeFromGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeFromGlobalClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeRoleFromDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeRoleFromDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTagsFromResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetDBClusterParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetDBParameterGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetDBParameterGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreDBClusterFromSnapshot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreDBClusterToPointInTime(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopDBCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopDBClusterAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result switchoverGlobalCluster(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise switchoverGlobalClusterAsync(array $args = [])
 */
class NeptuneClient extends AwsClient {
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster',
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                        'require_different_region' => true,
                        'extra_query_params' => [
                            'CopyDBClusterSnapshot' => ['DestinationRegion'],
                            'CreateDBCluster' => ['DestinationRegion'],
                        ]
                    ]
                ),
                'rds.presigner'
            );
        };
        parent::__construct($args);
    }
}
