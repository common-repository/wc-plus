<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';

$wcplus_cart = get_wcplus_cart_base();
//echo "<pre>";print_r($wcplus_cart);
$cart_heading = (!empty($wcplus_cart[0]->cart_heading)) ? $wcplus_cart[0]->cart_heading : 'GUARANTEED SAFE & SECURE CHECKOUT'; 
$cart_icon = (!empty($wcplus_cart[0]->cart_icon)) ? $wcplus_cart[0]->cart_icon : 'bi bi-shield-fill';
?>
<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Instantly impress & validate customer concerns with unique Cart!</h2>
				<p>Set key selling points & other conversion elements (e.g. safe checkout, etc) to help gain your customers trust and increase your sales & conversions.</p>
				<div class="plugin-top-btn">
					<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
					<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
				</div>
			</div>
		</div>
	</div>

	<div class="tab-list-section">
		<div class="wrapper-inner">
			<ul>
				<li class="list-item active" id="wcplus-cart-setting">Cart Settings</li>
				<li class="list-item" id="wcplus-cart-style">Styling</li>
			</ul>
		</div>
	</div>
<div class="tab-list-content">
<div class="plugin-inner-content wcplus-brand-banner wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Cart Key Selling Points <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Set your cart key selling points here! These will be the 3 most important and prominent reasons why to buy from you.</p>
					<p>Examples include safe & secure checkout, free delivery, 30 day guarantee</p>
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

	<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Enable Cart Page <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>This will apply your chosen layout and set branding/styling from your checkout page to your cart page.</p>
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

	<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Enable Cart Popup <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>To enable this cart, please add<b> [wc_plus_cart_base_icon] </b> shortcode as a menu item in your website header.</p>
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

<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Enable Cart Sidebar <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>To enable this cart, please add<b> [wc_plus_cart_base_icon] </b> shortcode as a menu item in your website header.</p>
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
$newbooxadd = ($wcplus_cart[0]->cart_icon_enable_sidebar == 1 || $wcplus_cart[0]->cart_icon_enable_popup == 1) ? "" : "active-upsell-box";
	//if($wcplus_cart[0]->cart_icon_enable_sidebar == 1 || $wcplus_cart[0]->cart_icon_enable_popup == 1){
?>
<div class="plugin-inner-content wcplus-brand-header wcplus-cart-setting wcplus-upsell-box-active <?php echo esc_html($newbooxadd);?>">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Enable Cart Product Upsells <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>When a product is added to cart, or the cart is opened this feature will present products for the customer to add to their cart. There are 4 options available.</p>

					<p class="enablecartupsell">Linked Products > Upsells</p>
					<ul>
						<li>Will be based on Linked Products as per <a href="https://woocommerce.com/document/related-products-up-sells-and-cross-sells/" target="_blank">https://woocommerce.com/document/related-products-up-sells-and-cross-sells/</a>
						</li>
					</ul>

					<p class="enablecartupsell">Linked Products > Cross Sells</p>
					<ul>
						<li>Will be based on Linked Products as per <a href="https://woocommerce.com/document/related-products-up-sells-and-cross-sells/" target="_blank">https://woocommerce.com/document/related-products-up-sells-and-cross-sells/</a>
						</li>
					</ul>

					<p class="enablecartupsell">Specific Product Category</p>
					<ul>
						<li>Will show products from 1 or more specific categories, that are on sale and ordered by last modified
						</li>
					</ul>

					<p class="enablecartupsell">Specific Product Tag</p>
					<ul>
						<li>Will show products from 1 or more specific tags, that are on sale and ordered by last modified</li>
					</ul>

					<p class="enablecartupsell">Same Product Category</p>
					<ul>
						<li>Will show products from the same category of the last product added to cart, that are on sale and ordered by last modified
						</li>
					</ul>
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
$wcplus_option = get_option('wcplus_select_option');
$linked_upsell = ($wcplusoption == 'linked-upsell') ? 'show-upsell' : 'hide-upsell';
$linked_cross = ($wcplusoption == 'linked-cross-sell') ? 'show-upsell' : 'hide-upsell';
$linked_category = ($wcplusoption == 'linked-category') ? 'show-upsell' : 'hide-upsell';
$linked_tags = ($wcplusoption == 'linked-tags') ? 'show-upsell' : 'hide-upsell';
$samecateupsell = ($wcplusoption == 'same-cate-upsell') ? 'show-upsell' : 'hide-upsell';
?>

<div id="linked-category" class="plugin-inner-contents wcplus-brand-header wcplus-cart-setting wcplus-upsell-box-active <?php //esc_html($newbooxadd);?> <?php echo esc_html($linked_category);?>">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Specific Product Category <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Will show products from 1 or more specific categories, that are on sale and ordered by last modified</p>
					
					<?php 
					
					$wcplus_cart_icon_enable_upsell = get_option('wcplus_cart_icon_enable_upsell');
					//$wcplus_product_categories = get_option('wcplus_products_upsell');
					$checkbox_checked = ($wcplus_cart_icon_enable_upsell != 0) ? "checked" : "";

					//$wcplusproductcategories = json_decode( $wcplus_product_categories, true);
					//echo "<pre>";print_r($wcplusproductcategories);
					?>
					<div class="layout-option layout-option-row">
					  <h4>Select Specific Product Categories For Cart Upsells</h4>
					  <p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
</div>

<div id="linked-tags" class="plugin-inner-contents wcplus-brand-header wcplus-cart-setting wcplus-upsell-box-active <?php //esc_html($newbooxadd);?> <?php echo esc_html($linked_tags);?>">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Specific Product Tag <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Will show products from 1 or more specific tags, that are on sale and ordered by last modified</p>
					<div class="layout-option layout-option-row">
					  <h4>Select Specific Product Tags For Cart Upsells</h4>
					  <p><?php echo do_shortcode('[wc_plus_free_version_text]'); ?></p>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
</div>

<?php //} 
$headerbg_background = get_option('wcplus_cart_headerbg_bk');
$header_text_color = get_option('wcplus_cart_headertext_color');
$button_bg_color = get_option('wcplus_cart_buttonbg_color');
$button_text_color = get_option('wcplus_cart_buttontext_color');
$all_text_color = get_option('wcplus_cart_alltext_color');
$all_text_color_save = get_option('wcplus_cart_alltext_color_saving');
$all_text_colour_save_bg = get_option('wcplus_cart_alltext_color_saving_bg');
$all_text_colour = get_option('wcplus_cart_alltext_colour');

?>

<div class="plugin-inner-content wcplus-brand-sidebar wcplus-cart-style">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Cart Sidebar/Popup Colors <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Set the colors for the cart sidebar/popup here.</p>
					<div class="layout-option">
						<div class="layout-option-row">
							<h4>Header - Background Color</h4>
							<div class="color_choice">
								<input type="color" id="headerbg_bk" name="headerbg_background" value="<?php echo esc_html($headerbg_background);?>">
								<input type="text" class="color-value" data-id="headerbg_bk" id="headerbg_bk_span" value="<?php echo esc_html($headerbg_background);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Header - Text Color</h4>
							<div class="color_choice">
								<input type="color" id="headertext_color" name="header_text_color" value="<?php echo esc_html($header_text_color);?>">
								<input type="text" class="color-value" data-id="headertext_color" id="headertext_color_span" value="<?php echo esc_html($header_text_color);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Button - Background Color</h4>
							<div class="color_choice">
								<input type="color" id="buttonbg_color" name="button_bg_color" value="<?php echo esc_html($button_bg_color);?>">
								<input type="text" class="color-value" data-id="buttonbg_color" id="buttonbg_color_span" value="<?php echo esc_html($button_bg_color);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Button - Text Color</h4>
							<div class="color_choice">
								<input type="color" id="buttontext_color" name="button_text_color" value="<?php echo esc_html($button_text_color);?>">
								<input type="text" class="color-value" data-id="buttontext_color" id="buttontext_color_span" value="<?php echo esc_html($button_text_color);?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Text Color</h4>
							<div class="color_choice">
								<input type="color" id="alltext_color" name="all_text_color" value="<?php echo esc_html($all_text_color); ?>">
								<input type="text" class="color-value <?php echo esc_html($all_text_color); ?>" data-id="alltext_color" id="alltext_color_span" value="<?php echo esc_html($all_text_color); ?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Cart Payment Text Color</h4>
							<div class="color_choice">
								<input type="color" id="alltext_colour" name="all_text_colour" value="<?php echo esc_html($all_text_colour); ?>">
								<input type="text" class="color-value <?php echo esc_html($all_text_colour); ?>" data-id="alltext_colour" id="alltext_colour_span" value="<?php echo esc_html($all_text_colour); ?>">
							</div>
						</div>

						<div class="layout-option-row">
							<h4>Saving Box Text Color</h4>
							<div class="color_choice">
								<input type="color" id="alltext_color_saving" name="all_text_color_save" value="<?php echo esc_html($all_text_color_save); ?>">
								<input type="text" class="color-value <?php echo esc_html($all_text_color_save); ?>" data-id="alltext_color_saving" id="alltext_color_saving_span" value="<?php echo esc_html($all_text_color_save); ?>">
							</div>
						</div>
						<div class="layout-option-row">
							<h4>Saving Box Background Color</h4>
							<div class="color_choice">
								<input type="color" id="alltext_colour_savingbg" name="all_text_colour_save_bg" value="<?php echo esc_html($all_text_colour_save_bg); ?>">
								<input type="text" class="color-value <?php echo esc_html($all_text_colour_save_bg); ?>" data-id="alltext_colour_savingbg" id="alltext_colour_savingbg_span" value="<?php echo esc_html($all_text_colour_save_bg); ?>">
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
