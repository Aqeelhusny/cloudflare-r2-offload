<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Sustainability;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Sustainability** service.
 * @method \R2Offload\Vendor\Aws\Result getEstimatedCarbonEmissions(array $args = [])
 * @phpstan-method \Aws\Result getEstimatedCarbonEmissions(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     GroupBy?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     FilterBy?: array{Dimensions?: array<string, list<string>>, ...},
 *     EmissionsTypes?: list<'TOTAL_LBM_CARBON_EMISSIONS'|'TOTAL_MBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_1_CARBON_EMISSIONS'|'TOTAL_SCOPE_2_LBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_2_MBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_3_LBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_3_MBM_CARBON_EMISSIONS'>,
 *     Granularity?: 'MONTHLY'|'QUARTERLY_CALENDAR'|'QUARTERLY_FISCAL'|'YEARLY_CALENDAR'|'YEARLY_FISCAL',
 *     GranularityConfiguration?: array{FiscalYearStartMonth?: int, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsAsync(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     GroupBy?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     FilterBy?: array{Dimensions?: array<string, list<string>>, ...},
 *     EmissionsTypes?: list<'TOTAL_LBM_CARBON_EMISSIONS'|'TOTAL_MBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_1_CARBON_EMISSIONS'|'TOTAL_SCOPE_2_LBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_2_MBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_3_LBM_CARBON_EMISSIONS'|'TOTAL_SCOPE_3_MBM_CARBON_EMISSIONS'>,
 *     Granularity?: 'MONTHLY'|'QUARTERLY_CALENDAR'|'QUARTERLY_FISCAL'|'YEARLY_CALENDAR'|'YEARLY_FISCAL',
 *     GranularityConfiguration?: array{FiscalYearStartMonth?: int, ...},
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEstimatedCarbonEmissionsDimensionValues(array $args = [])
 * @phpstan-method \Aws\Result getEstimatedCarbonEmissionsDimensionValues(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     Dimensions?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsDimensionValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEstimatedCarbonEmissionsDimensionValuesAsync(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     Dimensions?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEstimatedWaterAllocation(array $args = [])
 * @phpstan-method \Aws\Result getEstimatedWaterAllocation(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     GroupBy?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     FilterBy?: array{Dimensions?: array<string, list<string>>, ...},
 *     AllocationTypes?: list<'TOTAL_WATER_WITHDRAWALS'>,
 *     Granularity?: 'MONTHLY'|'QUARTERLY_CALENDAR'|'QUARTERLY_FISCAL'|'YEARLY_CALENDAR'|'YEARLY_FISCAL',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedWaterAllocationAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEstimatedWaterAllocationAsync(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     GroupBy?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     FilterBy?: array{Dimensions?: array<string, list<string>>, ...},
 *     AllocationTypes?: list<'TOTAL_WATER_WITHDRAWALS'>,
 *     Granularity?: 'MONTHLY'|'QUARTERLY_CALENDAR'|'QUARTERLY_FISCAL'|'YEARLY_CALENDAR'|'YEARLY_FISCAL',
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEstimatedWaterAllocationDimensionValues(array $args = [])
 * @phpstan-method \Aws\Result getEstimatedWaterAllocationDimensionValues(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     Dimensions?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEstimatedWaterAllocationDimensionValuesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEstimatedWaterAllocationDimensionValuesAsync(array{
 *     TimePeriod?: array{Start?: int|string|\DateTimeInterface, End?: int|string|\DateTimeInterface, ...},
 *     Dimensions?: list<'REGION'|'SERVICE'|'USAGE_ACCOUNT_ID'>,
 *     MaxResults?: int,
 *     NextToken?: string,
 *     ...,
 * } $args = [])
 */
class SustainabilityClient extends AwsClient {}
