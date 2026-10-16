<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp;

/**
 * Multiplexing modes for the "multiplex" request option.
 *
 * NONE disables multiplexing for a whole handler when passed as the
 * "multiplex" client configuration option or, when constructing a handler
 * directly, as the CurlMultiHandler "multiplex" constructor option. As a
 * request option value it guarantees the transfer does not share its
 * connection with any concurrent transfer, and is accepted only where that
 * guarantee holds.
 */
final class Multiplexing
{
    public const NONE = 'none';
    public const EAGER = 'eager';
    public const WAIT = 'wait';
    public const REQUIRE_EAGER = 'require_eager';
    public const REQUIRE_WAIT = 'require_wait';

    private function __construct()
    {
    }
}
