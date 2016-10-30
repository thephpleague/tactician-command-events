<?php

namespace League\Tactician\CommandEvents\Event;

/**
 * Emitted when something happens with a command
 */
interface CommandEvent
{
    /**
     * Returns the command
     *
     * @return object
     */
    public function getCommand();
}
