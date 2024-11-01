<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if (get_option('WCPLUS_license_key_valid') == 'valid'){
	
?>
<div class="plugin-top-heading">
	<div class="wrapper-inner">
		<div class="plugin-top-heading-inner">
			<h2>Set the Post Purchase Upsells!</h2>
			<!-- <p>Put your brand's best foot forward when it matters most, when collecting payment &#128521;</p> -->
			<div class="plugin-top-btn">
				<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
				<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
			</div>
		</div>
	</div>
</div>
<?php
if(!isset($_GET['editorderbumps'])){
?>
<div class="tab-list-section offer-list-section">
		<div class="wrapper-inner">
			<ul>
				<li class="list-item active" id="wcplus-offer-list">Post Purchase Upsells</li>
				<!-- <li class="list-item " id="wcplus-offter-timer">Timer</li> -->
				<li class="list-item" id="wcplus-page-styling">Page Styling</li>
			</ul>
		</div>
	</div>
	<?php 
}
	?>
<div class="tab-list-content offer-list-content">
	
	<div class="plugin-inner-content wcplus-offer-list active">
		<div class="wrapper-inner">
			<div class="wcPlus_offer-block">
				<div class="offer-list">
					<h3>Post Purchase Upsells <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	$orderbump_headerbg_bk = get_option('wcplus_postupsell_headerbg_bk');
	$orderbump_headertext_color = get_option('wcplus_postupsell_headertext_color');
	$orderbump_bumpbg_color = get_option('wcplus_postupsell_bumpbg_color');
	$orderbump_bumptext_colo = get_option('wcplus_postupsell_bumptext_color');
	?>
	<div class="plugin-inner-content wcplus-page-styling">
		<div class="wrapper-inner">
			<div class="wcPlus_offer-block">
				<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Post Purchase Upsell Colors <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Set the colors for the post purchase upsell here.</p>
					<div class="layout-option">
						<div class="layout-option-row">
							<h4>Header - Background Color</h4>
							<div class="color_choice">
								<span><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Header - Text Color</h4>
							<div class="color_choice">
								<span><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Button Color</h4>
							<div class="color_choice">
								<span><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></span>
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Text Color</h4>
							<div class="color_choice">
								<span><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></span>
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