<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3\RegionalEndpoint;

/**
 * Provides access to S3 regional endpoints configuration options: endpoints_type
 */
interface ConfigurationInterface
{
    /**
     * Returns the endpoints type
     *
     * @return string
     */
    public function getEndpointsType();

    /**
     * Returns the configuration as an associative array
     *
     * @return array
     */
    public function toArray();
}
