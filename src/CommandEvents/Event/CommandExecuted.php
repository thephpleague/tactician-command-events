<?php

namespace League\Tactician\CommandEvents\Event;

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
