<?php

namespace spec\League\Tactician\CommandEvents\Event;

use spec\League\Tactician\CommandEvents\Command;
use PhpSpec\ObjectBehavior;

class CommandFailedSpec extends ObjectBehavior
{
    function let(Command $command, \Exception $e)
    {
        $this->beConstructedWith($command, $e);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\Event\CommandFailed');
    }

    function it_is_an_event()
    {
        $this->shouldImplement('League\Event\EventInterface');
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
