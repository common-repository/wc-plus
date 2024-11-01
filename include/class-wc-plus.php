<?php
class Pluswc_main_base {

	protected $loader;

	protected $Pluswc_main_base;

	protected $version;

	public function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->Pluswc_main_base = 'wc-plus';

		 $this->get_start_base();

	}

	private function get_start_base() {

		 require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/class-wc-plus-loader.php';

		 $this->loader = new Pluswc_Loader_Base();

	}

	public function wc_plus_start_base() {

		$this->loader->wc_plus_start_base();

	}

	public function wc_plus_layout_base() {

		$this->loader->wc_plus_layout_base();

	}

	public function wc_plus_brand_base() {

		$this->loader->wc_plus_brand_base();
		
	}

	public function wc_plus_ksp_base() {

		$this->loader->wc_plus_ksp_base();
		
	}

	public function wc_plus_option_base() {

		$this->loader->wc_plus_option_base();
		
	}

	public function wc_plus_cart_base() {

		$this->loader->wc_plus_cart_base();
		
	}

	public function wc_plus_order_bumps_base() {

		$this->loader->wc_plus_order_bumps_base();
		
	}

	public function wc_plus_post_purchase_upsell_base() {

		$this->loader->wc_plus_post_purchase_upsell_base();
		
	}

	public function wc_plus_my_account_base() {

		$this->loader->wc_plus_my_account_base();
		
	}

	public function wc_plus_cart_base_goal_base() {

		$this->loader->wc_plus_cart_base_goal_base();
		
	}
	

}