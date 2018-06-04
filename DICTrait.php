<?php

namespace srag;

/**
 * Use all $DIC properties dynamic in your class
 *
 * For autocomplete:
 *
 * @property \ILIAS\DI\Container           $DIC
 * @property \ILIAS\Filesystem\Filesystems $filesystem
 * @property \ilAccess                     $ilAccess
 * @property \ilAppEventHandler            $ilAppEventHandler
 * @property \ilCtrl                       $ilCtrl
 * @property \ilDB                         $ilDB
 * @property \ilSetting                    $ilSetting
 * @property \ilTabsGUI                    $ilTabs
 * @property \ilToolbarGUI                 $ilToolbar
 * @property \ilObjUser                    $ilUser
 * @property \ilLanguage                   $lng
 * @property \ilRbacAdmin                  $rbacadmin
 * @property \ilRbacReview                 $rbacreview
 * @property \ilRbacSystem                 $rbacsystem
 * @property \ilTemplate                   $tpl
 * @property \ilTree                       $tree
 * @property \ILIAS\FileUpload\FileUpload  $upload
 */
trait DICTrait {

	/**
	 * @param string $name
	 *
	 * @return mixed|null
	 */
	public function __get($name) {
		global $DIC;

		if ($DIC === NULL) {
			// Older ILIAS versions support
			$DIC = $GLOBALS;
		}

		switch ($name) {
			case "DIC":
				return $DIC;

			default:
				if ($DIC->offsetExists($name)) {
					return $DIC[$name];
				} else {
					return NULL;
				}
		}
	}
}
