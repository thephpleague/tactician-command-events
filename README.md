# Tactician Command Events

[![Author](http://img.shields.io/badge/author-@sagikazarmark-blue.svg?style=flat-square)](https://twitter.com/sagikazarmark)
[![Latest Version](https://img.shields.io/github/release/thephpleague/tactician-command-events.svg?style=flat-square)](https://github.com/thephpleague/tactician-command-events/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/thephpleague/tactician-command-events.svg?style=flat-square)](https://travis-ci.org/thephpleague/tactician-command-events)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/thephpleague/tactician-command-events.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/tactician-command-events)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/tactician-command-events.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/tactician-command-events)
[![HHVM Status](https://img.shields.io/hhvm/thephpleague/tactician-command-events.svg?style=flat-square)](http://hhvm.h4cc.de/package/thephpleague/tactician-command-events)
[![Total Downloads](https://img.shields.io/packagist/dt/thephpleague/tactician-command-events.svg?style=flat-square)](https://packagist.org/packages/thephpleague/tactician-command-events)


**Tactician Command Events**


## Install

Via Composer

``` bash
$ composer require league/tactician-command-events
```


## Usage

When the command ran without failures:

```php
use League\Event\EmitterInterface;
use League\Tactician\EventableCommandBus;
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
- [All Contributors](https://github.com/thephpleague/tactician-command-events/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
