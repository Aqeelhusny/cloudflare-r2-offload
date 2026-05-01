<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Token;

/**
 * Provides access to an AWS token used for accessing AWS services
 */
interface TokenInterface
{
    /**
     * Returns the token this token object.
     *
     * @return string
     */
    public function getToken();

    /**
     * Get the UNIX timestamp in which the token will expire
     *
     * @return int|null
     */
    public function getExpiration();

    /**
     * Check if the token are expired
     *
     * @return bool
     */
    public function isExpired();

    /**
     * Converts the token to an associative array.
     *
     * @return array
     */
    public function toArray();
}
