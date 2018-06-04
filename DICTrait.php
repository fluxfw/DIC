<?php

/**
 * DIC-Trait
 *
 * ViP
 */
trait DICTrait {

	/**
	 * @var \ILIAS\DI\Container
	 */
	protected $dic = NULL;
	/**
	 * @var ilAccess
	 */
	protected $access = NULL;
	/**
	 * @var ilCtrl
	 */
	protected $ctrl = NULL;
	/**
	 * @var ilDB
	 */
	protected $db = NULL;
	/**
	 * @var ilLanguage
	 */
	protected $lng = NULL;
	/**
	 * @var ilRbacAdmin
	 */
	protected $rbacadmin = NULL;
	/**
	 * @var ilRbacReview
	 */
	protected $rbacreview = NULL;
	/**
	 * @var ilRbacSystem
	 */
	protected $rbacsystem = NULL;
	/**
	 * @var ilSetting
	 */
	protected $settings = NULL;
	/**
	 * @var ilTabsGUI
	 */
	protected $tabs = NULL;
	/**
	 * @var ilToolbarGUI
	 */
	protected $toolbar = NULL;
	/**
	 * @var ilTemplate
	 */
	protected $tpl = NULL;
	/**
	 * @var ilTree
	 */
	protected $tree = NULL;
	/**
	 * @var ilObjUser
	 */
	protected $user = NULL;


	/**
	 * @param string $name
	 */
	public function __get($name) {
		if (method_exists($this, $name)) {
			return $this->{$name}();
		} else {
			throw new ilException("The mehtod $name does not exists in the DIC-Trait!");
		}
	}


	/**
	 *
	 */
	protected function __construct() {
		global $DIC;

		$this->dic = $DIC;
	}


	/**
	 * @return \ILIAS\DI\Container
	 */
	private function dic() {
		return $this->dic;
	}


	/**
	 * @return ilAccess
	 */
	private function access() {
		if ($this->access === NULL) {
			$this->access = $this->dic->access();
		}

		return $this->access;
	}


	/**
	 * @return ilCtrl
	 */
	private function ctrl() {
		if ($this->ctrl === NULL) {
			$this->ctrl = $this->dic->ctrl();
		}

		return $this->ctrl;
	}


	/**
	 * @return ilDB
	 */
	private function db() {
		if ($this->db === NULL) {
			$this->db = $this->dic->database();
		}

		return $this->db;
	}


	/**
	 * @return ilLanguage
	 */
	private function lng() {
		if ($this->lng === NULL) {
			$this->lng = $this->dic->language();
		}

		return $this->lng;
	}


	/**
	 * @return ilRbacAdmin
	 */
	private function rbacadmin() {
		if ($this->rbacadmin === NULL) {
			$this->rbacadmin = $this->dic->rbac()->admin();
		}

		return $this->rbacadmin;
	}


	/**
	 * @return ilRbacReview
	 */
	private function rbacreview() {
		if ($this->rbacreview === NULL) {
			$this->rbacreview = $this->dic->rbac()->review();
		}

		return $this->rbacreview;
	}


	/**
	 * @return ilRbacSystem
	 */
	private function rbacsystem() {
		if ($this->rbacsystem === NULL) {
			$this->rbacsystem = $this->dic->rbac()->system();
		}

		return $this->rbacsystem;
	}


	/**
	 * @return ilSetting
	 */
	private function settings() {
		if ($this->settings === NULL) {
			$this->settings = $this->dic["ilSetting"];
		}

		return $this->settings;
	}


	/**
	 * @return ilTabsGUI
	 */
	private function tabs() {
		if ($this->tabs === NULL) {
			$this->tabs = $this->dic->tabs();
		}

		return $this->tabs;
	}


	/**
	 * @return ilToolbarGUI
	 */
	private function toolbar() {
		if ($this->toolbar === NULL) {
			$this->toolbar = $this->dic->toolbar();
		}

		return $this->toolbar;
	}


	/**
	 * @return ilTemplate
	 */
	private function tpl() {
		if ($this->tpl === NULL) {
			$this->tpl = $this->dic->ui()->mainTemplate();
		}

		return $this->tpl;
	}


	/**
	 * @return ilTree
	 */
	private function tree() {
		if ($this->tree === NULL) {
			$this->tree = $this->dic->repositoryTree();
		}

		return $this->tree;
	}


	/**
	 * @return ilObjUser
	 */
	private function user() {
		if ($this->user === NULL) {
			$this->user = $this->dic->user();
		}

		return $this->user;
	}
}
