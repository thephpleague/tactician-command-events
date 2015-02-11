<?php

namespace spec\League\Tactician\CommandEvents;

use League\Event\EmitterInterface as Emitter;
use League\Tactician\Command;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventMiddlewareSpec extends ObjectBehavior
{
    function let(Emitter $emitter)
    {
        $this->beConstructedWith($emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\EventMiddleware');
    }

    function it_is_a_middleware()
    {
        $this->shouldImplement('League\Tactician\Middleware');
    }

    function it_executes_a_command_using_the_decorated_bus(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\Event\CommandReceived'))->shouldBeCalled();
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\Event\CommandExecuted'))->shouldBeCalled();

        $this->execute($command, function() {});
    }

    function it_executes_a_faulty_command_and_fails(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\Event\CommandFailed'))->shouldBeCalled();

        $this->shouldThrow('Exception')->duringExecute($command, function() {});
    }

    function it_executes_a_faulty_command_and_handles_the_exception(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type('League\Tactician\CommandEvents\Event\CommandFailed'))->will(function($args) {
            $args[0]->catchException();
        });

        $this->shouldNotThrow('Exception')->duringExecute($command, function() {});
    }
}
