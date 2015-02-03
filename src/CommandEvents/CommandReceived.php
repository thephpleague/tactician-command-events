<?php

namespace League\Tactician\CommandEvents;

/**
 * Emitted when a command is received
 */
class CommandReceived extends CommandEvent
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'commandReceived';
}
