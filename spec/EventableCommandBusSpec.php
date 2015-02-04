<?php

namespace spec\League\Tactician;

use League\Event\EmitterInterface as Emitter;
use League\Tactician\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventableCommandBusSpec extends ObjectBehavior
{
    function let(Emitter $emitter)
    {
        $this->beConstructedWith([], $emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\EventableCommandBus');
    }

    function it_is_a_command_bus()
    {
        $this->shouldHaveType('League\Tactician\StandardCommandBus');
    }

    function it_uses_emitter_trait()
    {
        $this->shouldUseTrait('League\Event\EmitterTrait');
    }

    function it_accepts_an_emitter_in_the_constructor(Emitter $emitter)
    {
        $this->getEmitter()->shouldReturn($emitter);
    }

    function it_executes_a_command_using_the_decorated_bus(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandReceived'))->shouldBeCalled();
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandExecuted'))->shouldBeCalled();

        $this->execute($command);
    }

    function it_executes_a_faulty_command_and_fails(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandFailed'))->shouldBeCalled();

        $this->shouldThrow('Exception')->duringExecute($command);
    }

    function it_executes_a_faulty_command_and_handles_the_exception(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\CommandFailed'))->will(function($args) {
            $args[0]->catchException();
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
