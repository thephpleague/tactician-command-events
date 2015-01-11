<?php

/*
 * This file is part of the Tactician Event Decorator package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\Tactician\CommandBus;

use League\Event\EmitterInterface;
use League\Event\EmitterTrait;
use League\Tactician\Event;

/**
 * Decorates a command bus with event-driven functionality
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
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

            $this->emit(new Event\CommandExecuted($command));
        } catch (\Exception $e) {
            $this->emit($event = new Event\CommandFailed($command, $e));

            if (!$event->isHandled()) {
                throw $e;
            }
        }
    }
}
