<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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

<div class="woocommerce-billing-fields">
	<?php if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		<!-- <h3><?php //esc_html_e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3> -->

	<?php else : ?>

		<!-- <h3><?php //esc_html_e( 'Billing details Test', 'woocommerce' ); ?></h3> -->

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$googlekey_active = pluswc_googlemapkey();
		$wcfield = $checkout->get_checkout_fields( 'billing' );
		//$disable_check = get_wcplus_checkout_fields_base();
		//echo "<pre>";print_r($wcfield);
		unset($wcfield['billing_company']);
		unset($wcfield['billing_country']);
		unset($wcfield['billing_address_1']);
		unset($wcfield['billing_address_2']);
		unset($wcfield['billing_city']);
		unset($wcfield['billing_state']);
		unset($wcfield['billing_postcode']);
		unset($wcfield['billing_postcode']);
		//echo "<pre>";print_r($_POST);
		//if(isset($_GET['e'])){

			//echo "<pre>";print_r($wcfield['billing_email']['default']);
		//}
		$wcpluspaymentgateways = WC()->payment_gateways->get_available_payment_gateways();
		//echo "<pre>";print_r($wcpluspaymentgateways);die;
		//sort($fields);
		foreach ( $wcfield as $key => $field ) { // Create form for shipping
			
			//echo "<pre>";print_r($field);
			if($key == 'billing_email'){
				$login_page_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
				if ( ! is_user_logged_in() ) :
				echo '<small>' . esc_html__('Already have an account with us? ', 'wc-plus') . 
			     '<a href="javascript:void(0)" class="customer_login_checkout">' . esc_html__('Login', 'wc-plus') . '</a>' . 
			     esc_html__(' for a faster checkout experience? ', 'wc-plus') . 
			     '<a href="' . esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) . '">' . esc_html__('Register an Account', 'wc-plus') . '</a>' . 
			     '</small>';
				else:
					echo '<small></small>';
				endif;
				if($googlekey_active[0]->active_key_one != 0 || $googlekey_active[0]->active_key_two) {
					 //$wcfield['autocomplete'] = 'off';
					}
					//echo "<pre>";print_r($field);

				woocommerce_form_field( $key, $field );
			}else{
				if($googlekey_active[0]->active_key_one != 0 || $googlekey_active[0]->active_key_two) {
					// $wcfield['autocomplete'] = 'off';
					}
				woocommerce_form_field( $key, $field );
			}
			
		}
		
		//echo "<pre>";print_r($googlekey_active[0]->active_key);
		
		?>
	</div>
	
	<div class="adress-detail-content different_data_billing">
		<?php
		$wcplusfield = $checkout->get_checkout_fields( 'billing' );
		$wcplusfield['billing_address_1']['label'] = 'Street Address (Search)';
		//echo "<pre>";print_r($wcplusfield['billing_address_1']);

		$checkboxnone = '';
		$search_none = ($googlekey_active[0]->active_key_one == 0 && $googlekey_active[0]->active_key_two == 0) ? 'style="display:none;"' : '';
		if($googlekey_active[0]->active_key_one != 0){
			echo '<div class="autocomplete-container" id="autocomplete-container-billing">';
				 woocommerce_form_field( 'billing_address_1', $wcplusfield['billing_address_1'] );
				echo '</div>';
			echo '<div class="search-form-cl" id="search-form-cl-billing"><span id="manuly-billing" class="manuly">Input Address Manually</span></div>';

			$checkbox_checked = ($googlekey_active[0]->active_key_one == 0) ? 'style="display:none;"' : 'style="display:block;"';
			$checkboxnone = ($googlekey_active[0]->active_key_one == 0) ? 'style="opacity:1;position: initial;z-index: 0;"' : 'style="opacity:0;position: absolute;z-index: -10;"';
		}elseif ($googlekey_active[0]->active_key_two != 0) {
			
			echo '<div class="autocomplete-container" id="autocomplete-container-billing">';

			echo '</div><div class="search-form-cl" id="search-form-cl-billing"><span id="manuly-billing" class="manuly">Input Address Manually</span></div>';
			$checkbox_checked = ($googlekey_active[0]->active_key_two == 0) ? 'style="display:none;"' : 'style="display:block;"';
			$checkboxnone = ($googlekey_active[0]->active_key_two == 0) ? 'style="opacity:1;position: initial;z-index: 0;"' : 'style="opacity:0;position: absolute;z-index: -10;"';
		}
		?>
		
			<div id="manuly-content-billing" class="manuly-content " <?php echo esc_attr($checkboxnone);?>>
				<div class="woocommerce-shipping-fields__field-wrapper">
				<?php
				$fields = $checkout->get_checkout_fields( 'billing' );
				unset($fields['billing_company']);
				unset($fields['kl_newsletter_checkbox']);
				unset($fields['billing_first_name']);
				unset($fields['billing_last_name']);
				unset($fields['billing_email']);
				unset($fields['billing_phone']);
				if($googlekey_active[0]->active_key_one != 0){
					unset($fields['billing_address_1']);
				}elseif ($googlekey_active[0]->active_key_two != 0) {
					unset($fields['billing_address_1']);
				}
				
				// unset($fields['to_leave']);
				//echo "<pre>";print_r($fields);
				
				foreach ( $fields as $key_new => $fieldneew ) {
					if($googlekey_active[0]->active_key_one != 0 || $googlekey_active[0]->active_key_two) {
					 $fieldneew['autocomplete'] = 'off';
					}
					woocommerce_form_field( $key_new, $fieldneew);
				}
				?>
			</div>
			</div>
		</div>

	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
	<?php do_action( 'wcplus_woocommerce_after_billing_form', $checkout );?>
</div>

