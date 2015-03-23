<?php

namespace League\Tactician\CommandEvents\Event;

use League\Event\Event;
use League\Tactician\Command;

/**
 * Emitted when a command is handled
 */
class CommandHandled extends Event implements CommandEvent
{
    use HasCommand;

    /**
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        $this->command = $command;

        parent::__construct('command.handled');
    }
}
