<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/header.php';
if (get_option('WCPLUS_license_key_valid') == 'valid'){
function pluswc_active_template(){
	global $wpdb;
 	$table_name = $wpdb->prefix . 'wcplus_template';
 	$get_results = $wpdb->get_results("SELECT * FROM $table_name");
 	return $get_results;
}
$get_active_template = pluswc_active_template();
?>
	<div class="plugin-top-heading">
		<div class="wrapper-inner">
			<div class="plugin-top-heading-inner">
				<h2>Choose from one of our proven high converting layouts!</h2>
				<p>Choose the usecase that matches your exact type of customer.</p>
				<div class="plugin-top-btn">
					<a href="https://wcplus.co/support/" class="with-color">View Documentation</a>
					<a href="https://wcplus.co/" target="_blank" class="">View Plugin Website</a>
				</div>
			</div>
		</div>
	</div>
	<div class="plugin-inner-content">
		<div class="wrapper-inner">
			<div class="choose-layout-row">
				<?php 
					$active_general = ($get_active_template[0]->active_tem == 1) ? 'Activated' : 'Active Layout';
					$active_class_gen = ($get_active_template[0]->active_tem == 1) ? 'activated-class' : 'templates';
					$active_class_one = ($get_active_template[0]->active_tem == 1) ? 'activated-class-all' : '';
				?>
				<div class="choose-layout-col <?php echo esc_html($active_class_one);?>">
					<div class="layout-image">
						<img src="<?php echo esc_url(plugins_url('../img/General_E-Commerce.jpeg',__DIR__));?>">
					</div>
					<div class="layout-content">
						<h3>General Ecommerce</h3>
						<p>The perfect upgrade for any ecommerce store, applying the best UX & CX practises combined with leading ecommerce principles to instantly increase sales & conversion rates.</p>
						<ul>
							<li>Multi-step checkout form</li>
							<li>Prominent safety & Selling points clean & simple layouts</li>
							<li>Proven across 300+ ecommerce websites</li>
						</ul>
					</div>
					<div class="layout-active-btn">
						
						<a id="first_template" class="<?php echo esc_html($active_class_gen);?> with-color" id="general_tem" data-id="1"><?php echo wp_kses_post($active_general);?></a>
						<a href="https://wcplus.co/woocommerce-checkout-layouts/general-ecommerce/" class="">View Examples</a>
					</div>
				</div>
				<?php 
					$active_saas = ($get_active_template[0]->active_tem == 2) ? 'Activated' : 'Active Layout';
					$active_class_saas = ($get_active_template[0]->active_tem == 2) ? 'activated-class' : 'templates';
					$active_class_two = ($get_active_template[0]->active_tem == 2) ? 'activated-class-all' : '';
				?>
				<div class="choose-layout-col <?php echo esc_html($active_class_two);?>">
					<div class="layout-image">
						<img src="<?php echo esc_url(plugins_url('../img/Single_Product_Focus.jpeg',__DIR__));?>">
					</div>
					<div class="layout-content">
						<h3>Single Product Focus</h3>
						<p>The perfect upgrade for any single product focus ecommerce store. Present the single product again with unique selling text and benefits combining the best UX & CX practices to instantly increase sales & conversion rates.</p>
						<ul>
							<li>Keep the focus on the single product</li>
							<li>Prominent safety & Selling points clean & simple layouts</li>
							<li>Benefit from proven UCX best practices</li>
						</ul>
					</div>
					<div class="wc-upgrade-box plugin-top-btn">
						<p>Unlock This Layout</p>
						<a href="https://wcplus.co/" class="with-color" target="_blank">Upgrade Now</a>
					</div>
				</div>
				<?php 
					$active_course = ($get_active_template[0]->active_tem == 3) ? 'Activated' : 'Active Layout';
					$active_class_cous = ($get_active_template[0]->active_tem == 3) ? 'activated-class' : 'templates';
					$active_class_three = ($get_active_template[0]->active_tem == 3) ? 'activated-class-all' : '';
				?>
				<div class="choose-layout-col <?php echo esc_html($active_class_three);?>">
					<div class="layout-image">
						<img src="<?php echo esc_url(plugins_url('../img/Course-SaaS-Membership.jpeg',__DIR__));?>">
					</div>
					<div class="layout-content">
						<h3>SaaS / Course / Membership</h3>
						<p>The perfect upgrade for any SaaS, course, or membership checkout experience. Present your unique key selling points of your product/service and its benefits combining the best UX & CX practices to instantly increase sales & conversion rates.</p>
						<ul>
							<li>Present unique benefits & messaging</li>
							<li>Prominent safety & Selling points clean & simple layouts</li>
							<li>Use social proofing to encourage buyers</li>
						</ul>
					</div>
					
					<div class="wc-upgrade-box plugin-top-btn">
						<p>Unlock This Layout</p>
						<a href="https://wcplus.co/" class="with-color" target="_blank">Upgrade Now</a>
					</div>
				</div>

				<?php 
					$active_course = ($get_active_template[0]->active_tem == 4) ? 'Activated' : 'Active Layout';
					$active_class_cous = ($get_active_template[0]->active_tem == 4) ? 'activated-class' : 'templates';
					$active_class_three = ($get_active_template[0]->active_tem == 4) ? 'activated-class-all' : '';
				?>
				<div class="choose-layout-col <?php echo esc_html($active_class_three);?>">
					<div class="layout-image">
						<img src="<?php echo esc_url(plugins_url('../img/minimalist-template.png',__DIR__));?>">
					</div>
					<div class="layout-content">
						<h3>Minimalist</h3>
						<p>The perfect upgrade for minimalist checkout experience. Present your unique key selling points of your product/service and its benefits combining the best UX & CX practices to instantly increase sales & conversion rates.</p>
						<ul>
							<li>Present unique benefits & messaging</li>
							<li>Prominent safety & Selling points clean & simple layouts</li>
							<li>Use social proofing to encourage buyers</li>
						</ul>
					</div>
					
					<div class="wc-upgrade-box plugin-top-btn">
						<p>Unlock This Layout</p>
						<a href="https://wcplus.co/" class="with-color" target="_blank">Upgrade Now</a>
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