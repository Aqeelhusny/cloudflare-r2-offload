<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp;

final class TransportSharing
{
    public const NONE = 'none';
    public const HANDLER_PREFER = 'handler_prefer';
    public const HANDLER_REQUIRE = 'handler_require';
    public const PERSISTENT_PREFER = 'persistent_prefer';
    public const PERSISTENT_REQUIRE = 'persistent_require';

    private function __construct()
    {
    }
}
