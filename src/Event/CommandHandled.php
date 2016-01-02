<?php

namespace League\Tactician\CommandEvents\Event;

use League\Event\Event;

/**
 * Emitted when a command is handled.
 */
class CommandHandled extends Event implements CommandEvent
{
    use HasCommand;

    /**
     * @param object $command
     */
    public function __construct($command)
    {
        $this->command = $command;

        parent::__construct('command.handled');
    }
}
