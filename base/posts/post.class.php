<?php
namespace lowtone\woocommerce\base\posts;
use lowtone\wp\posts\Post as Base;

/**
 * @author Paul van der Meijs <code@lowtone.nl>
 * @copyright Copyright (c) 2011-2012, Paul van der Meijs
 * @license http://wordpress.lowtone.nl/license/
 * @version 1.0
 * @package wordpress\libs\lowtone\woocommerce\base\posts
 */
class Post extends Base {
	
	public static function __getTable() {
		return Base::__getTable();
	}

}