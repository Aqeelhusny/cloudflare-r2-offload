<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\CloudHsm;

use R2Offload\Vendor\Aws\Api\ApiProvider;
use R2Offload\Vendor\Aws\Api\DocModel;
use R2Offload\Vendor\Aws\Api\Service;
use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with **AWS CloudHSM**.
 *
 * @method \R2Offload\Vendor\Aws\Result addTagsToResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHapg(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHapgAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createLunaClient(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createLunaClientAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHapg(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHapgAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteLunaClient(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteLunaClientAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHapg(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHapgAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeLunaClient(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeLunaClientAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getConfigFiles(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getConfigFilesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listAvailableZones(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listAvailableZonesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHapgs(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHapgsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listHsms(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listHsmsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listLunaClients(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listLunaClientsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyHapg(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyHapgAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyHsm(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyHsmAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result modifyLunaClient(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise modifyLunaClientAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeTagsFromResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 */
class CloudHsmClient extends AwsClient {}
