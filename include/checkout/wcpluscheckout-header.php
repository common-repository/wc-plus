<?php 
if ( ! defined( 'ABSPATH' ) ) exit; 
//function custom_content_after_body_open_tag() {

	$get_results = wcpluscustom_query_base();
	$wc_headers = wcplusheader_item_base();
 	//echo "<pre>";print_r($get_results);die;
 	if(!empty($get_results[0]->url)){
 		$logos = '<img src="'.$get_results[0]->url.'">';
 	}else{
 		$logos = "<img src=".plugins_url('../img/logo.png',__DIR__).">";
 	}
//echo "uuewe";
 	if(!empty($wc_headers[0]->header_bg)){
		$header_bg = 'style="background: '.$wc_headers[0]->header_bg.';"';
	}else{
		$header_bg = '';
	}
//echo "yeyre";
	if(!empty($wc_headers[0]->header_color)){
		$header_color = 'style="color: '.$wc_headers[0]->header_color.';"';
	}else{
		$header_color = '';
	}
//echo "fsdfsd";
	if(!empty($wc_headers[0]->header_color_link)){
		$header_color_link = 'style="color: '.$wc_headers[0]->header_color_link.';"';
	}else{
		$header_color_link = '';
	}	
	$wcplus_home = home_url();

    ?>

<div class="header-cls desktop-header myaccountcheckout" <?php echo wp_kses_post($header_bg);?>>
	<div class="wrapper wcpluswrapper">
		<div class="header-cls-inner">
			<div class="header-logo">
				<a href="<?php echo esc_url($wcplus_home);?>">
				<?php echo wp_kses_post($logos);?>
				</a>
				<!-- <div class="icon-with-text">
					<i class="bi bi-truck" style="font-size: 40px;"></i>
					<span>Easy <br>Returns</span>
				</div> -->
			</div>
		</div>
	</div>
</div>
<div class="header-cls mobile-header myaccountcheckout_mob" <?php echo wp_kses_post($header_bg);?>>
		<div class="header-mobile-row2">
			<div class="wrapper wcpluswrapper">
				<div class="header-mobile-row2-inner">
					<div class="header-mobile-row2-left">
						<div class="header-logo">
							<a href="<?php echo esc_url($wcplus_home);?>">
							<?php echo wp_kses_post($logos);?>
							</a>
							<!-- <div class="icon-with-text">
								<i class="bi bi-truck" style="font-size: 40px;"></i>
								<span>Easy <br>Returns</span>
							</div> -->
						</div>
					</div>
					<?php
					$wcplus_shoptext = get_option('wcplus_shop_text'); 
					$wcplus_shoplink = get_option('wcplus_shop_link');
					$button_text_color = get_option('wcplus_cart_buttontext_color'); 
					$wcplus_shoptextnew = ($wcplus_shoptext) ? $wcplus_shoptext : 'Return to shop';
					$wcplus_shoplinknew = ($wcplus_shoplink) ? $wcplus_shoplink : wc_get_page_permalink('shop');
					?>
					<div class="header-mobile-row2-right">
						<?php //echo do_shortcode('[wc_plus_checkout_cart]');?>
						<a class="" href="<?php echo esc_url($wcplus_shoplinknew);?>" style="color:<?php echo wp_kses_post($button_text_color);?> !important;"><?php echo wp_kses_post($wcplus_shoptextnew);?></a>
					</div>
				</div>
			</div>
		</div>
</div>