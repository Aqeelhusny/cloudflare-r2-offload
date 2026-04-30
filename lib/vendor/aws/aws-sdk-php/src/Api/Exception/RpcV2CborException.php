<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Api\Exception;

use R2Offload\Vendor\Aws\HasMonitoringEventsTrait;
use R2Offload\Vendor\Aws\MonitoringEventsInterface;

class RpcV2CborException extends \RuntimeException implements
    MonitoringEventsInterface
{
    use HasMonitoringEventsTrait;
}
