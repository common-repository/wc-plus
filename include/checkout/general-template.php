<?php
if ( ! defined( 'ABSPATH' ) ) exit;
	$get_results = pluswc_query();
	$wc_headers = pluswc_header_item();
	$wcplus_enablebox = get_wcplus_enablebox_base();
 	if(!empty($get_results[0]->url)){
 		$logos = '<img src="'.esc_url($get_results[0]->url).'">';
 	}else{
 		$logos = "<img src=".esc_url(plugins_url('../img/logo.png',__DIR__)).">";
 	}
 	if(!empty($wc_headers[0]->header_bg)){
		$header_bg = 'style="background: '.$wc_headers[0]->header_bg.';"';
	}else{
		$header_bg = '';
	}
	if(!empty($wc_headers[0]->header_color)){
		$header_color = 'style="color: '.$wc_headers[0]->header_color.';"';
	}else{
		$header_color = '';
	}
	if(!empty($wc_headers[0]->header_color_link)){
		$header_color_link = 'style="color: '.$wc_headers[0]->header_color_link.';"';
	}else{
		$header_color_link = '';
	}	
	$wcplus_home = home_url();
    ?>
<div class="header-cls desktop-header" <?php echo wp_kses_post($header_bg);?>>
	<div class="wrapper wcpluswrapper">
		<div class="header-cls-inner">
			<div class="header-logo">
				<a href="<?php echo esc_url($wcplus_home);?>">
				<?php echo wp_kses_post($logos);?>
				</a>
			</div>
			
		</div>
	</div>
</div>
<div class="header-cls mobile-header" <?php echo wp_kses_post($header_bg);?>>
		<div class="header-mobile-row2">
			<div class="wrapper wcpluswrapper">
				<div class="header-mobile-row2-inner">
					<div class="header-mobile-row2-left">
						<div class="header-logo">
							<a href="<?php echo esc_url($wcplus_home);?>">
							<?php echo wp_kses_post($logos);?>
							</a>
						</div>
					</div>
					<div class="header-mobile-row2-right">
					</div>
				</div>
			</div>
		</div>
</div>
<form name="checkout" method="post" class="wcplus-checkout-page checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data" style="display: flex;">
	<span id="errorshow"></span>
<div class="preloader_back" style="display: none;">
	<div class="preloader_inner">
		<div id="preloader" class="preloader_inner_col">
		</div>
	</div>
</div>
<div class="billing-section billing-section-general">
	<div class="wrapper wcpluswrapper">
		<div class="billing-section-inner">
			<div class="billing-section-left">
				<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){ 
					$order = wc_get_order(base64_decode(sanitize_text_field($_GET['key'])));
					if(empty($order)){ ?>
						<?php $wcplusmobileClass = (true === WC()->cart->needs_shipping_address()) ? '' : 'mobile-tab-widthCSS';?>
				<div class="mobile-form-tab-list <?php echo wp_kses_post($wcplusmobileClass);?>">
					<?php
						if ( wc_coupons_enabled() ) {
					     ?>
					     <div class="errorshowddd"></div>
					     <span id="open_coupon_main">Have a discount? <span id="open_coupon">Add coupon now</span></span>
					     <?php
					 }
					 ?>
					<ul>
						<li class="billing_detail_mobile active">
							<div class="with-edit"> 
								<h2 id="billing_detals_mobile"><span class="count_num">1</span> Billing </h2>
							</div>
						</li>
						<?php if ( true === WC()->cart->needs_shipping_address() ){ ?>
							<input type="hidden" name="wcplus-show-shipping" id="wcplus-show-shipping" value="1">
						<li class="shipping_detail_mobile">
							<div class="with-edit">
								<h2 id="shipping_detals_mobile"><span class="count_num">2</span> Shipping </h2>
							</div>
						</li>
					<?php }else{
						echo '<input type="hidden" name="wcplus-show-shipping" id="wcplus-show-shipping" value="0">';
					}
					$wcplusmobilepaymentcount = ( true === WC()->cart->needs_shipping_address() ) ? 3 : 2;
					?>
						<li class="payment_detail_mobile">
							<div class="with-edit">
								<h2 id="payment_detals_mobile"><span class="count_num"><?php echo esc_html($wcplusmobilepaymentcount);?></span> Payment </h2>
							</div>
						</li>
					</ul>
				</div>
				
				<div class="billing-detail shadow-box active">
					<div class="with-edit">
						<h2 id="billing_detals"><span class="count_num">1</span> Billing Details </h2>
						<span id="error_fill"></span>
						<span class="edit" id="billing_edit">Edit Billing</span>
					</div>
					<div class="shadow-box-inner">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
						<span class="next-button" id="first_step">Confirm Billing Details</span>
					</div>
				</div>
				<?php if ( true === WC()->cart->needs_shipping_address() ){ ?>
					<input type="hidden" name="wcplus-show-shipping" id="wcplus-show-shipping" value="1">
				<div class="shipping-detail shadow-box">
					<div class="with-edit">
						<h2 id="shipping_detals"><span class="count_num">2</span> Shipping Details</h2>
						<span id="error_ship-fill"></span>
						<span class="edit" id="shipping_edit">Edit Shipping</span>
					</div>
					
					<div class="shadow-box-inner">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
						<span class="next-button" id="secound_step">Confirm Shipping Details</span>
					</div>
				</div>
				<?php }else{
					require_once __DIR__ . '/googleJS.php';
					echo '<input type="hidden" name="wcplus-show-shipping" id="wcplus-show-shipping" value="0">';
				} ?>
				<?php
				$wcpluspaymentcount = ( true === WC()->cart->needs_shipping_address() ) ? 3 : 2;
				    ?>
				<div class="pament-detail shadow-box">
					<div class="pament-detail-heading">
						<div>
						<h2 id="payment_details"><span class="count_num"><?php echo wp_kses_post($wcpluspaymentcount);?></span> Payment Details</h2>
						</div>
					</div>
					<div class="shadow-box-inner">
					
					<div class="payment-box"><?php do_action( 'woocommerce_checkout_order_payments' );?></div>
					</div>
					<?php do_action( 'woocommerce_before_checkout_form', $checkout );
					$footer_text = get_footer_data_base();
					if(!empty($get_results[0]->footer_bg)){
						$footer_bg = 'style="background: '.$get_results[0]->footer_bg.';"';
					}else{
						$footer_bg = '';
					}
					?>
				</div>
				
			<?php } } if ( ! is_user_logged_in() ) {?>
				<div class="shadow-box user-login-checkout acitve" style="display: none;">
				</div>
			<?php } ?>
			<?php 
			if (isset($_GET['key'])) {
				 $keydata = base64_decode(sanitize_text_field($_GET['key']));
				if (!empty($keydata)) {
				$order = wc_get_order($keydata);
					if(!empty($order)){
				?>
				<div class="shadow-box order_sccessed_message active">
					<div class="pament-detail-heading">
						<h2 style="color: <?php echo wp_kses_post($wc_headers[0]->body_step_checkout);?> !important"><i class="bi bi-check-circle-fill"></i>Order details</h2>
					</div>
					<div class="order-details_checkout">
					 	<?php 
						 	$order_number = $order->get_order_number();
						 	$order_date = $order->get_date_created();
						 	$formatted_order_date = gmdate( 'F j, Y', strtotime( $order_date ) );
						 	$total_amount = $order->get_total();
						 	$payment_method = $order->get_payment_method_title();
						 	$subtotal = $order->get_subtotal();
						 	$shipping_amount = $order->get_shipping_total();
						 	$shipping_method_name = $order->get_shipping_method();
	    					$gst_amount  = $order->get_total_tax();
	    					$items = $order->get_items();
	    					$product_array = array();
	    					foreach ($items as $item_id => $item) {
						        $product = $item->get_product();
						        $item_price = $product->get_price() * $item->get_quantity();
						        $total_price += $item_price;
						        $product_name = $product->get_name();
	        					$product_link = $product->get_permalink();
	        					$product_quantity += $item->get_quantity();
	        					$product_array[$item_id]['total_price']=$product->get_price() * $item->get_quantity();
	        					$product_array[$item_id]['product_name']=$product_name;
	        					$product_array[$item_id]['product_link']=$product_link;
	        					$product_array[$item_id]['product_quantity']=$item->get_quantity();
						    }
					 	?>
					 	<div class="woocommerce-order">
							<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>
							<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
								<li class="woocommerce-order-overview__order order">
									Order number: <strong><?php echo wp_kses_post($order_number); ?></strong>
								</li>
								<li class="woocommerce-order-overview__date date">
									Date: <strong><?php echo wp_kses_post($formatted_order_date); ?></strong>
								</li>
								<li class="woocommerce-order-overview__total total">
									Total: <strong><span class="woocommerce-Price-amount amount"><bdi></span><?php echo wp_kses_post(wc_price( $total_amount ));?></bdi></span></strong>
								</li>
								<li class="woocommerce-order-overview__payment-method method">
									Payment method:	<strong><?php echo wp_kses_post($payment_method); ?></strong>
								</li>
							</ul>
							<?php $shoppageurl = get_permalink( wc_get_page_id( 'shop' ) );?>
						<div class="order-summery-heading"><a class="wcplus_countinue_btn" href="<?php echo esc_url($shoppageurl);?>">Continue shopping</a></div>
						</div>
					</div>
				</div>
			<?php } } }?>
					<div class="footer-cls general-footer" <?php echo wp_kses_post($footer_bg);?>>
						<div class="wrapper wcpluswrapper">
							<div class="footer-inner">
								<div class="footer-col">
									<p <?php echo esc_attr($footer_color);?>><?php echo wp_kses_post($footer_text[0]->footer_bar);?></p>
								</div>
								<div class="footer-col">
					                <div class="footer-links">
					                    <?php
					                    $footerleftlink = json_decode( $footer_text[0]->footer_left_link );
					                    $footerleftterm = json_decode( $footer_text[0]->footer_left_term );
					                    if($footerleftlink != '#'){ 
					                        foreach ($footerleftlink as $key => $value) {
					                            ?>
					                            <a href="<?php echo esc_url($footerleftterm[$key]);?>"><?php echo wp_kses_post($value);?></a>
					                            <?php
					                        }
					                    }
					                    ?>
									
					                </div>
								</div>
							</div>
						</div>
					</div>
			</div>
		</form>
		<div class="login_form_html" style="display: none;">
			<div class="pament-detail-heading">
				<h2><i class="bi bi-check-circle-fill"></i>USER LOGIN</h2>
			</div>
			<div class="custom-login-form">
			 	<?php wp_login_form(array(
		        'label_username' => 'Username',
		        'label_password' => 'Password',
		        'label_remember' => 'Remember Me',
		        'label_log_in'   => 'Log In',
		        'redirect'       => wc_get_checkout_url(),
		    )); ?>
		    
			<div class=""><a href="javascript:void(0)" class="Continue_without_logging">Continue without logging in</a></div>
			</div>
		</div>
			<div class="billing-section-right">
				<div class="billing-section-right-col">
<?php
if(!empty($get_results[0]->sidebar_heading_color)){
	$sidebar_heading_color = 'style="color: '.$get_results[0]->sidebar_heading_color.';"';
}else{
	$sidebar_heading_color = '';
}
$shoppageurl = get_permalink( wc_get_page_id( 'shop' ) );
?>
				<div class="order-summery-box">
					<div class="order-summery-heading">
						<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){?>
						<h2 <?php echo wp_kses_post($sidebar_heading_color);?>>ORDER SUMMARY</h2>
						<a href="<?php echo esc_url($shoppageurl);?>">Continue shopping</a>
					<?php } else{ ?>
						<h2 <?php echo wp_kses_post($sidebar_heading_color);?>>CART SUMMARY</h2>
					<?php } ?>
					</div>
					<div class="order-summery-table">
						<?php do_action( 'woocommerce_order_review_details' ); 
						?>
						</div>
				</div>

<?php
if(!empty($get_results[0]->sidebar_icon_one)){
 		$sidebar_icon_one = '<i class="'.$get_results[0]->sidebar_icon_one.'"></i>';
 	}else{
 		$sidebar_icon_one = '<i class="bi bi-shield-fill"></i>';
 	}

 	if(!empty($get_results[0]->sidebar_icon_two)){
 		$sidebar_icon_two = '<i class="'.$get_results[0]->sidebar_icon_two.'" ></i>';
 	}else{
 		$sidebar_icon_two = '<i class="bi bi-shield-fill" ></i>';
 	}

$sidebar_text_one = (!empty($get_results[0]->sidebar_text_one)) ? $get_results[0]->sidebar_text_one : 'Icon & Text Box';
$sidebar_text_two = (!empty($get_results[0]->sidebar_text_two)) ? $get_results[0]->sidebar_text_two : 'Icon & Text Box';

	if($wcplus_enablebox[0]->enablesidebarsellpoint == 1){
?>
				<div class="side-icon-box">
					<ul>
						<li>
							<?php echo wp_kses_post($sidebar_icon_one);?>
							<span><?php echo wp_kses_post($sidebar_text_one);?></span>
						</li>
						<li>
							<?php echo wp_kses_post($sidebar_icon_two);?>
							<span><?php echo wp_kses_post($sidebar_text_two);?></span>
						</li>
					</ul>
				</div>
			<?php } 
		if($wcplus_enablebox[0]->enable_faq == 1){
			?>
				<div class="faq-block">
					<h2 <?php echo wp_kses_post($sidebar_heading_color);?>>Frequently Asked Questions</h2>
					<?php
					if(!empty($get_results[0]->faqquestion)){
						$questions = json_decode( $get_results[0]->faqquestion );
						$answers = json_decode( $get_results[0]->faqanswer );
						if(!empty($questions)){
							echo '<div class="faq-block-inner">';
							foreach ($questions as $key => $value) {
								echo '<div class="faq-ques">';
								if($value != ''){
									echo '<span class="accordion">'.wp_kses_post($value).' <i class="bi bi-caret-down"></i></span>';
									echo '<div class="panel"><p>'.wp_kses_post($answers[$key]).'</p></div>';
								}
								
								echo '</div>';
							}
							echo '</div>';
						}
					}
					?>
					
				</div>

			<?php 
			}
		?>
			</div>
		</div>
		</div>
	</div>
</div>
