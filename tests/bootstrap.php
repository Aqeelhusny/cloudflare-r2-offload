<?php
/**
 * Bootstrap: loads WP stubs (global namespace), then R2Offload stubs
 * (namespaced), then the class under test.
 */

require_once __DIR__ . '/wp-stubs.php';
require_once __DIR__ . '/stubs.php';
require_once __DIR__ . '/../includes/class-attachment-sync.php';
