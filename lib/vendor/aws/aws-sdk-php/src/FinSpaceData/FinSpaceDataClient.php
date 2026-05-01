<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\FinSpaceData;

use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **FinSpace Public API** service.
 * @method \R2Offload\Vendor\Aws\Result associateUserToPermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateUserToPermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChangeset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChangesetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDataViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createPermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createPermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deletePermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deletePermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateUserFromPermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateUserFromPermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result enableUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise enableUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getChangeset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getChangesetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataView(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDataViewAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getExternalDataViewAccessDetails(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getExternalDataViewAccessDetailsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getPermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getPermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProgrammaticAccessCredentials(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProgrammaticAccessCredentialsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWorkingLocation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWorkingLocationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChangesets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChangesetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDataViews(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDataViewsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDatasets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPermissionGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPermissionGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listPermissionGroupsByUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listPermissionGroupsByUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUsersByPermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUsersByPermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resetUserPassword(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resetUserPasswordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateChangeset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateChangesetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDataset(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updatePermissionGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updatePermissionGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class FinSpaceDataClient extends AwsClient {}
