<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
//echo "<pre>";print_r( $checkout);
do_action( 'woocommerce_before_checkout_form', $checkout );

function pluswc_shipping_method_heading( $title, $method ) {
    $customheading = '<p class="aviable-shippind-Class">Available Shipping Options</p>';
    return $customheading;
}
add_filter( 'woocommerce_shipping_package_name', 'pluswc_shipping_method_heading', 1000000, 2 );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'wc-plus' ) ) );
    return;
}
add_filter( 'woocommerce_form_field', 'pluswc_sadd_before_html', 2000001, 3 );
function pluswc_sadd_before_html( $field, $key, $args ) {
        if ( $args['before_html'] ?? false ) {
            $field = $args['before_html'] . $field;
        }

        return $field;
    }

add_filter("woocommerce_checkout_fields", "pluswc_checkout_fields", 10000000, 1);
function pluswc_checkout_fields($fields) { 
    $disable_check = get_wcplus_checkout_fields_base();
    $default_country = WC()->countries->get_base_country();
    $countries = WC()->countries->get_countries();
    $country_options = array();
    foreach ($countries as $country_code => $country_name) {
        $country_options[$country_code] = $country_name;
    }
    // $abandoned_cart_data = get_abandoned_cart_data();
    // echo "<pre>";print_r($abandoned_cart_data);die;
    $fields['billing']['billing_country'] = array(
        'type'      => 'country',
        'class'     => array('chzn-drop'),
        'label'     => __('Country', 'wc-plus'),
        'placeholder' => __('Choose your country.', 'wc-plus'),
        'required'  => true,
        'clear'     => true,
        'priority'    => 11
    );
    $fields['billing']['billing_email'] = array(
        'type'        => 'email',
        'label'       => __('Email', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 1
    );
    $fields['billing']['billing_first_name'] = array(
        'type'        => 'text',
        'label'       => __('First Name', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-first'),
        'clear'       => true,
        'priority'    => 2
    );
    $fields['billing']['billing_last_name'] = array(
        'type'        => 'text',
        'label'       => __('Last Name', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-last'),
        'clear'       => true,
        'priority'    => 3
    );
    $fields['billing']['billing_phone'] = array(
        'type'        => 'text',
        'label'       => __('Phone', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 4
    );
    if($disable_check[0]->enable_address == 0){
        $fields['billing']['billing_address_1'] = array(
            'type'        => 'text',
            'label'       => __('Street address', 'wc-plus'),
            'required'    => true,
            'class'       => array('form-row-wide'),
            'clear'       => true,
            'priority'    => 5
        );
    }
    if($disable_check[0]->enable_address_two == 0){
        $fields['billing']['billing_address_2'] = array(
            'type'        => 'text',
            'label'       => __('Street address 2', 'wc-plus'),
            'required'    => false,
            'class'       => array('form-row-wide'),
            'clear'       => true,
            'priority'    => 6
        );
    }
    $fields['billing']['billing_city'] = array(
        'type'        => 'text',
        'label'       => __('City', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide'),
        'clear'       => true,
        'priority'    => 7
    );
    if($disable_check[0]->enable_state == 0){
        $fields['billing']['billing_state'] = array(
            'type'        => 'text',
            'label'       => __('State', 'wc-plus'),
            'required'    => true,
            'class'       => array('form-row-wide'),
            'clear'       => true,
            'priority'    => 9,
            'autocomplete'=> 'new-password'
        );
    }
    if($disable_check[0]->enable_zipcode == 0){
        $fields['billing']['billing_postcode'] = array(
            'type'        => 'text',
            'label'       => __('Postcode', 'wc-plus'),
            'required'    => true,
            'class'       => array('form-row-wide'),
            'clear'       => true,
            'priority'    => 10
        );
        
    }
   // echo "<pre>";print_r($fields['billing']);
    $fields['shipping']['shipping_first_name'] = array(
        'type'        => 'text',
        'label'       => __('First Name', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-first address-field'),
        'clear'       => true,
        'priority'    => 11
    );
    $fields['shipping']['shipping_last_name'] = array(
        'type'        => 'text',
        'label'       => __('Last Name', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-last address-field'),
        'clear'       => true,
        'priority'    => 12
    );
    $fields['shipping']['shipping_country'] = array(
        'type'        => 'country',
        'label'       => __('Country', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide address-field update_totals_on_change'),
        'clear'       => true,
        'priority'    => 18,
        'options'     => $country_options, // Add the options array
        //'default'     => $default_country, // Set the default country
    );

    $fields['shipping']['shipping_address_1'] = array(
        'type'        => 'text',
        'label'       => __('Street address', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide address-field'),
        'clear'       => true,
        'priority'    => 13
    );
    $fields['shipping']['shipping_address_2'] = array(
        'type'        => 'text',
        'label'       => __('Apartment, suite, unit, etc.', 'wc-plus'),
        'required'    => false,
        'class'       => array('form-row-wide address-field'),
        'clear'       => true,
        'priority'    => 14
    );
    $fields['shipping']['shipping_city'] = array(
        'type'        => 'text',
        'label'       => __('City', 'wc-plus'),
        'required'    => false,
        'class'       => array('form-row-wide address-field'),
        'clear'       => true,
        'priority'    => 15
    );
    $fields['shipping']['shipping_state'] = array(
        'type'        => 'text',
        'label'       => __('State', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide address-field'),
        'clear'       => true,
        'priority'    => 16
    );
    $fields['shipping']['shipping_postcode'] = array(
        'type'        => 'text',
        'label'       => __('Postcode', 'wc-plus'),
        'required'    => true,
        'class'       => array('form-row-wide address-field'),
        'clear'       => true,
        'priority'    => 17
    );
    if (is_user_logged_in()) {
        $wcplsuuser_id = get_current_user_id();
        $google_keyactive = pluswc_googlemapkey();
        // Get user meta data
        $wcplus_billing_first_name = get_user_meta($wcplsuuser_id, 'billing_first_name', true);
        $wcplus_billing_last_name = get_user_meta($wcplsuuser_id, 'billing_last_name', true);
        $wcplus_billing_email = get_user_meta($wcplsuuser_id, 'billing_email', true);
        $wcplus_billing_address_1 = get_user_meta($wcplsuuser_id, 'billing_address_1', true);
        $wcplus_billing_address_2 = get_user_meta($wcplsuuser_id, 'billing_address_2', true);
        $wcplus_billing_city = get_user_meta($wcplsuuser_id, 'billing_city', true);
        $wcplus_billing_state = get_user_meta($wcplsuuser_id, 'billing_state', true);
        $wcplus_billing_postcode = get_user_meta($wcplsuuser_id, 'billing_postcode', true);
        $wcplus_billing_phone = get_user_meta($wcplsuuser_id, 'billing_phone', true);
        $wcplus_billing_country = get_user_meta($wcplsuuser_id, 'billing_country', true);

        // Get Shipping meta data
        $wcplus_shipping_first_name = get_user_meta($wcplsuuser_id, 'shipping_first_name', true);
        $wcplus_shipping_last_name = get_user_meta($wcplsuuser_id, 'shipping_last_name', true);
        $wcplus_shipping_address_1 = get_user_meta($wcplsuuser_id, 'shipping_address_1', true);
        $wcplus_shipping_address_2 = get_user_meta($wcplsuuser_id, 'shipping_address_2', true);
        $wcplus_shipping_city = get_user_meta($wcplsuuser_id, 'shipping_city', true);
        $wcplus_shipping_state = get_user_meta($wcplsuuser_id, 'shipping_state', true);
        $wcplus_shipping_postcode = get_user_meta($wcplsuuser_id, 'shipping_postcode', true);
        $wcplus_shipping_phone = get_user_meta($wcplsuuser_id, 'shipping_phone', true);
        $wcplus_shipping_country = get_user_meta($wcplsuuser_id, 'shipping_country', true);

        // Set default values for billing fields
        $fields['billing']['billing_first_name']['default'] = $wcplus_billing_first_name;
        $fields['billing']['billing_last_name']['default']  = $wcplus_billing_last_name;
        $fields['billing']['billing_email']['default']      = $wcplus_billing_email;
        $fields['billing']['billing_phone']['default']      = $wcplus_billing_phone;
        $fields['billing']['billing_address_1']['default']      = $wcplus_billing_address_1;
        $fields['billing']['billing_city']['default']      = $wcplus_billing_city;
        $fields['billing']['billing_state']['default']      = $wcplus_billing_state;
        $fields['billing']['billing_postcode']['default']      = $wcplus_billing_postcode;
        $fields['billing']['billing_address_2']['default']      = $wcplus_billing_address_2;
        $fields['billing']['billing_country']['default']      = $wcplus_billing_country;

        // Set default values for Shipping fields
        
        $fields['shipping']['shipping_first_name']['default'] = $wcplus_shipping_first_name;
        $fields['shipping']['shipping_last_name']['default']  = $wcplus_shipping_last_name;
        $fields['shipping']['shipping_phone']['default']      = $wcplus_shipping_phone;
        $fields['shipping']['shipping_address_1']['default']      = $wcplus_shipping_address_1;
        $fields['shipping']['shipping_city']['default']      = $wcplus_shipping_city;
        $fields['shipping']['shipping_state']['default']      = $wcplus_shipping_state;
        $fields['shipping']['shipping_postcode']['default']      = $wcplus_shipping_postcode;
        $fields['shipping']['shipping_address_2']['default']      = $wcplus_shipping_address_2;
        $fields['shipping']['shipping_country']['default']      = $wcplus_shipping_country;
        
    }
    $wcplus_result = array();
    if (class_exists('Cartflows_Ca_Helper')) {
        function wcplus_decode_token( $token ) {
            $token = sanitize_text_field( $token );
            parse_str( base64_decode( urldecode( $token ) ), $token );
            return $token;
        }
        function wcplus_is_valid_token( $token ) {
            $is_valid   = false;
            $token_data = wcplus_decode_token( $token );
            if ( is_array( $token_data ) && array_key_exists( 'wcf_session_id', $token_data ) ) {
                $result = Cartflows_Ca_Helper::get_instance()->get_checkout_details( $token_data['wcf_session_id'] );
                if ( isset( $result ) ) {
                    $is_valid = true;
                }
            }
            return $is_valid;
        }
        $wcplus_ac_token = Cartflows_Ca_Helper::get_instance()->sanitize_text_filter('wcf_ac_token', 'GET');
        if ( wcplus_is_valid_token( $wcplus_ac_token ) ) {
            $wcplus_token_data = wcplus_decode_token( $wcplus_ac_token );
            if ( is_array( $wcplus_token_data ) && isset( $wcplus_token_data['wcf_session_id'] ) ) {
                $wcplus_result = Cartflows_Ca_Helper::get_instance()->get_checkout_details( $wcplus_token_data['wcf_session_id'] );
            }
        }

    if(!empty($wcplus_result)){
        $other_fields = maybe_unserialize( $wcplus_result->other_fields );
        //echo "<pre>";print_r($other_fields);
        $locationdata = explode(',', $other_fields['wcf_location']);
        $fields['billing']['billing_email']['default'] = sanitize_text_field($wcplus_result->email);
        $fields['billing']['billing_first_name']['default'] = sanitize_text_field($other_fields['wcf_first_name']);
        $fields['billing']['billing_last_name']['default'] = sanitize_text_field($other_fields['wcf_last_name']);
        $fields['billing']['billing_phone']['default'] = sanitize_text_field($other_fields['wcf_phone_number']);
        $fields['billing']['billing_address_1']['default'] = sanitize_text_field($other_fields['wcf_billing_address_1']);
        $fields['billing']['billing_company']['default'] = sanitize_text_field($other_fields['wcf_billing_company']);
        $fields['billing']['billing_state']['default'] = sanitize_text_field($other_fields['wcf_billing_state']);
        $fields['billing']['billing_postcode']['default'] = sanitize_text_field($other_fields['wcf_billing_postcode']);
        $fields['billing']['billing_address_2']['default'] = sanitize_text_field($other_fields['wcf_billing_address_2']);
        $fields['billing']['billing_city']['default'] = sanitize_text_field($locationdata[1]);
        $fields['billing']['billing_country']['default'] = sanitize_text_field($locationdata[0]);
        // Shipping Detials
        $fields['shipping']['shipping_first_name']['default'] = sanitize_text_field($other_fields['wcf_shipping_first_name']);
        $fields['shipping']['shipping_last_name']['default'] = sanitize_text_field($other_fields['wcf_shipping_last_name']);
        $fields['shipping']['shipping_address_1']['default'] = sanitize_text_field($other_fields['wcf_shipping_address_1']);
        //$fields['shipping']['shipping_companyy']['default'] = sanitize_text_field($other_fields['wcf_shipping_company']);
        $fields['shipping']['shipping_state']['default'] = sanitize_text_field($other_fields['wcf_shipping_state']);
        $fields['shipping']['shipping_city']['default'] = sanitize_text_field($other_fields['wcf_shipping_city']);
        $fields['shipping']['shipping_postcode']['default'] = sanitize_text_field($other_fields['wcf_shipping_postcode']);
        $fields['shipping']['shipping_address_2']['default'] = sanitize_text_field($other_fields['wcf_shipping_address_2']);  
        $fields['shipping']['shipping_country']['default'] = sanitize_text_field($other_fields['wcf_shipping_country']);  
    }
}
//echo "<pre>";print_r($fields);
    if (function_exists('wcplus_custom_function_in_functions_php')) { 
        $fields = wcplus_custom_function_in_functions_php($fields);
    }
    do_action( 'wcplus_woocommerce_after_checkform', $checkout );
    //echo "<pre>";print_r($fields);die;

    return $fields;
}


add_filter( 'woocommerce_order_button_html', 'pluswc_checkout_page_custom_button_html', 1000000, 1 );
function pluswc_checkout_page_custom_button_html( $button_html ) {

    $order_button_text = 'Complete Order';
    $button_html = '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="'. esc_html($order_button_text) .'" data-value="'.  esc_attr($order_button_text) .'">' . esc_html($order_button_text) . '</button>';
    return $button_html;
}


?>

<?php
function pluswc_query(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

function pluswc_header_item(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplaus_checkout_header';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

function pluswc_active_template(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_template';
    $get_results = $wpdb->get_results("SELECT * FROM $table_name");
    return $get_results;
}

function pluswc_googlemapkey(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'wcplus_mapkey';
    return $data = $wpdb->get_results("SELECT * FROM $table_name");
}
$gogle_keyapi = pluswc_googlemapkey();
//echo "<pre>";print_r($gogle_keyapi);die;
//print_r($gogle_keyapi[0]->map_key);
$checktemplate = pluswc_active_template();

if (WC()->cart->is_empty() && is_checkout() && !isset($_GET['key'])) {
    wp_safe_redirect(wc_get_cart_url());
    exit;
}
if($checktemplate[0]->active_tem == 1){
    require_once __DIR__ . '/general-template.php';
}else{
    require_once __DIR__ . '/general-template.php';
}



function pluswc_footer_code() {
$get_results = pluswc_query();
$wc_header = pluswc_header_item();
$cartbkcolor = get_option('wcplus_cart_bk_color');
$carttextcolor = get_option('wcplus_cart_text_color');
$body_step_text_checkout = get_option('wcplus_body_step_text_checkout');
//$wcplussaving_bg_color = get_option('wcplus_select_saving_bg_color');
$wcplussaving_text_color = get_option('wcplus_select_saving_text_color');
//echo "<pre>";print_r($get_results);

if(!empty($get_results[0]->footer_bg)){
    $footer_bg = 'style="background: '.$get_results[0]->footer_bg.';"';
}else{
    $footer_bg = '';
}
if(!empty($get_results[0]->footer_color)){
    $footer_color = 'style="color: '.$get_results[0]->footer_color.';"';
}else{
    $footer_color = '';
}
if(!empty($get_results[0]->footer_link_color)){
    $footer_link_color = 'style="color: '.$get_results[0]->footer_link_color.';"';
}else{
    $footer_link_color = '';
}
$footer_text = get_footer_data_base();

$checktemplates = pluswc_active_template();
//echo "<pre>";print_r($checktemplates);die("fsdfsd");
//{

$class_addtem = ($checktemplates[0]->active_tem == 1) ? 'footer-genral-main' : '';
?>
    <div class="footer-cls <?php echo esc_html($class_addtem);?>" <?php echo esc_attr($footer_bg);?>>

    <div class="wrapper wcpluswrapper">
        <div class="footer-inner">
            <div class="footer-col">
                <p <?php echo esc_attr($footer_color);?>><?php echo esc_html($footer_text[0]->footer_bar);?></p>
            </div>
            <div class="footer-col">
                <div class="footer-links">
                    <?php
                    $footerleftlink = json_decode( $footer_text[0]->footer_left_link );
                    $footerleftterm = json_decode( $footer_text[0]->footer_left_term );
                    if($footerleftlink){
                    if($footerleftlink != '#'){ 
                        foreach ($footerleftlink as $key => $value) {
                            ?>
                            <a href="<?php echo esc_url($footerleftterm[$key]);?>"><?php echo esc_html($value);?></a>
                            <?php
                        }
                    }
                }
                    ?>
                
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
//}
}
add_action( 'wp_footer', 'pluswc_footer_code',2 );
 

do_action( 'wcplus_woocommerce_footer', $checkout );

?>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); 
?>
