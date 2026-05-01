<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer;

use R2Offload\Vendor\Aws\CommandInterface;
use R2Offload\Vendor\Aws\Result;
use R2Offload\Vendor\Aws\ResultInterface;

/**
 * Multipart downloader using the part get approach.
 */
final class PartGetMultipartDownloader extends AbstractMultipartDownloader
{
    /**
     * @inheritDoc
     */
    protected function getFetchCommandArgs(): array
    {
        $nextCommandArgs = $this->downloadRequestArgs;
        $nextCommandArgs['PartNumber'] = $this->currentPartNo;

        return $nextCommandArgs;
    }

    /**
     * @inheritDoc
     *
     * @param Result $result
     *
     * @return void
     */
    protected function computeObjectDimensions(ResultInterface $result): void
    {
        if (!empty($result['PartsCount'])) {
            $this->objectPartsCount = $result['PartsCount'];
        } else {
            $this->objectPartsCount = 1;
        }

        $this->objectSizeInBytes = self::computeObjectSizeFromContentRange(
            $result['ContentRange'] ?? ""
        );
    }
}
