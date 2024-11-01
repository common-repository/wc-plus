<?php
/**
 * Menu controller Free
 */
class Pluswc_Free_Class
{
public function wcplusFreeClass()
   		{
if (get_option('WCPLUS_license_key_valid') == 'valid'){
function wc_plus_free_version_text_shortcode() {
    $html = 'Unlock this feature & more by upgrading today <div class="plugin-top-btn"><a href="https://wcplus.co/pricing/" target="_blank" class="with-color">Upgrade Now</a></div>';
    return $html;
}
add_shortcode('wc_plus_free_version_text', 'wc_plus_free_version_text_shortcode');
if (is_admin()) {
    if (isset($_GET['page'])) {
        $page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';
        if (
            $page === 'get-started' ||
            $page === 'set-layouts' ||
            $page === 'set-brands-color' ||
            $page === 'set-ksp' ||
            $page === 'set-options' ||
            $page === 'wc-plus-cart' ||
            $page === 'wcplus-order-bumps' ||
            $page === 'wcplus-post-purchase-upsell' ||
            $page === 'wcplus-my-account' ||
            $page === 'wcplus-cart-goal'
        ) {
            function add_script_file_base() { 
                wp_register_style('add_script_file_base', plugins_url('css/wcplus-admin-style.css', __FILE__));
                wp_register_style('add_bootstrapicons_css', plugins_url('css/bootstrapicons-iconpicker.css', __FILE__));
                wp_enqueue_style('add_script_file_base');
            }
            add_action('admin_init', 'add_script_file_base');
        }else{
            function add_script_file_base() {
                    wp_register_style('add_script_file_base', plugins_url('css/wcplus-newstyle.css', __FILE__));
                    wp_enqueue_style('add_script_file_base');
                }
                add_action('admin_init', 'add_script_file_base');
        }
    }else{
        function add_script_file_base() {
            wp_register_style('add_script_file_base', plugins_url('css/wcplus-newstyle.css', __FILE__));
            wp_enqueue_style('add_script_file_base');
        }
        add_action('admin_init', 'add_script_file_base');
    }
} else {
    // For non-admin pages, enqueue the styles without conditions
    function add_script_file_base() { 
        wp_register_style('add_script_file_base', plugins_url('css/wcplus-admin-style.css', __FILE__));
        wp_register_style('add_bootstrapicons_css', plugins_url('css/bootstrapicons-iconpicker.css', __FILE__));
        wp_enqueue_style('add_script_file_base');
    }
    add_action('admin_init', 'add_script_file_base');
}

function wcplus_empty_woocommerce_cart_item_name_base() {
    remove_all_actions('woocommerce_cart_item_name');
    remove_all_actions('woocommerce_checkout_fields');
    remove_all_actions('woocommerce_cart_item_subtotal');
    remove_all_actions('woocommerce_checkout_cart_item_quantity');
    remove_all_actions('woocommerce_cart_item_class');
    remove_all_actions('woocommerce_cart_item_product');
   // remove_all_actions('woocommerce_add_to_cart_fragments');
}
add_action('wp', 'wcplus_empty_woocommerce_cart_item_name_base');

function wcPlus_remove_custom_style_base() {
    $styles = wp_styles();
    foreach ($styles->registered as $handle => $style) { 
        if ( class_exists( 'WooCommerce' )){
        if (is_checkout()) {
            do_action( 'wcplus_woocommerce_remove_script_unused');
            //echo "<pre>";print_r($style);
            if($handle != 'jquery-ui-style-orddd-lite' && $handle != 'datepicker' && $handle != 'sherpa-zebra' && $handle != 'brb-public-swiper-css' && $handle != 'brb-public-rplg-css' && $handle != 'brb-admin-main-css' && $handle != 'brb-public-main-css' && $handle != 'wc-plus-style' && $handle != 'wc-plus-cart-style' && $handle != 'wc-plus-style-myaccount' && $handle != 'wc-plus-style-checkout' && $handle != 'wc-plus-icons-boostrap' && $handle != 'wc-plus-icons-boostrap-cdn' && $handle != 'wc-plus-splide-cdn' && $handle != 'wc-plus-style-checkout' && $style->handle != 'admin-bar' && $style->handle != 'stripe_styles' && $style->handle != 'popup-maker-site'){
                wp_dequeue_style($handle);
            }
        }
        if (strpos($style->src, 'style.css') !== false) {
            if (is_checkout()) {
                if($handle != 'wc-plus-style' && $handle != 'wc-plus-cart-style' && $handle != 'wc-plus-style-checkout'){
                    wp_dequeue_style($handle);
                    wp_deregister_style($handle);
                }
            }
            // if (is_account_page() && $account_enable == 1) { 
            //     if($handle != 'wc-plus-style' && $handle != 'wc-plus-cart-style' && $handle != 'wc-plus-style-checkout'){
            //         wp_dequeue_style($handle);
            //         wp_deregister_style($handle);
            //     }
            // }
        }
    }
    }//die;
}
add_action('wp_enqueue_scripts', 'wcPlus_remove_custom_style_base', 100000);
}

function wcplus_plugins_upgrade_link_base($actions, $plugin_file, $plugin_data, $context) {
    if ($plugin_file === 'wc-plus-free-version/wp-plus-free.php') {
        $upgrade_link = '<a href="https://wcplus.co/pricing" target="_blank"><b>Upgrade to Premium</b></a>';
        $settings_link = '<a href="admin.php?page=wcplus-settings">Settings</a>';
        $custom_actions = array($upgrade_link, $settings_link);
        $custom_title = implode(' | ', $custom_actions);

        array_unshift($actions, $custom_title);
    }
    return $actions;
}
add_filter('plugin_action_links', 'wcplus_plugins_upgrade_link_base', 10, 4);

if (get_option('WCPLUS_license_key_valid') == 'invalid'){
    function add_script_file_bases_base() { 
        wp_register_style('add_script_file_bases_base', plugins_url('css/wcplus-admin-style.css', __FILE__));
        wp_enqueue_style('add_script_file_bases_base');
    }
    add_action('admin_init', 'add_script_file_bases_base');
}

if (is_admin()) {
    if (isset($_GET['page'])) {
        $page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : '';
        if (
            $page === 'get-started' ||
            $page === 'set-layouts' ||
            $page === 'set-brands-color' ||
            $page === 'set-ksp' ||
            $page === 'set-options' ||
            $page === 'wc-plus-cart' ||
            $page === 'wcplus-order-bumps' ||
            $page === 'wcplus-post-purchase-upsell' ||
            $page === 'wcplus-my-account' ||
            $page === 'wcplus-cart-goal'
        ) {
function webroom_add_custom_js_file_to_admin_base( $hook ) {
  wp_enqueue_script ( 'wc-plus-admin', plugins_url('js/custom-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-brand', plugins_url('js/brand-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-ksp', plugins_url('js/ksp-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-layout', plugins_url('js/layout-admin.js',__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-option', plugins_url('js/option-admin.js',__FILE__ ) );

  wp_enqueue_script ( 'wc-plus-bootstrapicon-iconpicker', plugins_url('js/bootstrapicon-iconpicker.js',__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-bootstrapicon-iconpicker-custom', plugins_url('js/iconpicker-admin.js',__FILE__ ) );

  wp_localize_script('wc-plus-admin', 'wcpluscustom_script_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_script_nonce')
    ));
  wp_localize_script('wc-plus-layout', 'wcplus_layout_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_script_nonce')
    ));
}
add_action('admin_enqueue_scripts', 'webroom_add_custom_js_file_to_admin_base');

function wc_plus_add_theme_scripts_base() {
    //wp_enqueue_style( 'wc-plus-style', get_stylesheet_uri() );
    $accountsenable = get_option('wcplus_enable_myaccount_page'); 
    wp_enqueue_style( 'wc-plus-cart-style', plugins_url('css/cart-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
    wp_enqueue_style( 'wc-plus-icons-boostrap', plugins_url('css/bootstrapicons-iconpicker.css',__FILE__ ), array(), '1.1', 'all' );
    
    wp_enqueue_style( 'wc-plus-style-checkout', plugins_url('css/wcplus-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
    if ( class_exists( 'WooCommerce' )){
        if (is_account_page() && $accountsenable == 1) {
           wp_enqueue_style( 'wc-plus-style-myaccount', plugins_url('css/myaccount-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
        }
    }
    wp_enqueue_script( 'wc-plus-script', plugins_url('js/cart-js.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.1, true );
    wp_enqueue_script( 'wc-plus-icons', plugins_url('js/bootstrapicon-iconpicker.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.1, true );
    wp_enqueue_script( 'wc-plus-custom-js', plugins_url('js/custom.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.2, true );
    wp_enqueue_script( 'wc-plus-checkout-load-js', plugins_url('js/checkout-load.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.2, true );

}

add_action( 'wp_enqueue_scripts', 'wc_plus_add_theme_scripts_base' );
}
    }
}else{
    function webroom_add_custom_js_file_to_admin_base( $hook ) {
  wp_enqueue_script ( 'wc-plus-admin', plugins_url('js/custom-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-brand', plugins_url('js/brand-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-ksp', plugins_url('js/ksp-admin.js?'.gmdate('ymdhis'),__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-layout', plugins_url('js/layout-admin.js',__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-option', plugins_url('js/option-admin.js',__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-bootstrapicon-iconpicker', plugins_url('js/bootstrapicon-iconpicker.js',__FILE__ ) );
  wp_enqueue_script ( 'wc-plus-bootstrapicon-iconpicker-custom', plugins_url('js/iconpicker-admin.js',__FILE__ ) );

  wp_localize_script('wc-plus-admin', 'wcpluscustom_script_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_script_nonce')
    ));
  wp_localize_script('wc-plus-layout', 'wcplus_layout_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_script_nonce')
    ));
}
add_action('admin_enqueue_scripts', 'webroom_add_custom_js_file_to_admin_base');

function wc_plus_add_theme_scripts_base() {
    //wp_enqueue_style( 'wc-plus-style', get_stylesheet_uri() );
    $accountsenable = get_option('wcplus_enable_myaccount_page'); 
    wp_enqueue_style( 'wc-plus-cart-style', plugins_url('css/cart-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
    wp_enqueue_style( 'wc-plus-icons-boostrap', plugins_url('css/bootstrapicons-iconpicker.css',__FILE__ ), array(), '1.1', 'all' );

    wp_enqueue_style( 'wc-plus-style-checkout', plugins_url('css/wcplus-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
    if ( class_exists( 'WooCommerce' )){
        if (is_account_page() && $accountsenable == 1) { //echo "dasdasda";die;
           wp_enqueue_style( 'wc-plus-style-myaccount', plugins_url('css/myaccount-style.css?'.gmdate('ymdhis'),__FILE__ ), array(), '1.1', 'all' );
        }
    }
    wp_enqueue_script( 'wc-plus-script', plugins_url('js/cart-js.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.1, true );
    wp_enqueue_script( 'wc-plus-icons', plugins_url('js/bootstrapicon-iconpicker.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.1, true );
    wp_enqueue_script( 'wc-plus-custom-js', plugins_url('js/custom.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.2, true );
    wp_enqueue_script( 'wc-plus-checkout-load-js', plugins_url('js/checkout-load.js?'.gmdate('ymdhis'),__FILE__ ), array( 'jquery' ), 1.2, true );
    wp_localize_script('wc-plus-custom-js', 'wcpluscustom_script_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom_script_nonce')
    ));
    

}

add_action( 'wp_enqueue_scripts', 'wc_plus_add_theme_scripts_base' );
}
if(!isset($_POST['billing_email'])){
function wcplusremove_checkout_fields_base($fields) {
         return array();
   }
   add_filter('woocommerce_checkout_fields', 'wcplusremove_checkout_fields_base');
}

function wc_plus_load_media_files_free_base() {
    wp_enqueue_media();
}

add_filter('wc_stripe_logger', function ($logger) {
    $logger->set_level(WC_Log_Levels::DEBUG);
    return $logger;
});


add_action( 'admin_enqueue_scripts', 'wc_plus_load_media_files_free_base' );

function wc_plus_hide_checkout_header_footer_base() {
  // Check if we are on the checkout page
  if ( class_exists( 'WooCommerce' )){
  $account_enable = get_option('wcplus_enable_myaccount_page');
  $wcplus_enablecartpage = get_option('wcplus_enable_cart_page'); 
  if (is_checkout()) {
    add_filter('template_include', 'wc_plus_hide_checkout_header_footer_base_template_base', 99);
  }
  if (is_cart() && $wcplus_enablecartpage == 1) {
    add_filter('template_include', 'wc_plus_hide_checkout_header_footer_base_template_base', 99);
  }
  if (is_account_page() && $account_enable == 1) {
    add_filter('template_include', 'wc_plus_hide_checkout_header_footer_base_template_base', 99);
  }
}
}

function wc_plus_hide_checkout_header_footer_base_template_base($template) {
  // Specify the path to a blank template file
    $blank_template = plugin_dir_path(__FILE__) . 'wcplus_classes/wc-plus-blank-template.php';
    return $blank_template;
}

add_action('wp', 'wc_plus_hide_checkout_header_footer_base');

add_filter( 'woocommerce_locate_template', 'wc_plus_intercept_wc_template_free_base', 1000000, 3 );

function wc_plus_intercept_wc_template_free_base( $template, $template_name, $template_path ) {

    $template_directory = trailingslashit( plugin_dir_path( __FILE__ ) ) . 'include/';
    $path = $template_directory . $template_name;
  //$path = 'woocommerce/templates/' . $template_name;
    if (get_option('WCPLUS_license_key_valid') == 'valid'){
        if(strpos($template_name, 'checkout/') !== false) {
            $template_directory = trailingslashit(plugin_dir_path(__FILE__)) . 'include/';
            $path = $template_directory . $template_name;
            return file_exists($path) ? $path : $template;
        }
     }else{ //echo "Fsfsd";
        if(strpos($template_name, 'checkout/') !== false) {
            $template_directory = trailingslashit(WC()->plugin_path()) . 'templates/';
            $path = $template_directory . $template_name;
            return file_exists($path) ? $path : $template;
        }
     }

    return file_exists( $path ) ? $path : $template;

}
if (!function_exists('wc_wp_theme_get_element_class_wcPlus_base')) {
    function wc_wp_theme_get_element_class_wcPlus_base() {
        // Function implementation goes here
    }
}

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 20 );
add_action( 'woocommerce_order_review_details', 'woocommerce_order_review', 20 );
add_action( 'woocommerce_checkout_order_payments', 'woocommerce_checkout_payment', 200000 );

//add_filter( 'the_title', 'wcplusremove_page_title_base', 10, 2 );

function wcplusremove_page_title_base( $title, $id ) {
    $page_id = wc_get_page_id( 'checkout' );
    if( $page_id == $id ) return '';

    return $title;
}

$showshipping = get_option('pluswc_disbale_shipping');
if($showshipping == 1){
    add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
    add_filter('woocommerce_cart_needs_shipping', '__return_false');

    add_filter('woocommerce_package_rates', 'wcplus_remove_shipping_methods_base', 10, 2);

    function wcplus_remove_shipping_methods_base($rates, $package) {
        // Check if the cart is not empty
        if (WC()->cart->is_empty()) {
            return $rates;
        }

        // Remove all shipping methods
        foreach ($rates as $key => $rate) {
            unset($rates[$key]);
        }

        return $rates;
    }
}



function wcpluscustom_query_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

function wcplusheader_item_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout_header';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

// add favicon icon
function wc_plus_add_favicon_base() { 
    $get_results = wcpluscustom_query_base();
    $wc_custom_header = wcplusheader_item_base();

    // Output the favicon link if it exists
    if(!empty($get_results[0]->favicoon_icon)){
        echo '<link rel="icon" type="image/x-icon" href="' . esc_url($get_results[0]->favicoon_icon) . '" > ';
    }

}
add_action('wp_head', 'wc_plus_add_favicon_base');


function wcpluscustom_enqueue_base() {
  wp_localize_script( 'wc-plus-ajax-js', 'wc_checkout_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) ); 
}
 add_action( 'wp_enqueue_scripts', 'wcpluscustom_enqueue_base' );


//Wcplus_Menus::wcplusAddMenus();
$wcplus_menus_instance = new Pluswc_Menus_Base();
add_action('admin_menu', [$wcplus_menus_instance, 'wcplusAddMenus']);
//add_action('admin_menu', [Wcplus_Menus::class, 'wcplusAddMenus'] );
add_action('wp_ajax_activate_license','activate_license');
add_action('wp_ajax_deactivate_license','deactivate_license');
//add_action('admin_menu', [$this, 'addMenu']);

//require plugin_dir_path( __FILE__ ) . 'includes/class-wc-plus.php';
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/class-wc-plus.php';
function start_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_start_base();
}
function layout_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_layout_base();
}

function brand_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_brand_base();
}
function ksp_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_ksp_base();
}
function option_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_option_base();
}
function cart_plugin_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_cart_base();
}
function order_bumps_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_order_bumps_base();
}
function post_purchase_upsell_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_post_purchase_upsell_base();
}
function my_account_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_my_account_base();
}
function cart_goal_wp_plus_base() {
    $plugin = new Pluswc_main_base();
    $plugin->wc_plus_cart_base_goal_base();
}


function get_data_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_header_item_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout_header';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_googlemap_key_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_mapkey';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_footer_data_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_footer';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_items_focus_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_items_focus';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_template_data_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_template';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_wcplus_banner_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_banner';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_wcplus_checkout_fields_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_checkout_fields';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_wcplus_customer_review_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_reviews';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}
$dasdad = get_wcplus_customer_review_base();

function get_wcplus_cart_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_cart';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function get_wcplus_enablebox_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_enablebox';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}

function clivern_render_setlayout_page_base(){
      layout_plugin_wp_plus_base();
}

function clivern_render_setbrand_color_page_base(){
    brand_plugin_wp_plus_base();
}
function clivern_render_set_ksp_page_base(){
    ksp_plugin_wp_plus_base();
}
function clivern_render_set_option_page_base(){
    option_plugin_wp_plus_base();
}

function clivern_render_set_cart_page_base(){
    cart_plugin_wp_plus_base();
}

function clivern_render_order_bumps_base(){
    order_bumps_wp_plus_base();
}

function clivern_render_post_purchase_upsell_base(){
    post_purchase_upsell_wp_plus_base();
}

function clivern_render_my_account_base(){
    my_account_wp_plus_base();
}

function clivern_render_cart_goal_base(){
    cart_goal_wp_plus_base();
}

function clivern_render_plugin_page_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    $data = $wpdb->get_results("SELECT * FROM $table_name");
    start_plugin_wp_plus_base();
    //require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/start.php';    
    //require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/template_admin.php';   

}

require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/wcplus_classes/wcplusbase.php';

//add_action('admin_menu','clivern_plugin_top_menu');

global $pluswc_db_version;
$pluswc_db_version = '1.0';


register_activation_hook(__FILE__, [Pluswc_Base_Base::class, 'wcplusactivate'] );
register_activation_hook(__FILE__, [Pluswc_Base_Base::class, 'wcplusinstall_data']);

register_uninstall_hook(__FILE__, [Pluswc_Base_Base::class, 'wcplusdeleteTable']);

function wcplus_redirect_after_plugin_activation_base( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        if (get_option('WCPLUS_license_key_valid') == 'valid'){
            exit( wp_redirect( esc_url( admin_url( 'admin.php?page=get-started' ) ) ) );
        }
    }
}
add_action( 'activated_plugin', 'wcplus_redirect_after_plugin_activation_base' );

require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/custom-function.php';
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/wcplus-function.php';


add_filter( 'woocommerce_checkout_redirect_empty_cart', '__return_false' );
add_filter( 'woocommerce_checkout_update_order_review_expired', '__return_false' );

add_action( 'woocommerce_thankyou', 'wcplus_bbloomer_redirectcustom' );
  
function wcplus_bbloomer_redirectcustom( $order_id ){
    wp_safe_redirect( wc_get_checkout_url().'?key='.base64_encode($order_id) );
    exit;
}
function wc_plus_header_css(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout_header';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}
function wcplus_checkout_css(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}
function wcplus_enqueue_dynamic_styles() {
$wcheaders = wc_plus_header_css();
$wcplus_dynamic_css = '';
$get_results = wcplus_checkout_css();
$wc_header = wc_plus_header_css();
$cartbkcolor = get_option('wcplus_cart_bk_color');
$carttextcolor = get_option('wcplus_cart_text_color');
$body_step_text_checkout = get_option('wcplus_body_step_text_checkout');
//$wcplussaving_bg_color = get_option('wcplus_select_saving_bg_color');
$wcplussaving_text_color = get_option('wcplus_select_saving_text_color');
//echo "<pre>";print_r($get_results);
if(!empty($wc_header[0]->body_step_checkout)){
    $hex = $wc_header[0]->body_step_checkout;
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
  $wcplus_dynamic_css .= 'input#checkout_apply_coupon,.next-button,.billing-section-saas .user-login-checkout form input#wp-submit,.billing-section-focus .user-login-checkout form input#wp-submit,.billing-section-general .user-login-checkout form input#wp-submit,a.wcplus_countinue_btn{background: '.$wc_header[0]->body_step_checkout.'  !important;border-color: '.$wc_header[0]->body_step_checkout.'  !important;color: '.$body_step_text_checkout.'  !important;}.shipping-detail-box .checkmark:after{background: '.$wc_header[0]->body_step_checkout.'  !important;}.shipping-detail-box label input[type="radio"]:checked ~ .checkmark,.wc-shipping-method ul#shipping_method li input:checked ~ label,.wcplus_advancedShipping td, .payment-box div#payment .wc_payment_methods li input[type=radio][name=payment_method]:checked+label{color: '.$wc_header[0]->body_step_checkout.'  !important;}.shipping-detail-box.active-shipping,.wcplus_advancedShipping td,.wc-shipping-method ul#shipping_method, .payment-box div#payment .wc_payment_methods li.active-payment {border: 1px solid '.$wc_header[0]->body_step_checkout.'  !important;}.payment-box div#payment .wc_payment_methods li input[type=radio][name=payment_method]:checked+label::before,.wc-shipping-method ul#shipping_method li input:checked ~ label:before,.shipping-detail-box label input[type="radio"]:checked ~ .checkmark:before,.wc-stripe_cc-new-method-container .wc-stripe-save-source label.checkbox input:checked ~ .save-source-checkbox:before, .payment-box div#payment .wc_payment_methods li input[type=radio][name=wc-stripe-payment-token]:checked ~ label:before{
    background: radial-gradient(circle at center,'.$wc_header[0]->body_step_checkout.' 45%,#fff 0) !important;
    border-color: '.$wc_header[0]->body_step_checkout.' !important;
}.shipping-detail-box.active-shipping,.wcplus_advancedShipping td,.wc-shipping-method ul#shipping_method li.shipping-active, .payment-box div#payment .wc_payment_methods li.active-payment {
    background: rgb('.$r.' '. $g.' '. $b.' / 8%);
}.form-row.place-order button#place_order{
background:'.$wc_header[0]->body_step_checkout.' !important;color: '.$body_step_text_checkout.'  !important;
}.wcplus-account-page .wcplus-myaccount-profile-banner .woocommerce-MyAccount-navigation ul li a{
            background: rgb('.$r.' '. $g.' '. $b.' / 40%);
            color:#ffffff !important;
            }
.wc-shipping-method ul#shipping_method li.shipping-active {
    border-color: '.$wc_header[0]->body_step_checkout.' !important;
}.payment-box .tabcontent.active{
    background: rgb('.$r.' '. $g.' '. $b.' / 8%);
    border-color:'.$wc_header[0]->body_step_checkout.'  !important;
}
.payment-tabs .tab button.tablinks.active {
    color: '.$wc_header[0]->body_step_checkout.'  !important;
    border-color: '.$wc_header[0]->body_step_checkout.'  !important;
}
.payment-box div#payment .tabcontent .wc-saved-payment-methods {
    border: 1px solid '.$wc_header[0]->body_step_checkout.' !important;
}
.payment-box div#payment .tabcontent .wc-saved-payment-methods li input[type=radio]:checked+label::before {
    background: radial-gradient(circle at center,'.$wc_header[0]->body_step_checkout.' 45%,#fff 0) !important;
    border-color: '.$wc_header[0]->body_step_checkout.' !important;
}
.payment-box div#payment .tabcontent .wc-saved-payment-methods li input[type=radio]:checked+label.payment-box div#payment .tabcontent .wc-saved-payment-methods li input[type=radio]:checked+label{
    color: '.$wc_header[0]->body_step_checkout.';
}
.woocommerce-shipping-names .form-row:focus-within input,.autocomplete-container .form-row:focus-within input,.billing-detail .woocommerce-billing-fields__field-wrapper .form-row:focus-within input, .manuly-content .woocommerce-shipping-fields-wrap .form-row:focus-within input, .billing-detail .woocommerce-billing-fields__field-wrapper .form-row:focus-within select, .manuly-content .woocommerce-shipping-fields-wrap .form-row:focus-within select,.user-login-checkout form .login-username:focus-within input,.user-login-checkout form .login-password:focus-within input{
    border:1px solid '.$wc_header[0]->body_step_checkout.' !important;
}
.woocommerce-shipping-names .form-row:focus-within label,div#wcplusShipping_data p, .autocomplete-container .form-row:focus-within label, .billing-detail .woocommerce-billing-fields__field-wrapper .form-row:focus-within label,
.manuly-content .woocommerce-shipping-fields-wrap .form-row:focus-within label,
.user-login-checkout form .login-username:focus-within label,.user-login-checkout form .login-password:focus-within label{
    color: '.$wc_header[0]->body_step_checkout.' !important;
}
a.Continue_without_logging{
    color:'.$wc_header[0]->body_link_color.' !important;
}
.woocommerce-message, ul.woocommerce-error{
    background:'.$cartbkcolor.' !important;
    color:'.$carttextcolor.' !important;
}
.woocommerce-message a{
    color:'.$carttextcolor.' !important;
}
.wcplus_advancedShipping ul#shipping_method li label {
    padding-left: 0px;
    color: '.$carttextcolor.' !important;
}
.wc-plus-body #total-savingcart bdi, #total-savingcart bdi span {
    color: '.$wcplussaving_text_color.' !important;
}
.wcplus-account-page .wcplus-myaccount-profile-banner .woocommerce-MyAccount-navigation ul li.is-active a, .wcplus-account-page .wcplus-myaccount-profile-banner .woocommerce-MyAccount-navigation ul li a:hover{
                color:'.$wc_headers[0]->body_step_checkout.' !important;
                background:#ffffff !important;
            }
';
}

if(!empty($get_results[0]->sidebar_background)){
     $wcplus_dynamic_css .= '.billing-section-general .billing-section-right:before{background-color: '.$get_results[0]->sidebar_background.' !important;}.billing-section-right .order-summery-box,.customer-review,.faq-block,.custom-block{background-color: '.$get_results[0]->sidebar_background.' !important;}';
}
if(!empty($get_results[0]->sidebar_textcolor)){
    $txt_col = $get_results[0]->sidebar_textcolor;
    $wcplus_dynamic_css .= '.order-summery-heading h2,
.order-summery-heading a,.order-summery-table table th,
.order-summery-table table td,
.customer-review h2,.customer-review-col p,.customer-review-col span,.faq-block h2,
.accordion,.panel p, .order-summery-table table tfoot td:last-child span{color: '.$txt_col.' !important;}.wc-plus-related-slider-review .splide__pagination__page.is-active{background: '.$txt_col.'}';

}
if(!empty($wcheaders[0]->body_bg)){
       $wcplus_dynamic_css .= "
            body{
                background: " . esc_attr($wcheaders[0]->body_bg) . " !important;
            }
            .billing-section{
                background: " . esc_attr($wcheaders[0]->body_bg) . " !important;
            }
            .header-mobile-row1{
                background: " . esc_attr($wcheaders[0]->bk_mobile) . ";
            }
            ";
    }
    if(!empty($wcheaders[0]->body_step_checkout)){ 
         $wcplus_dynamic_css .= "
            .shadow-box.active #billing_detals,
            .user-login-checkout h2,
            .shadow-box.active #shipping_detals,
            .aviable-shippind-Class,
            .shadow-box.active #payment_details,
            div#wp_billing_data p, .wcplus-myaccount-main h2 {
                color: " . esc_attr($wcheaders[0]->body_step_checkout) . " !important;
            }
            .mobile-form-tab-list ul li.active:before,
            .mobile-form-tab-list ul li.active .count_num,
            .shadow-box.active .count_num,
            .shadow-box.active:before, .wcplus-myaccount-profile-banner, .cart-page-layout .wc-proceed-to-checkout a, .wcplus-empty-cart .return-to-shop a.button.wc-backward {
                background: " . esc_attr($wcheaders[0]->body_step_checkout) . " !important;
            }
        ";
    }
    if(!empty($wcheaders[0]->body_link_color)){
       $wcplus_dynamic_css .= "
            .header-cls a, form a, .footer-cls a{
                color: ".esc_attr($wcheaders[0]->body_link_color)." !important;
            }
        ";   
    }
//echo $wcplus_dynamic_css;die("fd");
     wp_add_inline_style('wc-plus-style-checkout', $wcplus_dynamic_css);
}
add_action('wp_enqueue_scripts', 'wcplus_enqueue_dynamic_styles');

$my_account_page_id = get_option('woocommerce_myaccount_page_id');

}
}
