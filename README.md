# Tactician Event Decorator

[![Latest Version](https://img.shields.io/github/release/indigophp/tactician-event-decorator.svg?style=flat-square)](https://github.com/indigophp/tactician-event-decorator/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/indigophp/tactician-event-decorator.svg?style=flat-square)](https://travis-ci.org/indigophp/tactician-event-decorator)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/indigophp/tactician-event-decorator.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/tactician-event-decorator)
[![Quality Score](https://img.shields.io/scrutinizer/g/indigophp/tactician-event-decorator.svg?style=flat-square)](https://scrutinizer-ci.com/g/indigophp/tactician-event-decorator)
[![HHVM Status](https://img.shields.io/hhvm/indigophp/tactician-event-decorator.svg?style=flat-square)](http://hhvm.h4cc.de/package/indigophp/tactician-event-decorator)
[![Total Downloads](https://img.shields.io/packagist/dt/indigophp/tactician-event-decorator.svg?style=flat-square)](https://packagist.org/packages/indigophp/tactician-event-decorator)
[![Dependency Status](https://img.shields.io/versioneye/d/php/indigophp:tactician-event-decorator.svg?style=flat-square)](https://www.versioneye.com/php/indigophp:tactician-event-decorator)

**Event decorator for Tactician CommandBus implementations.**


## Install

Via Composer

``` bash
$ composer require indigophp/tactician-event-decorator
```


## Usage

When the command ran without failures:

```php
use League\Event\EmitterInterface;
use League\Tactician\CommandBus\EventableCommandBus;
use League\Tactician\Event\CommandExecuted;

// $innerCommandBus = new CommandBus instance
// $emitter = new EmitterInterface instance OR null (optional)

$commandBus = new EventableCommandBus($innerCommandBus, $emitter);

$commandBus->addListener('commandExecuted', function(CommandExecuted $event) {
	// log the success
});

$commandBus->execute($command);
```


When the command ran with failures:
```php
$commandBus->addListener('commandFailed', function(CommandFailed $event) {
	// log the failure
	$event->handle(); // without calling this the exception will be thrown
});

// something bad happens, exception thrown
$commandBus->execute($command);
```


## Testing

``` bash
$ phpspec run
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/tactician-event-decorator/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
