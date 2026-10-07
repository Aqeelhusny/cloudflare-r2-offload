<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Modified by aqeelhusny on 07-October-2026 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace R2Offload\Vendor\Random;

use R2Offload\Vendor\Symfony\Polyfill\Php82\NoDynamicProperties;

if (\PHP_VERSION_ID < 80200) {
    class RandomError extends \Error
    {
        use NoDynamicProperties;
    }
}
