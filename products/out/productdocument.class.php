<?php
namespace lowtone\woocommerce\products\out;
use lowtone\Util,
	lowtone\wp\posts\out\PostDocument;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\products
 */
class ProductDocument extends PostDocument {
	
	public function build(array $options = NULL) {
		if (false === parent::build($options))
			return false;

		$GLOBALS["product"] = get_product($GLOBALS["post"]);

		$actionOutput = array();

		$addActionOutput = function($action) use (&$actionOutput) {
			$args = func_get_args();

			$action = preg_replace("/^woocommerce_/", "", $action);

			return $actions[$action] = Util::catchOutput(function() use ($args) {
				call_user_func_array("do_action", $args);
			});
		};

		$actions = array(
				"both" => array(),
				"archive" => array(
					"woocommerce_before_shop_loop_item",
					"woocommerce_before_shop_loop_item_title",
					"woocommerce_after_shop_loop_item_title",
					"woocommerce_after_shop_loop_item",
				),
				"single" => array(
					"woocommerce_before_single_product",
					"woocommerce_before_shop_loop_item_title",
					"woocommerce_single_product_summary",
					"woocommerce_after_single_product_summary",
					"woocommerce_after_single_product"
				),
			);

		foreach (array("both", is_single() ? "single" : "archive") as $context) {

			foreach ($actions[$context] as $action) 
				$addActionOutput($action);

		}
		
		// Append WooCommerce element

		$postElement = $this->documentElement;

		$wooCommerceElement = $postElement->appendChild(
				$this->createElementNs("http://wordpress.lowtone.nl/woocommerce", "wc:woocommerce")
			)
			->appendCreateElements(array(
				"wc:price" => "Foo",
				"wc:weight" => "Bar",
				"wc:actions" => $actionOutput
			));

		return $this;
	}
}