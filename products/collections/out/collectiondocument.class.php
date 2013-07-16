<?php
namespace lowtone\woocommerce\products\collections\out;
use lowtone\Util,
	lowtone\wp\posts\collections\out\CollectionDocument as Base,
	lowtone\style\styles\Grid;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\products\collections\out
 */
class CollectionDocument extends Base {
	
	public function build(array $options = NULL) {
		if (false === parent::build($options))
			return false;

		global $woocommerce_loop;

		$columns = apply_filters("loop_shop_columns", 4);

		if (isset($woocommerce_loop)) {

			if (isset($woocommerce_loop["columns"]))
				$columns = $woocommerce_loop["columns"];

		}

		$actionOutput = array();

		$addActionOutput = function($action) use (&$actionOutput) {
			$args = func_get_args();

			$action = preg_replace("/^woocommerce_/", "", $action);

			return $actionOutput[$action] = Util::catchOutput(function() use ($args) {
				call_user_func_array("do_action", $args);
			});
		};

		$actions = array(
				"both" => array(
					"woocommerce_before_main_content",
					"woocommerce_after_main_content"
				),
				"archive" => array(
					"woocommerce_archive_description",
					"woocommerce_before_shop_loop",
					"woocommerce_after_shop_loop",
				),
				"single" => array(),
			);

		foreach (array("both", is_single() ? "single" : "archive") as $context) {

			foreach ($actions[$context] as $action)  
				$addActionOutput($action);

		}
		
		// Append WooCommerce element

		$collectionElement = $this->documentElement;

		$wooCommerceElement = $collectionElement
			->appendChild(
				$this->createElementNs("http://wordpress.lowtone.nl/woocommerce", "wc:woocommerce")
			)
			->appendCreateElements(array(
				"page_title" => apply_filters("woocommerce_show_page_title", true) ? Util::catchOutput("woocommerce_page_title") : NULL,
				"columns" => $columns,
				"product_class" => implode(" ", array(
					Grid::translateWidth("1/{$columns}"),
					"column",
				)),
				"actions" => $actionOutput
			));

		return $this;
	}
	
}