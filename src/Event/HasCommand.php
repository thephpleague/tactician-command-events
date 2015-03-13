<?php

namespace League\Tactician\CommandEvents\Event;

use League\Tactician\Command;

/**
 * Emitted when something happens with a command
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
