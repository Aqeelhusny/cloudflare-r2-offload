<?php
/**
 * @license Apache-2.0
 *
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\Aws\Token;

enum TokenSource: string
{
    case BEARER_SERVICE_ENV_VARS = 'bearer_service_env_vars';
}
