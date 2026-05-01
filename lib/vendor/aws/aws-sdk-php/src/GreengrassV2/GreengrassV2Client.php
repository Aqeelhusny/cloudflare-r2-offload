<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\GreengrassV2;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT Greengrass V2** service.
 * @method \R2Offload\Vendor\Aws\Result associateServiceRoleToAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchAssociateClientDeviceWithCoreDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchAssociateClientDeviceWithCoreDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result batchDisassociateClientDeviceFromCoreDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchDisassociateClientDeviceFromCoreDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createComponentVersion(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createComponentVersionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteCoreDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteCoreDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result disassociateServiceRoleFromAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComponent(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComponentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getComponentVersionArtifact(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getComponentVersionArtifactAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConnectivityInfo(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCoreDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCoreDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDeployment(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDeploymentAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getServiceRoleForAccount(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listClientDevicesAssociatedWithCoreDevice(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listClientDevicesAssociatedWithCoreDeviceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComponentVersions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComponentVersionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listCoreDevices(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listCoreDevicesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listDeployments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listEffectiveDeployments(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listEffectiveDeploymentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listInstalledComponents(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listInstalledComponentsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result resolveComponentCandidates(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise resolveComponentCandidatesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConnectivityInfo(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array $args = [])
 */
class GreengrassV2Client extends AwsClient {}
