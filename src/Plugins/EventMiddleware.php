<?php

namespace League\Tactician\Plugins;

use League\Event\EmitterInterface;
use League\Tactician\CommandEvents;
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
            $this->emitter->emit(new CommandEvents\CommandReceived($command));

            $returnValue = $next($command);

            $this->emitter->emit(new CommandEvents\CommandExecuted($command));

            return $returnValue;
        } catch (\Exception $e) {
            $this->emitter->emit($event = new CommandEvents\CommandFailed($command, $e));

            if (!$event->isExceptionCaught()) {
                throw $e;
            }
        }
    }
}
