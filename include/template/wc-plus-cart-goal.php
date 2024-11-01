<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if(get_option('WCPLUS_license_key_valid') == 'valid'){
	
?>

	<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Set the Cart Goals!</h2>
				<p>Give your customers a visual tracking guide for your automated free shipping or discount coupons. Either display a coupon code once a cart goal is achieved or use an auto-apply coupon 3rd party plugin that will automatically apply the coupon to the active order.</p>
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
<div class="tab-list-section offer-list-section">
		<div class="wrapper-inner">
			<ul>
				<li class="list-item active" id="wcplus-offer-list">Cart Goals</li>
				<!-- <li class="list-item " id="wcplus-offter-detail">Offer Detail</li> -->
				<li class="list-item" id="wcplus-page-styling">Page Styling</li>
			</ul>
		</div>
	</div>

<div class="tab-list-content offer-list-content">
	
	<div class="plugin-inner-content wcplus-offer-list active">
		<div class="wrapper-inner">
			<div class="wcPlus_offer-block">
				<div class="offer-list">
					<h3>Post Purchase Upsells <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></p>
				</div>
			</div>
		</div>
	</div>

	<?php
	$cartgoal_headerbg_bk = get_option('wcplus_cartgoal_bg_bk');
	$cartgoal_achievedbg_bk = get_option('wcplus_achievedbg_bg_bk');
	$cartgoal_headertext_color = get_option('wcplus_cartgoal_text_color');
	$cartgoal_bumpbg_color = get_option('wcplus_cartgoal_loading_color');
	?>
	<div class="plugin-inner-content wcplus-page-styling">
		<div class="wrapper-inner">
			<div class="wcPlus_offer-block">
				<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Cart Goals Colors <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo wp_kses_post(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Set the colors for the cart goals here.</p>
					<div class="layout-option">
						<div class="layout-option-row">
							<h4>Background Color</h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Achieved Cart Goal Background Color</h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Text Color</h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Loading Bar Color</h4>
							<div class="color_choice">
								<span><?php echo wp_kses_post(WC_PLUS_FREE_VERSION_TEXT);?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
			</div>
		</div>
	</div>

	</div>

<?php } ?>
