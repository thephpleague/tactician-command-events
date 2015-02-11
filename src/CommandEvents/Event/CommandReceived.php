<?php

namespace League\Tactician\CommandEvents\Event;

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
