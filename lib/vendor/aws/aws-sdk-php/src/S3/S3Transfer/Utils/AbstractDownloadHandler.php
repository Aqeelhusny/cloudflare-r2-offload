<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Utils;

use R2Offload\Vendor\Aws\S3\S3Transfer\Progress\AbstractTransferListener;

abstract class AbstractDownloadHandler extends AbstractTransferListener
{
    protected const READ_BUFFER_SIZE = 8192;

    /**
     * Returns the handler result.
     * - For FileDownloadHandler it may return the file destination.
     * - For StreamDownloadHandler it may return an instance of StreamInterface
     *   containing the content of the object.
     *
     * @return mixed
     */
    public abstract function getHandlerResult(): mixed;

    /**
     * To control whether the download handler supports
     * concurrency.
     *
     * @return bool
     */
    public abstract function isConcurrencySupported(): bool;
}
