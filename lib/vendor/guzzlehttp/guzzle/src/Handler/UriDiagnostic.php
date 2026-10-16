<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp\Handler;

use R2Offload\Vendor\GuzzleHttp\Psr7;
use R2Offload\Vendor\Psr\Http\Message\UriInterface;

/**
 * @internal
 */
final class UriDiagnostic
{
    private function __construct()
    {
    }

    public static function redactInMessage(
        #[\SensitiveParameter]
        string $message,
        #[\SensitiveParameter]
        UriInterface $uri
    ): string {
        $message = Psr7\Utils::redactUserInfoInString($message, (string) $uri);

        $query = $uri->getQuery();
        if ($query !== '') {
            $message = \str_replace('?'.$query, '', $message);
        }

        $fragment = $uri->getFragment();
        if ($fragment !== '') {
            $message = \str_replace('#'.$fragment, '', $message);
        }

        return Psr7\DiagnosticValue::escape($message);
    }
}
