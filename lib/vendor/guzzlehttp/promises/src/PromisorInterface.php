<?php
/**
 * @license MIT
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

declare(strict_types=1);

namespace R2Offload\Vendor\GuzzleHttp\Promise;

/**
 * Interface used with classes that return a promise.
 *
 * @template TValue = mixed
 * @template TReason = mixed
 */
interface PromisorInterface
{
    /**
     * Returns a promise.
     *
     * @return PromiseInterface<TValue, TReason>
     */
    public function promise(): PromiseInterface;
}
