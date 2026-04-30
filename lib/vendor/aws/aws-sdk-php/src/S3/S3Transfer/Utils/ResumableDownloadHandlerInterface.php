<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Utils;

interface ResumableDownloadHandlerInterface
{
    /**
     * @return string
     */
    public function getResumeFilePath(): string;

    /**
     * @return string
     */
    public function getTemporaryFilePath(): string;

    /**
     * @return string
     */
    public function getDestination(): string;

    /**
     * @return int
     */
    public function getFixedPartSize(): int;
}
