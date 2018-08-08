<?php

namespace srag\DIC;

use ilAccess;
use ilAppEventHandler;
use ilBenchmark;
use ilCtrl;
use ilDBInterface;
use ilHelpGUI;
use ILIAS;
use ILIAS\DI\BackgroundTaskServices;
use ILIAS\DI\HTTPServices;
use ILIAS\DI\LoggingServices;
use ILIAS\DI\UIServices;
use ILIAS\Filesystem\Filesystems;
use ILIAS\FileUpload\FileUpload;
use ilIniFile;
use ilLanguage;
use ilLocatorGUI;
use ilLog;
use ilMailMimeSenderFactory;
use ilNavigationHistory;
use ilObjectDefinition;
use ilObjUser;
use ilRbacAdmin;
use ilRbacReview;
use ilRbacSystem;
use ilSetting;
use ilStyleDefinition;
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
	 * @return ilBenchmark
	 */
	public function benchmark();


	/**
	 * @return ilIniFile
	 */
	public function clientIni();


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
	 * @return ilHelpGUI
	 */
	public function help();


	/**
	 * @return ilNavigationHistory
	 */
	public function history();


	/**
	 * @return HTTPServices
	 *
	 * @throws DICException HTTPServices not exists in ILIAS 5.2 or below!
	 */
	public function http();


	/**
	 * @return ILIAS
	 */
	public function ilias();


	/**
	 * @return ilIniFile
	 */
	public function iliasIni();


	/**
	 * @return ilLanguage
	 */
	public function lng();


	/**
	 * @return ilLocatorGUI
	 */
	public function locator();


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
	 * @return ilObjectDefinition
	 */
	public function objDefinition();


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
	 * @return ilStyleDefinition
	 */
	public function systemStyle();


	/**
	 * @return ilTabsGUI
	 */
	public function tabs();


	/**
	 * @return ilToolbarGUI
	 */
	public function toolbar();


	/**
	 * @return ilTemplate Main-Template
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
}
