<?php

namespace srag\DIC;

/**
 * Class DICCache
 *
 * @package srag\DIC
 */
final class DICCache {

	/**
	 * @var IDIC|null
	 */
	private static $dic = NULL;


	/**
	 * @return IDIC
	 */
	public static function dic() {
		if (self::$dic === NULL) {
			if (ILIAS_VERSION_NUMERIC >= "5.2") {
				self::$dic = new NewDIC();
			} else {
				self::$dic = new LegacyDIC();
			}
		}

		return self::$dic;
	}


	/**
	 * DICCache constructor
	 */
	private function __construct() {

	}
}
