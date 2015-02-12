<?php

namespace spec\League\Tactician\CommandEvents\Event;

use League\Tactician\Command;
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

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\Event\CommandEvent');
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
