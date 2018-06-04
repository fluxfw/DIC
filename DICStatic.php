<?php

namespace srag;

/**
 * DIC-Trait for static methods
 */
final class DICStatic {

	use DICTrait;
	/**
	 * @var DICTrait
	 */
	protected static $instance = NULL;


	/**
	 * @return DICTrait
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
