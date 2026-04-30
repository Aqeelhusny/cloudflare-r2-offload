<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\S3\RegionalEndpoint;

class Configuration implements ConfigurationInterface
{
    private $endpointsType;
    private $isFallback;

    public function __construct($endpointsType, $isFallback = false)
    {
        $this->endpointsType = strtolower($endpointsType);
        $this->isFallback = $isFallback;
        if (!in_array($this->endpointsType, ['legacy', 'regional'])) {
            throw new \InvalidArgumentException(
                "Configuration parameter must either be 'legacy' or 'regional'."
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getEndpointsType()
    {
        return $this->endpointsType;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        return [
            'endpoints_type' => $this->getEndpointsType()
        ];
    }

    public function isFallback()
    {
        return $this->isFallback;
    }
}
