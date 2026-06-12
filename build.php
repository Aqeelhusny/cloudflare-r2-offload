<?php
/**
 * Build script: run Strauss, then prune unused AWS service data from lib/vendor.
 *
 * Usage: php build.php
 *   (Run after `composer install` with dev dependencies)
 */

echo "=== Running Strauss...\n";
$strauss_exit = 0;
// run-strauss.php registers a fallback autoloader for the Composer\ namespace —
// composer/composer's rules are sometimes missing from the project autoloader
// (stripped installed.json metadata), which would fatal Strauss otherwise.
passthru('php run-strauss.php', $strauss_exit);
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
// When build.php runs inside a composer script, vendor/bin is prepended to
// PATH and the bare `composer` resolves to the LOCAL composer/composer
// package binary (which may not even boot). COMPOSER_BINARY is set by the
// real running Composer during scripts — prefer it.
$composer_binary = getenv('COMPOSER_BINARY');
$composer_cmd    = $composer_binary
    ? escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($composer_binary)
    : 'composer';

$dump_exit = 0;
passthru($composer_cmd . ' dump-autoload --optimize --no-dev', $dump_exit);
if ($dump_exit !== 0) {
    echo "Autoloader dump failed with exit code {$dump_exit}\n";
    exit(1);
}

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
