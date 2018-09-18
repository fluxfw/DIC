<?php

namespace srag\DIC\DIC;

use ILIAS\DI\Container;
use srag\DIC\Exception\DICException;

/**
 * Class NewDIC
 *
 * @package srag\DIC\DIC
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class NewDIC extends AbstractDIC {

	/**
	 * @var Container
	 */
	private $dic;


	/**
	 * NewDIC constructor
	 *
	 * @param Container $dic
	 *
	 * @access namespace
	 */
	public function __construct(Container $dic) {
		parent::__construct();

		$this->dic = $dic;
	}


	/**
	 * @inheritdoc
	 */
	public function access()/*: ilAccess*/ {
		return $this->dic->access();
	}


	/**
	 * @inheritdoc
	 */
	public function appEventHandler()/*: ilAppEventHandler*/ {
		return $this->dic->event();
	}


	/**
	 * @inheritdoc
	 */
	public function authSession()/*: ilAuthSession*/ {
		if ($this->is54()) {
			return $this->dic->authSession();
		} else {
			return $this->dic["ilAuthSession"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function backgroundTasks()/*: BackgroundTaskServices*/ {
		if ($this->is53()) {
			return $this->dic->backgroundTasks();
		} else {
			throw new DICException("BackgroundTaskServices not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function benchmark()/*: ilBenchmark*/ {
		if ($this->is54()) {
			return $this->dic->benchmark();
		} else {
			return $this->dic["ilBench"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function browser()/*: ilBrowser*/ {
		if ($this->is54()) {
			return $this->dic->browser();
		} else {
			return $this->dic["ilBrowser"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function clientIni()/*: ilIniFile*/ {
		if ($this->is54()) {
			return $this->dic->clientIni();
		} else {
			return $this->dic["ilClientIniFile"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function collator()/*: Collator*/ {
		if ($this->is54()) {
			return $this->dic->collator();
		} else {
			return $this->dic["ilCollator"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function ctrl()/*: ilCtrl*/ {
		return $this->dic->ctrl();
	}


	/**
	 * @inheritdoc
	 */
	public function ctrlStructureReader()/*: ilCtrlStructureReader*/ {
		if ($this->is54()) {
			return $this->dic->ctrlStructureReader();
		} else {
			return $this->dic["ilCtrlStructureReader"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function database()/*: ilDBInterface*/ {
		return $this->dic->database();
	}


	/**
	 * @inheritdoc
	 */
	public function error()/*: ilErrorHandling*/ {
		if ($this->is54()) {
			return $this->dic->error();
		} else {
			return $this->dic["ilErr"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function filesystem()/*: Filesystems*/ {
		if ($this->is53()) {
			return $this->dic->filesystem();
		} else {
			throw new DICException("Filesystems not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function help()/*: ilHelpGUI*/ {
		if ($this->is54()) {
			return $this->dic->help();
		} else {
			return $this->dic["ilHelp"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function history()/*: ilNavigationHistory*/ {
		if ($this->is54()) {
			return $this->dic->history();
		} else {
			return $this->dic["ilNavigationHistory"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function http()/*: HTTPServices*/ {
		if ($this->is53()) {
			return $this->dic->http();
		} else {
			throw new DICException("HTTPServices not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function ilias()/*: ILIAS*/ {
		if ($this->is54()) {
			return $this->dic->ilias();
		} else {
			return $this->dic["ilias"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function iliasIni()/*: ilIniFile*/ {
		if ($this->is54()) {
			return $this->dic->iliasIni();
		} else {
			return $this->dic["ilIliasIniFile"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function language()/*: ilLanguage*/ {
		return $this->dic->language();
	}


	/**
	 * @inheritdoc
	 */
	public function locator()/*: ilLocatorGUI*/ {
		if ($this->is54()) {
			return $this->dic->locator();
		} else {
			return $this->dic["ilLocator"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function log()/*: ilLog*/ {
		if ($this->is54()) {
			return $this->dic->logger()->log();
		} else {
			return $this->dic["ilLog"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function logger()/*: LoggingServices*/ {
		return $this->dic->logger();
	}


	/**
	 * @inheritdoc
	 */
	public function loggerFactory()/*: ilLoggerFactory*/ {
		if ($this->is54()) {
			return $this->dic->logger()->loggerFactory();
		} else {
			return $this->dic["ilLoggerFactory"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function mailMimeSenderFactory()/*: ilMailMimeSenderFactory*/ {
		if ($this->is54()) {
			return $this->dic->mailMimeSenderFactory();
		} else {
			if ($this->is53()) {
				return $this->dic["mail.mime.sender.factory"];
			} else {
				throw new DICException("ilMailMimeSenderFactory not exists in ILIAS 5.2 or below!");
			}
		}
	}


	/**
	 * @inheritdoc
	 */
	public function mailMimeTransportFactory()/*: ilMailMimeTransportFactory*/ {
		if ($this->is54()) {
			return $this->dic->mailMimeTransportFactory();
		} else {
			if ($this->is53()) {
				return $this->dic["mail.mime.transport.factory"];
			} else {
				throw new DICException("ilMailMimeTransportFactory not exists in ILIAS 5.2 or below!");
			}
		}
	}


	/**
	 * @inheritdoc
	 */
	public function mainMenu()/*: ilMainMenuGUI*/ {
		if ($this->is54()) {
			return $this->dic->mainMenu();
		} else {
			return $this->dic["ilMainMenu"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function objDataCache()/*: ilObjectDataCache*/ {
		if ($this->is54()) {
			return $this->dic->objDataCache();
		} else {
			return $this->dic["ilObjDataCache"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function objDefinition()/*: ilObjectDefinition*/ {
		if ($this->is54()) {
			return $this->dic->objDefinition();
		} else {
			return $this->dic["objDefinition"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function pluginAdmin()/*: ilPluginAdmin*/ {
		if ($this->is54()) {
			return $this->dic->pluginAdmin();
		} else {
			return $this->dic["ilPluginAdmin"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function rbacadmin()/*: ilRbacAdmin*/ {
		return $this->dic->rbac()->admin();
	}


	/**
	 * @inheritdoc
	 */
	public function rbacreview()/*: ilRbacReview*/ {
		return $this->dic->rbac()->review();
	}


	/**
	 * @inheritdoc
	 */
	public function rbacsystem()/*: ilRbacSystem*/ {
		return $this->dic->rbac()->system();
	}


	/**
	 * @inheritdoc
	 */
	public function session()/*: Session*/ {
		if ($this->is54()) {
			return $this->dic->session();
		} else {
			return $this->dic["sess"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function settings()/*: ilSetting*/ {
		return $this->dic->settings();
	}


	/**
	 * @inheritdoc
	 */
	public function systemStyle()/*: ilStyleDefinition*/ {
		if ($this->is54()) {
			return $this->dic->systemStyle();
		} else {
			return $this->dic["styleDefinition"];
		}
	}


	/**
	 * @inheritdoc
	 */
	public function tabs()/*: ilTabsGUI*/ {
		return $this->dic->tabs();
	}


	/**
	 * @inheritdoc
	 */
	public function template()/*: ilTemplate*/ {
		return $this->dic->ui()->mainTemplate();
	}


	/**
	 * @inheritdoc
	 */
	public function toolbar()/*: ilToolbarGUI*/ {
		return $this->dic->toolbar();
	}


	/**
	 * @inheritdoc
	 */
	public function tree()/*: ilTree*/ {
		return $this->dic->repositoryTree();
	}


	/**
	 * @inheritdoc
	 */
	public function ui()/*: UIServices*/ {
		return $this->dic->ui();
	}


	/**
	 * @inheritdoc
	 */
	public function upload()/*: FileUpload*/ {
		if ($this->is53()) {
			return $this->dic->upload();
		} else {
			throw new DICException("FileUpload not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function user()/*: ilObjUser*/ {
		return $this->dic->user();
	}


	/**
	 * @return Container
	 */
	public function dic()/*: Container*/ {
		return $this->dic;
	}


	/**
	 * @return bool
	 */
	private function is53()/*: bool*/ {
		return (ILIAS_VERSION_NUMERIC >= "5.3");
	}


	/**
	 * @return bool
	 */
	private function is54()/*: bool*/ {
		return (ILIAS_VERSION_NUMERIC >= "5.4");
	}
}
