<?php
/**
 * Build script: run Strauss, then prune unused AWS service data from lib/vendor.
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

echo "\n=== Pruning unused AWS service data directories...\n";

$aws_data = __DIR__ . '/lib/vendor/aws/aws-sdk-php/src/data';

$keep_data = [
    's3',
    'sts',
];

$keep_files = [
    'endpoints.json',
    'endpoints.json.php',
    'manifest.json',
    'manifest.json.php',
    'sdk-default-configuration.json',
    'sdk-default-configuration.json.php',
    'partitions.json',
    'partitions.json.php',
];

$pruned = 0;

if (is_dir($aws_data)) {
    foreach (new DirectoryIterator($aws_data) as $item) {
        if ($item->isDot()) continue;
        $name = $item->getFilename();

        if (in_array($name, $keep_files, true)) continue;

        if ($item->isDir() && !in_array($name, $keep_data, true)) {
            delete_dir($item->getPathname());
            $pruned++;
        }
    }
}

echo "Pruned {$pruned} unused AWS service data directories.\n";

echo "\n=== Regenerating autoloader...\n";
passthru('composer dump-autoload --optimize --no-dev');

$size = trim(shell_exec(PHP_OS_FAMILY === 'Windows'
    ? 'powershell -Command "[math]::Round((Get-ChildItem lib/vendor -Recurse -File | Measure-Object -Property Length -Sum).Sum / 1MB, 1)"'
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
