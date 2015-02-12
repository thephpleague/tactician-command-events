# Tactician Command Events

[![Author](http://img.shields.io/badge/author-@sagikazarmark-blue.svg?style=flat-square)](https://twitter.com/sagikazarmark)
[![Latest Version](https://img.shields.io/github/release/thephpleague/tactician-command-events.svg?style=flat-square)](https://github.com/thephpleague/tactician-command-events/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/travis/thephpleague/tactician-command-events.svg?style=flat-square)](https://travis-ci.org/thephpleague/tactician-command-events)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/thephpleague/tactician-command-events.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/tactician-command-events)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/tactician-command-events.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/tactician-command-events)
[![HHVM Status](https://img.shields.io/hhvm/thephpleague/tactician-command-events.svg?style=flat-square)](http://hhvm.h4cc.de/package/thephpleague/tactician-command-events)
[![Total Downloads](https://img.shields.io/packagist/dt/league/tactician-command-events.svg?style=flat-square)](https://packagist.org/packages/league/tactician-command-events)


## Install

Via Composer

``` bash
$ composer require league/tactician-command-events
```


## Usage

When the command ran without failures:

```php
use League\Tactician\CommandBus;
use League\Tactician\CommandEvents\EventMiddleware;
use League\Tactician\CommandEvents\Event\CommandExecuted;

// Emitter is optional
$emitter = null;
// $emitter = new League\Event\Emitter;

$eventMiddleware = new EventMiddleware($emitter);

// type-hint is optional
$eventMiddleware->addListener('command.executed', function(CommandExecuted $event) {
	// log the success
});

$commandBus = new CommandBus([$eventMiddleware]);
$commandBus->execute($command);
```


When the command ran with failures:

```php
use League\Tactician\CommandEvents\Event\CommandFailed;

$eventMiddleware->addListener('command.failed', function(CommandFailed $event) {
	// log the failure
	$event->catchException(); // without calling this the exception will be thrown
});

// something bad happens, exception thrown
$commandBus->execute($command);
```

Currently available events:

- `command.received`: Emitted when a command is received by the command bus
- `command.executed`: Emitted when a command is executed without errors
- `command.failed`: Emitted when an error occured during command execution


## Testing

``` bash
$ phpspec run
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## Credits

- [Ross Tuck](https://github.com/rosstuck)
- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/thephpleague/tactician-command-events/contributors)


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
