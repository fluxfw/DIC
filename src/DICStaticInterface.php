<?php

namespace srag\DIC;

use ilConfirmationGUI;
use ilPlugin;
use ilPropertyFormGUI;
use ilTable2GUI;
use ilTemplate;

/**
 * Interface DICStaticInterface
 *
 * @package srag\DIC
 */
interface DICStaticInterface {

	/**
	 * Get DIC interface
	 *
	 * @return DICInterface DIC interface
	 */
	public static function dic();


	/**
	 * @param string $plugin_class_name
	 *
	 * @return ilPlugin
	 *
	 * @throws DICException Class $plugin_class_name not exists!
	 * @logs   DEBUG Please implement $plugin_class_name::getInstance()!
	 */
	public static function pl($plugin_class_name);


	/**
	 * Get plugin directory
	 *
	 * @param string $plugin_class_name
	 *
	 * @return string Plugin directory
	 *
	 * @throws DICException Class $plugin_class_name not exists!
	 * @logs   DEBUG Please implement $plugin_class_name::getInstance()!
	 */
	public static function directory($plugin_class_name);


	/**
	 * Output html
	 *
	 * @param string|ilTemplate|ilConfirmationGUI|ilPropertyFormGUI|ilTable2GUI $html HTML code or some gui instance
	 * @param bool                                                              $main Display main skin?
	 */
	public static function output($html, $main = true);


	/**
	 * Get a template
	 *
	 * @param string $plugin_class_name
	 * @param string $template                 Template path
	 * @param bool   $remove_unknown_variables Should remove unknown variables?
	 * @param bool   $remove_empty_blocks      Should remove empty blocks?
	 * @param bool   $plugin                   Plugin template or ILIAS core template?
	 *
	 * @return ilTemplate ilTemplate instance
	 *
	 * @throws DICException Class $plugin_class_name not exists!
	 * @logs   DEBUG Please implement $plugin_class_name::getInstance()!
	 */
	public static function template($plugin_class_name, $template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true);


	/**
	 * Translate text
	 *
	 * @param string $plugin_class_name
	 * @param string $key          Language key
	 * @param string $module       Language module
	 * @param array  $placeholders Placeholders in your language texst to replace with vsprintf
	 * @param bool   $plugin       Plugin language or ILIAS core language?
	 * @param string $lang         Possibly specific language, otherwise current language, if empty
	 * @param string $default      Default text, if language key not exists
	 *
	 * @return string Translated text
	 *
	 * @throws DICException Class $plugin_class_name not exists!
	 * @throws DICException Please use the placeholders feature and not direct `sprintf` or `vsprintf` in your code!
	 * @throws DICException Please use only one placeholder in the default text for the key!
	 * @logs   DEBUG Please implement $plugin_class_name::getInstance()!
	 */
	public static function translate($plugin_class_name, $key, $module = "", array $placeholders = [], $plugin = true, $lang = "", $default = "MISSING %s");
}
