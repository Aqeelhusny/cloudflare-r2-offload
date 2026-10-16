<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp\Handler;

/**
 * @internal
 */
final class Clock
{
    private function __construct()
    {
    }

    /**
     * Returns the current monotonic clock reading in seconds.
     */
    public static function now(): float
    {
        return \hrtime(true) / 1e9;
    }
}
