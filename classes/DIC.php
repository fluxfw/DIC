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
 * @property \ilPlugin                     $pl
 * @property \ilRbacAdmin                  $rbacadmin
 * @property \ilRbacReview                 $rbacreview
 * @property \ilRbacSystem                 $rbacsystem
 * @property \ilTemplate                   $tpl
 * @property \ilTree                       $tree
 * @property \ILIAS\FileUpload\FileUpload  $upload
 */
trait DIC {

	/**
	 * @return \ilPlugin
	 */
	private static function getPluginInstance() {
		static $pl_caches = [];

		$current_class = self::class;

		if (!isset($pl_caches[$current_class])) {
			$reflect = new \ReflectionClass($current_class);

			$comment = $reflect->getDocComment();

			$r = "/@property[ \t]+\\\\?(il[A-Za-z0-9_\-]+Plugin)[ \t]+\\\$pl/";
			$matches = [];
			preg_match($r, $comment, $matches);
			if (is_array($matches) && count($matches) >= 2) {
				$plugin_class = $matches[1];

				if (method_exists($plugin_class, "getInstance")) {
					$plugin_instance = $plugin_class::getInstance();
					$pl_caches[$current_class] = $plugin_instance;

					return $plugin_instance;
				}
			}

			$pl_caches[$current_class] = NULL;
		}

		return $pl_caches[$current_class];
	}


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

			case "pl":
				return self::getPluginInstance();

			default:
				if ($DIC->offsetExists($name)) {
					return $DIC[$name];
				} else {
					return NULL;
				}
		}
	}
}
