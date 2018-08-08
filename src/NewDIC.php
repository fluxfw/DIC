<?php

namespace srag\DIC;

use ILIAS\DI\Container;

/**
 * Class NewDIC
 *
 * @package srag\DIC
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
	 */
	public function __construct(Container $dic) {
		parent::__construct();

		$this->dic = $dic;
	}


	/**
	 * @inheritdoc
	 */
	public function access() {
		return $this->dic->access();
	}


	/**
	 * @inheritdoc
	 */
	public function appEventHandler() {
		return $this->dic->event();
	}


	/**
	 * @inheritdoc
	 */
	public function backgroundTasks() {
		if ($this->is53()) {
			return $this->dic->backgroundTasks();
		} else {
			throw new DICException("BackgroundTaskServices not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function ctrl() {
		return $this->dic->ctrl();
	}


	/**
	 * @inheritdoc
	 */
	public function database() {
		return $this->dic->database();
	}


	/**
	 * @inheritdoc
	 */
	public function filesystem() {
		if ($this->is53()) {
			return $this->dic->filesystem();
		} else {
			throw new DICException("Filesystems not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function http() {
		if ($this->is53()) {
			return $this->dic->http();
		} else {
			throw new DICException("HTTPServices not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function lng() {
		return $this->dic->language();
	}


	/**
	 * @inheritdoc
	 */
	public function log() {
		return $this->dic["ilLog"];
	}


	/**
	 * @inheritdoc
	 */
	public function logger() {
		return $this->dic->logger();
	}


	/**
	 * @inheritdoc
	 */
	public function mailMimeSenderFactory() {
		if ($this->is53()) {
			return $this->dic["mail.mime.sender.factory"];
		} else {
			throw new DICException("ilMailMimeSenderFactory not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function rbacadmin() {
		return $this->dic->rbac()->admin();
	}


	/**
	 * @inheritdoc
	 */
	public function rbacreview() {
		return $this->dic->rbac()->review();
	}


	/**
	 * @inheritdoc
	 */
	public function rbacsystem() {
		return $this->dic->rbac()->system();
	}


	/**
	 * @inheritdoc
	 */
	public function settings() {
		return $this->dic->settings();
	}


	/**
	 * @inheritdoc
	 */
	public function tabs() {
		return $this->dic->tabs();
	}


	/**
	 * @inheritdoc
	 */
	public function toolbar() {
		return $this->dic->toolbar();
	}


	/**
	 * @inheritdoc
	 */
	public function tpl() {
		return $this->dic->ui()->mainTemplate();
	}


	/**
	 * @inheritdoc
	 */
	public function tree() {
		return $this->dic->repositoryTree();
	}


	/**
	 * @inheritdoc
	 */
	public function ui() {
		return $this->dic->ui();
	}


	/**
	 * @inheritdoc
	 */
	public function upload() {
		if ($this->is53()) {
			return $this->dic->upload();
		} else {
			throw new DICException("FileUpload not exists in ILIAS 5.2 or below!");
		}
	}


	/**
	 * @inheritdoc
	 */
	public function user() {
		return $this->dic->user();
	}


	/**
	 * @return Container
	 */
	public function dic() {
		return $this->dic;
	}


	/**
	 * @return bool
	 */
	private function is53() {
		return (ILIAS_VERSION_NUMERIC >= "5.3");
	}
}
