<?php
/**
 * Strauss launcher with an autoload safety net.
 *
 * The generated project autoloader sometimes lacks composer/composer's rules
 * (its installed.json entry loses the autoload field), which fatals Strauss
 * with "Class Composer\Factory not found". Register a fallback PSR-4 loader
 * for the Composer\ namespace before handing over to the Strauss bin, so the
 * build works regardless of that metadata's state.
 *
 * Invoked by build.php — not shipped in the production zip.
 */

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register( static function ( string $class ): void {
    if ( strncmp( $class, 'Composer\\', 9 ) !== 0 ) {
        return;
    }
    $file = __DIR__ . '/vendor/composer/composer/src/' . str_replace( '\\', '/', $class ) . '.php';
    if ( file_exists( $file ) ) {
        require $file;
    }
} );

require __DIR__ . '/vendor/brianhenryie/strauss/bin/strauss';
