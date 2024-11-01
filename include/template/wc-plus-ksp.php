<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if (get_option('WCPLUS_license_key_valid') == 'valid'){
$wcplus_enablebox = get_wcplus_enablebox_base();
?>

	<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Instantly impress & validate customer concerns with unique KSP's!</h2>
				<p>Set key selling points & other conversion elements (e.g. safe checkout, etc) to help gain your customers trust and increase your sales & conversions.</p>
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
				<li class="list-item" id="wcplus-brand-body">Body</li>
				<li class="list-item" id="wcplus-brand-sidebar">Sidebar</li>
			</ul>
		</div>
	</div>
	<div class="tab-list-content">
<?php 
$freeshipping_icon_text = (!empty($data[0]->freeshipping_icon_text)) ? $data[0]->freeshipping_icon_text : 'Free Shipping';
$easy_returns = (!empty($data[0]->easy_returns)) ? $data[0]->easy_returns : 'Easy Returns';
$safe_checkout = (!empty($data[0]->safe_checkout)) ? $data[0]->safe_checkout : 'Safe Checkout Guaranteed';

$icon_shipping_i = (!empty($data[0]->icon_shipping)) ? $data[0]->icon_shipping : 'bi bi-shield-fill';
$icon_easy_i = (!empty($data[0]->icon_easy)) ? $data[0]->icon_easy : 'bi bi-shield-fill';
$icon_safe_i = (!empty($data[0]->icon_safe)) ? $data[0]->icon_safe : 'bi bi-shield-fill';
?>
	<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Header Key Selling Points <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Set your checkout pages header key selling points here! These will be the 3 most important and prominent reasons why to buy from you.</p>
					<p>Examples include safe & secure checkout, free delivery, 30 day guarantee</p>
					<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>
<?php
$Payment_text = (!empty($data[0]->Payment_text)) ? $data[0]->Payment_text : 'safe checkout guaranteed'; 
$icon_payment_i = (!empty($data[0]->icon_payment)) ? $data[0]->icon_payment : 'bi bi-shield-check';

$enablepaymentpoint = ($wcplus_enablebox[0]->enable_paymentsellpoint != 0) ? "checked" : "";

$Payment_text_1 = (!empty($data[0]->Payment_text_1)) ? $data[0]->Payment_text_1 : 'bi bi-credit-card';
$Payment_text_2 = (!empty($data[0]->Payment_text_2)) ? $data[0]->Payment_text_2 : 'Powered By';

//echo "<pre>";print_r($active_template);die;

?>


	<div class="plugin-inner-content wcplus-brand-body">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Payment Step Key Selling Points <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Emphasize the safety of your online store with payment key selling points here! These will be the 2 most important and prominent reasons why it's safe to checkout with you.</p>
					<p>Examples include secure ssl encryption, privacy protected, guaranteed safe checkout</p>
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
<?php
$sidebar_text_one = (!empty($data[0]->sidebar_text_one)) ? $data[0]->sidebar_text_one : 'Icon & Text Box'; 
$sidebar_icon_one = (!empty($data[0]->sidebar_icon_one)) ? $data[0]->sidebar_icon_one : 'bi bi-shield-fill';
$sidebar_text_two = (!empty($data[0]->sidebar_text_two)) ? $data[0]->sidebar_text_two : 'Icon & Text Box'; 
$sidebar_icon_two = (!empty($data[0]->sidebar_icon_two)) ? $data[0]->sidebar_icon_two : 'bi bi-shield-fill';

$enablesidebarsellpoint = ($wcplus_enablebox[0]->enablesidebarsellpoint != 0) ? "checked" : "";
?>
	<div class="plugin-inner-content wcplus-brand-sidebar">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Sidebar Key Selling Points <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Emphasize other important aspects of your online store with key selling points in your sidebar here! These will be 2 additional important and prominent reasons why someone should checkout with you.</p>
					<p>Examples include free shipping, 30 day back money guarantee, 24/7 support</p>
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

	<div class="plugin-inner-content wcplus-brand-sidebar">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box faq-full-width">
					<form id="get_faqs">
					<h3>FAQ’s <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Reduce customer queries and concerns by answering frequently asked questions at checkout, ensuring they feel safe and satisfied with their purchase and don't need to go back to your website to find out more.</p>
					<p>Examples include shipping tracking, refund policy, after sales support, etc</p>
					<div class="layout-option">
						<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
						</div>	
					</form>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>


	<div class="plugin-inner-content wcplus-brand-sidebar">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box faq-full-width">	
				<h3>Custom Sidebar Content <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
				<p>Add custom text, images to the sidebar of your checkout page</p>
				<div class="layout-option">
					<p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
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
