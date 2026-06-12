<?php
namespace R2Offload\Vendor\Aws\Api\Exception;

use R2Offload\Vendor\Aws\HasMonitoringEventsTrait;
use R2Offload\Vendor\Aws\MonitoringEventsInterface;

class RpcV2CborException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
