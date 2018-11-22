<?php

namespace srag\DIC\Output;

use ilConfirmationGUI;
use ilPropertyFormGUI;
use ilTable2GUI;
use ilTemplate;
use JsonSerializable;
use srag\DIC\DICTrait;
use srag\DIC\Exception\DICException;
use stdClass;

/**
 * Class Output
 *
 * @package srag\DIC\Output
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Output implements OutputInterface {

	use DICTrait;


	/**
	 * @inheritdoc
	 */
	public function output($value, /*bool*/
		$main = true)/*: void*/ {
		switch (true) {
			// HTML
			case (is_string($value)):
				$html = strval($value);
				break;

			// GUI instance
			case ($value instanceof ilTemplate):
				$html = $value->get();
				break;
			case ($value instanceof ilConfirmationGUI):
			case ($value instanceof ilPropertyFormGUI):
			case ($value instanceof ilTable2GUI):
				$html = $value->getHTML();
				break;

			// Not supported!
			default:
				throw new DICException("Class " . get_class($value) . " is not supported for output!");
				break;
		}

		if (self::dic()->ctrl()->isAsynch()) {
			echo $html;
		} else {
			if ($main) {
				self::dic()->mainTemplate()->getStandardTemplate();
			}
			self::dic()->mainTemplate()->setContent($html);
			self::dic()->mainTemplate()->show();
		}

		exit;
	}


	/**
	 * @inheritdoc
	 */
	public function outputJSON($value)/*: void*/ {
		switch (true) {
			case (is_string($value)):
			case (is_int($value)):
			case (is_double($value)):
			case (is_bool($value)):
			case (is_array($value)):
			case ($value instanceof stdClass):
			case ($value === NULL):
			case ($value instanceof JsonSerializable):
				$value = json_encode($value);

				header("Content-Type: application/json; charset=utf-8");

				echo $value;

				break;

			default:
				throw new DICException(get_class($value) . " is non valid JSON value!");
				break;
		}

		exit;
	}
}
