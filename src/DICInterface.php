<?php

namespace srag\DIC;

use ilAccess;
use ilAppEventHandler;
use ilCtrl;
use ilDBInterface;
use ILIAS\DI\BackgroundTaskServices;
use ILIAS\DI\HTTPServices;
use ILIAS\DI\LoggingServices;
use ILIAS\DI\UIServices;
use ILIAS\Filesystem\Filesystems;
use ILIAS\FileUpload\FileUpload;
use ilLanguage;
use ilLog;
use ilMailMimeSenderFactory;
use ilObjUser;
use ilPlugin;
use ilRbacAdmin;
use ilRbacReview;
use ilRbacSystem;
use ilSetting;
use ilTabsGUI;
use ilTemplate;
use ilToolbarGUI;
use ilTree;

/**
 * Interface DICInterface
 *
 * @package srag\DIC
 */
interface DICInterface {

	/**
	 * @return ilAccess
	 */
	public function access();


	/**
	 * @return ilAppEventHandler
	 */
	public function appEventHandler();


	/**
	 * @return BackgroundTaskServices
	 *
	 * @throws DICException BackgroundTaskServices not exists in ILIAS 5.2 or below!
	 */
	public function backgroundTasks();


	/**
	 * @return ilCtrl
	 */
	public function ctrl();


	/**
	 * @return ilDBInterface
	 */
	public function database();


	/**
	 * @return Filesystems
	 *
	 * @throws DICException Filesystems not exists in ILIAS 5.2 or below!
	 */
	public function filesystem();


	/**
	 * @return HTTPServices
	 *
	 * @throws DICException HTTPServices not exists in ILIAS 5.2 or below!
	 */
	public function http();


	/**
	 * @return ilLanguage
	 */
	public function lng();


	/**
	 * @return ilLog
	 */
	public function log();


	/**
	 * @return LoggingServices
	 *
	 * @throws DICException LoggingServices not exists in ILIAS 5.2 or below!
	 */
	public function logger();


	/**
	 * @return ilMailMimeSenderFactory
	 *
	 * @throws DICException ilMailMimeSenderFactory not exists in ILIAS 5.2 or below!
	 */
	public function mailMimeSenderFactory();


	/**
	 * @return ilRbacAdmin
	 */
	public function rbacadmin();


	/**
	 * @return ilRbacReview
	 */
	public function rbacreview();


	/**
	 * @return ilRbacSystem
	 */
	public function rbacsystem();


	/**
	 * @return ilSetting
	 */
	public function settings();


	/**
	 * @return ilTabsGUI
	 */
	public function tabs();


	/**
	 * @return ilToolbarGUI
	 */
	public function toolbar();


	/**
	 * @return ilTemplate
	 */
	public function tpl();


	/**
	 * @return ilTree
	 */
	public function tree();


	/**
	 * @return UIServices
	 *
	 * @throws DICException UIServices not exists in ILIAS 5.1 or below!
	 */
	public function ui();


	/**
	 * @return FileUpload
	 *
	 * @throws DICException FileUpload not exists in ILIAS 5.2 or below!
	 */
	public function upload();


	/**
	 * @return ilObjUser
	 */
	public function user();


	/**
	 * @param ilPlugin $pl
	 * @param string   $key
	 * @param bool     $plugin
	 *
	 * @return string
	 */
	public function txt(ilPlugin $pl, $key, $plugin = true);


	/**
	 * @param ilPlugin $pl
	 * @param string   $template
	 * @param bool     $remove_unknown_variables
	 * @param bool     $remove_empty_blocks
	 * @param bool     $plugin
	 *
	 * @return ilTemplate
	 */
	public function getTemplate(ilPlugin $pl, $template, $remove_unknown_variables = true, $remove_empty_blocks = true, $plugin = true);
}
