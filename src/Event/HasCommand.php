<?php

namespace League\Tactician\CommandEvents\Event;

/**
 * Holds the command object for an event.
 */
trait HasCommand
{
    /**
     * @var object
     */
    protected $command;

    /**
     * Returns the command.
     *
     * @return object
     */
    public function getCommand()
    {
        return $this->command;
    }
}
