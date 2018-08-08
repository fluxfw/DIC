<?php

namespace srag\DIC;

/**
 * Class LegacyDIC
 *
 * @package srag\DIC
 */
final class LegacyDIC extends AbstractDIC {

	/**
	 * @var array
	 */
	private $globals;


	/**
	 * LegacyDIC constructor
	 *
	 * @param array $globals
	 */
	public function __construct(array &$globals) {
		parent::__construct();

		$this->globals = &$globals;
	}


	/**
	 * @inheritdoc
	 */
	public function access() {
		return $this->globals["ilAccess"];
	}


	/**
	 * @inheritdoc
	 */
	public function appEventHandler() {
		return $this->globals["ilAppEventHandler"];
	}


	/**
	 * @inheritdoc
	 */
	public function backgroundTasks() {
		throw new DICException("BackgroundTaskServices not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function ctrl() {
		return $this->globals["ilCtrl"];
	}


	/**
	 * @inheritdoc
	 */
	public function database() {
		return $this->globals["ilDB"];
	}


	/**
	 * @inheritdoc
	 */
	public function filesystem() {
		throw new DICException("Filesystems not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function http() {
		throw new DICException("HTTPServices not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function lng() {
		return $this->globals["lng"];
	}


	/**
	 * @inheritdoc
	 */
	public function log() {
		return $this->globals["ilLog"];
	}


	/**
	 * @inheritdoc
	 */
	public function logger() {
		throw new DICException("LoggingServices not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function mailMimeSenderFactory() {
		throw new DICException("ilMailMimeSenderFactory not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function rbacadmin() {
		return $this->globals["rbacadmin"];
	}


	/**
	 * @inheritdoc
	 */
	public function rbacreview() {
		return $this->globals["rbacreview"];
	}


	/**
	 * @inheritdoc
	 */
	public function rbacsystem() {
		return $this->globals["rbacsystem"];
	}


	/**
	 * @inheritdoc
	 */
	public function settings() {
		return $this->globals["ilSetting"];
	}


	/**
	 * @inheritdoc
	 */
	public function tabs() {
		return $this->globals["ilTabs"];
	}


	/**
	 * @inheritdoc
	 */
	public function toolbar() {
		return $this->globals["ilToolbar"];
	}


	/**
	 * @inheritdoc
	 */
	public function tpl() {
		return $this->globals["tpl"];
	}


	/**
	 * @inheritdoc
	 */
	public function tree() {
		return $this->globals["tree"];
	}


	/**
	 * @inheritdoc
	 */
	public function ui() {
		throw new DICException("UIServices not exists in ILIAS 5.1 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function upload() {
		throw new DICException("FileUpload not exists in ILIAS 5.2 or below!");
	}


	/**
	 * @inheritdoc
	 */
	public function user() {
		return $this->globals["ilUser"];
	}


	/**
	 * @return array
	 */
	public function &globals() {
		return $this->globals;
	}
}
