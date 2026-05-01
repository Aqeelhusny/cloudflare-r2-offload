<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\BackupGateway;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Backup Gateway** service.
 * @method \R2Offload\Vendor\Aws\Result associateGatewayToServer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateGatewayToServerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHypervisor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHypervisorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateGatewayFromServer(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateGatewayFromServerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getBandwidthRateLimitSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getBandwidthRateLimitScheduleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getGateway(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getGatewayAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHypervisor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHypervisorAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getHypervisorPropertyMappings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getHypervisorPropertyMappingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getVirtualMachine(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getVirtualMachineAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result importHypervisorConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise importHypervisorConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listGateways(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHypervisors(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHypervisorsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listVirtualMachines(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listVirtualMachinesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putBandwidthRateLimitSchedule(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putBandwidthRateLimitScheduleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putHypervisorPropertyMappings(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putHypervisorPropertyMappingsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putMaintenanceStartTime(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putMaintenanceStartTimeAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result startVirtualMachinesMetadataSync(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise startVirtualMachinesMetadataSyncAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result testHypervisorConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise testHypervisorConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGatewayInformation(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGatewayInformationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateGatewaySoftwareNow(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateGatewaySoftwareNowAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateHypervisor(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateHypervisorAsync(array $args = [])
 */
class BackupGatewayClient extends AwsClient {}
