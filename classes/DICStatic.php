<?php

namespace srag;

/**
 * DIC for static methods
 */
final class DICStatic {

	use DIC;
	/**
	 * @var DIC
	 */
	protected static $instance = NULL;


	/**
	 * @return DIC
	 */
	public static function getInstance() {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 *
	 */
	private function __construct() {

	}
}
