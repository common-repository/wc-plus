<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if (get_option('WCPLUS_license_key_valid') == 'valid'){
	//$wcplus_enablebox = get_wcplus_enablebox_base();
	?>

	<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Set the My Account Page!</h2>
				<p>Enable and style your My Account page(s) of your website to use the WC Plus styling.</p>
				<div class="plugin-top-btn">
					<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
					<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
				</div>
			</div>
		</div>
	</div>
<div class="tab-list-content">
	<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Enable My Account Page <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>This will apply your chosen layout and set branding/styling from your checkout page, but without the sidebar or promotional bar (if its enabled).</p>
					<div class="layout-option">
						<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="tab-list-content">
	<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Set My Account Headings <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Need to refer to your my account area as something else? Maybe Dashboard, course, etc? Set and control it here.</p>
					<div class="layout-option-row">
						<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="tab-list-content">
	<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Set Shop Button Text and Link <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Not using WooCommerce for an online store? Set and control how this return link is displayed here.</p>
					<div class="layout-option-row">
					<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>
