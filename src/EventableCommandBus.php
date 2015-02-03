<?php

namespace League\Tactician;

use League\Event\EmitterInterface;
use League\Event\EmitterTrait;
use League\Tactician\Event;

/**
 * Decorates a command bus with event-driven functionality
 */
class EventableCommandBus implements CommandBus
{
    use EmitterTrait;

    /**
     * @var CommandBus
     */
    protected $innerCommandBus;

    /**
     * @param CommandBus            $innerCommandBus
     * @param EmitterInterface|null $emitter
     */
    public function __construct(CommandBus $innerCommandBus, EmitterInterface $emitter = null)
    {
        $this->innerCommandBus = $innerCommandBus;

        $this->setEmitter($emitter);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(Command $command)
    {
        try {
            $this->innerCommandBus->execute($command);

            $this->emit(new CommandEvents\CommandExecuted($command));
        } catch (\Exception $e) {
            $this->emit($event = new CommandEvents\CommandFailed($command, $e));

            if (!$event->isExceptionHandled()) {
                throw $e;
            }
        }
    }
}
