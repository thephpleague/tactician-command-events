<?php

namespace League\Tactician\CommandEvents\Event;

use League\Tactician\Command;

/**
 * Emitted when something happens with a command.
 */
interface CommandEvent
{
    /**
     * Returns the command.
     *
     * @return Command
     */
    public function getCommand();
}
