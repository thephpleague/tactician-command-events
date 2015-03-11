<?php

namespace League\Tactician\CommandEvents\Event;

use League\Tactician\Command;

/**
 * Emitted when something happens with a command
 *
 *
 */
trait CommandEvent
{
    /**
     * @var Command
     */
    protected $command;

    /**
     * @param Command $command
     */
    public function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * Returns the command
     *
     * @return Command
     */
    public function getCommand()
    {
        return $this->command;
    }
}
