<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Progress;

/**
 * Progress bar base implementation.
 */
interface ProgressBarInterface
{
    /**
     * @return string
     */
    public function render(): string;

    /**
     * @param int $percent
     *
     * @return void
     */
    public function setPercentCompleted(int $percent): void;

    /**
     * @return int
     */
    public function getPercentCompleted(): int;

    /**
     * @return AbstractProgressBarFormat
     */
    public function getProgressBarFormat(): AbstractProgressBarFormat;
}
