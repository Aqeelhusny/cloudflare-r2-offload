<?php
/**
 * Build script: run Strauss, then prune unused AWS services from lib/vendor.
 *
 * Usage: php build.php
 *   (Run after `composer install` with dev dependencies)
 */

echo "=== Running Strauss...\n";
$strauss_exit = 0;
passthru('php vendor/bin/strauss', $strauss_exit);
if ($strauss_exit !== 0) {
    echo "Strauss failed with exit code {$strauss_exit}\n";
    exit(1);
}

echo "\n=== Pruning unused AWS services...\n";

$aws_src = __DIR__ . '/lib/vendor/aws/aws-sdk-php/src';
$aws_data = __DIR__ . '/lib/vendor/aws/aws-sdk-php/src/data';

$keep_src = [
    'Api', 'ClientResolver.php', 'ClientSideMonitoring', 'CommandInterface.php',
    'Command.php', 'Credentials', 'Crypto', 'DefaultsMode', 'Endpoint',
    'Exception', 'Handler', 'HasDataTrait.php', 'HasMonitoringEventsTrait.php',
    'IdempotencyTokenMiddleware.php', 'InputValidationMiddleware.php',
    'Middleware', 'Multipart', 'ResultInterface.php', 'Result.php',
    'ResultPaginator.php', 'Retry', 'S3', 'Sdk.php', 'Signature',
    'Token', 'Waiter', 'functions.php', 'AwsClient.php', 'AwsClientInterface.php',
    'AwsClientTrait.php', 'CacheInterface.php', 'ClientResolver.php',
    'CommandPool.php', 'LruArrayCache.php', 'TraceMiddleware.php',
    'ResponseContainerInterface.php', 'MonitoringEventsInterface.php',
];

$keep_data = [
    's3', 'endpoints.json', 'endpoints.json.php', 'manifest.json',
    'manifest.json.php', 'sdk-default-configuration.json',
    'sdk-default-configuration.json.php', 'partitions.json',
    'partitions.json.php',
];

$pruned = 0;

if (is_dir($aws_src)) {
    foreach (new DirectoryIterator($aws_src) as $item) {
        if ($item->isDot()) continue;
        $name = $item->getFilename();
        if ($name === 'data') continue;
        if (in_array($name, $keep_src, true)) continue;

        if ($item->isDir() && preg_match('/^[A-Z]/', $name) && $name !== 'S3') {
            delete_dir($item->getPathname());
            $pruned++;
        }
    }
}

if (is_dir($aws_data)) {
    foreach (new DirectoryIterator($aws_data) as $item) {
        if ($item->isDot()) continue;
        $name = $item->getFilename();
        if (in_array($name, $keep_data, true)) continue;

        if ($item->isDir()) {
            delete_dir($item->getPathname());
            $pruned++;
        }
    }
}

echo "Pruned {$pruned} unused AWS service directories.\n";

echo "\n=== Regenerating autoloader...\n";
passthru('composer dump-autoload --optimize --no-dev');

$size = trim(shell_exec(PHP_OS_FAMILY === 'Windows'
    ? 'powershell -Command "(Get-ChildItem lib/vendor -Recurse -File | Measure-Object -Property Length -Sum).Sum / 1MB"'
    : 'du -sm lib/vendor | cut -f1'));
echo "\n=== Done. lib/vendor size: ~{$size} MB\n";

function delete_dir(string $path): void {
    if (!is_dir($path)) return;
    $it = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        if ($file->isDir()) {
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
    rmdir($path);
}
