<?php
/**
 * Base controller
 */
class Pluswc_Base
{
    //public static $report_menu;

	public static function wcplusactivate()
	    {//die("dsdsdsd");
	    	global $wpdb;
			global $pluswc_db_version;

			$table_name = $wpdb->prefix . 'wcplaus_checkout';
			$header_item = $wpdb->prefix . 'wcplaus_checkout_header';
			$template_wc = $wpdb->prefix . 'wcplus_template';
			$google_mapkey = $wpdb->prefix . 'wcplus_mapkey';
			$wcplus_footer = $wpdb->prefix . 'wcplus_footer';
			$wcplus_banner = $wpdb->prefix . 'wcplus_banner';
			$wcplus_checkout_fields = $wpdb->prefix . 'wcplus_checkout_fields';
			$wcplus_reviews = $wpdb->prefix . 'wcplus_reviews';
			$wcplus_items_focus = $wpdb->prefix . 'wcplus_items_focus';
			$wcplus_cart = $wpdb->prefix . 'wcplus_cart';
			$wcplus_enablebox = $wpdb->prefix . 'wcplus_enablebox';
			
			$charset_collate = $wpdb->get_charset_collate();

			$headersql = "CREATE TABLE $header_item (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				name tinytext NOT NULL,
				texte longtext NOT NULL,
				body_bg varchar(255) DEFAULT '' NOT NULL,
				body_link_color varchar(255) DEFAULT '' NOT NULL,
				body_step_checkout varchar(255) DEFAULT '' NOT NULL,
				header_bg varchar(255) DEFAULT '' NOT NULL,
				header_color varchar(255) DEFAULT '' NOT NULL,
				bk_mobile varchar(255) DEFAULT '' NOT NULL,
				sidebar_bordercolor varchar(255) DEFAULT '' NOT NULL,
				header_color_link varchar(255) DEFAULT '' NOT NULL,
				custom_header longtext NOT NULL,
				custom_php_code longtext NOT NULL,
				promo_bg varchar(255) DEFAULT '' NOT NULL,
				promo_color varchar(255) DEFAULT '' NOT NULL,
				promo_text longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				footer_bg varchar(255) DEFAULT '' NOT NULL,
				footer_color varchar(255) DEFAULT '' NOT NULL,
				footer_link_color varchar(255) DEFAULT '' NOT NULL,
				sidebar_heading_color varchar(255) DEFAULT '' NOT NULL,
				sidebar_background varchar(255) DEFAULT '' NOT NULL,
				sidebar_textcolor varchar(255) DEFAULT '' NOT NULL,
				sidebar_text_one varchar(255) DEFAULT '' NOT NULL,
				sidebar_icon_one varchar(255) DEFAULT '' NOT NULL,
				sidebar_text_two varchar(255) DEFAULT '' NOT NULL,
				sidebar_icon_two varchar(255) DEFAULT '' NOT NULL,
				freeshipping_icon_text varchar(255) DEFAULT '' NOT NULL,
				easy_returns varchar(255) DEFAULT '' NOT NULL,
				safe_checkout varchar(255) DEFAULT '' NOT NULL,
				Payment_text longtext NOT NULL,
				Payment_text_1 longtext NOT NULL,
				Payment_text_2 longtext NOT NULL,
				icon_shipping varchar(255) DEFAULT '' NOT NULL,
				icon_easy varchar(255) DEFAULT '' NOT NULL,
				icon_safe varchar(255) DEFAULT '' NOT NULL,
				icon_payment varchar(255) DEFAULT '' NOT NULL,
				faqquestion longtext NOT NULL,
				faqanswer longtext NOT NULL,
				favicoon_icon varchar(255) DEFAULT '' NOT NULL,
				url varchar(255) DEFAULT '' NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$sqlwc = "CREATE TABLE $template_wc (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				active_tem longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$sql_mapkey = "CREATE TABLE $google_mapkey (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				map_key_one longtext NOT NULL,
				map_key_two longtext NOT NULL,
				active_key_one int(11) NOT NULL,
				active_key_two int(11) NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcplusfooter = "CREATE TABLE $wcplus_footer (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				footer_bar longtext NOT NULL,
				footer_left_link longtext NOT NULL,
				footer_left_term longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcplusreviews = "CREATE TABLE $wcplus_reviews (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				review_starcolor varchar(255) DEFAULT '' NOT NULL,
				review_heading longtext NOT NULL,
				review_content longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcpluscheckout = "CREATE TABLE $wcplus_checkout_fields (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				enable_address int(11) NOT NULL,
				enable_address_two int(11) NOT NULL,
				enable_state int(11) NOT NULL,
				enable_zipcode int(11) NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcplusbanner = "CREATE TABLE $wcplus_banner (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				banner_bg longtext NOT NULL,
				banner_color longtext NOT NULL,
				banner_image longtext NOT NULL,
				saas_icon_left longtext NOT NULL,
				saas_text_left longtext NOT NULL,
				saas_icon_middle longtext NOT NULL,
				saas_text_middle longtext NOT NULL,
				saas_icon_right longtext NOT NULL,
				saas_text_right longtext NOT NULL,
				banner_header longtext NOT NULL,
				banner_description longtext NOT NULL,
				check_banner longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcplusitemsfocus = "CREATE TABLE $wcplus_items_focus (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				heading_1 longtext NOT NULL,
				headig_items longtext NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcpluscart = "CREATE TABLE $wcplus_cart (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				cart_color longtext NOT NULL,
				cart_heading longtext NOT NULL,
				cart_icon longtext NOT NULL,
				cart_icon_enable_popup varchar(255) DEFAULT '1' NOT NULL,
				cart_icon_enable_sidebar varchar(255) DEFAULT '0' NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			$wcplusenablebox = "CREATE TABLE $wcplus_enablebox (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
				enable_memberbanner int(11) NOT NULL,
				enable_membersellpoint int(11) NOT NULL,
				enable_paymentsellpoint int(11) NOT NULL,
				enable_customerreview int(11) NOT NULL,
				enablesidebarsellpoint int(11) NOT NULL,
				enablesinglebanner int(11) NOT NULL,
				enable_faq int(11) NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";

			require_once ABSPATH . 'wp-admin/includes/upgrade.php'; 
			dbDelta( $headersql );
			dbDelta( $sql );
			dbDelta( $sqlwc );
			dbDelta( $sql_mapkey );
			dbDelta( $wcplusfooter );
			dbDelta( $wcplusbanner );
			dbDelta( $wcpluscheckout );
			dbDelta( $wcplusreviews );
			dbDelta( $wcplusitemsfocus );
			dbDelta( $wcpluscart );
			dbDelta( $wcplusenablebox );

			add_option( 'pluswc_db_version', $pluswc_db_version );
	    }


public static function wcplusinstall_data()
	    {
	    	global $wpdb;
	
			$welcome_name = 'Checkout Plugin';
			$welcome_text = '1';
			
			$table_name = $wpdb->prefix . 'wcplaus_checkout';
			$header_item = $wpdb->prefix . 'wcplaus_checkout_header';

			$template_wc = $wpdb->prefix . 'wcplus_template';
			$map_key_wc = $wpdb->prefix . 'wcplus_mapkey';
			$wc_plus_footer = $wpdb->prefix . 'wcplus_footer';
			$wc_plus_banner = $wpdb->prefix . 'wcplus_banner';
			$wcplus_checkoutfields = $wpdb->prefix . 'wcplus_checkout_fields';
			$wcplus_reviews = $wpdb->prefix . 'wcplus_reviews';
			$wcplus_items_focus = $wpdb->prefix . 'wcplus_items_focus';
			$wcplus_cart = $wpdb->prefix . 'wcplus_cart';
			$wcplus_enablebox = $wpdb->prefix . 'wcplus_enablebox';
			
			$wpdb->insert( 
				$table_name, 
				array( 
					'time' => current_time( 'mysql' ), 
					'footer_bg' => '#00000', 
				) 
			);

			$wpdb->insert( 
				$header_item, 
				array( 
					'time' => current_time( 'mysql' ), 
					'name' => $welcome_name, 
					'texte' => $welcome_text, 
				) 
			);

			$wpdb->insert( 
				$template_wc, 
				array( 
					'time' => current_time( 'mysql' ), 
					'active_tem' => 1
				) 
			);

			$wpdb->insert( 
				$map_key_wc, 
				array( 
					'time' => current_time( 'mysql' ), 
					'map_key_one' => 1,
					'map_key_two' => 1,
					'active_key_one' => 0,
					'active_key_two' => 0,
				) 
			);
			$textfooter = "©".gmdate("Y").' Company Name | All Rights Reserved';
			$wpdb->insert( 
				$wc_plus_footer, 
				array( 
					'time' => current_time( 'mysql' ), 
					'footer_bar' => $textfooter,
					'footer_left_link' => '#',
					'footer_left_term' => '#',
				) 
			);

			$wpdb->insert( 
				$wcplus_reviews, 
				array( 
					'time' => current_time( 'mysql' ), 
					'review_heading' => 1, 
					'review_content' => 1, 
				) 
			);

			$wpdb->insert( 
				$wc_plus_banner, 
				array( 
					'time' => current_time( 'mysql' ), 
					'banner_bg' => '#646464',
					'banner_color' => '#ffffff',
				) 
			);

			$wpdb->insert( 
				$wcplus_checkoutfields, 
				array( 
					'time' => current_time( 'mysql' ), 
					'enable_address' => 0,
					'enable_address_two' => 0,
					'enable_state' => 0,
					'enable_zipcode' => 0,
				) 
			);

			$wpdb->insert( 
				$wcplus_items_focus, 
				array( 
					'time' => current_time( 'mysql' ), 
					'heading_1' => 'Test Product',
					'headig_items' => 'Item 1',
				) 
			);
			$wpdb->insert( 
				$wcplus_cart, 
				array( 
					'time' => current_time( 'mysql' ), 
					'cart_color' => '#000000',
					'cart_heading' => 'GUARANTEED SAFE & SECURE CHECKOUT',
					'cart_icon' => 'bi bi-align-center',
				) 
			);
			$wpdb->insert( 
				$wcplus_enablebox, 
				array( 
					'time' => current_time( 'mysql' ), 
					'enable_memberbanner' => 0,
					'enable_membersellpoint' => 0,
					'enable_paymentsellpoint' => 0,
					'enable_customerreview' => 0,
					'enablesidebarsellpoint' => 0,
					'enable_faq' => 0,
				) 
			);

	    }


public static function wcplusdeleteTable()
	    {
	    	global $wpdb;
	        $tableArray = [   
	          $wpdb->prefix . "wcplaus_checkout",
	          $wpdb->prefix . "wcplaus_checkout_header",
	          $wpdb->prefix . "wcplus_template",
	          $wpdb->prefix . "wcplus_mapkey",
	          $wpdb->prefix . "wcplus_footer",
	          $wpdb->prefix . "wcplus_banner",
	          $wpdb->prefix . "wcplus_checkout_fields",
	          $wpdb->prefix . "wcplus_reviews",
	          $wpdb->prefix . "wcplus_items_focus",
	          $wpdb->prefix . "wcplus_cart",
	          $wpdb->prefix . "wcplus_enablebox",
	       ];

	      foreach ($tableArray as $tablename) {
	         $wpdb->query("DROP TABLE IF EXISTS $tablename");
	      }
	    }
	}
?>