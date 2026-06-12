<?php
namespace R2Offload\Vendor\Aws\Arn\S3;

use R2Offload\Vendor\Aws\Arn\ArnInterface;

/**
 * @internal
 */
interface OutpostsArnInterface extends ArnInterface
{
    public function getOutpostId();
}
