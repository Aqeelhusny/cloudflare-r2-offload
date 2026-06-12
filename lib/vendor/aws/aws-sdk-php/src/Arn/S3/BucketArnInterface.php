<?php
namespace R2Offload\Vendor\Aws\Arn\S3;

use R2Offload\Vendor\Aws\Arn\ArnInterface;

/**
 * @internal
 */
interface BucketArnInterface extends ArnInterface
{
    public function getBucketName();
}
