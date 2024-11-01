<?php
/*
Plugin Name: WC Plus
Description: A WooCommerce Checkout plugin, providing a conversion-optimised, responsive template. Designed & built by a team with the experience and delivery of 300+ WooCommerce websites.
Author: WC Plus
Author URI: https://wcplus.co
Version: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Network: true
*/
//update_option('woocommerce_enable_guest_checkout', 'yes');
if ( ! defined( 'ABSPATH' ) ) exit; 
$active_plugins = get_option('active_plugins');
$plugin_filename = 'wc-plus/wp-plus.php';
if (!in_array($plugin_filename, $active_plugins)) {
define('WC_PLUS_PLUGIN_BASE_VERSION', '1.0.0');
define( 'PLUSWC_CWOO_PATH_BASE_VERSION', dirname( __FILE__ ) );
define( 'PLUSWC_CWOO_PLAGIN_BASE_VERSION', plugin_dir_path( __FILE__ ) );
define( 'WCPLUS_PLUGIN_DIR_BASE_VERSION', plugin_dir_path(__FILE__));
define('WC_PLUS_FREE_VERSION_TEXT', 'Unlock this feature & more by upgrading today <div class="plugin-top-btn"><a href="https://wcplus.co/pricing/" target="_blank" class="with-color">Upgrade Now</a></div>');
define('WC_PLUS_FREE_PREMIUM_TAG', 'Upgrade Now');
update_option('WCPLUS_license_key_valid', 'valid'); 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/wcplus_classes/wcplusmenus.php';
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/wcplus-allcode.php';
global $pagenow, $typenow;
$wcplusfreeplugin = new Pluswc_Free_Class();
$wcplusfreeplugin->wcplusFreeClass();
}else{
    update_option('WCPLUS_license_key_valid', 'invalid'); 
}

?>