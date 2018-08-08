<?php

namespace srag\DIC;

use ilPlugin;
use ilTemplate;

/**
 * Trait DICTrait
 *
 * @package srag\DIC
 */
trait DICTrait {

	/* *
	 * @var string
	 *
	 * @abstract
	 *
	 * TODO: Implement Constants in Traits in PHP Core
	 * /
	const PLUGIN_CLASS_NAME = "";*/

	/**
	 * @return DICInterface
	 * @ throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function dic() {
		self::checkPluginClassNameConst();

		return DICCache::dic();
	}


	/**
	 * @return ilPlugin
	 * @ throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function pl() {
		self::checkPluginClassNameConst();

		return DICCache::pl(static::PLUGIN_CLASS_NAME);
	}


	/**
	 * @return string
	 * @ throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function directory() {
		return self::pl()->getDirectory();
	}


	/**
	 * @param string $key
	 * @param bool   $plugin
	 *
	 * @return string
	 * @ throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function t($key, $plugin = true) {
		if ($plugin) {
			return self::pl()->txt($key);
		} else {
			return self::dic()->lng()->txt($key);
		}
	}


	/**
	 * @param string $template
	 * @param bool   $remove_unknown_variables
	 * @param bool   $remove_empty_blocks
	 * @param bool   $plugin
	 *
	 * @return ilTemplate
	 * @ throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function template($template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true) {
		if ($plugin) {
			return self::pl()->getTemplate($template, $remove_unknown_variables, $remove_empty_blocks);
		} else {
			return new ilTemplate($template, $remove_unknown_variables, $remove_empty_blocks);
		}
	}


	/**
	 * @throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	private static function checkPluginClassNameConst() {
		if (!defined("static::PLUGIN_CLASS_NAME") || empty(static::PLUGIN_CLASS_NAME)) {
			throw new DICException("Your class needs to implement the PLUGIN_CLASS_NAME constant!");
		}
	}
}
