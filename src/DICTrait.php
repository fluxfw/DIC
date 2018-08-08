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
	 * /
	const PLUGIN_CLASS_NAME = "";*/

	/**
	 * @return DICInterface
	 * @throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function dic() {
		self::checkPluginClassNameConst();

		return DICCache::dic();
	}


	/**
	 * @return ilPlugin
	 * @throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 */
	protected static function pl() {
		self::checkPluginClassNameConst();

		return DICCache::pl(static::PLUGIN_CLASS_NAME);
	}


	/**
	 * @param string $key
	 * @param bool   $plugin
	 *
	 * @return string
	 * @throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 *
	 * TODO: static? Other name cause ilPlugin? `t`?
	 */
	protected function txt($key, $plugin = true) {
		if ($this instanceof ilPlugin) {
			// No overflow recursive
			return parent::txt($key);
		}

		return self::dic()->txt(self::pl(), $key, $plugin);
	}


	/**
	 * @param string $template
	 * @param bool   $remove_unknown_variables
	 * @param bool   $remove_empty_blocks
	 * @param bool   $plugin
	 *
	 * @return ilTemplate
	 * @throws DICException Your class needs to implement the PLUGIN_CLASS_NAME constant!
	 *
	 * TODO: static? Other name cause ilPlugin? `template`?
	 */
	protected function getTemplate($template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true) {
		if ($this instanceof ilPlugin) {
			// No overflow recursive
			return parent::getTemplate($template, $remove_unknown_variables, $remove_empty_blocks);
		}

		return self::dic()->getTemplate(self::pl(), $template, $remove_unknown_variables, $remove_empty_blocks, $plugin);
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
