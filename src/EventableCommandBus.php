<?php

namespace League\Tactician;

use League\Event\EmitterInterface;
use League\Event\EmitterTrait;
use League\Tactician\Event;

/**
 * Extends the standard command bus with event-driven functionality
 */
class EventableCommandBus extends StandardCommandBus
{
    use EmitterTrait;

    /**
     * @param array                 $middleware
     * @param EmitterInterface|null $emitter
     */
    public function __construct(array $middleware, EmitterInterface $emitter = null)
    {
        $this->setEmitter($emitter);

        parent::__construct($middleware);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Command $command)
    {
        try {
            $this->emit(new CommandEvents\CommandReceived($command));

            parent::execute($command);

            $this->emit(new CommandEvents\CommandExecuted($command));
        } catch (\Exception $e) {
            $this->emit($event = new CommandEvents\CommandFailed($command, $e));

            if (!$event->isExceptionCaught()) {
                throw $e;
            }
        }
    }
}
