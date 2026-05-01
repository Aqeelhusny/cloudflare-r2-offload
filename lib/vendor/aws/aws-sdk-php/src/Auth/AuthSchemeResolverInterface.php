<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\Auth;

use R2Offload\Vendor\Aws\Identity\IdentityInterface;

/**
 * An AuthSchemeResolver object determines which auth scheme will be used for request signing.
 */
interface AuthSchemeResolverInterface
{
    /**
     * Selects an auth scheme for request signing.
     *
     * @param array $authSchemes a priority-ordered list of authentication schemes.
     * @param array $args
     *
     * @return string|null
     */
    public function selectAuthScheme(
        array $authSchemes,
        array $args
    ): ?string;
}
