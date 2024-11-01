<?php
/**
 * Checkout shipping information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-shipping.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<?php
 $googleactive = pluswc_googlemapkey();
 if ( true === WC()->cart->needs_shipping_address() ) : ?>
<div class="woocommerce-shipping-fields">
<div class="shipping-detail-row">
  
  <div class="shipping-detail-box active-shipping same_data">
    <label for="same_data">
      <input type="radio" name="shipping_address" class="" id="same_data" checked="checked" >
      <span class="checkmark">Same as billing address</span>
    </label>
    <div id="wp_billing_data" class="wp-billing-data"></div>
    <!-- <div class="adress-detail-content same_data active" style="display:none;">
      <p>test</p>
    </div> -->
  </div>

  <div class="shipping-detail-box different_data">
    <label for="different_data">
      <input type="radio" id="different_data" name="shipping_address">
      <span class="checkmark">Shipping to different address <label id="editshipping" style="display: none;">Edit</label></span>
    </label>
    
    <div id="wcplusShipping_data" class="wp-billing-data"></div>
    <div class="adress-detail-content different_data" style="display:none;">
      <?php 
      $wcplusshippingfield = $checkout->get_checkout_fields( 'shipping' );
      //echo "<pre>";print_r($googleactive[0]);
      if($googleactive[0]->active_key_one != 0){
        echo '<div class="woocommerce-shipping-names-main">';
        foreach ($wcplusshippingfield as $wcplusshippingfieldkey => $wcplusshippingfieldvalue) {
          if($wcplusshippingfieldkey == 'shipping_first_name'){
            echo '<div class="woocommerce-shipping-names">';
            if($googleactive[0]->active_key_one != 0 || $googleactive[0]->active_key_two) {
             $wcplusshippingfieldvalue['autocomplete'] = 'off';
            }
               woocommerce_form_field( $wcplusshippingfieldkey, $wcplusshippingfieldvalue, $checkout->get_value( $key ) );
            echo '</div>';
          }
          if($wcplusshippingfieldkey == 'shipping_last_name'){
            echo '<div class="woocommerce-shipping-names">';
             if($googleactive[0]->active_key_one != 0 || $googleactive[0]->active_key_two) {
             $wcplusshippingfieldvalue['autocomplete'] = 'off';
            }
               woocommerce_form_field( $wcplusshippingfieldkey, $wcplusshippingfieldvalue, $checkout->get_value( $key ) );
            echo '</div>';
          }
        }
        echo "</div>";
        echo '<div class="autocomplete-container" id="autocomplete-container">';
         woocommerce_form_field( 'shipping_address_1', $wcplusshippingfield['shipping_address_1'], $checkout->get_value( $key ) );
        echo '</div>';
      $checkboxchecked = ($googleactive[0]->active_key_one == 0) ? 'style="display:none;"' : 'style="display:block;"';
      $checkbox_none = ($googleactive[0]->active_key_one == 0) ? 'style="display:block;"' : 'style="display:none;"';
    }elseif ($googleactive[0]->active_key_two != 0) {
      echo '<div class="woocommerce-shipping-names-main">';
      foreach ($wcplusshippingfield as $wcplusshippingfieldkey => $wcplusshippingfieldvalue) {
          if($wcplusshippingfieldkey == 'shipping_first_name'){
            echo '<div class="woocommerce-shipping-names">';
             if($googleactive[0]->active_key_one != 0 || $googleactive[0]->active_key_two) {
             $wcplusshippingfieldvalue['autocomplete'] = 'off';
            }
               woocommerce_form_field( $wcplusshippingfieldkey, $wcplusshippingfieldvalue, $checkout->get_value( $key ) );
               echo '</div>';
          }
          if($wcplusshippingfieldkey == 'shipping_last_name'){
            echo '<div class="woocommerce-shipping-names">';
             if($googleactive[0]->active_key_one != 0 || $googleactive[0]->active_key_two) {
             $wcplusshippingfieldvalue['autocomplete'] = 'off';
            }
               woocommerce_form_field( $wcplusshippingfieldkey, $wcplusshippingfieldvalue, $checkout->get_value( $key ) );
               echo '</div>';
          }
        }
        echo '</div>';
      echo '<div class="autocomplete-container" id="autocomplete-container"></div><div class="search-form-cl" id="search-form-cl">
      </div>';
      $checkboxchecked = ($googleactive[0]->active_key_two == 0) ? 'style="display:none;"' : 'style="display:block;"';
      $checkbox_none = ($googleactive[0]->active_key_two == 0) ? 'style="display:block;"' : 'style="display:none;"';
    }else{
      $checkboxchecked = ($googleactive[0]->active_key_two == 0) ? 'style="display:none;"' : 'style="display:block;"';
    }
      ?>
      <div id="manuly-content" class="manuly-content" <?php //echo $checkbox_none;?>>
        <?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
        <div class="woocommerce-shipping-fields__field-wrapper">
        <?php
        $disable_check = get_wcplus_checkout_fields_base();
        $wcshippingfields = $checkout->get_checkout_fields( 'shipping' );
        //unset($wcshippingfields['shipping_company']);
        //unset($fields['shipping_address_2']);
        //unset($wcshippingfields['bshipping_postcode']);
        unset($wcshippingfields['shipping_email']);
        unset($wcshippingfields['shipping_phone']);
        unset($wcshippingfields['shipping_state']['country_field']);
        unset($wcshippingfields['shipping_state']['country']);
        if($disable_check[0]->enable_address == 1){
          unset($wcshippingfields['shipping_address_1']);
        }
        if($disable_check[0]->enable_address_two == 1){
          unset($wcshippingfields['shipping_address_2']);
        }
        if($disable_check[0]->enable_state == 1){
          unset($wcshippingfields['shipping_state']);
        }
        if($disable_check[0]->enable_zipcode == 1){
          unset($wcshippingfields['shipping_postcode']);
          unset($wcshippingfields['shipping_postcode']['validate']);
        }
        if($googleactive[0]->active_key_one != 0){
          unset($wcshippingfields['shipping_address_1']);
          unset($wcshippingfields['shipping_last_name']);
          unset($wcshippingfields['shipping_first_name']);
        }elseif ($googleactive[0]->active_key_two != 0) {
          unset($wcshippingfields['shipping_address_1']);
          unset($wcshippingfields['shipping_last_name']);
          unset($wcshippingfields['shipping_first_name']);
        }
        
        foreach ( $wcshippingfields as $key => $field ) {
          //echo "<pre>";print_r($key);
           if($googleactive[0]->active_key_one != 0 || $googleactive[0]->active_key_two) {
              $field['autocomplete'] = 'off';
            }
          woocommerce_form_field( $key, $field);
          
        }
        ?>
      </div>
      <?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>
      </div>
      <span class="next-button set-shipping-btn">Set Shipping Address</span>
    </div>
  </div>
</div>
</div>

    <h3 id="ship-to-different-address" class="wc-plau_different-address">
      <label for="ship-to-different-address-checkbox" class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
        <input id="ship-to-different-address-checkbox" class="wc-plus-check_ship woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php checked( apply_filters( 'woocommerce_ship_to_different_address_checked', 'shipping' === get_option( 'woocommerce_ship_to_destination' ) ? 1 : 0 ), 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php //esc_html_e( 'Ship to a different address?', 'wc-plus' ); ?></span>
      </label>
    </h3>
    <?php else: ?>
    No Shipping
  <?php endif; ?>
<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
<?php 
$wcheadersdetails = pluswc_header_item();
?>
     <div class="wc-shipping-method wcPlus-wc-shipping-method">
      <h3 style="color: <?php echo wp_kses_post($wcheadersdetails[0]->body_step_checkout);?> !important;">Available Shipping Options</h3>
        <table class="wcplus_custom_fragment_class">
        <?php //do_action( 'woocommerce_review_order_before_shipping' ); ?>
        <?php //wc_cart_totals_shipping_html(); ?>
        <?php //do_action( 'woocommerce_review_order_after_shipping' ); ?>
    
    </table>
  </div>
 
    <?php endif; ?>

