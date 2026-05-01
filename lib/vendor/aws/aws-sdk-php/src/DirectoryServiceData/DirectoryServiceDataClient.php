<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\DirectoryServiceData;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Directory Service Data** service.
 * @method \R2Offload\Vendor\Aws\Result addGroupMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addGroupMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disableUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disableUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupsForMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupsForMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeGroupMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeGroupMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class DirectoryServiceDataClient extends AwsClient {}
