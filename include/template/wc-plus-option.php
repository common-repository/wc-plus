<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';?>

<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Customize your checkout experience with your own code & advanced options!</h2>
				<p>Different colours, styling, custom functions? Add it all here.</p>
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
				<li class="list-item active" id="wcplus-brand-header">Optional</li>
				<li class="list-item" id="wcplus-brand-custom">Custom</li>
			</ul>
		</div>
	</div>
<div class="tab-list-content">

<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box add_preminmu_width">
					<h3>Enable Address Autocomplete (Google Places API) <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Add address autocomplete to your Billing & Shipping address fields making it faster for customers to complete your checkout. Don’t have a key? Signup here <a href="https://developers.google.com/maps/documentation/javascript/place-autocomplete" target="_blank">https://developers.google.com/maps/documentation/javascript/place-autocomplete</a></p>
						
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
<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box add_preminmu_width">
					<h3>Enable Address Autocomplete (Geoapify) <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<p>Add address autocomplete to your Billing & Shipping address fields making it faster for customers to complete your checkout. Don’t have a key? Signup here <a href="https://www.geoapify.com/pricing" target="_blank">https://www.geoapify.com/pricing</a></p>
						
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

<div class="plugin-inner-content wcplus-brand-header">
    <div class="wrapper-inner">
      <div class="plugin-row">
        <div class="plugin-row-box left-box add_preminmu_width">
          <h3>Enable You're Saving Box On Cart & Checkout <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
          <p>This will display a summary of total savings the customer will be making on discounted products.</p>
          
          <?php 
          $wcplus_on_off_saving = get_option('wcplus_on_off_saving');
          
          $on_off_saving = ($wcplus_on_off_saving != 0) ? "checked" : "";
          ?>
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

<div class="plugin-inner-content wcplus-brand-header">
    <div class="wrapper-inner">
      <div class="plugin-row">
        <div class="plugin-row-box left-box">
          <h3>Disable Shipping Section <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
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

<div class="plugin-inner-content wcplus-brand-header">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Disable Address Fields <a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
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



<div class="plugin-inner-content wcplus-brand-custom">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Custom Header Code<a href="https://wcplus.co/pricing/" class="wcplus-free-setting-premium-tag" target="_blank"><?php echo esc_html(WC_PLUS_FREE_PREMIUM_TAG);?></a></h3>
					<?php $head_line = "Add custom code here that will be placed in the &#60;head&#62; of the checkout page.";?>
					<p><?php echo esc_html($head_line);?></p>
						<p>Examples include Google Analytics, GTM, heatmaping, etc</p>
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

<div class="plugin-inner-content wcplus-brand-custom">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>Custom PHP Code</h3>
					<p>Want to make some serious modifications? Add custom PHP code here and see it in action.</p>
					<p>Please be careful, invalid code may cause the checkout to break - support is not provided for custom PHP code.</p>
					<div class="layout-option">
						<?php 
					    if(!empty($wcheader_item[0]->custom_php_code) && $wcheader_item[0]->custom_php_code != 1){
						    	echo '<textarea name="php_data" style="height: 25em;width: 100%;">'.esc_html($wcheader_item[0]->custom_php_code).'</textarea>';
					    }else{
					    	echo '<textarea name="php_data" style="height: 25em;width: 100%;"></textarea>';
					    }

					    ?>
						
					</div>
					<div class="update-setting">
						<button class="update_btn" id="body_custom_php">Update Settings</button> This will update all settings
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
