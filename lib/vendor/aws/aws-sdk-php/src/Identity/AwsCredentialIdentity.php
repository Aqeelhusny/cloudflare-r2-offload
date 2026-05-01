<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\Identity;

/**
 * Denotes the use of standard AWS credentials.
 *
 * @internal
 */
abstract class AwsCredentialIdentity implements IdentityInterface
{
    /**
     * Returns a UNIX timestamp, if available, representing the expiration
     * time of the AWS Credential object. Returns null if no expiration is provided.
     *
     * @return int|null
     */
    abstract public function getExpiration();
}
