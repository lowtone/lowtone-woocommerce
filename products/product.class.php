<?php
namespace lowtone\woocommerce\products;
use lowtone\wp\posts\Post;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\products
 */
class Product extends Post {

	const PROPERTY_ID = "id",
		PROPERTY_PRODUCT_CUSTOM_FIELDS = "product_custom_fields",
		PROPERTY_ATTRIBUTES = "attributes",
		PROPERTY_CHILDREN = "children",
		PROPERTY_POST = "post",
		PROPERTY_DOWNLOADABLE = "downloadable",
		PROPERTY_VIRTUAL = "virtual",
		PROPERTY_SKU = "sku",
		PROPERTY_PRICE = "price",
		PROPERTY_VISIBILITY = "visibility",
		PROPERTY_STOCK = "stock",
		PROPERTY_STOCK_STATUS = "stock_status",
		PROPERTY_BACKORDERS = "backorders",
		PROPERTY_MANAGE_STOCK = "manage_stock",
		PROPERTY_SALE_PRICE = "sale_price",
		PROPERTY_REGULAR_PRICE = "regular_price",
		PROPERTY_WEIGHT = "weight",
		PROPERTY_LENGTH = "length",
		PROPERTY_WIDTH = "width",
		PROPERTY_HEIGHT = "height",
		PROPERTY_TAX_STATUS = "tax_status",
		PROPERTY_TAX_CLASS = "tax_class",
		PROPERTY_UPSELL_IDS = "upsell_ids",
		PROPERTY_CROSSSELL_IDS = "crosssell_ids",
		PROPERTY_PRODUCT_TYPE = "product_type",
		PROPERTY_TOTAL_STOCK = "total_stock",
		PROPERTY_SALE_PRICE_DATES_FROM = "sale_price_dates_from",
		PROPERTY_SALE_PRICE_DATES_TO = "sale_price_dates_to",
		PROPERTY_MIN_VARIATION_PRICE = "min_variation_price",
		PROPERTY_MAX_VARIATION_PRICE = "max_variation_price",
		PROPERTY_MIN_VARIATION_REGULAR_PRICE = "min_variation_regular_price",
		PROPERTY_MAX_VARIATION_REGULAR_PRICE = "max_variation_regular_price",
		PROPERTY_MIN_VARIATION_SALE_PRICE = "min_variation_sale_price",
		PROPERTY_MAX_VARIATION_SALE_PRICE = "max_variation_sale_price",
		PROPERTY_FEATURED = "featured",
		PROPERTY_SHIPPING_CLASS = "shipping_class",
		PROPERTY_SHIPPING_CLASS_ID = "shipping_class_id",
		PROPERTY_DIMENSIONS = "dimensions";

	public static function __getDocumentClass() {
		return "lowtone\\woocommerce\\products\\out\\ProductDocument";
	}
		
}