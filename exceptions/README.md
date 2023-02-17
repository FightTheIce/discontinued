# Fight The Ice Core Exceptions Component

Set of exceptions shared across Fight The Ice components. 

This lets you catch library-specific exceptions (if needed).

This repository isn't really of value to use in your projects. 

You may however want to fork/clone this repository to build your own exception classes.

Most of the documentation included here is just for personal reference.

# READ THESE
Please take a moment to read these articles.

https://www.alainschlesser.com/structuring-php-exceptions/

https://www.nikolaposa.in.rs/blog/2016/08/17/exceptional-behavior-best-practices/


## Installation

The best way to use this component is through Composer:

```BASH
$ composer require fighttheice/exceptions
```

## Usage

There are two ways to use these exception libraries...

The first is extending an exception class for your own use.

There are actually two steps to follow when trying to use the features of this library.

[1] - Create your own exception classes by extending any of the FightTheIce\Exceptions\\{class}

```php

class YourAwesomeException extends \FightTheIce\Exceptions\DomainException {
	protected $component = 'Your component name';
}
```

[2] - In your code (try,...catch) you have the following options
```php
...
try {
	$obj->someMethod();
} catch (\YourAwesome $e) {
	//Catch your specific execption
} catch (\FightTheIce\Exceptions\DomainException $e) {
	//catch FTI specific exception
} catch (\DomainException $e) {
	//catch SPL exception
} catch (\FightTheIce\Exceptions\ExceptionsInterface $e) {
	//catch all FTI exceptions
} catch (\Exception $e) {
	//catch Generic exception
}
```

NOTE: It is expected that you will extend the exception libraries in order to set the component property value.
To retrieve this value run the following:
```php
try {
	$obj->someMethod();
} catch (\YourAwesome $e) {
	//Catch your specific execption
	$component = $e->getComponent(); //your component name or "UNKNOWN"
}
```

The second way of utilizing these exceptions classes are to set the component name when you create the exception.

This is an example of code that may utilize one of the exception classes setting a custom componentName
```php
<?php

namespace App;

use FightTheIce\Exceptions\FileSystem\FileNotFoundException;

class SomethingImportant {
	...
	public function checkForFile($path) {
		if (!file_exists($path)) {
			$exception = new FileNotFoundException('The path provided is invalid!',1);
			$exception->setComponentName('SomethingImportant');
			throw $exception;
		}
	}
}
```

## Building

The building tool "project.generate" is just a PHP script that uses laminas-code to generate the exception libraries and tests. 

[1] - Fork/Clone repository

[2] - Run composer install/update
```bash
$ composer install
$ composer update
```

[3] - Execute the project.generate file
```bash
$ php project.generate
```

[4] - Composer Dump autoload
```bash
$ composer dump-autolod
```

[5] - Execute PHPUnit tests
```bash
$ ./vendor/bin/phpunit tests/
```

[6] - Get code coverage report
```bash
$ ./vendor/bin/phpunit --coverage-html html tests/
```

[7] - Commit your changes
```bash
$ git add .
$ git commit -m "Your Changes Description"
$ git push origin {branch}
```

## Contributing

All feedback / bug reports / pull requests are welcome.

## License

Copyright (c) 2020 William Knauss

This code is licensed under the [MIT License](LICENSE).