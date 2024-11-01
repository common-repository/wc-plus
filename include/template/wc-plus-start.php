<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';?>
	<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Instantly upgrade your WooCommerce website today!</h2>
				<p>Increase sales & conversions through proven user & customer experiences.</p>
				<div class="plugin-top-btn">
					<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
					<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
				</div>
			</div>
		</div>
	</div>
	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#1 Activate Your License Key</h3>
					<p>An active license is required to use this plugin and provides on-going updates, and all new upgrades as they are released.</p>
					<input type="text" id="head_bkd" class="license-class" name="licensekey" placeholder="Enter license key here" value="<?php echo esc_html(get_option('WCPLUS_license_key'));?>">
					<?php
					if (get_option('WCPLUS_license_key_valid') == 'invalid'){
						echo '<span id="error_key">Your license has expired, please visit <a href="https://wcplus.co/" target="_blank">wcplus.co</a> to renew your license.</span>';
					}
					?>
					<span id="error_key"></span>
					<span id="success_key"></span>
					<div class="update-setting">
						<?php
						if (get_option('WCPLUS_license_key_valid') == 'invalid'){ ?>
						<button class="update_btn activate-license-btn">Activate Key</button>
					<?php } else{ ?>
						<button class="update_btn activated_license_key">Activated</button>
					<?php } ?>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#2 Set Layout</h3>
					<p>Choose from one of our pre-defined layouts, each layout is purpose built from the ground up on your exact type of use case for your WooCommerce website.</p>
					<div class="update-setting set-btn">
						<a href="https://wcplus.co/support/choosing-a-layout/" target="_blank" class="update_btn transprent_btn">Set Layout</a><a href="https://wcplus.co/support/choosing-a-layout/" target="_blank"><img src="<?php echo esc_url(plugins_url('../img/icon_next.png',__DIR__));?>"></a>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#3 Set Branding & Colors</h3>
					<p>Set the colours & logo to match the rest of your website's branding choosing key colours for each area of the checkout layout & design.</p>
					<div class="update-setting set-btn">
						<a href="https://wcplus.co/support/setting-your-brand-colors/" target="_blank" class="update_btn transprent_btn">Set Branding</a><a href="https://wcplus.co/support/setting-your-brand-colors/" target="_blank"><img src="<?php echo esc_url(plugins_url('../img/icon_next.png',__DIR__));?>"></a>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#4 Set Key Selling Points & Conversion Elements</h3>
					<p>Set the key selling points & other conversion elements in your checkout page: eg safe & secure checkout, free delivery.</p>
					<div class="update-setting set-btn">
						<a href="https://wcplus.co/support/setting-your-key-selling-points/" target="_blank" class="update_btn transprent_btn">Set KSP's</a><a href="https://wcplus.co/support/setting-your-key-selling-points/" target="_blank"><img src="<?php echo esc_url(plugins_url('../img/icon_next.png',__DIR__));?>"></a>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#5 Set Additional Options/Extras</h3>
					<p>We're constantly adding new features to the plugin, including popup/sidebar carts, and more! Choose which features you wish to use here.</p>
					<div class="update-setting set-btn">
						<a href="https://wcplus.co/support/enabling-additional-options/" target="_blank" class="update_btn transprent_btn">Set Options</a><a href="https://wcplus.co/support/enabling-additional-options/" target="_blank"><img src="<?php echo esc_url(plugins_url('../img/icon_next.png',__DIR__));?>"></a>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="plugin-row">
				<div class="plugin-row-box left-box">
					<h3>#6 Set WC Plus Live, Enable New Features</h3>
					<p>Set the key selling points & other conversion elements in your checkout page, a safe & secure checkout, free delivery. guantees, etc.</p>
					<div class="update-setting set-btn">
						<a href="https://wcplus.co/support/enabling-additional-options/" target="_blank" class="update_btn transprent_btn">Set Live</a><a href="https://wcplus.co/support/enabling-additional-options/" target="_blank"><img src="<?php echo esc_url(plugins_url('../img/icon_next.png',__DIR__));?>"></a>
					</div>
				</div>
				<div class="plugin-row-box right-box">
					<div class="blank-box"></div>
				</div>
			</div>
		</div>
	</div>