<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Models;

use R2Offload\Vendor\Aws\Result;

final class UploadResult extends Result
{
    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
