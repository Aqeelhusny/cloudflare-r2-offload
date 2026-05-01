<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ManagedBlockchain;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Managed Blockchain** service.
 * @method \R2Offload\Vendor\Aws\Result createAccessor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createAccessorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createNetwork(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createNetworkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createNode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createNodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProposal(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProposalAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteAccessor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteAccessorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteNode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteNodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getNetwork(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getNetworkAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getNode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getNodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getProposal(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getProposalAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAccessors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAccessorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInvitations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInvitationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listMembers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listMembersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNetworks(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNetworksAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listNodes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listNodesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProposalVotes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProposalVotesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProposals(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProposalsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectInvitation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectInvitationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateMember(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateMemberAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateNode(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateNodeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result voteOnProposal(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise voteOnProposalAsync(array $args = [])
 */
class ManagedBlockchainClient extends AwsClient {}
