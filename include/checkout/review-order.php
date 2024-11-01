<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
 if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
 		$decoded_key = base64_decode( sanitize_text_field($_GET['key'] ) );
		$order = wc_get_order($decoded_key); 
		if(empty($order)){ 
			$class = 'woocommerce-checkout-review-order-table';
		}else{
			unset($_SESSION['wcplus_nonce']);
			$class = '';
		}
	}
?>

<table class="shop_table <?php echo esc_attr($class); ?>" style="width: 100%;">
	<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
		$decoded_key = base64_decode( sanitize_text_field($_GET['key'] ) );
		$order = wc_get_order($decoded_key); 
		if(empty($order)){ ?>
	<tbody>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td class="product-name">						
						<?php
						$productids = $cart_item['product_id'];
						//echo "<pre>";print_r($cart_item);
						//$image = wp_get_attachment_image( $product_meta['_thumbnail_id'][0], 'small' );
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $productids ), 'single-post-thumbnail' );
						$imageurl = ($image) ? $image[0] : plugins_url('../img/wcplus-no-image.png',__DIR__);
						 echo '<div class="main-cart-image"><img class="cart-images" src="'.esc_url($imageurl).'">';

						 echo wp_kses_post( apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						 echo "</div>";
						 ?>
						<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
						<?php echo wp_kses_post(wc_get_formatted_cart_item_data( $cart_item )); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>
					<td class="product-total">
						<?php 
						$productidsnew = wc_get_product($productids);
						$quantityitem = $cart_item['quantity'];
						$regular_price = $productidsnew->get_regular_price();
				        $sale_price = $productidsnew->get_sale_price();
				        if($sale_price){
			        		$regularp = $regular_price * $quantityitem;
			        		$salep = $sale_price * $quantityitem;
			        		$price = wc_price($salep).'<br><del style="color:#808080">'.wc_price($regularp).'</del>';
			        	}else{
			        		$price = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
			        	}
			        	//echo "<pre>";print_r($cart_item);
			        	if(is_array($cart_item['wcplus_offer'])) {
	    					$product_id = $cart_item['product_id'];
	    					$order_bump_post = get_post($cart_item['wcplus_offer']['wcplus_offerid']);
		    				if ($order_bump_post && !is_wp_error($order_bump_post) && 'order_bumps' === get_post_type($order_bump_post)) {
	    						$postID = $cart_item['wcplus_offer']['wcplus_offerid'];
        						$wcplus_saleprice = get_post_meta($postID, 'wcplus_order_saleprice', true);
	    						$add_class = "disableclass";
	    						$price = wc_price($wcplus_saleprice);
		    				}
	    				}
	    				echo wp_kses_post($price);
						//echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						
						//echo $productidsnew->get_price_html();
						?>
					</td>
				</tr>

				<?php
			}
		}
		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</tbody>
<?php }else{ 
	$product_array = array();
		$items = $order->get_items();
		foreach ($items as $item_id => $item) { //echo "<pre>";print_r($item['total']);
	        $product = $item->get_product();
	        $product_id = $product->get_id();
	        //$item_price = $product->get_price() * $item->get_quantity();
	        $item_price = $product->get_price() * $item->get_quantity();
	        $total_price += $item_price;
	        $product_name = $product->get_name();
			$product_link = $product->get_permalink();
			$product_quantity += $item->get_quantity();
			$product_array[$item_id]['total_price']=wc_price($item['total']);
			$product_array[$item_id]['product_name']=$product_name;
			$product_array[$item_id]['product_link']=$product_link;
			$product_array[$item_id]['product_quantity']=$item->get_quantity();
			$product_image = get_the_post_thumbnail_url($product_id, 'thumbnail');
			$image_id = $product->get_image_id();
			$image_url = wp_get_attachment_image_url($image_id, 'full');
			$imageurl = ($image_url) ? $image_url : plugins_url('../img/wcplus-no-image.png',__DIR__);
			$product_array[$item_id]['product_image']=$imageurl;
	    }
	 if(!empty($product_array)){ 
		foreach ($product_array as $key => $value) { 
			$price = $value['total_price'];
			if(is_array($value['wcplus_offer'])) {
				$product_id = $value['product_id'];
				$order_bump_post = get_post($value['wcplus_offer']['wcplus_offerid']);
				if ($order_bump_post && !is_wp_error($order_bump_post) && 'order_bumps' === get_post_type($order_bump_post)) {
					//if ($values['wcplus_offer']['wcplus_offerid'] == $post_id) {
					$postID = $value['wcplus_offer']['wcplus_offerid'];
					$wcplus_saleprice = get_post_meta($postID, 'wcplus_order_saleprice', true);
					//$add_class = "disableclass";
					$price = wc_price($wcplus_saleprice);
					//}
				}
		    				}	
	?>
	<tr class="cart_item">
		<td class="product-name we">
			<div class="main-cart-image">
				<img class="cart-images" src="<?php echo esc_url($value['product_image']); ?>">
			<strong class="product-quantity"><?php echo esc_html($value['product_quantity']); ?></strong>
			</div><?php echo esc_html($value['product_name']); ?>&nbsp;
		</td>
		<td class="product-total">
			<?php 
			echo wp_kses_post($value['total_price']); ?>
		</td>
	</tr>
<?php }}} } ?>


	<tbody>
<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
		$decoded_key = base64_decode( sanitize_text_field($_GET['key'] ));
		$order = wc_get_order($decoded_key); 
			if(empty($order)){ ?>
<tr class="coupon_checkout">
 <td colspan="2">
     <?php
     if ( ! defined( 'ABSPATH' ) ) {
     exit; // Exit if accessed directly
     }
     if ( wc_coupons_enabled() ) {
        //return;
    // }
     ?>

     <div class="side-icon-box custom-coupon" id="custom_load">
         <input type="text" name="coupon_code" class="input-text checkout_coupon_code" placeholder="<?php esc_attr_e( 'Coupon code', 'wc-plus' ); ?>" id="checkout_coupon_code" value="" />
         <input type="hidden" name="checkout_coupon_val" class="checkout_coupon_val" value="">
         <p class="form-row form-row-last">
         <input id="checkout_apply_coupon" type="button" class="button checkout_apply_coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'wc-plus' ); ?>" />
         </p>
     </div>
     <span class="errorshow"></span>
     <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
     			<div class="discount-tag-main">
				<strong class="discout-tag"><i class="bi bi-tags-fill"></i> <?php echo esc_attr( sanitize_title( $code ) ); ?> <a href="/checkout/?remove_coupon=<?php echo esc_attr( sanitize_title( $code ) ); ?>" class="woocommerce-remove-coupon" data-coupon="<?php echo esc_attr( sanitize_title( $code ) ); ?>">x</a></strong>
				</div>
		<?php endforeach; ?>
	<?php } ?>
 </td>
</tr>
<?php }} ?>		
<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
		$order = wc_get_order(base64_decode(sanitize_text_field($_GET['key']))); 
		if(empty($order)){ ?>	
		<tr class="cart-subtotal">
			<th><?php esc_html_e( 'Subtotal', 'wc-plus' ); ?></th>
			<td><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>
<?php }else{ 
	$subtotal = $order->get_subtotal();
	?>
	<tr class="cart-subtotal">
		<th>Subtotal</th>
		<td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span><?php echo wp_kses_post(wc_price($subtotal)); ?></bdi></span></td>
	</tr>
<?php }} ?>



		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
		<?php 
		$totalamount = WC()->cart->subtotal;
		if($coupon->discount_type == 'percent'){
			$coupon_amount = ($totalamount * $coupon->amount) / 100;
			//$coupon_amount = $coupon->amount;
		}else{
			$coupon_amount = $coupon->amount;
		}
		?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				
				<th>Discount <strong class="discout-tag"><i class="bi bi-tags-fill"></i> <?php echo esc_attr( sanitize_title( $code ) ); ?></strong></th>
				<td><?php
				echo "-" . wp_kses_post(wc_price($coupon_amount));
				?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
      
      <?php

      if(!isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
      	$shipping_total = WC()->cart->get_shipping_total();
        $fees_total     = WC()->cart->get_fee_total() + WC()->cart->get_fee_tax();
        $totalshipping = $fees_total + $shipping_total;
 		do_action( 'woocommerce_review_order_before_shipping' ); ?>
        <?php //wc_cart_totals_shipping_html();
        if ($shipping_total != 0) { 
        ?>
        <tr class="wcplus-cart-shipping">
        	<th>Shipping</th>
        	<td class="woocommerce-shipping-methods-add">
        		<?php 
        		echo wp_kses_post(wc_price( $fees_total + $shipping_total ));
					?></td>
        </tr>
        <?php 
    }
    	?>
        
        <?php 
         do_action( 'woocommerce_review_order_after_shipping' ); 
       // echo '<p>Total shipping and fees: ' . wc_price( $fees_total + $shipping_total ) . '</p>';
        ?>
    <?php } ?>
    <?php endif; ?>


		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="fee">
				<th><?php echo esc_html( $fee->name ); ?></th>
				<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>


		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
					<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th><?php echo esc_html( $tax->label ); ?></th>
						<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="tax-total">
					<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>
</tbody>
		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tfoot>
			<?php if(isset($_GET['key']) || empty(wc_get_order(base64_decode(sanitize_text_field($_GET['key']))))){
				$decoded_key = base64_decode( sanitize_text_field($_GET['key']));
				$order = wc_get_order($decoded_key); 
				if(empty($order)){ ?>
			<tr>
				<td><strong><?php esc_html_e( 'Total', 'wc-plus' ); ?></strong></td>
				<td><strong><?php wc_cart_totals_order_total_html(); ?></strong></td>
			</tr>
			<?php }else{ 
			$total_amount = $order->get_total();
			//echo "<pre>";print_r($order);
			$shipping_method_name = $order->get_shipping_method();
			$shipping_amount = $order->get_shipping_total();
			$gst_amount  = $order->get_total_tax();
			?>
			<tr>
				<th scope="row">Shipping:</th>
				<td><span class="woocommerce-Price-amount amount"><?php echo wp_kses_post(wc_price( $shipping_amount )); ?></span>&nbsp;<small class="shipped_via">via <?php echo esc_html($shipping_method_name); ?></small></td>
			</tr>

			<tr class="tr_addborder">
				<th scope="row">GST:</th>
				<td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo wp_kses_post($gst_amount); ?></span></td>
			</tr>
			<tr>
				<td><strong><?php esc_html_e( 'Total', 'wc-plus' ); ?></strong></td>
				<td><strong><?php echo wp_kses_post(wc_price($total_amount)); ?></strong></td>
			</tr>
		<?php }} 
		?>
		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
		</tfoot>
		</table>
	