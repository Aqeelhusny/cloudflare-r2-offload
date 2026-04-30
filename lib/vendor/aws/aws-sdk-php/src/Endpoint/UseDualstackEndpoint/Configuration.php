<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Endpoint\UseDualstackEndpoint;

use R2Offload\Vendor\Aws;
use R2Offload\Vendor\Aws\Endpoint\UseDualstackEndpoint\Exception\ConfigurationException;

class Configuration implements ConfigurationInterface
{
    private $useDualstackEndpoint;

    public function __construct($useDualstackEndpoint, $region)
    {
        $this->useDualstackEndpoint = \R2Offload\Vendor\Aws\boolean_value($useDualstackEndpoint);
        if (is_null($this->useDualstackEndpoint)) {
            throw new ConfigurationException("'use_dual_stack_endpoint' config option"
                . " must be a boolean value.");
        }
        if ($this->useDualstackEndpoint == true
            && (strpos($region, "iso-") !== false || strpos($region, "-iso") !== false)
        ) {
            throw new ConfigurationException("Dual-stack is not supported in ISO regions");        }
    }

    /**
     * {@inheritdoc}
     */
    public function isUseDualstackEndpoint()
    {
        return $this->useDualstackEndpoint;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'use_dual_stack_endpoint' => $this->isUseDualstackEndpoint(),
        ];
    }
}
