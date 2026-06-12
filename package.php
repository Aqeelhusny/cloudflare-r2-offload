<?php
/**
 * Package script: assemble a production-ready plugin zip in dist/.
 *
 * Usage: php package.php
 *   (Run AFTER `php build.php` — requires the no-dev autoloader and lib/vendor)
 *
 * Ships ONLY:
 *   cloudflare-r2-offload.php, uninstall.php, readme.txt, LICENSE,
 *   includes/, admin/, assets/, languages/,
 *   lib/vendor/ (Strauss-scoped runtime deps),
 *   vendor/autoload.php + vendor/composer/ (classmap-only manifest)
 *
 * Refuses to package a dev-state autoloader (the exact mistake that ships a
 * manifest referencing dev packages that are not included — fatal on activate).
 */

chdir( __DIR__ );

const SLUG = 'cloudflare-r2-offload';

// ---------------------------------------------------------------------------
// Read version from the plugin header.
// ---------------------------------------------------------------------------

$entry = file_get_contents( SLUG . '.php' );
if ( ! preg_match( '/^\s*\*\s*Version:\s*([\d.]+)/mi', $entry, $m ) ) {
    fail( 'Could not read Version: header from ' . SLUG . '.php' );
}
$version = $m[1];
echo "=== Packaging " . SLUG . " v{$version}\n";

// ---------------------------------------------------------------------------
// Guard 1: the committed autoloader manifest must be production (no-dev).
// A dev-state manifest lists autoload_files from dev packages we do not ship.
// ---------------------------------------------------------------------------

// Production has zero Composer packages (runtime deps live in lib/vendor),
// so a non-empty autoload_files manifest can only come from a dev-state dump.
$files_manifest = __DIR__ . '/vendor/composer/autoload_files.php';
if ( file_exists( $files_manifest ) && ! empty( (array) require $files_manifest ) ) {
    fail( "Dev-state autoloader detected (vendor/composer/autoload_files.php is non-empty).\n"
        . 'Run `php build.php` first — it ends with `composer dump-autoload --optimize --no-dev`.' );
}

if ( ! file_exists( __DIR__ . '/lib/vendor/autoload.php' ) ) {
    fail( 'lib/vendor/autoload.php missing — run `composer install` then `php build.php` first.' );
}

// ---------------------------------------------------------------------------
// Stage the allowlist into dist/<slug>/
// ---------------------------------------------------------------------------

$dist    = __DIR__ . '/dist';
$staging = $dist . '/' . SLUG;

delete_dir( $staging );
if ( ! is_dir( $staging ) && ! mkdir( $staging, 0755, true ) ) {
    fail( "Could not create staging dir {$staging}" );
}

$ship_files = [ SLUG . '.php', 'uninstall.php', 'readme.txt', 'LICENSE' ];
$ship_dirs  = [ 'includes', 'admin', 'assets', 'languages' ];

foreach ( $ship_files as $file ) {
    if ( ! file_exists( $file ) ) {
        echo "  WARN  {$file} not found — skipped\n";
        continue;
    }
    copy( $file, "{$staging}/{$file}" );
}

foreach ( $ship_dirs as $dir ) {
    if ( ! is_dir( $dir ) ) {
        echo "  WARN  {$dir}/ not found — skipped\n";
        continue;
    }
    copy_dir( $dir, "{$staging}/{$dir}" );
}

// Runtime dependencies (Strauss-scoped) + classmap-only Composer autoloader.
copy_dir( 'lib/vendor', "{$staging}/lib/vendor" );
mkdir( "{$staging}/vendor/composer", 0755, true );
copy( 'vendor/autoload.php', "{$staging}/vendor/autoload.php" );

// Only the manifest FILES from vendor/composer — its SUBDIRECTORIES are
// installed packages from the composer/* vendor namespace (dev deps of
// Strauss, e.g. composer/composer) and must never ship.
foreach ( glob( 'vendor/composer/*' ) as $path ) {
    if ( is_file( $path ) ) {
        copy( $path, "{$staging}/vendor/composer/" . basename( $path ) );
    }
}

// ---------------------------------------------------------------------------
// Guard 2: both autoloaders must load cleanly from the STAGED tree.
// This is the exact check that would have caught the broken-vendor deploy.
// ---------------------------------------------------------------------------

$php  = escapeshellarg( PHP_BINARY );
$code = escapeshellarg( "require 'vendor/autoload.php'; require 'lib/vendor/autoload.php'; echo 'AUTOLOAD_OK';" );
$out  = shell_exec( "cd " . escapeshellarg( $staging ) . " && {$php} -r {$code} 2>&1" );
if ( strpos( (string) $out, 'AUTOLOAD_OK' ) === false ) {
    fail( "Staged autoloader sanity check FAILED:\n{$out}" );
}
echo "  OK    staged autoloaders load cleanly\n";

// ---------------------------------------------------------------------------
// Zip it: dist/<slug>-<version>.zip with <slug>/ as the top-level folder.
// ---------------------------------------------------------------------------

$zip_path = "{$dist}/" . SLUG . "-{$version}.zip";
if ( file_exists( $zip_path ) ) {
    unlink( $zip_path );
}

if ( class_exists( 'ZipArchive' ) ) {
    $zip = new ZipArchive();
    if ( $zip->open( $zip_path, ZipArchive::CREATE ) !== true ) {
        fail( "Could not create {$zip_path}" );
    }
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator( $staging, RecursiveDirectoryIterator::SKIP_DOTS )
    );
    foreach ( $it as $file ) {
        $rel = SLUG . '/' . str_replace( '\\', '/', substr( $file->getPathname(), strlen( $staging ) + 1 ) );
        $zip->addFile( $file->getPathname(), $rel );
    }
    $zip->close();
} elseif ( PHP_OS_FAMILY === 'Windows' ) {
    $cmd = 'powershell -NoProfile -Command "Compress-Archive -Path ' . escapeshellarg( $staging )
         . ' -DestinationPath ' . escapeshellarg( $zip_path ) . ' -Force"';
    passthru( $cmd, $exit );
    if ( $exit !== 0 ) {
        fail( 'Compress-Archive failed.' );
    }
} else {
    passthru( 'cd ' . escapeshellarg( $dist ) . ' && zip -rq ' . escapeshellarg( $zip_path ) . ' ' . SLUG, $exit );
    if ( $exit !== 0 ) {
        fail( 'zip failed.' );
    }
}

$size = round( filesize( $zip_path ) / 1048576, 1 );
echo "\n=== Done: dist/" . SLUG . "-{$version}.zip ({$size} MB)\n";

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

function copy_dir( string $src, string $dst ): void {
    if ( ! is_dir( $dst ) ) {
        mkdir( $dst, 0755, true );
    }
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator( $src, RecursiveDirectoryIterator::SKIP_DOTS ),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ( $it as $item ) {
        $target = $dst . '/' . substr( $item->getPathname(), strlen( $src ) + 1 );
        if ( $item->isDir() ) {
            if ( ! is_dir( $target ) ) {
                mkdir( $target, 0755, true );
            }
        } else {
            copy( $item->getPathname(), $target );
        }
    }
}

function delete_dir( string $path ): void {
    if ( ! is_dir( $path ) ) {
        return;
    }
    $it    = new RecursiveDirectoryIterator( $path, RecursiveDirectoryIterator::SKIP_DOTS );
    $files = new RecursiveIteratorIterator( $it, RecursiveIteratorIterator::CHILD_FIRST );
    foreach ( $files as $file ) {
        $file->isDir() ? rmdir( $file->getPathname() ) : unlink( $file->getPathname() );
    }
    rmdir( $path );
}

function fail( string $msg ): void {
    fwrite( STDERR, "ERROR: {$msg}\n" );
    exit( 1 );
}
