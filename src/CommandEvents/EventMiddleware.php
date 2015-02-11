<?php

namespace League\Tactician\CommandEvents;

use League\Event\EmitterInterface;
use League\Tactician\CommandEvents\Event;
use League\Tactician\Command;
use League\Tactician\Middleware;

/**
 * Provides an event-driven middleware functionality
 */
class EventMiddleware implements Middleware
{
    /**
     * @var EmitterInterface
     */
    protected $emitter;

    /**
     * @param EmitterInterface $emitter
     */
    public function __construct(EmitterInterface $emitter)
    {
        $this->emitter = $emitter;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Command $command, callable $next)
    {
        try {
            $this->emitter->emit(new Event\CommandReceived($command));

            $returnValue = $next($command);

            $this->emitter->emit(new Event\CommandExecuted($command));

            return $returnValue;
        } catch (\Exception $e) {
            $this->emitter->emit($event = new Event\CommandFailed($command, $e));

            if (!$event->isExceptionCaught()) {
                throw $e;
            }
        }
    }
}
