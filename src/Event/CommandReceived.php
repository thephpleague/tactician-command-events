<?php

namespace League\Tactician\CommandEvents\Event;

/**
 * Emitted when a command is received
 */
class CommandReceived extends Event
{
    use CommandEvent;

    /**
     * @var string
     */
    protected $name = 'command.received';
}
