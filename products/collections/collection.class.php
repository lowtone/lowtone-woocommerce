<?php
namespace lowtone\woocommerce\products\collections;
use lowtone\wp\posts\collections\Collection as Base;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\products\collections
 */
class Collection extends Base {

	// Static
	
	public static function __getObjectClass() {
		return "lowtone\\woocommerce\\products\\Product";
	}

	public static function __getDocumentClass() {
		return __NAMESPACE__ . "\\out\\CollectionDocument";
	}

}