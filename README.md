Use all $DIC properties dynamic in your class

### Install
Start at your ILIAS root directory 
```bash
mkdir -p Customizing/global/plugins/Libraries/  
cd Customizing/global/plugins/Libraries/  
git clone https://github.com/studer-raimann/DIC.git DIC
```

### Usage
Add the follow line to your class at top
```php
class x {

	use srag\DIC\DIC;
	
	...
}
```


Now you can access to all $DIC variables like, in instance and in static places:
```php
self::dic()->ctrl();
```


This library also supports getting the plugin class instance. Add for this the $pl property to your class comment with the corresponding plugin class name:
```php
/**
 * X
 *
 * @property ilXPlugin $pl
 */
```
And access like other variables:
```php
self::dic()->pl();
```


You can now remove all usages of globals in your class and rename possible occurrences if you previous use an other name.


Remember to add something like to your README.md file:
```markdown
This plugin needs [DIC library](https://github.com/studer-raimann/DIC). Please install it.
```


And if you use composer, also add this to your composer autoload classmap array and run a `composer dump-autoload`, if you use composer:
```json
"../../../../Libraries/DIC/classes",
```

#### Requirements
This library should works with every ILIAS version provided the features are supported.

TODO: $this->txt()
TODO: $this->getTemplate()
