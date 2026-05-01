<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\SecretsManager;

use R2Offload\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS Secrets Manager** service.
 * @method \R2Offload\Vendor\Aws\Result batchGetSecretValue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise batchGetSecretValueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result cancelRotateSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise cancelRotateSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result createSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise createSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result deleteSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise deleteSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result describeSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise describeSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getRandomPassword(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getRandomPasswordAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSecretValue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSecretValueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSecretVersionIds(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSecretVersionIdsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result listSecrets(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise listSecretsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putResourcePolicyAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result putSecretValue(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise putSecretValueAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result removeRegionsFromReplication(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise removeRegionsFromReplicationAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result replicateSecretToRegions(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise replicateSecretToRegionsAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result restoreSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise restoreSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result rotateSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise rotateSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result stopReplicationToReplica(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise stopReplicationToReplicaAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result tagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result untagResource(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSecret(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSecretAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result updateSecretVersionStage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise updateSecretVersionStageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result validateResourcePolicy(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise validateResourcePolicyAsync(array $args = [])
 */
class SecretsManagerClient extends AwsClient {}
