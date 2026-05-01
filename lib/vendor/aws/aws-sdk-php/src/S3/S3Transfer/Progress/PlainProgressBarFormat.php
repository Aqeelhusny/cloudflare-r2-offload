<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 01-May-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\S3\S3Transfer\Progress;

final class PlainProgressBarFormat extends AbstractProgressBarFormat
{
    public const FORMAT_TEMPLATE = "|object_name|:\n[|progress_bar|] |percent|%";
    public const FORMAT_PARAMETERS = [
        'object_name',
        'progress_bar',
        'percent',
    ];

    public function getFormatTemplate(): string
    {
        return self::FORMAT_TEMPLATE;
    }

    public function getFormatParameters(): array
    {
        return self::FORMAT_PARAMETERS;
    }

    protected function getFormatDefaultParameterValues(): array
    {
        return [];
    }
}
