<?php

namespace League\Tactician\CommandEvents;

/**
 * Emitted when a command is executed
 */
class CommandExecuted extends CommandEvent
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'commandExecuted';
}
