<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Progress;

interface ProgressTrackerInterface
{
    /**
     * To show the progress being tracked.
     *
     * @return void
     */
    public function showProgress(): void;
}
