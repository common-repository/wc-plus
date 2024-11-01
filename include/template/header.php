<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<link href="<?php echo esc_url(plugins_url('../css/bootstrapicons-iconpicker.css',__DIR__));?>" rel="stylesheet">
<div class="preloader_back" style="display: none;">
	<div class="preloader_inner">
		<div id="preloader" class="preloader_inner_col">
	</div>
	</div>
</div>
<div class="plugin-header">
		<div class="wrapper-inner">
			<div class="plugin-header-inner">
				<img src="<?php echo esc_url(plugins_url('../img/wcplus-logo-white-2023_(1).svg',__DIR__));?>" class="plugin-logo">
				<img src="<?php echo esc_url(plugins_url('../img/arrow-img.png',__DIR__));?>" class="plugin-icon-arrow">
				<?php
				if(sanitize_text_field($_GET['page']) == 'set-brands-color'){
					echo '<span class="breadcrumb-cls">Branding & Colors</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'get-started') {
					echo '<span class="breadcrumb-cls">Get Started</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'set-layouts') {
					echo '<span class="breadcrumb-cls">Layouts</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'set-options') {
					echo '<span class="breadcrumb-cls">Options</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'set-ksp') {
					echo '<span class="breadcrumb-cls">KSP’s</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'wc-plus-cart') {
					echo '<span class="breadcrumb-cls">Cart</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'wcplus-order-bumps') {
					echo '<span class="breadcrumb-cls">Order Bumps</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'wcplus-post-purchase-upsell') {
					echo '<span class="breadcrumb-cls">Post Purchase Upsells</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'wcplus-my-account') {
					echo '<span class="breadcrumb-cls">My Account</span>';
				}elseif (sanitize_text_field($_GET['page']) == 'wcplus-cart-goal') {
					echo '<span class="breadcrumb-cls">Cart Goals</span>';
				}

				?>
				
			</div>
			<div id="wcplus-free-notice-bar" class="wcplus-free-container plugin-top-btn">
			    <span class="wcplus-free-notice-bar-message">
			        Unlock all features including cart, order bumps and more! <div class="plugin-top-btn"><a href="https://wcplus.co/pricing/" class="with-color" target="_blank">Upgrade Now</a></div></span>
			</div>

		</div>
	</div>
<div class="cart_popup" onclick="togglePopup()">
	<div class="cart_popup-inner">
		<div class="cart_popup-inner-content">
		    <div onclick="togglePopup()" class="close-btn">
		        ×
		    </div>
		    <div id="cart_msg">
		        Setting has been updated.
		    </div>
		</div>
	</div>
</div>
<?php 

$data = get_data_base();
//echo "<pre>";print_r($data);die;
$wcheader_item = get_header_item_base();
?>
