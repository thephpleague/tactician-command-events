<?php

namespace League\Tactician\CommandEvents\Event;

use League\Tactician\Command;

/**
 * Holds the command object for an event
 */
trait HasCommand
{
    /**
     * @var Command
     */
    protected $command;

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
