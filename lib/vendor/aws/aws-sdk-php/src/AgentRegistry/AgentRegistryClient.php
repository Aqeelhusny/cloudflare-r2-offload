<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\AgentRegistry;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Agent Registry** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetDiscoverableRegistryRecord(array $args = [])
 * @phpstan-method \Aws\Result batchGetDiscoverableRegistryRecord(array{entries?: list<array{registryId?: string, recordIds?: list<string>, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetDiscoverableRegistryRecordAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise batchGetDiscoverableRegistryRecordAsync(array{entries?: list<array{registryId?: string, recordIds?: list<string>, ...}>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDiscoverableRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result listDiscoverableRegistryRecords(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'descriptorType'|'recordType', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDiscoverableRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDiscoverableRegistryRecordsAsync(array{
 *     registryId?: string,
 *     maxResults?: int,
 *     nextToken?: string,
 *     filters?: list<array{name?: 'descriptorType'|'recordType', values?: list<string>, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result searchDiscoverableRegistryRecords(array $args = [])
 * @phpstan-method \Aws\Result searchDiscoverableRegistryRecords(array{searchQuery?: string, registryIds?: list<string>, maxResults?: int, filters?: array, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise searchDiscoverableRegistryRecordsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise searchDiscoverableRegistryRecordsAsync(array{searchQuery?: string, registryIds?: list<string>, maxResults?: int, filters?: array, ...} $args = [])
 */
class AgentRegistryClient extends AwsClient {}
