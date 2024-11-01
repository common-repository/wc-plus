<?php
if ( ! defined( 'ABSPATH' ) ) exit;
//echo plugins_url('wc-plus/js/checkout-load.js');die;
function pluswcenqueue_custom_scripts() {
    wp_register_script(
        'wc-plus-checkout-load-js',
        plugins_url('wc-plus-free-version/js/checkout-load.js'), // Adjust the path as necessary
        array('jquery'), // Dependencies
        null, // Version
        true // Load in footer
    );

    // Enqueue the script
    wp_enqueue_script('wc-plus-checkout-load-js');
}
add_action('wp_enqueue_scripts', 'pluswcenqueue_custom_scripts');

function wcplus_custom_shipping_options_html_base() {
    ob_start();
    wc_cart_totals_shipping_html();
    return ob_get_clean();
}
function pluswc_append_custom_shipping_options_base($fragments) {
    $chosen_shipping_methods = WC()->session->get('chosen_shipping_methods');
    $shipping_class = '';
    if (!empty($chosen_shipping_methods)) {
        $chosen_shipping_method = reset($chosen_shipping_methods);
        $shipping_methods = WC()->shipping->get_shipping_methods();
        if (isset($shipping_methods['advanced_shipping'])) { 
            $current_shipping_method = $shipping_methods['advanced_shipping']->matched_methods[0];
            $legacy_advanced_shipping = $shipping_methods['legacy_advanced_shipping']->rates[$chosen_shipping_method]->id;
            if ($current_shipping_method == $chosen_shipping_methods[0] || $legacy_advanced_shipping == $chosen_shipping_methods[0]) {
                $shipping_class .= 'wcplus_advancedShipping';
            }
        }
    }
    $custom_shipping_html = '<table class="wcplus_custom_fragment_class '.$shipping_class.'">';
    $custom_shipping_html .= wcplus_custom_shipping_options_html_base();

    wp_enqueue_script('wc-plus-checkout-load-js');

    $custom_shipping_html .= '</table>';

    $fragments['.wcplus_custom_fragment_class'] .= $custom_shipping_html;

    return $fragments;
}
add_filter('woocommerce_update_order_review_fragments', 'pluswc_append_custom_shipping_options_base');

add_action('init', 'pluswc_session_base', 1);

function pluswc_session_base() {
    if (!session_id()) {
        session_start();
    }
}

add_action('wp_ajax_pluswc_save_account_page_base', 'pluswc_save_account_page_base');
add_action('wp_ajax_nopriv_pluswc_save_account_page_base', 'pluswc_save_account_page_base');
function pluswc_save_account_page_base() {
    global $wpdb;
    $accountpage_enable = isset($_POST['accountpage_enable']) ? sanitize_text_field($_POST['accountpage_enable']) : '';
    update_option('wcplus_enable_myaccount_page', $accountpage_enable);
    echo "1";
    wp_die();
}

add_action('wp_ajax_pluswc_account_headingtext_base', 'pluswc_account_headingtext_base');
add_action('wp_ajax_nopriv_pluswc_account_headingtext_base', 'pluswc_account_headingtext_base');
function pluswc_account_headingtext_base() {
    global $wpdb;
    $wcplus_myaccount_heading = isset($_POST['wcplus_myaccount_heading']) ? sanitize_text_field($_POST['wcplus_myaccount_heading']) : '';
    $wcplus_myaccount_desc = isset($_POST['wcplus_myaccount_desc']) ? sanitize_text_field($_POST['wcplus_myaccount_desc']) : '';
    update_option('wcplus_myaccount_heading', $wcplus_myaccount_heading);
    update_option('wcplus_myaccount_desc', $wcplus_myaccount_desc);
    echo "1";
    wp_die();
}

add_action('wp_ajax_pluswc_save_shopbutton_data_base', 'pluswc_save_shopbutton_data_base');
add_action('wp_ajax_nopriv_pluswc_save_shopbutton_data_base', 'pluswc_save_shopbutton_data_base');
function pluswc_save_shopbutton_data_base() {
    global $wpdb;
    $wcplus_shoptext = isset($_POST['wcplus_shoptext']) ? sanitize_text_field($_POST['wcplus_shoptext']) : '';
    $wcplus_shoplink = isset($_POST['wcplus_shoplink']) ? sanitize_text_field($_POST['wcplus_shoplink']) : '';
    update_option('wcplus_shop_text', $wcplus_shoptext);
    update_option('wcplus_shop_link', $wcplus_shoplink);
    echo "1";
    wp_die();
}

function pluswc_querypostupsell_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}
function pluswc_header_itempostupsell_base(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout_header';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

?>