<?php
/**
 * Bootstrap for connection/migration tests.
 * Loads the real Settings class and AttachmentSync but uses stub R2Client/ErrorLogger.
 */

require_once __DIR__ . '/wp-stubs.php';

// Load only the stubs for R2Client and ErrorLogger (not Settings).
require_once __DIR__ . '/stubs-r2-logger.php';

// Load the REAL Settings and AttachmentSync classes.
require_once __DIR__ . '/../includes/class-settings.php';
require_once __DIR__ . '/../includes/class-attachment-sync.php';
