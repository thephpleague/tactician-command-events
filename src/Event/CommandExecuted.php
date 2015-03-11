<?php

namespace League\Tactician\CommandEvents\Event;

/**
 * Emitted when a command is executed
 */
class CommandExecuted extends Event
{
    use CommandEvent;

    /**
     * @var string
     */
    protected $name = 'command.executed';
}
