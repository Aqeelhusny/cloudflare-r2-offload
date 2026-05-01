<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\IdentityStore;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS SSO Identity Store** service.
 * @method \R2Offload\Vendor\Aws\Result createGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGroupMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGroupMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGroupMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGroupMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeGroupMembership(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeGroupMembershipAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroupId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGroupMembershipId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGroupMembershipIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getUserId(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getUserIdAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result isMemberInGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise isMemberInGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupMemberships(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupMembershipsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroupMembershipsForMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupMembershipsForMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGroups(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGroup(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class IdentityStoreClient extends AwsClient {}
