<?php
namespace lowtone\woocommerce\coupons;
use WC_Coupon,
	lowtone\db\records\schemata\properties\types\DateTime,
	lowtone\woocommerce\base\posts\Post;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\coupons
 */
class Coupon extends Post {

	const PROPERTY_CODE = "code",
		PROPERTY_ID = "id",
		PROPERTY_TYPE = "type",
		PROPERTY_DISCOUNT_TYPE = "discount_type",
		PROPERTY_AMOUNT = "amount",
		PROPERTY_INDIVIDUAL_USE = "individual_use",
		PROPERTY_PRODUCT_IDS = "product_ids",
		PROPERTY_USAGE_LIMIT = "usage_limit",
		PROPERTY_USAGE_COUNT = "usage_count",
		PROPERTY_EXPIRY_DATE = "expiry_date",
		PROPERTY_APPLY_BEFORE_TAX = "apply_before_tax",
		PROPERTY_FREE_SHIPPING = "free_shipping",
		PROPERTY_PRODUCT_CATEGORIES = "product_categories",
		PROPERTY_EXCLUDE_PRODUCT_CATEGORIES = "exclude_product_categories",
		PROPERTY_EXCLUDE_SALE_ITEMS = "exclude_sale_items",
		PROPERTY_MINIMUM_AMOUNT = "minimum_amount",
		PROPERTY_CUSTOMER_EMAIL = "customer_email",
		PROPERTY_COUPON_CUSTOM_FIELDS = "coupon_custom_fields",
		PROPERTY_COUPON_AMOUNT = "coupon_amount",
		PROPERTY_ERROR_MESSAGE = "error_message",
		PROPERTY_EXCLUDE_PRODUCT_IDS = "exclude_product_ids";

	protected $__itsCoupon;
	
	public function init() {
		if (!($result = parent::init()))
			return $result;

		$this->__itsCoupon = new WC_Coupon($this->post_title);

		foreach ($this->__itsCoupon as $key => $value) 
			$this[$key] = $value;

		return $this;
	}

	// Static
	
	/*public static function __createSchema($defaults = NULL) {var_dump(get_called_class());
		$schema = parent::__createSchema(array_merge(array(
				self::PROPERTY_EXPIRY_DATE => new DateTime()
			), (array) $defaults));

		return $schema;
	}*/


}