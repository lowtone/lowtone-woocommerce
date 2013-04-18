<?php
namespace lowtone\woocommerce\products\out;
use lowtone\wp\posts\out\PostDocument;

class ProductDocument extends PostDocument {
	
	public function build(array $options = NULL) {
		if (false === parent::build($options))
			return false;

		$postElement = $this->documentElement;

		$wooCommerceElement = $postElement->appendChild(
				$this->createElementNs("http://wordpress.lowtone.nl/woocommerce", "wc:woocommerce")
			)
			->appendCreateElements(array(
				"wc:price" => "Foo",
				"wc:weight" => "Bar"
			));

		return $this;
	}
}