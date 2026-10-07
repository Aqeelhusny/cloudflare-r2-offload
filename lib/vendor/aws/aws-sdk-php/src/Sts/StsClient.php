<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Sts;

use R2Offload\Vendor\Aws\Arn\ArnParser;
use R2Offload\Vendor\Aws\AwsClient;
use R2Offload\Vendor\Aws\CacheInterface;
use R2Offload\Vendor\Aws\Credentials\Credentials;
use R2Offload\Vendor\Aws\HandlerList;
use R2Offload\Vendor\Aws\Middleware;
use R2Offload\Vendor\Aws\Result;
use R2Offload\Vendor\Aws\Retry\ConfigurationInterface as RetryConfigurationInterface;
use R2Offload\Vendor\Aws\Retry\ConfigurationProvider as RetryConfigurationProvider;
use R2Offload\Vendor\Aws\Retry\V3\OptIn as NewRetriesOptIn;
use R2Offload\Vendor\Aws\Retry\V3\RetryMiddleware as RetryV3Middleware;
use R2Offload\Vendor\Aws\RetryMiddleware;
use R2Offload\Vendor\Aws\Sts\RegionalEndpoints\ConfigurationProvider;

/**
 * This client is used to interact with the **AWS Security Token Service (AWS STS)**.
 *
 * @method \R2Offload\Vendor\Aws\Result assumeRole(array $args = [])
 * @phpstan-method \Aws\Result assumeRole(array{
 *     RoleArn?: string,
 *     RoleSessionName?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TransitiveTagKeys?: list<string>,
 *     ExternalId?: string,
 *     SerialNumber?: string,
 *     TokenCode?: string,
 *     SourceIdentity?: string,
 *     ProvidedContexts?: list<array{ProviderArn?: string, ContextAssertion?: string, ...}>,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRoleAsync(array{
 *     RoleArn?: string,
 *     RoleSessionName?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     TransitiveTagKeys?: list<string>,
 *     ExternalId?: string,
 *     SerialNumber?: string,
 *     TokenCode?: string,
 *     SourceIdentity?: string,
 *     ProvidedContexts?: list<array{ProviderArn?: string, ContextAssertion?: string, ...}>,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoleWithSAML(array $args = [])
 * @phpstan-method \Aws\Result assumeRoleWithSAML(array{
 *     RoleArn?: string,
 *     PrincipalArn?: string,
 *     SAMLAssertion?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleWithSAMLAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRoleWithSAMLAsync(array{
 *     RoleArn?: string,
 *     PrincipalArn?: string,
 *     SAMLAssertion?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoleWithWebIdentity(array $args = [])
 * @phpstan-method \Aws\Result assumeRoleWithWebIdentity(array{
 *     RoleArn?: string,
 *     RoleSessionName?: string,
 *     WebIdentityToken?: string,
 *     ProviderId?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRoleWithWebIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRoleWithWebIdentityAsync(array{
 *     RoleArn?: string,
 *     RoleSessionName?: string,
 *     WebIdentityToken?: string,
 *     ProviderId?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     Policy?: string,
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result assumeRoot(array $args = [])
 * @phpstan-method \Aws\Result assumeRoot(array{
 *     TargetPrincipal?: string,
 *     TaskPolicyArn?: array{arn?: string, ...},
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise assumeRootAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise assumeRootAsync(array{
 *     TargetPrincipal?: string,
 *     TaskPolicyArn?: array{arn?: string, ...},
 *     DurationSeconds?: int,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result decodeAuthorizationMessage(array $args = [])
 * @phpstan-method \Aws\Result decodeAuthorizationMessage(array{EncodedMessage?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise decodeAuthorizationMessageAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise decodeAuthorizationMessageAsync(array{EncodedMessage?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getAccessKeyInfo(array $args = [])
 * @phpstan-method \Aws\Result getAccessKeyInfo(array{AccessKeyId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getAccessKeyInfoAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getAccessKeyInfoAsync(array{AccessKeyId?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getCallerIdentity(array $args = [])
 * @phpstan-method \Aws\Result getCallerIdentity(array{...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getCallerIdentityAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getCallerIdentityAsync(array{...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getDelegatedAccessToken(array $args = [])
 * @phpstan-method \Aws\Result getDelegatedAccessToken(array{TradeInToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getDelegatedAccessTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getDelegatedAccessTokenAsync(array{TradeInToken?: string, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getFederationToken(array $args = [])
 * @phpstan-method \Aws\Result getFederationToken(array{
 *     Name?: string,
 *     Policy?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     DurationSeconds?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getFederationTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getFederationTokenAsync(array{
 *     Name?: string,
 *     Policy?: string,
 *     PolicyArns?: list<array{arn?: string, ...}>,
 *     DurationSeconds?: int,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     MinimumSessionTokenSize?: int,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\Aws\Result getSessionToken(array $args = [])
 * @phpstan-method \Aws\Result getSessionToken(array{DurationSeconds?: int, SerialNumber?: string, TokenCode?: string, MinimumSessionTokenSize?: int, ...} $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getSessionTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getSessionTokenAsync(array{DurationSeconds?: int, SerialNumber?: string, TokenCode?: string, MinimumSessionTokenSize?: int, ...} $args = [])
 * @method \R2Offload\Vendor\Aws\Result getWebIdentityToken(array $args = [])
 * @phpstan-method \Aws\Result getWebIdentityToken(array{
 *     Audience?: list<string>,
 *     DurationSeconds?: int,
 *     SigningAlgorithm?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
 * @method \R2Offload\Vendor\GuzzleHttp\Promise\Promise getWebIdentityTokenAsync(array $args = [])
 * @phpstan-method \GuzzleHttp\Promise\Promise getWebIdentityTokenAsync(array{
 *     Audience?: list<string>,
 *     DurationSeconds?: int,
 *     SigningAlgorithm?: string,
 *     Tags?: list<array{Key?: string, Value?: string, ...}>,
 *     ...,
 * } $args = [])
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

    public static function getArguments()
    {
        $args = parent::getArguments();
        // Off-path STS keeps the default ClientResolver retry handling. The
        // override below adds IDPCommunicationError as a transient error and
        // is only registered when the AWS_NEW_RETRIES_2026 flag is on.
        if (NewRetriesOptIn::isEnabled()) {
            $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        }
        return $args;
    }

    /**
     * @internal Only invoked when AWS_NEW_RETRIES_2026=true. The off-path
     *           uses the default ClientResolver::_apply_retries.
     */
    public static function _applyRetryConfig(
        $value,
        array &$args,
        HandlerList $list
    ): void
    {
        if (!$value) {
            return;
        }

        $config = RetryConfigurationProvider::unwrap($value);

        if ($config->getMode() === 'legacy') {
            $decider = RetryMiddleware::createDefaultDecider($config->getMaxAttempts() - 1);
            $list->appendSign(
                Middleware::retry($decider, null, $args['stats']['retries']),
                'retry'
            );
            return;
        }

        $list->appendSign(
            RetryV3Middleware::wrap(
                $config,
                [
                    'collect_stats' => $args['stats']['retries'],
                    'service'       => $args['service'],
                    'transient_error_codes' => ['IDPCommunicationError'],
                ]
            ),
            'retry'
        );
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
