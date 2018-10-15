<?php

namespace srag\DIC\Plugin;

/**
 * Interface Pluginable
 *
 * @package srag\DIC\Plugin
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
interface Pluginable {

	/**
	 * @return Plugin
	 */
	public function getPlugin()/*: Plugin*/
	;


	/**
	 * @param Plugin $plugin
	 */
	public function setPlugin(Plugin $plugin)/*: void*/
	;
}
