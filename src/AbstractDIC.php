<?php

namespace srag\DIC;

use ilPlugin;
use ilTemplate;

/**
 * Class AbstractDIC
 *
 * @package srag\DIC
 */
abstract class AbstractDIC implements DICInterface {

	/**
	 * AbstractDIC constructor
	 */
	protected function __construct() {

	}


	/**
	 * @inheritdoc
	 */
	public final function txt(ilPlugin $pl, $key, $plugin = true) {
		if ($plugin) {
			return $pl->txt($key);
		} else {
			return $this->lng()->txt($key);
		}
	}


	/**
	 * @inheritdoc
	 */
	public final function getTemplate(ilPlugin $pl, $template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true) {
		if ($plugin) {
			return $pl->getTemplate($template, $remove_unknown_variables, $remove_empty_blocks);
		} else {
			return new ilTemplate($template, $remove_unknown_variables, $remove_empty_blocks);
		}
	}
}
