<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MarketplaceCatalog;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Marketplace Catalog Service** service.
 * @method \R2Offload\Vendor\Aws\Result batchDescribeEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDescribeEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelChangeSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelChangeSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeChangeSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeChangeSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeEntity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeEntityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listChangeSets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listChangeSetsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEntities(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEntitiesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startChangeSet(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startChangeSetAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 */
class MarketplaceCatalogClient extends AwsClient {}
