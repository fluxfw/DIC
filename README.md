Use all ILIAS globals in your class

### Install
For development you should install this library like follow:

Start at your ILIAS root directory 
```bash
mkdir -p Customizing/global/plugins/Libraries/  
cd Customizing/global/plugins/Libraries/  
git clone git@git.studer-raimann.ch:ILIAS/Plugins/DIC.git DIC
```

### Usage

#### Composer
First add the follow to your `composer.json` file:
```json
  "repositories": [
    {
      "type": "package",
      "package": {
        "name": "srag/DIC",
        "version": "0.1.0",
        "type": "package",
        "source": {
          "url": "git@git.studer-raimann.ch:ILIAS/Plugins/DIC.git",
          "type": "git",
          "reference": "master"
        }
      }
    }
  ],
  "require": {
    "srag/DIC": "^0.1"
  },
```
And run a `composer install`.

If you deliver your plugin, the plugin has it's own copy of this library and the user doesn't need to install the library like above

#### Use trait
Then add the follow line to your class at top:
```php
...
class x {

	use srag\DIC\DICTrait;
	
	const PLUGIN_CLASS_NAME = ilXPlugin::class;
	
	...
}
```
`ilXPlugin` is the name of your plugin class.

#### Use
Now you can access to all $DIC variables like, in instance and in static places:
```php
self::dic()->ctrl();
```

You can access the plugin class:
```php
self::pl();
```

And your class now contain the follow methods:
- $this->txt(string $key, bool $plugin = true);
- $this->getTemplate(string $template, bool $remove_unknown_variables = true, bool $remove_empty_blocks = true, bool $plugin = true);


#### Clean up
You can now remove all usages of ILIAS globals in your class and replace it with this library.

#### README.md
Remember to add something like to your README.md file:
```markdown
### Dependencies
This plugin depends from [DIC library](https://git.studer-raimann.ch/ILIAS/Plugins/DIC).
```

#### Requirements
This library should works with every ILIAS version provided the features are supported.
