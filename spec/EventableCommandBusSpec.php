<?php

namespace spec\League\Tactician;

use League\Event\EmitterInterface;
use League\Tactician\Command;
use League\Tactician\CommandBus;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventableCommandBusSpec extends ObjectBehavior
{
    function let(CommandBus $commandBus)
    {
        $this->beConstructedWith($commandBus);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\EventableCommandBus');
    }

    function it_is_a_command_bus()
    {
        $this->shouldImplement('League\Tactician\CommandBus');
    }

    function it_uses_emitter_trait()
    {
        $this->shouldUseTrait('League\Event\EmitterTrait');
    }

    function it_accepts_an_emitter_in_the_constructor(CommandBus $commandBus, EmitterInterface $emitter)
    {
        $this->beConstructedWith($commandBus, $emitter);

        $this->getEmitter()->shouldReturn($emitter);
    }

    function it_executes_a_command_using_the_decorated_bus(CommandBus $commandBus, Command $command, EmitterInterface $emitter)
    {
        $this->beConstructedWith($commandBus, $emitter);

        $commandBus->execute($command)->shouldBeCalled();
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandExecuted'))->shouldBeCalled();

        $this->execute($command);
    }

    function it_executes_a_faulty_command_and_fails(CommandBus $commandBus, Command $command, EmitterInterface $emitter)
    {
        $this->beConstructedWith($commandBus, $emitter);

        $commandBus->execute($command)->willThrow('Exception');
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandFailed'))->shouldBeCalled();

        $this->shouldThrow('Exception')->duringExecute($command);
    }

    function it_executes_a_faulty_command_and_handles_the_exception(CommandBus $commandBus, Command $command, EmitterInterface $emitter)
    {
        $this->beConstructedWith($commandBus, $emitter);

        $commandBus->execute($command)->willThrow('Exception');
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandFailed'))->will(function($args) {
            $args[0]->handleException();
        });

        $this->shouldNotThrow('Exception')->duringExecute($command);
    }

    public function getMatchers()
    {
        return [
            'useTrait' => function ($subject, $trait) {
                return class_uses($subject, $trait);
            }
        ];
    }
}
