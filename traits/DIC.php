<?php

namespace srag\DIC;

/**
 * Trait DIC
 *
 * @package srag\DIC
 */
trait DIC {

	/**
	 * @return IDIC
	 */
	protected static function dic() {
		return DICCache::dic();
	}
	/* *
	 * @param string $key
	 * @param bool   $plugin
	 *
	 * @return string
	 *
	 * TODO: ilPlugin endless recursive
	 * /
	 protected function txt($key, $plugin = true) {
	 return self::dic()->txt($key, $plugin);
	 }*/

	/* *
	 * @param string $template
	 * @param bool   $remove_unknown_variables
	 * @param bool   $remove_empty_blocks
	 * @param bool   $plugin
	 *
	 * @return ilTemplate
	 *
	 * TODO: ilPlugin endless recursive
	 * /
	protected function getTemplate($template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true) {
		return self::dic()->getTemplate($template, $remove_unknown_variables, $remove_empty_blocks, $plugin);
	}*/
}
