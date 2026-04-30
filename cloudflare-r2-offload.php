<?php
/**
 * Plugin Name: Cloudflare R2 Offload
 * Plugin URI:  https://github.com/aqeelhusny/cloudflare-r2-offload
 * Description: Offload your entire WordPress media library to Cloudflare R2 with custom CDN domain support, bulk migration, file manager, upload stats, and optimized multipart uploads.
 * Version:     1.3.1
 * Author:      Aqeel Husny
 * Author URI:  https://github.com/aqeelhusny
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: cloudflare-r2-offload
 * Domain Path: /languages
 * Requires PHP: 7.4
 * Requires at least: 5.8
 * WC requires at least: 6.0
 * WC tested up to: 9.9
 */

defined( 'ABSPATH' ) || exit;

// Minimum PHP version check.
if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
    add_action( 'admin_notices', function () {
        echo '<div class="notice notice-error"><p>' .
             esc_html__( 'Cloudflare R2 Offload requires PHP 7.4 or higher.', 'cloudflare-r2-offload' ) .
             '</p></div>';
    } );
    return;
}

// Plugin constants.
define( 'R2_OFFLOAD_VERSION',    '1.3.1' );
define( 'R2_OFFLOAD_PATH',       plugin_dir_path( __FILE__ ) );
define( 'R2_OFFLOAD_URL',        plugin_dir_url( __FILE__ ) );
define( 'R2_OFFLOAD_BASENAME',   plugin_basename( __FILE__ ) );
define( 'R2_OFFLOAD_DB_VERSION', '1.0.0' );

// Autoloader — vendor (AWS SDK) + PSR-4 classes.
$autoload = R2_OFFLOAD_PATH . 'vendor/autoload.php';
if ( ! file_exists( $autoload ) ) {
    add_action( 'admin_notices', function () {
        echo '<div class="notice notice-error"><p>' .
             esc_html__( 'Cloudflare R2 Offload: Composer dependencies are missing. Please run <code>composer install</code> in the plugin directory.', 'cloudflare-r2-offload' ) .
             '</p></div>';
    } );
    return;
}
require_once $autoload;

// Activation / deactivation hooks.
register_activation_hook( __FILE__, [ 'R2Offload\Plugin', 'activate' ] );
register_deactivation_hook( __FILE__, [ 'R2Offload\Plugin', 'deactivate' ] );

// Declare WooCommerce HPOS (High-Performance Order Storage) compatibility.
// This must run before WooCommerce initialises — hence before_woocommerce_init.
add_action( 'before_woocommerce_init', function () {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, true );
    }
} );

// Boot the plugin after all plugins are loaded so third-party image sizes are registered.
add_action( 'plugins_loaded', function () {
    R2Offload\Plugin::get_instance();
} );
