<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\ControlCatalog;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Control Catalog** service.
 * @method \R2Offload\Vendor\Aws\Result getControl(array $args = [])
 * @phpstan-method \Aws\Result getControl(array{ControlArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getControlAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getControlAsync(array{ControlArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCommonControls(array $args = [])
 * @phpstan-method \Aws\Result listCommonControls(array{MaxResults?: int, NextToken?: string, CommonControlFilter?: array{Objectives?: list<array>, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCommonControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listCommonControlsAsync(array{MaxResults?: int, NextToken?: string, CommonControlFilter?: array{Objectives?: list<array>, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControlMappings(array $args = [])
 * @phpstan-method \Aws\Result listControlMappings(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         ControlArns?: list<string>,
 *         CommonControlArns?: list<string>,
 *         MappingTypes?: list<'COMMON_CONTROL'|'FRAMEWORK'|'RELATED_CONTROL'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlMappingsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlMappingsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         ControlArns?: list<string>,
 *         CommonControlArns?: list<string>,
 *         MappingTypes?: list<'COMMON_CONTROL'|'FRAMEWORK'|'RELATED_CONTROL'>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listControls(array $args = [])
 * @phpstan-method \Aws\Result listControls(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Implementations?: array{Types?: list<string>, Identifiers?: list<string>, ...},
 *         GovernedProviders?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listControlsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listControlsAsync(array{
 *     NextToken?: string,
 *     MaxResults?: int,
 *     Filter?: array{
 *         Implementations?: array{Types?: list<string>, Identifiers?: list<string>, ...},
 *         GovernedProviders?: list<string>,
 *         ...,
 *     },
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDomains(array $args = [])
 * @phpstan-method \Aws\Result listDomains(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDomainsAsync(array{MaxResults?: int, NextToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listObjectives(array $args = [])
 * @phpstan-method \Aws\Result listObjectives(array{MaxResults?: int, NextToken?: string, ObjectiveFilter?: array{Domains?: list<array>, ...}, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listObjectivesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listObjectivesAsync(array{MaxResults?: int, NextToken?: string, ObjectiveFilter?: array{Domains?: list<array>, ...}, ...} $args = [])
 */
class ControlCatalogClient extends AwsClient {}
