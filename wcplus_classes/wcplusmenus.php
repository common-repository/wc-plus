<?php
/**
 * Menu controller
 */
class Pluswc_Menus_Base
{
    //public static $report_menu;

	public function wcplusAddMenus()
   		{
	    	add_menu_page("My Menu", "WC Plus", -1, "get-started-menu", "clivern_render_plugin_page_base", plugins_url('/img/icon_menu.svg',__DIR__));
	    	add_submenu_page("get-started-menu", "Get Started", "Get Started", 0, "get-started", "clivern_render_plugin_page_base");
		    add_submenu_page("get-started-menu", "Layouts", "Layouts", 0, "set-layouts", "clivern_render_setlayout_page_base");
		    add_submenu_page("get-started-menu", "Branding & Colors", "Branding & Colors", 0, "set-brands-color", "clivern_render_setbrand_color_page_base");
		    add_submenu_page("get-started-menu", "KSP's", "KSP's", 0, "set-ksp", "clivern_render_set_ksp_page_base");
		    add_submenu_page("get-started-menu", "Options", "Options", 0, "set-options", "clivern_render_set_option_page_base");
		    add_submenu_page("get-started-menu", "Wc Plus Cart", "Cart", 0, "wc-plus-cart", "clivern_render_set_cart_page_base");
		    add_submenu_page("get-started-menu", "Order Bumps", "Order Bumps", 0, "wcplus-order-bumps", "clivern_render_order_bumps_base");
		    add_submenu_page("get-started-menu", "Post Purchase Upsell", "Post Purchase Upsell", 0, "wcplus-post-purchase-upsell", "clivern_render_post_purchase_upsell_base");
		    add_submenu_page("get-started-menu", "My Account", "My Account", 0, "wcplus-my-account", "clivern_render_my_account_base");
		    add_submenu_page("get-started-menu", "Cart Goals", "Cart Goals", 0, "wcplus-cart-goal", "clivern_render_cart_goal_base");
		}
	}
?>