<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Models;

use R2Offload\Vendor\Aws\Result;

final class DownloadResult extends Result
{
    private readonly mixed $downloadDataResult;

    /**
     * @param mixed $downloadDataResult
     * @param array $data
     */
    public function __construct(
        mixed $downloadDataResult,
        array $data = []
    ) {
        parent::__construct($data);
        $this->downloadDataResult = $downloadDataResult;
    }

    /**
     * @return mixed
     */
    public function getDownloadDataResult(): mixed
    {
        return $this->downloadDataResult;
    }
}
