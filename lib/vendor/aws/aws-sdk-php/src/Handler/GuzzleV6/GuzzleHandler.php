<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Aws\Handler\GuzzleV6;

trigger_error(sprintf(
    'Using the "%s" class is deprecated, use "%s" instead.',
    __NAMESPACE__ . '\GuzzleHandler',
    \R2Offload\Vendor\Aws\Handler\Guzzle\GuzzleHandler::class
), E_USER_DEPRECATED);

class_alias(\R2Offload\Vendor\Aws\Handler\Guzzle\GuzzleHandler::class, __NAMESPACE__ . '\GuzzleHandler');
