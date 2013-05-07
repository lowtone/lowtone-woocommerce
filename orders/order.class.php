<?php
namespace lowtone\woocommerce\orders;
use WC_Order,
	lowtone\db\records\Record,
	lowtone\db\records\schemata\properties\types\DateTime as DateTimeProperty,
	lowtone\db\records\schemata\properties\types\String as StringProperty;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\orders
 */
class Order extends Record {

	private $itsOrder;

	/**
	 * Properties from WC_Order
	 */
	const PROPERTY_ID = "id",
		PROPERTY_STATUS = "status",
		PROPERTY_ORDER_DATE = "order_date",
		PROPERTY_MODIFIED_DATE = "modified_date",
		PROPERTY_CUSTOMER_NOTE = "customer_note",
		PROPERTY_ORDER_CUSTOM_FIELDS = "order_custom_fields",
		PROPERTY_ORDER_KEY = "order_key",
		PROPERTY_BILLING_FIRST_NAME = "billing_first_name",
		PROPERTY_BILLING_LAST_NAME = "billing_last_name",
		PROPERTY_BILLING_COMPANY = "billing_company",
		PROPERTY_BILLING_ADDRESS_1 = "billing_address_1",
		PROPERTY_BILLING_ADDRESS_2 = "billing_address_2",
		PROPERTY_BILLING_CITY = "billing_city",
		PROPERTY_BILLING_POSTCODE = "billing_postcode",
		PROPERTY_BILLING_COUNTRY = "billing_country",
		PROPERTY_BILLING_STATE = "billing_state",
		PROPERTY_BILLING_EMAIL = "billing_email",
		PROPERTY_BILLING_PHONE = "billing_phone",
		PROPERTY_SHIPPING_FIRST_NAME = "shipping_first_name",
		PROPERTY_SHIPPING_LAST_NAME = "shipping_last_name",
		PROPERTY_SHIPPING_COMPANY = "shipping_company",
		PROPERTY_SHIPPING_ADDRESS_1 = "shipping_address_1",
		PROPERTY_SHIPPING_ADDRESS_2 = "shipping_address_2",
		PROPERTY_SHIPPING_CITY = "shipping_city",
		PROPERTY_SHIPPING_POSTCODE = "shipping_postcode",
		PROPERTY_SHIPPING_COUNTRY = "shipping_country",
		PROPERTY_SHIPPING_STATE = "shipping_state",
		PROPERTY_SHIPPING_METHOD = "shipping_method",
		PROPERTY_SHIPPING_METHOD_TITLE = "shipping_method_title",
		PROPERTY_PAYMENT_METHOD = "payment_method",
		PROPERTY_PAYMENT_METHOD_TITLE = "payment_method_title",
		PROPERTY_ORDER_DISCOUNT = "order_discount",
		PROPERTY_CART_DISCOUNT = "cart_discount",
		PROPERTY_ORDER_TAX = "order_tax",
		PROPERTY_ORDER_SHIPPING = "order_shipping",
		PROPERTY_ORDER_SHIPPING_TAX = "order_shipping_tax",
		PROPERTY_ORDER_TOTAL = "order_total",
		PROPERTY_TAXES = "taxes",
		PROPERTY_CUSTOMER_USER = "customer_user",
		PROPERTY_USER_ID = "user_id",
		PROPERTY_COMPLETED_DATE = "completed_date",
		PROPERTY_BILLING_ADDRESS = "billing_address",
		PROPERTY_FORMATTED_BILLING_ADDRESS = "formatted_billing_address",
		PROPERTY_SHIPPING_ADDRESS = "shipping_address",
		PROPERTY_FORMATTED_SHIPPING_ADDRESS = "formatted_shipping_address",
		PROPERTY_POST_STATUS = "post_status";

	/**
	 * Set by WC_Order::__construct()
	 */
	const PROPERTY_PRICES_INCLUDE_TAX = "prices_include_tax",
		PROPERTY_TAX_DISPLAY_CART = "tax_display_cart",
		PROPERTY_DISPLAY_TOTALS_EX_TAX = "display_totals_ex_tax",
		PROPERTY_DISPLAY_CART_EX_TAX = "display_cart_ex_tax";

	/**
	 * Custom
	 */
	const PROPERTY_ORDER_NUMBER = "order_number";

	public function __construct($input = NULL, $flags = 0, $iterator_class = "ArrayIterator") {
		parent::__construct($input, $flags, $iterator_class);

		$this->__setOrder($input);
	}

	private final function __createOrder() {
		if (($id = $this->id) < 1)
			return;

		return ($this->__itsOrder = new WC_Order($id));
	}

	public final function __getOrder() {
		return $this->__itsOrder instanceof WC_Order ? $this->__itsOrder : $this->__createOrder();
	}

	private final function __setOrder($order) {
		if ($order instanceof WC_Order)
			$this->__itsOrder = $order;

		return $this;
	}

	// Static
	
	public static function __createSchema($defaults = NULL) {
		$dateTime = new DateTimeProperty();

		return parent::__createSchema(array(
				self::PROPERTY_ORDER_DATE => $dateTime,
				self::PROPERTY_MODIFIED_DATE => $dateTime,
				self::PROPERTY_COMPLETED_DATE => $dateTime,
				self::PROPERTY_ORDER_NUMBER => new StringProperty(array(
					StringProperty::ATTRIBUTE_GET => function($value, $order) {
						return ($wcOrder = $order->__getOrder()) instanceof WC_Order ? $wcOrder->get_order_number() : NULL;
					}
				))
			));
	}

}