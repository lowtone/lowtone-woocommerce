<?php
namespace lowtone\woocommerce\products\collections\out;
use lowtone\wp\posts\collections\out\CollectionDocument as Base;

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
		
		// Append WooCommerce element

		$collectionElement = $this->documentElement;

		$wooCommerceElement = $collectionElement
			->appendChild(
				$this->createElementNs("http://wordpress.lowtone.nl/woocommerce", "wc:woocommerce")
			)
			->appendCreateElements(array(
				"columns" => $columns
			));

		return $this;
	}
	
}