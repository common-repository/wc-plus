<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if (get_option('WCPLUS_license_key_valid') == 'valid') {

?>
<div class="plugin-top-heading">
	<div class="wrapper-inner">
		<div class="plugin-top-heading-inner">
			<h2>Set the logo & colors for your new checkout page to match your branding!</h2>
			<p>Put your brand's best foot forward when it matters most, when collecting payment &#128521;</p>
			<div class="plugin-top-btn">
				<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
				<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
			</div>
		</div>
	</div>
</div>
<?php
$active_template = get_template_data_base();
?>
	<div class="tab-list-section">
		<div class="wrapper-inner">
			<ul>
				<li class="list-item active" id="wcplus-brand-header">Header</li>
				<li class="list-item" id="wcplus-brand-sidebar">Sidebar</li>
				<li class="list-item" id="wcplus-brand-body">Body</li>
				<li class="list-item" id="wcplus-brand-footer">Footer</li>
				<li class="list-item" id="wcplus-brand-custom">Custom</li>
			</ul>
		</div>
	</div>

<div class="tab-list-content">
	<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Logo & Favicon</h3>
					<p>Set your logo here, please make sure that the background is transparent or has the same background color as the header row to make it blends in correctly.</p>
					<p>Logo will be left aligned, supported file types include jpg, jpeg, png, gif, svg (recommended).</p>
					<div class="layout-option">

						<div class="layout-option-row">
							<h4>Header Area Logo</h4>
							
							<a href="#" id="img-upload">
								<?php 
							echo "<span id='insert_image'>";
							if(!empty($data[0]->url)){
								echo '<img src="'.esc_url($data[0]->url).'">';
							}
							echo "</span>";
							?>
								<span>Add Logo</span></a>
							<!-- <input type="file" id="file" accept="image/*" /> -->
						</div>
						<div class="layout-option-row">
							<h4>Favicon Logo</h4>
							
							<a href="#" id="img-upload-favicon">
								<?php 
							echo "<span id='insert_image_favicon'>";
							if(!empty($data[0]->favicoon_icon)){
								echo '<img src="'.esc_url($data[0]->favicoon_icon).'">';
							}
							echo "</span>";
							?>
							<span>Add Favicon</span></a>
							<!-- <input type="file" id="faviconfile" accept="image/*" /> -->
						</div>
						
					</div>
					<?php 
					$logo_data = (!empty($data[0]->url)) ? $data[0]->url : '';
					$favicon_data = (!empty($data[0]->favicoon_icon)) ? $data[0]->favicoon_icon : '';
					?>
					<div class="update-setting">
						<input type="hidden" id="logo_icon" value="<?php echo esc_attr($logo_data);?>">
						<input type="hidden" id="favicon_icon" value="<?php echo esc_attr($favicon_data);?>">
						<button class="update_btn" id="logo_icon_save">Update Settings</button> This will update all settings
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
<?php
$sidebar_background = (!empty($data[0]->sidebar_background)) ? $data[0]->sidebar_background : '#0a0ad9';
$sidebar_textcolor = (!empty($data[0]->sidebar_textcolor)) ? $data[0]->sidebar_textcolor : '#0d0d0d';
$sidebar_bordercolor = (!empty($wcheader_item[0]->sidebar_bordercolor)) ? $wcheader_item[0]->sidebar_bordercolor : '#fafafa';
$wc_plus_review = get_wcplus_customer_review_base();
$review_star = (!empty($wc_plus_review[0]->review_starcolor)) ? $wc_plus_review[0]->review_starcolor : '#0d0d0d';

$wcplus_select_saving_bg_color = get_option('wcplus_select_saving_bg_color');
$wcplus_select_saving_text_color = get_option('wcplus_select_saving_text_color');
?>

	<div class="plugin-inner-content wcplus-brand-sidebar">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Sidebar Colors</h3>
					<p>Set the colors for the checkout pages header here, this is where your logo will sit and your 3 primary key selling points.</p>
					<div class="layout-option">
						<div class="layout-option-row">
							<h4>Sidebar - Background Color</h4>
							<div class="color_choice">
								<input type="color" id="sidebar_bk" name="sidebar_background" value="<?php echo esc_attr($sidebar_background);?>">
								<input type="text" class="color-value" data-id="sidebar_bk" id="sidebar_bk_span" value="<?php echo esc_attr($sidebar_background);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Sidebar - Border Color</h4>
							<div class="color_choice">
								<input type="color" id="sidebar_border" name="sidebar_bordercolor" value="<?php echo esc_attr($sidebar_bordercolor);?>">
								<input type="text" class="color-value" data-id="sidebar_border" id="sidebar_border_span" value="<?php echo esc_attr($sidebar_bordercolor);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Sidebar - Text Color</h4>
							<div class="color_choice">
								<input type="color" id="sidebar_text" name="sidebar_textcolor" value="<?php echo esc_attr($sidebar_textcolor);?>">
								<input type="text" class="color-value" data-id="sidebar_text" id="sidebar_text_span" value="<?php echo esc_attr($sidebar_textcolor);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Reviews/Testimonials - Star Color <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Saving Box Background Color <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Saving Box Text Color <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>

					</div>
					<div class="update-setting">
						<button class="update_btn" id="update_sidebar_bg">Update Settings</button> This will update all settings
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>



<?php
	$sidebar_heading_color = (!empty($wcheader_item[0]->header_bg)) ? $wcheader_item[0]->header_bg : '#000';
	$sidebar_text_color = (!empty($wcheader_item[0]->header_color)) ? $wcheader_item[0]->header_color : '#000';
	$sidebar_link_color = (!empty($wcheader_item[0]->header_color_link)) ? $wcheader_item[0]->header_color_link : '#0a0ad9';
	$bk_mobile = (!empty($wcheader_item[0]->bk_mobile)) ? $wcheader_item[0]->bk_mobile : '#0a0ad9';
	$mobile_bkcolor = get_option('wcplus_cart_mobile_cartIcon');
	$cart_bkcolor = get_option('wcplus_cart_bk_color');
	$cart_textcolor = get_option('wcplus_cart_text_color');
	//echo "<pre>";print_r($mobile_bkcolor);
?>
	<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Header Colors</h3>
					<p>Set the colors for the checkout pages header here, this is where your logo will sit and your 3 primary key selling points.</p>
					<div class="layout-option">

						<div class="layout-option-row">
							<h4>Header - Background Color</h4>
							<div class="color_choice">
								<input type="color" id="head_bk" name="sidebar_heading_color" value="<?php echo esc_attr($sidebar_heading_color);?>">
								<input type="text" class="color-value" data-id="head_bk" id="head_bk_span" value="<?php echo esc_attr($sidebar_heading_color);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Key Selling Point - Icon Color <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h4>
							<div class="color_choice">
							<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
						</div>
						</div>
						<div class="layout-option-row">
							<h4>Key Selling Point-Text Color <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h4>
							<div class="color_choice">
							<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
						</div>
						</div>

						<div class="layout-option-row">
							<h4>Mobile Cart Icon Color</h4>
							<div class="color_choice">
								<input type="color" id="mobile_bk_color" name="mobile_bkcolor" value="<?php echo esc_attr($mobile_bkcolor); ?>">
								<input type="text" class="color-value <?php echo esc_attr($mobile_bkcolor); ?>" data-id="mobile_bk_color" id="mobile_bk_color_span" value="<?php echo esc_attr($mobile_bkcolor); ?>">
							</div>
						</div>

						<div class="layout-option-row">
							<h4>Notification Background Color</h4>
							<div class="color_choice">
								<input type="color" id="cart_bk_color" name="cart_bkcolor" value="<?php echo esc_attr($cart_bkcolor); ?>">
								<input type="text" class="color-value <?php echo esc_attr($cart_bkcolor); ?>" data-id="cart_bk_color" id="cart_bk_color_span" value="<?php echo esc_attr($cart_bkcolor); ?>">
							</div>
						</div>

						<div class="layout-option-row">
							<h4>Notification Text Color</h4>
							<div class="color_choice">
								<input type="color" id="cart_text_color" name="cart_textcolor" value="<?php echo esc_attr($cart_textcolor); ?>">
								<input type="text" class="color-value <?php echo esc_attr($cart_textcolor); ?>" data-id="cart_text_color" id="cart_text_color_span" value="<?php echo esc_attr($cart_textcolor); ?>">
							</div>
						</div>
						
					</div>
					<div class="update-setting">
						<button class="update_btn" id="update_header_style">Update Settings</button> This will update all settings
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
<?php
//echo "<pre>";print_r($data[0]);
	$body_bk_color = (!empty($wcheader_item[0]->body_bg)) ? $wcheader_item[0]->body_bg : '#000';
	$body_link_color = (!empty($wcheader_item[0]->body_link_color)) ? $wcheader_item[0]->body_link_color : '#000';
	$body_step_checkout = (!empty($wcheader_item[0]->body_step_checkout)) ? $wcheader_item[0]->body_step_checkout : '#0a0ad9';
	$body_step_text_checkout = get_option('wcplus_body_step_text_checkout');
?>
	<div class="plugin-inner-content wcplus-brand-body">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Body Colors</h3>
					<p>Set the colors for the checkout pages body here, this is where the main checkout form will sit.</p>
					<div class="layout-option">

						<div class="layout-option-row">
							<h4>Body-Background Color</h4>
							<div class="color_choice">
							<input type="color" id="bk_body" name="body_bk_color" value="<?php echo esc_attr($body_bk_color);?>">
							<input type="text" class="color-value" data-id="bk_body" id="bk_body_span" value="<?php echo esc_attr($body_bk_color);?>">
						</div>
						</div>
						<div class="layout-option-row">
							<h4>Body-Text Link Colour</h4>
							<div class="color_choice">
							<input type="color" id="color_body" name="body_link_color" value="<?php echo esc_attr($body_link_color);?>"><input type="text" class="color-value" data-id="color_body" id="color_body_span" value="<?php echo esc_attr($body_link_color);?>">
						</div>
						</div>
						<!-- <input type="text" maxlength="6" size="6" id="colorSelector" value="00ff00" /> -->
						<div class="layout-option-row">
							<h4>Body-Next Step/Checkout Button Colour</h4>
							<div class="color_choice">
								
							<input type="color" id="checkoutbtn_body" name="body_step_checkout" value="<?php echo esc_attr($body_step_checkout);?>"><input type="text" data-id="checkoutbtn_body" class="color-value" id="checkoutbtn_body_span" value="<?php echo esc_attr($body_step_checkout);?>">
						</div>
						</div>

						<div class="layout-option-row">
							<h4>Body-Next Step/Checkout Button Text Colour</h4>
							<div class="color_choice">
								
							<input type="color" id="checkoutbtntext_body" name="body_step_text_checkout" value="<?php echo esc_attr($body_step_text_checkout);?>"><input type="text" data-id="checkoutbtntext_body" class="color-value" id="checkoutbtntext_body_span" value="<?php echo esc_attr($body_step_text_checkout);?>">
						</div>
						</div>
						
					</div>
					<div class="update-setting">
						<button class="update_btn" id="body_update">Update Settings</button> This will update all settings
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
<?php 
	$promo_bg = (!empty($wcheader_item[0]->promo_bg)) ? $wcheader_item[0]->promo_bg : '#ffffff';
	$promo_color = (!empty($wcheader_item[0]->promo_color)) ? $wcheader_item[0]->promo_color : '#000';
	$promo_text = (!empty($wcheader_item[0]->promo_text)) ? $wcheader_item[0]->promo_text : '';
	
 	
 	//echo "<pre>";print_r($active_template[0]->active_tem);die;
 	if($active_template[0]->active_tem == 1){
 		$enablepromocode = get_option('pluswc_enable_promocode_option');
 		$enable_promocode = ($enablepromocode == 1) ? "checked" : "";
?>
	<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Promo Header <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></p>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
<?php } 

	$wcplus_banner = get_wcplus_banner_base();
	$banner_bg = (!empty($wcplus_banner[0]->banner_bg)) ? $wcplus_banner[0]->banner_bg : '#646464';
	$banner_color = (!empty($wcplus_banner[0]->banner_color)) ? $wcplus_banner[0]->banner_color : '#ffffff';

$footerdata = get_footer_data_base();
$footer_link_privacy = ($footerdata[0]->footer_left_link != '#') ? $footerdata[0]->footer_left_link : '';
$footer_link_term = ($footerdata[0]->footer_left_term != '#') ? $footerdata[0]->footer_left_term : '';

?>

	<div class="plugin-inner-content wcplus-brand-footer">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<form id="footerupdate">
					<h3>Footer Copyright Bar</h3>
					<div class="layout-option">
						<div class="layout-option-row">
							<h4>Footer Left Text</h4>
							<input type="text" name="footer_bar" class="license-class" value="<?php echo esc_attr($footerdata[0]->footer_bar);?>">
						</div>
					</div>
					<div class="layout-option">

						<div class="layout-option-row faq-block">
				
						<button class="wcplusadd_field_button">Add Footer Text & Link</button>
						<div class="input_fields_wrap">
						    
						    <?php 
				if(!empty($footerdata[0]->footer_left_link)){
					$footerleftlink = json_decode( $footerdata[0]->footer_left_link );
					$footerleftterm = json_decode( $footerdata[0]->footer_left_term );
					foreach ($footerleftlink as $key => $value) {
						// if($key == 0){
						// 	echo '<div class="accrodin_css"><div class="accrodin_css_left">Question: <input type="text" name="myquestion[]" value="'.$value.'"></div><div class="accrodin_css_right"> Ans: <input type="text" name="answer[]" value="'.$answers[$key].'"></div></div>';
						// }else{
							echo '<div class="accrodin_css"><div class="accrodin_css_left">Footer Text: <input type="text" name="footer_left_link[]" value="'.esc_attr($value).'"></div><div class="accrodin_css_right"> Footer Link: <input type="text" name="footer_left_term[]" value="'.esc_attr($footerleftterm[$key]).'"></div><a href="#" class="remove_field">Remove</a></div>';
						//}
						
					}
					
				}else{
					echo '<div class="accrodin_css"><div class="accrodin_css_left">Footer Text: <input type="text" name="footer_left_link[]" ></div><div class="accrodin_css_right"> Footer Link: <input type="text" name="footer_left_term[]" ></div><a href="#" class="remove_field">Remove</a></div>';
				}

				?>
						    
						</div>
					<input type="hidden" name="" id="hidden_question">
					<input type="hidden" name="" id="hidden_answer">
					
				</div>
						</div>
					
					<div class="update-setting">
						<button class="update_btn" id="footer_update">Update Settings</button> This will update all settings
					</div>
				</form>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content wcplus-brand-custom">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Custom CSS <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Enter custom CSS here to make custom changes to your checkout page.</p>
					<div class="layout-option">
						<p><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="plugin-footer">
	<div class="wrapper-inner">
		<div class="plugin-footer-inner">
			<p>Copyright <?php echo esc_html(gmdate("Y")); ?> - WC Plus - All Right Reserved | <a href="https://wcplus.co">Main Website</a> | <a href="https://wcplus.co/support/">View Documentation</a></p>
		</div>
	</div>
</div>
<?php } ?>
