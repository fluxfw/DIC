Use all $DIC properties dynamic in your class

### Install
Start at your ILIAS root directory 
```bash
mkdir -p Customizing/global/plugins/Libraries/  
cd Customizing/global/plugins/Libraries/  
git clone https://github.com/studer-raimann/DICTrait.git DICTrait
```

### Usage
Add the follow line to your class at top
```php
class x {

	use \srag\DICTrait;
	
	...
}
```

Now you can access to all $DIC variables like:
```php
$this->ilCtrl;
```
Also most autocompletes should work.
 
Unfortunately, some of the $DIC variables use points in its names. You can access it like:
```php
$this->{"mail.mime.sender.factory"};
```

If you want to use it in static functions, you do it:
```php
$DIC = \srag\DICStatic::getInstance();
```

You can now remove all usages of globals in your class and rename possible occurrences if you previous use an other name.

Remember to add something like to your README.md file:
```markdown
This plugin needs [DICTrait library](https://github.com/studer-raimann/DICTrait). Please install it.
```

And if you use composer, also add this to your composer autoload classmap array and run a `composer dump-autoload`, if you use composer:
```json
"../../../../Libraries/DICTrait",
```

#### Requirements
This library should works with every ILIAS version provided the keys are right.
