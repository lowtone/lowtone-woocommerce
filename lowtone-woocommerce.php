<?php
/*
 * Plugin Name: Lowtone WooCommerce library
 * Plugin URI: http://wordpress.lowtone.nl/lib
 * Description: Lowtone WooCommerce library.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\woocommerce {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	// Init

	Package::init(array(
			Package::INIT_PACKAGES => array("lowtone", "lowtone\\style"),
			Package::INIT_MERGED_PATH => __NAMESPACE__,
			Package::INIT_SUCCESS => function() {
				add_action("woocommerce_init", function() {
					products\Product::__registerPostClass("product", "lowtone\\woocommerce\\products\\Product");
				});
			}
		));

	/*use lowtone\Util;
	
	if (!class_exists("lowtone\\Lowtone"))
		return;
	
	Util::addMergedPath(__NAMESPACE__);

	add_action("woocommerce_init", function() {
		products\Product::__registerPostClass("product", "lowtone\\woocommerce\\products\\Product");
	});*/

	// Functions

	function checkWooCommerce() {
		return class_exists("Woocommerce");
	}
	
}