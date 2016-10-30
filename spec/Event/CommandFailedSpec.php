<?php

namespace spec\League\Tactician\CommandEvents\Event;

use League\Event\EventInterface;
use League\Tactician\CommandEvents\Event\CommandEvent;
use League\Tactician\CommandEvents\Event\CommandFailed;
use spec\League\Tactician\CommandEvents\Command;
use PhpSpec\ObjectBehavior;

final class CommandFailedSpec extends ObjectBehavior
{
    function let(Command $command, \Exception $e)
    {
        $this->beConstructedWith($command, $e);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CommandFailed::class);
    }

    function it_is_a_command_event()
    {
        $this->shouldImplement(CommandEvent::class);
    }

    function it_is_an_event()
    {
        $this->shouldImplement(EventInterface::class);
    }

    function it_has_a_command(Command $command)
    {
        $this->getCommand()->shouldreturn($command);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('command.failed');
    }

    function it_has_an_exception(\Exception $e)
    {
        $this->getException()->shouldReturn($e);
    }

    function it_is_not_caught_by_default()
    {
        $this->isExceptionCaught()->shouldReturn(false);

        $this->catchException();

        $this->isExceptionCaught()->shouldReturn(true);
    }
}
