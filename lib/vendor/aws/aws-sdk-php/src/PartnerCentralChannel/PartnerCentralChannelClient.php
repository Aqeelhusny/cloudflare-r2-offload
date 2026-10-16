<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\PartnerCentralChannel;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Partner Central Channel API** service.
 * @method \R2Offload\Vendor\Aws\Result acceptChannelHandshake(array $args = [])
 * @phpstan-method \Aws\Result acceptChannelHandshake(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise acceptChannelHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise acceptChannelHandshakeAsync(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelChannelHandshake(array $args = [])
 * @phpstan-method \Aws\Result cancelChannelHandshake(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelChannelHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise cancelChannelHandshakeAsync(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result createChannelHandshake(array $args = [])
 * @phpstan-method \Aws\Result createChannelHandshake(array{
 *     handshakeType?: 'PROGRAM_MANAGEMENT_ACCOUNT'|'REVOKE_SERVICE_PERIOD'|'START_SERVICE_PERIOD',
 *     catalog?: string,
 *     associatedResourceIdentifier?: string,
 *     payload?: array{
 *         startServicePeriodPayload?: array{
 *             programManagementAccountIdentifier?: string,
 *             note?: string,
 *             servicePeriodType?: 'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD',
 *             minimumNoticeDays?: string,
 *             endDate?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         revokeServicePeriodPayload?: array{programManagementAccountIdentifier?: string, note?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createChannelHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createChannelHandshakeAsync(array{
 *     handshakeType?: 'PROGRAM_MANAGEMENT_ACCOUNT'|'REVOKE_SERVICE_PERIOD'|'START_SERVICE_PERIOD',
 *     catalog?: string,
 *     associatedResourceIdentifier?: string,
 *     payload?: array{
 *         startServicePeriodPayload?: array{
 *             programManagementAccountIdentifier?: string,
 *             note?: string,
 *             servicePeriodType?: 'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD',
 *             minimumNoticeDays?: string,
 *             endDate?: int|string|\DateTimeInterface,
 *             ...,
 *         },
 *         revokeServicePeriodPayload?: array{programManagementAccountIdentifier?: string, note?: string, ...},
 *         ...,
 *     },
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createProgramManagementAccount(array $args = [])
 * @phpstan-method \Aws\Result createProgramManagementAccount(array{
 *     catalog?: string,
 *     program?: 'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER',
 *     displayName?: string,
 *     accountId?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createProgramManagementAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createProgramManagementAccountAsync(array{
 *     catalog?: string,
 *     program?: 'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER',
 *     displayName?: string,
 *     accountId?: string,
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result createRelationship(array $args = [])
 * @phpstan-method \Aws\Result createRelationship(array{
 *     catalog?: string,
 *     associationType?: 'DOWNSTREAM_SELLER'|'END_CUSTOMER'|'INTERNAL',
 *     programManagementAccountIdentifier?: string,
 *     associatedAccountId?: string,
 *     displayName?: string,
 *     resaleAccountModel?: 'DISTRIBUTOR'|'END_CUSTOMER'|'SOLUTION_PROVIDER',
 *     sector?: 'COMMERCIAL'|'GOVERNMENT'|'GOVERNMENT_EXCEPTION',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     requestedSupportPlan?: array{
 *         resoldEnterprise?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         partnerLedSupport?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             provider?: 'DISTRIBUTION_SELLER'|'DISTRIBUTOR',
 *             tamLocation?: string,
 *             ...,
 *         },
 *         resoldUnifiedOperations?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createRelationshipAsync(array{
 *     catalog?: string,
 *     associationType?: 'DOWNSTREAM_SELLER'|'END_CUSTOMER'|'INTERNAL',
 *     programManagementAccountIdentifier?: string,
 *     associatedAccountId?: string,
 *     displayName?: string,
 *     resaleAccountModel?: 'DISTRIBUTOR'|'END_CUSTOMER'|'SOLUTION_PROVIDER',
 *     sector?: 'COMMERCIAL'|'GOVERNMENT'|'GOVERNMENT_EXCEPTION',
 *     clientToken?: string,
 *     tags?: list<array{key?: string, value?: string, ...}>,
 *     requestedSupportPlan?: array{
 *         resoldEnterprise?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         partnerLedSupport?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             provider?: 'DISTRIBUTION_SELLER'|'DISTRIBUTOR',
 *             tamLocation?: string,
 *             ...,
 *         },
 *         resoldUnifiedOperations?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteProgramManagementAccount(array $args = [])
 * @phpstan-method \Aws\Result deleteProgramManagementAccount(array{catalog?: string, identifier?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteProgramManagementAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteProgramManagementAccountAsync(array{catalog?: string, identifier?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteRelationship(array $args = [])
 * @phpstan-method \Aws\Result deleteRelationship(array{
 *     catalog?: string,
 *     identifier?: string,
 *     programManagementAccountIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteRelationshipAsync(array{
 *     catalog?: string,
 *     identifier?: string,
 *     programManagementAccountIdentifier?: string,
 *     clientToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRelationship(array $args = [])
 * @phpstan-method \Aws\Result getRelationship(array{catalog?: string, programManagementAccountIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getRelationshipAsync(array{catalog?: string, programManagementAccountIdentifier?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChannelHandshakes(array $args = [])
 * @phpstan-method \Aws\Result listChannelHandshakes(array{
 *     handshakeType?: 'PROGRAM_MANAGEMENT_ACCOUNT'|'REVOKE_SERVICE_PERIOD'|'START_SERVICE_PERIOD',
 *     catalog?: string,
 *     participantType?: 'RECEIVER'|'SENDER',
 *     maxResults?: int,
 *     statuses?: list<'ACCEPTED'|'CANCELED'|'EXPIRED'|'PENDING'|'REJECTED'>,
 *     associatedResourceIdentifiers?: list<string>,
 *     handshakeTypeFilters?: array{
 *         startServicePeriodTypeFilters?: array{servicePeriodTypes?: list<'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD'>, ...},
 *         revokeServicePeriodTypeFilters?: array{servicePeriodTypes?: list<'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD'>, ...},
 *         programManagementAccountTypeFilters?: array{programs?: list<'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER'>, ...},
 *         ...,
 *     },
 *     handshakeTypeSort?: array{
 *         startServicePeriodTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         revokeServicePeriodTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         programManagementAccountTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChannelHandshakesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listChannelHandshakesAsync(array{
 *     handshakeType?: 'PROGRAM_MANAGEMENT_ACCOUNT'|'REVOKE_SERVICE_PERIOD'|'START_SERVICE_PERIOD',
 *     catalog?: string,
 *     participantType?: 'RECEIVER'|'SENDER',
 *     maxResults?: int,
 *     statuses?: list<'ACCEPTED'|'CANCELED'|'EXPIRED'|'PENDING'|'REJECTED'>,
 *     associatedResourceIdentifiers?: list<string>,
 *     handshakeTypeFilters?: array{
 *         startServicePeriodTypeFilters?: array{servicePeriodTypes?: list<'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD'>, ...},
 *         revokeServicePeriodTypeFilters?: array{servicePeriodTypes?: list<'FIXED_COMMITMENT_PERIOD'|'MINIMUM_NOTICE_PERIOD'>, ...},
 *         programManagementAccountTypeFilters?: array{programs?: list<'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER'>, ...},
 *         ...,
 *     },
 *     handshakeTypeSort?: array{
 *         startServicePeriodTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         revokeServicePeriodTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         programManagementAccountTypeSort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *         ...,
 *     },
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listProgramManagementAccounts(array $args = [])
 * @phpstan-method \Aws\Result listProgramManagementAccounts(array{
 *     catalog?: string,
 *     maxResults?: int,
 *     displayNames?: list<string>,
 *     programs?: list<'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER'>,
 *     accountIds?: list<string>,
 *     statuses?: list<'ACTIVE'|'INACTIVE'|'PENDING'>,
 *     sort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listProgramManagementAccountsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listProgramManagementAccountsAsync(array{
 *     catalog?: string,
 *     maxResults?: int,
 *     displayNames?: list<string>,
 *     programs?: list<'DISTRIBUTION'|'DISTRIBUTION_SELLER'|'SOLUTION_PROVIDER'>,
 *     accountIds?: list<string>,
 *     statuses?: list<'ACTIVE'|'INACTIVE'|'PENDING'>,
 *     sort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listRelationships(array $args = [])
 * @phpstan-method \Aws\Result listRelationships(array{
 *     catalog?: string,
 *     maxResults?: int,
 *     associatedAccountIds?: list<string>,
 *     associationTypes?: list<'DOWNSTREAM_SELLER'|'END_CUSTOMER'|'INTERNAL'>,
 *     displayNames?: list<string>,
 *     programManagementAccountIdentifiers?: list<string>,
 *     sort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listRelationshipsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listRelationshipsAsync(array{
 *     catalog?: string,
 *     maxResults?: int,
 *     associatedAccountIds?: list<string>,
 *     associationTypes?: list<'DOWNSTREAM_SELLER'|'END_CUSTOMER'|'INTERNAL'>,
 *     displayNames?: list<string>,
 *     programManagementAccountIdentifiers?: list<string>,
 *     sort?: array{sortOrder?: 'Ascending'|'Descending', sortBy?: 'UpdatedAt', ...},
 *     nextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result rejectChannelHandshake(array $args = [])
 * @phpstan-method \Aws\Result rejectChannelHandshake(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rejectChannelHandshakeAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise rejectChannelHandshakeAsync(array{catalog?: string, identifier?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: list<array{key?: string, value?: string, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateProgramManagementAccount(array $args = [])
 * @phpstan-method \Aws\Result updateProgramManagementAccount(array{catalog?: string, identifier?: string, revision?: string, displayName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateProgramManagementAccountAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateProgramManagementAccountAsync(array{catalog?: string, identifier?: string, revision?: string, displayName?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateRelationship(array $args = [])
 * @phpstan-method \Aws\Result updateRelationship(array{
 *     catalog?: string,
 *     identifier?: string,
 *     programManagementAccountIdentifier?: string,
 *     revision?: string,
 *     displayName?: string,
 *     requestedSupportPlan?: array{
 *         resoldEnterprise?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         partnerLedSupport?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             provider?: 'DISTRIBUTION_SELLER'|'DISTRIBUTOR',
 *             tamLocation?: string,
 *             ...,
 *         },
 *         resoldUnifiedOperations?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateRelationshipAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateRelationshipAsync(array{
 *     catalog?: string,
 *     identifier?: string,
 *     programManagementAccountIdentifier?: string,
 *     revision?: string,
 *     displayName?: string,
 *     requestedSupportPlan?: array{
 *         resoldEnterprise?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         partnerLedSupport?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             provider?: 'DISTRIBUTION_SELLER'|'DISTRIBUTOR',
 *             tamLocation?: string,
 *             ...,
 *         },
 *         resoldUnifiedOperations?: array{
 *             coverage?: 'ENTIRE_ORGANIZATION'|'MANAGEMENT_ACCOUNT_ONLY',
 *             tamLocation?: string,
 *             chargeAccountId?: string,
 *             ...,
 *         },
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 */
class PartnerCentralChannelClient extends AwsClient {}
