<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\WorkSpacesThinClient;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon WorkSpaces Thin Client** service.
 * @method \R2Offload\Vendor\Aws\Result createEnvironment(array $args = [])
 * @phpstan-method \Aws\Result createEnvironment(array{
 *     name?: string,
 *     desktopArn?: string,
 *     desktopEndpoint?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     maintenanceWindow?: array{
 *         type?: 'CUSTOM'|'SYSTEM',
 *         startTimeHour?: int,
 *         startTimeMinute?: int,
 *         endTimeHour?: int,
 *         endTimeMinute?: int,
 *         daysOfTheWeek?: list<'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY'>,
 *         applyTimeOf?: 'DEVICE'|'UTC',
 *         ...,
 *     },
 *     softwareSetUpdateMode?: 'USE_DESIRED'|'USE_LATEST',
 *     desiredSoftwareSetId?: string,
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     deviceCreationTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise createEnvironmentAsync(array{
 *     name?: string,
 *     desktopArn?: string,
 *     desktopEndpoint?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     maintenanceWindow?: array{
 *         type?: 'CUSTOM'|'SYSTEM',
 *         startTimeHour?: int,
 *         startTimeMinute?: int,
 *         endTimeHour?: int,
 *         endTimeMinute?: int,
 *         daysOfTheWeek?: list<'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY'>,
 *         applyTimeOf?: 'DEVICE'|'UTC',
 *         ...,
 *     },
 *     softwareSetUpdateMode?: 'USE_DESIRED'|'USE_LATEST',
 *     desiredSoftwareSetId?: string,
 *     kmsKeyArn?: string,
 *     clientToken?: string,
 *     tags?: array<string, string>,
 *     deviceCreationTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDevice(array $args = [])
 * @phpstan-method \Aws\Result deleteDevice(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteDeviceAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteEnvironment(array $args = [])
 * @phpstan-method \Aws\Result deleteEnvironment(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deleteEnvironmentAsync(array{id?: string, clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result deregisterDevice(array $args = [])
 * @phpstan-method \Aws\Result deregisterDevice(array{id?: string, targetDeviceStatus?: 'ARCHIVED'|'DEREGISTERED', clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deregisterDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise deregisterDeviceAsync(array{id?: string, targetDeviceStatus?: 'ARCHIVED'|'DEREGISTERED', clientToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDevice(array $args = [])
 * @phpstan-method \Aws\Result getDevice(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDeviceAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getEnvironment(array $args = [])
 * @phpstan-method \Aws\Result getEnvironment(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getEnvironmentAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSoftwareSet(array $args = [])
 * @phpstan-method \Aws\Result getSoftwareSet(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSoftwareSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSoftwareSetAsync(array{id?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDevices(array $args = [])
 * @phpstan-method \Aws\Result listDevices(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listDevicesAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEnvironments(array $args = [])
 * @phpstan-method \Aws\Result listEnvironments(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEnvironmentsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listEnvironmentsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSoftwareSets(array $args = [])
 * @phpstan-method \Aws\Result listSoftwareSets(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSoftwareSetsAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listSoftwareSetsAsync(array{nextToken?: string, maxResults?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @phpstan-method \Aws\Result listTagsForResource(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array{resourceArn?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @phpstan-method \Aws\Result tagResource(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise tagResourceAsync(array{resourceArn?: string, tags?: array<string, string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @phpstan-method \Aws\Result untagResource(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise untagResourceAsync(array{resourceArn?: string, tagKeys?: list<string>, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateDevice(array $args = [])
 * @phpstan-method \Aws\Result updateDevice(array{
 *     id?: string,
 *     name?: string,
 *     desiredSoftwareSetId?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateDeviceAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateDeviceAsync(array{
 *     id?: string,
 *     name?: string,
 *     desiredSoftwareSetId?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateEnvironment(array $args = [])
 * @phpstan-method \Aws\Result updateEnvironment(array{
 *     id?: string,
 *     name?: string,
 *     desktopArn?: string,
 *     desktopEndpoint?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     maintenanceWindow?: array{
 *         type?: 'CUSTOM'|'SYSTEM',
 *         startTimeHour?: int,
 *         startTimeMinute?: int,
 *         endTimeHour?: int,
 *         endTimeMinute?: int,
 *         daysOfTheWeek?: list<'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY'>,
 *         applyTimeOf?: 'DEVICE'|'UTC',
 *         ...,
 *     },
 *     softwareSetUpdateMode?: 'USE_DESIRED'|'USE_LATEST',
 *     desiredSoftwareSetId?: string,
 *     deviceCreationTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateEnvironmentAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateEnvironmentAsync(array{
 *     id?: string,
 *     name?: string,
 *     desktopArn?: string,
 *     desktopEndpoint?: string,
 *     softwareSetUpdateSchedule?: 'APPLY_IMMEDIATELY'|'USE_MAINTENANCE_WINDOW',
 *     maintenanceWindow?: array{
 *         type?: 'CUSTOM'|'SYSTEM',
 *         startTimeHour?: int,
 *         startTimeMinute?: int,
 *         endTimeHour?: int,
 *         endTimeMinute?: int,
 *         daysOfTheWeek?: list<'FRIDAY'|'MONDAY'|'SATURDAY'|'SUNDAY'|'THURSDAY'|'TUESDAY'|'WEDNESDAY'>,
 *         applyTimeOf?: 'DEVICE'|'UTC',
 *         ...,
 *     },
 *     softwareSetUpdateMode?: 'USE_DESIRED'|'USE_LATEST',
 *     desiredSoftwareSetId?: string,
 *     deviceCreationTags?: array<string, string>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSoftwareSet(array $args = [])
 * @phpstan-method \Aws\Result updateSoftwareSet(array{id?: string, validationStatus?: 'NOT_VALIDATED'|'VALIDATED', ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSoftwareSetAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise updateSoftwareSetAsync(array{id?: string, validationStatus?: 'NOT_VALIDATED'|'VALIDATED', ...} $args = [])
 */
class WorkSpacesThinClientClient extends AwsClient {}
