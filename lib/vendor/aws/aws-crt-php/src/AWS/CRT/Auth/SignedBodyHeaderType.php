<?php
/**
 * Copyright Amazon.com, Inc. or its affiliates. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0.
 *
 * @license Apache-2.0
 * Modified by aqeelhusny on 30-April-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */
namespace R2Offload\Vendor\AWS\CRT\Auth;

class SignedBodyHeaderType {
    const NONE = 0;
    const X_AMZ_CONTENT_SHA256 = 1;
}