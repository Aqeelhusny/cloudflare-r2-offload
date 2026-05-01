<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Sts;

use R2Offload\Vendor\Aws\Arn\ArnParser;
use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CacheInterface;
use R2Offload\Vendor\Aws\Credentials\Credentials;
use R2Offload\Vendor\Aws\Result;
use R2Offload\Vendor\Aws\Sts\RegionalEndpoints\ConfigurationProvider;

/**
 * This client is used to interact with the **AWS Security Token Service (AWS STS)**.
 *
 * @method \R2Offload\Vendor\Aws\Result assumeRole(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoleWithSAML(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleWithSAMLAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoleWithWebIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleWithWebIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoot(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRootAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result decodeAuthorizationMessage(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise decodeAuthorizationMessageAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessKeyInfo(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessKeyInfoAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCallerIdentity(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCallerIdentityAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDelegatedAccessToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDelegatedAccessTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFederationToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFederationTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSessionToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionTokenAsync(array $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWebIdentityToken(array $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWebIdentityTokenAsync(array $args = [])
 */
class StsClient extends AwsClient
{

    /**
     * {@inheritdoc}
     *
     * In addition to the options available to
     * {@see \Aws\AwsClient::__construct}, StsClient accepts the following
     * options:
     *
     * - sts_regional_endpoints:
     *   (R2Offload\Vendor\Aws\Sts\RegionalEndpoints\ConfigurationInterface|R2Offload\Vendor\Aws\CacheInterface\|callable|string|array)
     *   Specifies whether to use regional or legacy endpoints for legacy regions.
     *   Provide an Aws\Sts\RegionalEndpoints\ConfigurationInterface object, an
     *   instance of Aws\CacheInterface, a callable configuration provider used
     *   to create endpoint configuration, a string value of `legacy` or
     *   `regional`, or an associative array with the following keys:
     *   endpoint_types (string)  Set to `legacy` or `regional`, defaults to
     *   `legacy`
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        if (
            !isset($args['sts_regional_endpoints'])
            || $args['sts_regional_endpoints'] instanceof CacheInterface
        ) {
            $args['sts_regional_endpoints'] = ConfigurationProvider::defaultProvider($args);
        }
        $this->addBuiltIns($args);
        parent::__construct($args);
    }

    /**
     * Creates credentials from the result of an STS operations
     *
     * @param Result $result Result of an STS operation
     *
     * @return Credentials
     * @throws \InvalidArgumentException if the result contains no credentials
     */
    public function createCredentials(Result $result, $source=null)
    {
        if (!$result->hasKey('Credentials')) {
            throw new \InvalidArgumentException('Result contains no credentials');
        }

        $accountId = null;
        if ($result->hasKey('AssumedRoleUser')) {
            $parsedArn = ArnParser::parse($result->get('AssumedRoleUser')['Arn']);
            $accountId = $parsedArn->getAccountId();
        } elseif ($result->hasKey('FederatedUser')) {
            $parsedArn = ArnParser::parse($result->get('FederatedUser')['Arn']);
            $accountId = $parsedArn->getAccountId();
        }

        $credentials = $result['Credentials'];
        $expiration = isset($credentials['Expiration']) && $credentials['Expiration'] instanceof \DateTimeInterface
            ? (int) $credentials['Expiration']->format('U')
            : null;

        return new Credentials(
            $credentials['AccessKeyId'],
            $credentials['SecretAccessKey'],
            isset($credentials['SessionToken']) ? $credentials['SessionToken'] : null,
            $expiration,
            $accountId,
            $source
        );
    }

    /**
     * Adds service-specific client built-in value
     *
     * @return void
     */
    private function addBuiltIns($args)
    {
        $key = 'AWS::STS::UseGlobalEndpoint';
        $result = $args['sts_regional_endpoints'] instanceof \Closure ?
            $args['sts_regional_endpoints']()->wait() : $args['sts_regional_endpoints'];

        if (is_string($result)) {
            if ($result === 'regional') {
                $value = false;
            } else if ($result === 'legacy') {
                $value = true;
            } else {
                return;
            }
        } else {
            if ($result->getEndpointsType() === 'regional') {
                $value = false;
            } else {
                $value = true;
            }
        }

        $this->clientBuiltIns[$key] = $value;
    }
}
