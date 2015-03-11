<?php

namespace League\Tactician\CommandEvents\Event;

use League\Event\AbstractEvent;

/**
 * Custom abstract event class allowing to return a simple name
 */
abstract class Event extends AbstractEvent
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }
}
