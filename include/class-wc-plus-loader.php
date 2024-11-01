<?php

class Pluswc_Loader_Base {

	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	public function wc_plus_start_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-start.php';

	}
	public function wc_plus_layout_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-layout.php';

	}

	public function wc_plus_brand_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-brand.php';

	}

	public function wc_plus_ksp_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-ksp.php';

	}

	public function wc_plus_option_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-option.php';

	}

	public function wc_plus_cart_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-cart.php';

	}

	public function wc_plus_order_bumps_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-order-bumps.php';

	}

	public function wc_plus_post_purchase_upsell_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-post-purchase-upsell.php';

	}

	public function wc_plus_my_account_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-my-account.php';

	}

	public function wc_plus_cart_base_goal_base() {

		require_once PLUSWC_CWOO_PATH_BASE_VERSION . '/include/template/wc-plus-cart-goal.php';

	}

}