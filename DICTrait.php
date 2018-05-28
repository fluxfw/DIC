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
	private $dic = NULL;
	/**
	 * @var ilAccess
	 */
	private $access = NULL;
	/**
	 * @var ilCtrl
	 */
	private $ctrl = NULL;
	/**
	 * @var ilDB
	 */
	private $db = NULL;
	/**
	 * @var ilLanguage
	 */
	private $lng = NULL;
	/**
	 * @var ilRbacAdmin
	 */
	private $rbacadmin = NULL;
	/**
	 * @var ilRbacReview
	 */
	private $rbacreview = NULL;
	/**
	 * @var ilRbacSystem
	 */
	private $rbacsystem = NULL;
	/**
	 * @var ilSetting
	 */
	private $settings = NULL;
	/**
	 * @var ilTabsGUI
	 */
	private $tabs = NULL;
	/**
	 * @var ilToolbarGUI
	 */
	private $toolbar = NULL;
	/**
	 * @var ilTemplate
	 */
	private $tpl = NULL;
	/**
	 * @var ilTree
	 */
	private $tree = NULL;
	/**
	 * @var ilObjUser
	 */
	private $user = NULL;


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
	protected function dic() {
		return $this->dic;
	}


	/**
	 * @return ilAccess
	 */
	protected function access() {
		if ($this->access === NULL) {
			$this->access = $this->dic->access();
		}

		return $this->access;
	}


	/**
	 * @return ilCtrl
	 */
	protected function ctrl() {
		if ($this->ctrl === NULL) {
			$this->ctrl = $this->dic->ctrl();
		}

		return $this->ctrl;
	}


	/**
	 * @return ilDB
	 */
	protected function db() {
		if ($this->db === NULL) {
			$this->db = $this->dic->database();
		}

		return $this->db;
	}


	/**
	 * @return ilLanguage
	 */
	protected function lng() {
		if ($this->lng === NULL) {
			$this->lng = $this->dic->language();
		}

		return $this->lng;
	}


	/**
	 * @return ilRbacAdmin
	 */
	protected function rbacadmin() {
		if ($this->rbacadmin === NULL) {
			$this->rbacadmin = $this->dic->rbac()->admin();
		}

		return $this->rbacadmin;
	}


	/**
	 * @return ilRbacReview
	 */
	protected function rbacreview() {
		if ($this->rbacreview === NULL) {
			$this->rbacreview = $this->dic->rbac()->review();
		}

		return $this->rbacreview;
	}


	/**
	 * @return ilRbacSystem
	 */
	protected function rbacsystem() {
		if ($this->rbacsystem === NULL) {
			$this->rbacsystem = $this->dic->rbac()->system();
		}

		return $this->rbacsystem;
	}


	/**
	 * @return ilSetting
	 */
	protected function settings() {
		if ($this->settings === NULL) {
			$this->settings = $this->dic["ilSetting"];
		}

		return $this->settings;
	}


	/**
	 * @return ilTabsGUI
	 */
	protected function tabs() {
		if ($this->tabs === NULL) {
			$this->tabs = $this->dic->tabs();
		}

		return $this->tabs;
	}


	/**
	 * @return ilToolbarGUI
	 */
	protected function toolbar() {
		if ($this->toolbar === NULL) {
			$this->toolbar = $this->dic->toolbar();
		}

		return $this->toolbar;
	}


	/**
	 * @return ilTemplate
	 */
	protected function tpl() {
		if ($this->tpl === NULL) {
			$this->tpl = $this->dic->ui()->mainTemplate();
		}

		return $this->tpl;
	}


	/**
	 * @return ilTree
	 */
	protected function tree() {
		if ($this->tree === NULL) {
			$this->tree = $this->dic->repositoryTree();
		}

		return $this->tree;
	}


	/**
	 * @return ilObjUser
	 */
	protected function user() {
		if ($this->user === NULL) {
			$this->user = $this->dic->user();
		}

		return $this->user;
	}
}
