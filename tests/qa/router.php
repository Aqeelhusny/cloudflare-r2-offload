<?php
// Router for PHP's built-in server: serve real files, send everything else to WordPress.
$f = __DIR__ . parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
if ( is_file( $f ) ) {
    return false;
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
