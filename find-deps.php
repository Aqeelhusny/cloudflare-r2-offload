<?php
$base = __DIR__ . '/vendor/aws/aws-sdk-php/src';

$namespaces = [];

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base));
foreach ($it as $file) {
    if ($file->getExtension() !== 'php') continue;
    $content = file_get_contents($file->getPathname());

    // Match use Aws\Something\... and Aws\Something::
    preg_match_all('/(?:use |\\\\)Aws\\\\([A-Z][a-zA-Z0-9]+)\\\\/', $content, $m);
    foreach ($m[1] as $ns) {
        $namespaces[$ns] = true;
    }
}

// Also check root-level PHP files
foreach (glob($base . '/*.php') as $f) {
    $content = file_get_contents($f);
    preg_match_all('/(?:use |\\\\)Aws\\\\([A-Z][a-zA-Z0-9]+)\\\\/', $content, $m);
    foreach ($m[1] as $ns) {
        $namespaces[$ns] = true;
    }
}

// Filter to only directories that exist as subdirs of src/
$existing = [];
foreach (array_keys($namespaces) as $ns) {
    if (is_dir($base . '/' . $ns)) {
        $existing[$ns] = true;
    }
}

ksort($existing);
echo "=== AWS subdirectories required by the SDK core + S3 ===\n";
foreach (array_keys($existing) as $ns) {
    echo "  $ns\n";
}
echo "\nTotal: " . count($existing) . " directories\n";
