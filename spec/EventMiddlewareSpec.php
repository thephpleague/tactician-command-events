<?php

namespace spec\League\Tactician\CommandEvents;

use League\Event\EmitterAwareInterface;
use League\Event\EmitterInterface as Emitter;
use League\Tactician\CommandEvents\Event\CommandFailed;
use League\Tactician\CommandEvents\Event\CommandHandled;
use League\Tactician\CommandEvents\Event\CommandReceived;
use League\Tactician\CommandEvents\EventMiddleware;
use League\Tactician\Middleware;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

final class EventMiddlewareSpec extends ObjectBehavior
{
    function let(Emitter $emitter)
    {
        $this->beConstructedWith($emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(EventMiddleware::class);
    }

    function it_is_a_middleware()
    {
        $this->shouldImplement(Middleware::class);
    }

    function it_is_aan_emitter_aware()
    {
        $this->shouldImplement(EmitterAwareInterface::class);
    }

    function it_executes_a_command(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type(CommandReceived::class))->shouldBeCalled();
        $emitter->emit(Argument::type(CommandHandled::class))->shouldBeCalled();

        $this->execute($command, function() {});
    }

    function it_executes_a_faulty_command_and_fails(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type(CommandFailed::class))->shouldBeCalled();

        $this->shouldThrow(\Exception::class)->duringExecute($command, function() {});
    }

    function it_executes_a_faulty_command_and_handles_the_exception(Command $command, Emitter $emitter)
    {
        $emitter->emit(Argument::type(CommandFailed::class))->will(function($args) {
            $args[0]->catchException();
        });

        $this->shouldNotThrow(\Exception::class)->duringExecute($command, function() {});
    }
}
