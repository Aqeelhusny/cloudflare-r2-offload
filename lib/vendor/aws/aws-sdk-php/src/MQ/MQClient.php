<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\MQ;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AmazonMQ** service.
 * @method \R2Offload\Vendor\Aws\Result createBroker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createBrokerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteBroker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteBrokerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBroker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBrokerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBrokerEngineTypes(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBrokerEngineTypesAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeBrokerInstanceOptions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeBrokerInstanceOptionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeConfigurationRevision(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeConfigurationRevisionAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeUserAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listBrokers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listBrokersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurationRevisions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationRevisionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listConfigurations(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listTags(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listUsers(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result promote(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise promoteAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rebootBroker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rebootBrokerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateBroker(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateBrokerAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateConfiguration(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateConfigurationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateUser(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 */
class MQClient extends AwsClient {}
