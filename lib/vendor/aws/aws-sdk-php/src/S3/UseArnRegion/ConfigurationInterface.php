<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3\UseArnRegion;

interface ConfigurationInterface
{
    /**
     * Returns whether or not to use the ARN region if it differs from client
     *
     * @return bool
     */
    public function isUseArnRegion();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}
