<?php
namespace R2Offload\Vendor\Aws\ClientSideMonitoring\Exception;

use R2Offload\Vendor\Aws\HasMonitoringEventsTrait;
use R2Offload\Vendor\Aws\MonitoringEventsInterface;


/**
 * Represents an error interacting with configuration for client-side monitoring.
 */
class ConfigurationException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
