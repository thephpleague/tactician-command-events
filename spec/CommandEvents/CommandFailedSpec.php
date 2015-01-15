<?php

namespace spec\League\Tactician\CommandEvents;

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
        $this->shouldHaveType('League\Tactician\CommandEvents\CommandFailed');
    }

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\CommandEvent');
    }

    function it_has_an_exception(\Exception $e)
    {
        $this->getException()->shouldReturn($e);
    }

    function it_is_unhandled_by_default()
    {
        $this->isExceptionHandled()->shouldReturn(false);

        $this->handleException();

        $this->isExceptionHandled()->shouldReturn(true);
    }
}
