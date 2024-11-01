<?php

add_action('wp_ajax_pluswc_header_data_base', 'pluswc_header_data_base');
add_action('wp_ajax_nopriv_pluswc_header_data_base', 'pluswc_header_data_base');

function pluswc_header_data_base() {
	global $wpdb;

	$table = $wpdb->prefix . 'wcplaus_checkout_header';
	$time = current_time('mysql');

	$color = isset($_POST['color']) ? sanitize_hex_color($_POST['color']) : '';
	$textcolor = isset($_POST['textcolor']) ? sanitize_hex_color($_POST['textcolor']) : '';
	$linkcolor = isset($_POST['linkcolor']) ? sanitize_hex_color($_POST['linkcolor']) : '';
	$bk_mobile = isset($_POST['bk_mobile']) ? sanitize_text_field($_POST['bk_mobile']) : '';
	$mobile_bk_color = isset($_POST['mobile_bk_color']) ? sanitize_hex_color($_POST['mobile_bk_color']) : '';
	$cart_bk_color = isset($_POST['cart_bk_color']) ? sanitize_hex_color($_POST['cart_bk_color']) : '';
	$cart_text_color = isset($_POST['cart_text_color']) ? sanitize_hex_color($_POST['cart_text_color']) : '';

	$wpdb->update(
		$table,
		array(
			'time'             => $time,
			'header_bg'        => $color,
			'header_color'     => $textcolor,
			'header_color_link'=> $linkcolor,
			'bk_mobile'        => $bk_mobile,
		),
		array('id' => 1)
	);

	// Update options
	update_option('wcplus_cart_mobile_cartIcon', $mobile_bk_color);
	update_option('wcplus_cart_bk_color', $cart_bk_color);
	update_option('wcplus_cart_text_color', $cart_text_color);

	echo "1";
	wp_die();
}


add_action('wp_ajax_pluswc_sidebar_bg_base', 'pluswc_sidebar_bg_base');
add_action('wp_ajax_nopriv_pluswc_sidebar_bg_base', 'pluswc_sidebar_bg_base');

function pluswc_sidebar_bg_base() {
	global $wpdb;

	$table = $wpdb->prefix . 'wcplaus_checkout';
	$table2 = $wpdb->prefix . 'wcplaus_checkout_header';
	$table3 = $wpdb->prefix . 'wcplus_reviews';
	$time = current_time('mysql');

	$sidebar_background = isset($_POST['sidebar_background']) ? sanitize_hex_color($_POST['sidebar_background']) : '';
	$sidebar_bordercolor = isset($_POST['sidebar_bordercolor']) ? sanitize_hex_color($_POST['sidebar_bordercolor']) : '';
	$review_starcolor = isset($_POST['review_starcolor']) ? sanitize_hex_color($_POST['review_starcolor']) : '';
	$sidebar_textcolor = isset($_POST['sidebar_textcolor']) ? sanitize_hex_color($_POST['sidebar_textcolor']) : '';

	$saving_text_color = isset($_POST['saving_text_color']) ? sanitize_hex_color($_POST['saving_text_color']) : '';
	$saving_bg_color = isset($_POST['saving_bg_color']) ? sanitize_hex_color($_POST['saving_bg_color']) : '';

	$wpdb->update(
		$table,
		array(
			'time'               => $time,
			'sidebar_background' => $sidebar_background,
			'sidebar_textcolor'  => $sidebar_textcolor
		),
		array('id' => 1)
	);
	$wpdb->update(
		$table2,
		array(
			'time'              => $time,
			'sidebar_bordercolor'=> $sidebar_bordercolor,
		),
		array('id' => 1)
	);
	$wpdb->update(
		$table3,
		array(
			'time'              => $time,
			'review_starcolor'  => $review_starcolor,
		),
		array('id' => 1)
	);
	// Update options
	update_option('wcplus_select_saving_text_color', $saving_text_color);
	update_option('wcplus_select_saving_bg_color', $saving_bg_color);

	echo "1";
	wp_die();
}

// Function to sanitize and encode input data
function pluswc_sanitize_and_encode($input) {
    // Split the input by commas
    $parts = explode(',', $input);

    // Sanitize each part of the input
    $sanitized_parts = array_map('sanitize_text_field', $parts);

    // Encode the sanitized parts to JSON format
    return wp_json_encode($sanitized_parts);
}

add_action('wp_ajax_pluswc_footer_text_base', 'pluswc_footer_text_base');
add_action('wp_ajax_nopriv_pluswc_footer_text_base', 'pluswc_footer_text_base');

function pluswc_footer_text_base() {
    global $wpdb;
    $table = $wpdb->prefix . 'wcplus_footer';

    $time = current_time('mysql');
 
    // Sanitize and validate POST data
    $footer_bar = isset($_POST['footer_bar']) ? sanitize_text_field($_POST['footer_bar']) : '';
    $footer_left_link = isset($_POST['footer_left_link']) ? pluswc_sanitize_and_encode($_POST['footer_left_link']) : '';
    $footer_left_term = isset($_POST['footer_left_term']) ? pluswc_sanitize_and_encode($_POST['footer_left_term']) : '';

    $wpdb->update(
        $table,
        array(
            'time'              => $time,
            'footer_bar'        => $footer_bar,
            'footer_left_link'  => $footer_left_link,
            'footer_left_term'  => $footer_left_term,
        ),
        array('id' => 1)
    );
    echo "1";
    wp_die();
}


add_action('wp_ajax_pluswc_footer_text_base_badge_base', 'pluswc_footer_text_base_badge_base');
add_action('wp_ajax_nopriv_pluswc_footer_text_base_badge_base', 'pluswc_footer_text_base_badge_base');

function pluswc_footer_text_base_badge_base() {

    // Sanitize and validate user inputs
    $selected_img_footer = isset($_POST['selected_img_footer']) ? sanitize_text_field($_POST['selected_img_footer']) : '';
    $text_minimalist = isset($_POST['text_minimalist']) ? sanitize_text_field($_POST['text_minimalist']) : '';

    // Update options
    update_option('wcplus_minimalist_img_footer', $selected_img_footer);
    update_option('wcplus_minimalist_text_footer', $text_minimalist);

    echo "1";
    wp_die();
}

add_action('wp_ajax_pluswc_logo_favicon_logo_base', 'pluswc_logo_favicon_logo_base');
add_action('wp_ajax_nopriv_pluswc_logo_favicon_logo_base', 'pluswc_logo_favicon_logo_base');

function pluswc_logo_favicon_logo_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplaus_checkout';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $logo = isset($_POST['logo_icon']) ? esc_url_raw($_POST['logo_icon']) : '';
    $favicon = isset($_POST['favicon_icon']) ? esc_url_raw($_POST['favicon_icon']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'          => $time,
            'favicoon_icon' => $favicon,
            'url'           => $logo,
        ),
        array('id' => 1)
    );

    echo "1";
    wp_die();
}


function pluswc_show_cart_gaols_on_layouts_base(){
	$contentwcplus_cartgoal = '';
	$cartgoal_text_color = get_option('wcplus_cartgoal_text_color');
	$cartgoal_loading_color = get_option('wcplus_cartgoal_loading_color');
	$addIconwoow = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 688.6 752.1"><path d="M10.5,752.1c-11.6-8.3-12.8-12.4-7.5-26.6,65.3-174.8,130.7-349.6,195.9-524.5,1.6-4.2,2.8-8.8,3.1-13.3,1.7-28.3,20.7-44.5,49.3-42,23.7,2.1,45.2,11.1,65.6,22.4,17.2,9.5,33.7,20.1,52.4,31.4,3.4-14.9,7.5-29.3,9.8-44,3.7-23.6,1.2-47-5-70-2.9-10.9,1-19.2,9.9-21.7,9.2-2.5,16.8,2.9,19.9,14.2,12.3,45.5,9.7,90.2-7.9,133.9-2,5-1.8,7.8,2.7,11.4,15.5,12.6,30.5,25.7,47.1,39.7,7.4-14.6,15.4-28.5,21.8-43.1,27.3-62.8,31.8-127.5,14.5-193.7-.5-2-1.1-3.9-1.5-5.9-2.1-9.2,2-17.3,10-19.6,8.7-2.5,17.5,2,19.3,11.5,4.7,24.6,10.6,49.2,12.2,74,4.3,70.1-14.2,134.7-51.8,193.9-.8,1.3-1.6,2.6-2.7,4.5,1.6,1.8,3.3,3.6,5,5.5,18.7,21,37.6,41.9,56,63.3,3.7,4.3,6.3,4.7,11.4,2.6,44-17.8,88.9-20.3,134.7-7.9,9.9,2.7,14.4,8.2,14,16.5-.5,10.5-9.5,16-21.1,13.6-12.5-2.5-25.1-5.3-37.7-6.5-26.4-2.3-51.9,2.3-77.5,12.4,2.3,3.5,4.3,6.4,6.2,9.3,17.7,26.7,34.9,53.9,42.7,85.4,2.9,11.9,3.8,24.8,2.6,37-1.5,15.8-12,25.9-27.4,30.8-23.5,7.6-47.3,14.7-70.4,23.3-160.1,59.5-320,119.4-480,179.2-2.1.8-4.1,1.9-6.1,2.9h-9.2ZM41.7,710c4.1-1.3,6.3-1.9,8.4-2.7,21.6-8.1,43-16.4,64.7-24.1,5.5-1.9,6.6-4.5,6.2-9.9-2.7-37.7,19.1-71.8,53.7-84.5,36.4-13.4,74.7-1.9,97.8,29.3,1.2,1.6,2.5,3.1,3.8,4.7,47.3-17.7,94.2-35.2,142.2-53.2-9.5-6.3-17.9-11.3-25.6-17.1-17.2-12.8-34.3-25.9-51.2-39.2-8.8-7-10-16.2-3.9-23.4,6-7,14.6-7.2,23.2-.4,2.6,2.1,5.1,4.2,7.7,6.3,26.1,21.2,53.1,40.9,82.9,56.6,2.1,1.1,5.1,2.6,7,2,16.5-5.8,32.8-12.1,48.7-18.1-124.5-70.1-221.4-167.2-292-290.9-5.7,15.3-11.7,30.8-17.1,46.4-.8,2.4,0,6.1,1.4,8.3,16.6,25.2,33.4,50.3,50.4,75.2,4.3,6.3,10.6,11.5,14.1,18.1,2.3,4.4,3.2,11.3,1.3,15.5-1.7,4-8,8.4-12.2,8.3-5-.1-11.5-3.6-14.7-7.7-17.7-22.9-34.5-46.4-51.6-69.7-1.3-1.8-2.6-3.5-4.5-6.3-7.5,20.1-14.5,39.1-21.6,57.9,47,22.9,57.3,67.1,48.9,99-4.8,18.2-14.4,33.3-29.1,44.9-23.7,18.6-50.3,22.2-79,14.5-19.9,53.2-39.5,105.6-59.7,159.9ZM355,228.5c-23.9-17-46.6-31.8-71.7-42.4-8-3.4-16.3-6.3-24.7-8.3-22.4-5.2-29.2,1.8-24.2,24.2,4.7,21.3,14.4,40.5,25.8,58.7,55.9,88.9,128.3,161.7,215,220.5,20.4,13.8,41.8,26,65.6,32.9,7.3,2.1,15,2.9,22.6,3.3,7.6.4,11.4-4.7,10.9-11.8-.5-7.3-1.5-14.8-3.7-21.8-9.8-31.1-27.1-58.3-46.1-84.4-.2-.3-.9-.2-3-.7-10.7,8.8-21.8,18.7-33.6,27.5-4.1,3.1-10.3,5.7-15,5-4.3-.7-9.1-5.6-11.3-9.9-2.8-5.5-.8-11.7,4.1-16,12.7-11,25.7-21.7,39.3-33.2-18.2-20.4-36.7-41.1-55.4-62.1-9.4,10.3-17.7,19.6-26.4,28.6-2.5,2.6-6.1,5-9.5,5.9-6.9,1.7-12.7-1-16.2-7.3-3.7-6.6-2.5-12.9,2.4-18.4,8.9-9.9,17.8-19.7,27.5-30.3-16.6-14.4-32.4-28.2-47.7-41.5-11.2,13.3-21.3,25.8-32,37.9-2.4,2.7-6,5-9.5,5.9-6.9,1.7-12.7-1-16.3-7.2-3.7-6.6-2.4-12.7,2.4-18.4,10-11.9,19.9-23.9,30.5-36.6ZM112.5,520.6c29.5,8.8,59.5-8.1,67.1-36.7,6.9-26-7.9-56.5-30.4-61.9-12.2,32.7-24.4,65.4-36.8,98.5ZM152,669.2c31.3-11.7,62-23.2,92.8-34.7-9.7-16.6-35.2-24.5-56.2-18-22.8,7.1-38.4,28.8-36.6,52.7Z" style="fill:'.$cartgoal_text_color.'; stroke-width:0px;"/><path d="M298.4,438.2c8.6-.1,15.2,6.2,15.4,14.7.2,8.5-6.2,15.5-14.5,15.8-8.6.3-15.9-6.7-15.9-15.3,0-8.4,6.5-15.1,15-15.2Z" style="fill:#fff; stroke-width:0px;"/></svg>';
	$getship_price = wcplus_get_cartgoals();
	if($getship_price){ 
		foreach($getship_price as $dkey => $getshipvaluec) { //echo "<pre>";print_r($getshipvaluec);
    	$shippingId = $getshipvaluec->ID;
    	$shipping_title = $getshipvaluec->post_title;
    	$show_newmessage = $getshipvaluec->post_content;
    	$show_message = get_post_meta($shippingId, 'wcplus_cart_goal_achieved', true);
    	$total_amount = get_post_meta($shippingId, 'wcplus_cart_goal_spend', true);
    	$enablecart_goals = get_post_meta($shippingId, 'wcplus_enable_cart_goals', true);
    	if($enablecart_goals == 1){
    	$amount_paid = WC()->cart->get_subtotal();
    	if ( $amount_paid >= $total_amount ) {
    		$percentage_pending = 100;
    		$addmsg = $addIconwoow.' '.$show_message;
    		$addactivecls = 'active';
    		$cartgoal_bg_bk = get_option('wcplus_achievedbg_bg_bk');
		}else{
			$pending_amount = $total_amount - $amount_paid; 
	    	if ($total_amount > 0) {
			    $percentage_pending = ($amount_paid / $total_amount) * 100;
			} else {
			    $percentage_pending = 0; 
			}
			$addmsg = 'Spend '.get_woocommerce_currency_symbol().$pending_amount.' '.$show_newmessage;
			$addactivecls = '';
			$cartgoal_bg_bk = get_option('wcplus_cartgoal_bg_bk');
		}
		if(!isset($_GET['key'])){
    	//$cart_total_threshold = $shipping_spend_amount; 
			$contentwcplus_cartgoal .= '<div class="wcplus-cart-goal-popup"><div class="progress-bar-section wcplus-progress-bar" style="background: '.$cartgoal_bg_bk.' !important;">
			<div class="wrapper wcpluswrapper">
				<div class="progress-bar-inner '.$addactivecls.'">
					<div class="progress-bar-inner-left" style="border-color: '.$cartgoal_loading_color.' !important;">
					    <div class="progress-bar-inner-left-row '.$addactivecls.'">
							<div class="wcplus-progressbar wcplus-progress-bar-striped active" role="progressbar" aria-valuenow="'.$percentage_pending.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_pending.'%;background-color:'.$cartgoal_loading_color.' !important;">
					    </div>
					    <span class="wcplus-price-span '.$addactivecls.'">'.wc_price($total_amount).'</span>
						</div>
					</div>
					<div class="progress-bar-inner-right">
						<p style="color: '.$cartgoal_text_color.' !important;"><strong>'.$addmsg.'</strong></p>
					</div>
				</div>
			</div>
		</div></div>';
		}
	 }
	}
	return $contentwcplus_cartgoal;
}
}

function pluswc_show_cart_gaols_withcartpopup_base(){
	$contentwcplus_cartgoal = '';
	$cartgoal_text_color = get_option('wcplus_cartgoal_text_color');
	$cartgoal_loading_color = get_option('wcplus_cartgoal_loading_color');
	$addIconwoow = '<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 688.6 752.1"><path d="M10.5,752.1c-11.6-8.3-12.8-12.4-7.5-26.6,65.3-174.8,130.7-349.6,195.9-524.5,1.6-4.2,2.8-8.8,3.1-13.3,1.7-28.3,20.7-44.5,49.3-42,23.7,2.1,45.2,11.1,65.6,22.4,17.2,9.5,33.7,20.1,52.4,31.4,3.4-14.9,7.5-29.3,9.8-44,3.7-23.6,1.2-47-5-70-2.9-10.9,1-19.2,9.9-21.7,9.2-2.5,16.8,2.9,19.9,14.2,12.3,45.5,9.7,90.2-7.9,133.9-2,5-1.8,7.8,2.7,11.4,15.5,12.6,30.5,25.7,47.1,39.7,7.4-14.6,15.4-28.5,21.8-43.1,27.3-62.8,31.8-127.5,14.5-193.7-.5-2-1.1-3.9-1.5-5.9-2.1-9.2,2-17.3,10-19.6,8.7-2.5,17.5,2,19.3,11.5,4.7,24.6,10.6,49.2,12.2,74,4.3,70.1-14.2,134.7-51.8,193.9-.8,1.3-1.6,2.6-2.7,4.5,1.6,1.8,3.3,3.6,5,5.5,18.7,21,37.6,41.9,56,63.3,3.7,4.3,6.3,4.7,11.4,2.6,44-17.8,88.9-20.3,134.7-7.9,9.9,2.7,14.4,8.2,14,16.5-.5,10.5-9.5,16-21.1,13.6-12.5-2.5-25.1-5.3-37.7-6.5-26.4-2.3-51.9,2.3-77.5,12.4,2.3,3.5,4.3,6.4,6.2,9.3,17.7,26.7,34.9,53.9,42.7,85.4,2.9,11.9,3.8,24.8,2.6,37-1.5,15.8-12,25.9-27.4,30.8-23.5,7.6-47.3,14.7-70.4,23.3-160.1,59.5-320,119.4-480,179.2-2.1.8-4.1,1.9-6.1,2.9h-9.2ZM41.7,710c4.1-1.3,6.3-1.9,8.4-2.7,21.6-8.1,43-16.4,64.7-24.1,5.5-1.9,6.6-4.5,6.2-9.9-2.7-37.7,19.1-71.8,53.7-84.5,36.4-13.4,74.7-1.9,97.8,29.3,1.2,1.6,2.5,3.1,3.8,4.7,47.3-17.7,94.2-35.2,142.2-53.2-9.5-6.3-17.9-11.3-25.6-17.1-17.2-12.8-34.3-25.9-51.2-39.2-8.8-7-10-16.2-3.9-23.4,6-7,14.6-7.2,23.2-.4,2.6,2.1,5.1,4.2,7.7,6.3,26.1,21.2,53.1,40.9,82.9,56.6,2.1,1.1,5.1,2.6,7,2,16.5-5.8,32.8-12.1,48.7-18.1-124.5-70.1-221.4-167.2-292-290.9-5.7,15.3-11.7,30.8-17.1,46.4-.8,2.4,0,6.1,1.4,8.3,16.6,25.2,33.4,50.3,50.4,75.2,4.3,6.3,10.6,11.5,14.1,18.1,2.3,4.4,3.2,11.3,1.3,15.5-1.7,4-8,8.4-12.2,8.3-5-.1-11.5-3.6-14.7-7.7-17.7-22.9-34.5-46.4-51.6-69.7-1.3-1.8-2.6-3.5-4.5-6.3-7.5,20.1-14.5,39.1-21.6,57.9,47,22.9,57.3,67.1,48.9,99-4.8,18.2-14.4,33.3-29.1,44.9-23.7,18.6-50.3,22.2-79,14.5-19.9,53.2-39.5,105.6-59.7,159.9ZM355,228.5c-23.9-17-46.6-31.8-71.7-42.4-8-3.4-16.3-6.3-24.7-8.3-22.4-5.2-29.2,1.8-24.2,24.2,4.7,21.3,14.4,40.5,25.8,58.7,55.9,88.9,128.3,161.7,215,220.5,20.4,13.8,41.8,26,65.6,32.9,7.3,2.1,15,2.9,22.6,3.3,7.6.4,11.4-4.7,10.9-11.8-.5-7.3-1.5-14.8-3.7-21.8-9.8-31.1-27.1-58.3-46.1-84.4-.2-.3-.9-.2-3-.7-10.7,8.8-21.8,18.7-33.6,27.5-4.1,3.1-10.3,5.7-15,5-4.3-.7-9.1-5.6-11.3-9.9-2.8-5.5-.8-11.7,4.1-16,12.7-11,25.7-21.7,39.3-33.2-18.2-20.4-36.7-41.1-55.4-62.1-9.4,10.3-17.7,19.6-26.4,28.6-2.5,2.6-6.1,5-9.5,5.9-6.9,1.7-12.7-1-16.2-7.3-3.7-6.6-2.5-12.9,2.4-18.4,8.9-9.9,17.8-19.7,27.5-30.3-16.6-14.4-32.4-28.2-47.7-41.5-11.2,13.3-21.3,25.8-32,37.9-2.4,2.7-6,5-9.5,5.9-6.9,1.7-12.7-1-16.3-7.2-3.7-6.6-2.4-12.7,2.4-18.4,10-11.9,19.9-23.9,30.5-36.6ZM112.5,520.6c29.5,8.8,59.5-8.1,67.1-36.7,6.9-26-7.9-56.5-30.4-61.9-12.2,32.7-24.4,65.4-36.8,98.5ZM152,669.2c31.3-11.7,62-23.2,92.8-34.7-9.7-16.6-35.2-24.5-56.2-18-22.8,7.1-38.4,28.8-36.6,52.7Z" style="fill:'.$cartgoal_text_color.'; stroke-width:0px;"/><path d="M298.4,438.2c8.6-.1,15.2,6.2,15.4,14.7.2,8.5-6.2,15.5-14.5,15.8-8.6.3-15.9-6.7-15.9-15.3,0-8.4,6.5-15.1,15-15.2Z" style="fill:#fff; stroke-width:0px;"/></svg>';
	$getship_price = wcplus_get_cartgoals();
	if($getship_price){
		foreach ($getship_price as $key => $getshipvalue) {
    	$shippingId = $getshipvalue->ID;
    	$shipping_title = $getshipvalue->post_title;
    	$show_newmessage = $getshipvalue->post_content;
    	$show_message = get_post_meta($shippingId, 'wcplus_cart_goal_achieved', true);
    	$total_amount = get_post_meta($shippingId, 'wcplus_cart_goal_spend', true);
    	$enablecart_goals = get_post_meta($shippingId, 'wcplus_enable_cart_goals', true);
    	if($enablecart_goals == 1){
    	$amount_paid = WC()->cart->get_subtotal();
    	if ( $amount_paid >= $total_amount ) {
    		$percentage_pending = 100;
    		$addmsg = $addIconwoow.' '.$show_message;
    		$addactivecls = 'active';
    		$cartgoal_bg_bk = get_option('wcplus_achievedbg_bg_bk');
		}else{
			$pending_amount = $total_amount - $amount_paid; 
	    	if ($total_amount > 0) {
			    $percentage_pending = ($amount_paid / $total_amount) * 100;
			} else {
			    $percentage_pending = 0; 
			}
			$addmsg = 'Spend '.get_woocommerce_currency_symbol().$pending_amount.' '.$show_newmessage;
			$addactivecls = '';
			$cartgoal_bg_bk = get_option('wcplus_cartgoal_bg_bk');
		}
		
    	//$cart_total_threshold = $shipping_spend_amount;  
		$contentwcplus_cartgoal .= '<div class="wcplus-cart-goal-popup"><div class="progress-bar-section wcplus-progress-bar" style="background: '.$cartgoal_bg_bk.' !important;">
		<div class="wrapper wcpluswrapper">
			<div class="progress-bar-inner '.$addactivecls.'">
				<div class="progress-bar-inner-left" style="border-color: '.$cartgoal_loading_color.' !important;">
				    <div class="progress-bar-inner-left-row '.$addactivecls.'">
						<div class="wcplus-progressbar wcplus-progress-bar-striped active" role="progressbar" aria-valuenow="'.$percentage_pending.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage_pending.'%;background-color:'.$cartgoal_loading_color.' !important;">
				    </div>
				    <span class="wcplus-price-span '.$addactivecls.'">'.wc_price($total_amount).'</span>
					</div>
				</div>
				<div class="progress-bar-inner-right">
					<p style="color: '.$cartgoal_text_color.' !important;"><strong>'.$addmsg.'</strong></p>
				</div>
			</div>
		</div>
	</div></div>';
	 }else{
	 	return $contentwcplus_cartgoal = 0;
	 }
	}
	return $contentwcplus_cartgoal;
	}else{
		return $contentwcplus_cartgoal = 0;
	} 
}

add_action('wp_ajax_pluswc_promo_data_base', 'pluswc_promo_data_base');
add_action('wp_ajax_nopriv_pluswc_promo_data_base', 'pluswc_promo_data_base');

function pluswc_promo_data_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplaus_checkout_header';
    $time = current_time('mysql');
    $promo_bg = isset($_POST['promo_bg']) ? sanitize_hex_color($_POST['promo_bg']) : '';
    $promo_color = isset($_POST['promo_color']) ? sanitize_hex_color($_POST['promo_color']) : '';
    $promo_text = isset($_POST['promo_text']) ? sanitize_text_field($_POST['promo_text']) : '';
    $enable_promocode = isset($_POST['enable_promocode']) ? sanitize_text_field($_POST['enable_promocode']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'        => $time,
            'promo_bg'    => $promo_bg,
            'promo_color' => $promo_color,
            'promo_text'  => $promo_text,
        ),
        array('id' => 1)
    );

    // Update option
    update_option('pluswc_enable_promocode_option', $enable_promocode);

    echo "1";
    wp_die();
}


add_action('wp_ajax_pluswc_banner_data_base', 'pluswc_banner_data_base');
add_action('wp_ajax_nopriv_pluswc_banner_data_base', 'pluswc_banner_data_base');

function pluswc_banner_data_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplus_banner';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $banner_bg = isset($_POST['banner_bg']) ? sanitize_hex_color($_POST['banner_bg']) : '';
    $banner_color = isset($_POST['banner_color']) ? sanitize_hex_color($_POST['banner_color']) : '';
    $enable_memberbanner = isset($_POST['enable_memberbanner']) ? sanitize_text_field($_POST['enable_memberbanner']) : '';
    $enablesinglebanner = isset($_POST['enablesinglebanner']) ? sanitize_text_field($_POST['enablesinglebanner']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'          => $time,
            'banner_bg'     => $banner_bg,
            'banner_color'  => $banner_color,
        ),
        array('id' => 1)
    );

    // Call functions with sanitized values
    pluswc_EnableBoxes_base('enable_memberbanner', $enable_memberbanner);
    pluswc_EnableBoxes_base('enablesinglebanner', $enablesinglebanner);

    echo "1";
    wp_die();
}


add_action('wp_ajax_pluswc_body_data_base', 'pluswc_body_data_base');
add_action('wp_ajax_nopriv_pluswc_body_data_base', 'pluswc_body_data_base');

function pluswc_body_data_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplaus_checkout_header';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $bodycolor = isset($_POST['bodycolor']) ? sanitize_hex_color($_POST['bodycolor']) : '';
    $checkout = isset($_POST['checkout']) ? sanitize_text_field($_POST['checkout']) : '';
    $linkbody = isset($_POST['linkbody']) ? sanitize_hex_color($_POST['linkbody']) : '';
    $checkoutbtntext_body = isset($_POST['checkoutbtntext_body']) ? sanitize_text_field($_POST['checkoutbtntext_body']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'                => $time,
            'body_bg'             => $bodycolor,
            'body_step_checkout'  => $checkout,
            'body_link_color'     => $linkbody,
        ),
        array('id' => 1)
    );

    // Update option
    update_option('wcplus_body_step_text_checkout', $checkoutbtntext_body);

    echo "1";
    wp_die();
}


add_action('wp_ajax_pluswc_ksp_header_base', 'pluswc_ksp_header_base');
add_action('wp_ajax_nopriv_pluswc_ksp_header_base', 'pluswc_ksp_header_base');
function pluswc_ksp_header_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplaus_checkout';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $icon_shipping = isset($_POST['icon_shipping']) ? sanitize_text_field($_POST['icon_shipping']) : '';
    $freeshipping_icon_text = isset($_POST['freeshipping_icon_text']) ? sanitize_text_field($_POST['freeshipping_icon_text']) : '';
    $icon_easy = isset($_POST['icon_easy']) ? sanitize_text_field($_POST['icon_easy']) : '';
    $easy_returns = isset($_POST['easy_returns']) ? sanitize_text_field($_POST['easy_returns']) : '';
    $icon_safe = isset($_POST['icon_safe']) ? sanitize_text_field($_POST['icon_safe']) : '';
    $safe_checkout = isset($_POST['safe_checkout']) ? sanitize_text_field($_POST['safe_checkout']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'                   => $time,
            'icon_shipping'          => $icon_shipping,
            'freeshipping_icon_text' => $freeshipping_icon_text,
            'icon_easy'              => $icon_easy,
            'easy_returns'           => $easy_returns,
            'icon_safe'              => $icon_safe,
            'safe_checkout'          => $safe_checkout,
        ),
        array('id' => 1)
    );

    echo "1";
    wp_die();
}

add_action('wp_ajax_pluswc_ksp_saas_key_selling_base', 'pluswc_ksp_saas_key_selling_base');
add_action('wp_ajax_nopriv_pluswc_ksp_saas_key_selling_base', 'pluswc_ksp_saas_key_selling_base');
function pluswc_ksp_saas_key_selling_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplus_banner';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $saas_icon_left = isset($_POST['saas_icon_left']) ? sanitize_text_field($_POST['saas_icon_left']) : '';
    $saas_text_left = isset($_POST['saas_text_left']) ? sanitize_text_field($_POST['saas_text_left']) : '';
    $saas_icon_middle = isset($_POST['saas_icon_middle']) ? sanitize_text_field($_POST['saas_icon_middle']) : '';
    $saas_text_middle = isset($_POST['saas_text_middle']) ? sanitize_text_field($_POST['saas_text_middle']) : '';
    $saas_icon_right = isset($_POST['saas_icon_right']) ? sanitize_text_field($_POST['saas_icon_right']) : '';
    $saas_text_right = isset($_POST['saas_text_right']) ? sanitize_text_field($_POST['saas_text_right']) : '';
    $enable_membersellpoint = isset($_POST['enable_membersellpoint']) ? sanitize_text_field($_POST['enable_membersellpoint']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'             => $time,
            'saas_icon_left'   => $saas_icon_left,
            'saas_text_left'   => $saas_text_left,
            'saas_icon_middle' => $saas_icon_middle,
            'saas_text_middle' => $saas_text_middle,
            'saas_icon_right'  => $saas_icon_right,
            'saas_text_right'  => $saas_text_right,
        ),
        array('id' => 1)
    );

    // Call function with sanitized value
    pluswc_EnableBoxes_base('enable_membersellpoint', $enable_membersellpoint);

    echo "1";
    wp_die();
}

add_action('wp_ajax_pluswc_cart_popup_base', 'pluswc_cart_popup_base');
add_action('wp_ajax_nopriv_pluswc_cart_popup_base', 'pluswc_cart_popup_base');
function pluswc_cart_popup_base() {
    global $wpdb;

    $table = $wpdb->prefix . 'wcplus_cart';
    $time = current_time('mysql');

    // Sanitize and validate user inputs
    $cart_icon_enable_popup = isset($_POST['cart_icon_enable_popup']) ? sanitize_text_field($_POST['cart_icon_enable_popup']) : '';
    $cart_icon_enable_sidebar = isset($_POST['cart_icon_enable_sidebar']) ? sanitize_text_field($_POST['cart_icon_enable_sidebar']) : '';

    // Update database
    $wpdb->update(
        $table,
        array(
            'time'                     => $time,
            'cart_icon_enable_popup'   => $cart_icon_enable_popup,
            'cart_icon_enable_sidebar' => $cart_icon_enable_sidebar,
        ),
        array('id' => 1)
    );

    echo "1";
    wp_die();
}


add_action('wp_ajax_pluswc_cart_page_base', 'pluswc_cart_page_base');
add_action('wp_ajax_nopriv_pluswc_cart_page_base', 'pluswc_cart_page_base');
function pluswc_cart_page_base() {
	global $wpdb;
    $wcplus_enable_cart_page = isset($_POST['wcplus_enable_cart_page']) ? sanitize_text_field($_POST['wcplus_enable_cart_page']) : '';
    update_option('wcplus_enable_cart_page', $wcplus_enable_cart_page);
	//echo "<pre>";print_r($dataa);
	echo "1";
	wp_die();
}

add_action('wp_ajax_pluswc_custom_php_base', 'pluswc_custom_php_base');
add_action('wp_ajax_nopriv_pluswc_custom_php_base', 'pluswc_custom_php_base');
function pluswc_custom_php_base() {
	global $wpdb;
	$table = $wpdb->prefix.'wcplaus_checkout_header';
    $time = current_time( 'mysql' );
    $php_data = isset($_POST['php_data']) ? sanitize_text_field($_POST['php_data']) : '';

    $wpdb->update( 
	    $table, 
	    array( 
	        'time' => $time,  
	        'custom_php_code' => $php_data, 
	    ), 
	    array( 'id' => 1 )
	);
	echo "1";
	wp_die();
}

add_action('wp_ajax_pluswc_same_header_base', 'pluswc_same_header_base');
add_action('wp_ajax_nopriv_pluswc_same_header_base', 'pluswc_same_header_base');
function pluswc_same_header_base() {
	global $wpdb;
	$table = $wpdb->prefix.'wcplaus_checkout_header';
    $time = current_time( 'mysql' );
    $header_data = isset($_POST['header_data']) ? sanitize_text_field($_POST['header_data']) : '';
    $wpdb->update( 
	    $table, 
	    array( 
	        'time' => $time,  
	        'custom_header' => $header_data, 
	    ), 
	    array( 'id' => 1 )
	);
	echo "1";
	wp_die();
}

function pluswc_EnableBoxes_base($key=NULL, $value=NULL){
	global $wpdb;
	$table = $wpdb->prefix.'wcplus_enablebox';
    $time = current_time( 'mysql' );

    $wpdb->update( 
	    $table, 
	    array( 
	        'time' => $time,  
	        $key => $value, 
	    ), 
	    array( 'id' => 1 )
	);
}

 function pluswc_ajax_apply_coupon_base() {
    $coupon_code = null;
    if (!empty($_POST['coupon_code'])) {
        $coupon_code = sanitize_key($_POST['coupon_code']);
    }
    $coupon_id = wc_get_coupon_id_by_code($coupon_code);
    if (empty($coupon_id)) {
        wp_send_json(array('success' => false, 'message' => 'Coupon not found'));
    }
    if (!WC()->cart->has_discount($coupon_code)) {
	    $coupon = new WC_Coupon($coupon_code);
	    if ($coupon && $coupon->get_date_expires()) {
	        WC()->cart->add_discount($coupon_code);
	        wp_send_json(array('success' => true, 'message' => 'Coupon applied successfully'));
	    } else {
	        wp_send_json(array('success' => false, 'message' => 'Coupon is not valid or has no expiry date set'));
	    }
	} else {
	    wp_send_json(array('success' => false, 'message' => 'Coupon already applied'));
	}
}

 add_action('wp_ajax_pluswc_ajax_apply_coupon_base', 'pluswc_ajax_apply_coupon_base');
 add_action('wp_ajax_nopriv_pluswc_ajax_apply_coupon_base', 'pluswc_ajax_apply_coupon_base');


?>