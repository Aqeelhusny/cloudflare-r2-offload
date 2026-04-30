<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Models;

use R2Offload\Vendor\Aws\S3\S3Transfer\Progress\AbstractTransferListener;
use R2Offload\Vendor\Aws\S3\S3Transfer\Utils\FileDownloadHandler;

final class ResumeDownloadRequest
{
    /** @var ResumableDownload|string */
    private ResumableDownload|string $resumableDownload;

    /** @var string */
    private string $downloadHandlerClass;

    /** @var array */
    private array $listeners;

    /** @var AbstractTransferListener|null */
    private ?AbstractTransferListener $progressTracker;

    /**
     * @param ResumableDownload|string $resumableDownload
     * @param string $downloadHandlerClass
     * @param array $listeners
     * @param AbstractTransferListener|null $progressTracker
     */
    public function __construct(
        string|ResumableDownload $resumableDownload,
        string $downloadHandlerClass = FileDownloadHandler::class,
        array $listeners = [],
        ?AbstractTransferListener $progressTracker = null
    ) {
        $this->resumableDownload = $resumableDownload;
        $this->downloadHandlerClass = $downloadHandlerClass;
        $this->listeners = $listeners;
        $this->progressTracker = $progressTracker;
    }

    /**
     * @return string|ResumableDownload
     */
    public function getResumableDownload(): string|ResumableDownload
    {
        return $this->resumableDownload;
    }

    /**
     * @return string
     */
    public function getDownloadHandlerClass(): string
    {
        return $this->downloadHandlerClass;
    }

    /**
     * @return array
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * @return AbstractTransferListener|null
     */
    public function getProgressTracker(): ?AbstractTransferListener
    {
        return $this->progressTracker;
    }
}
