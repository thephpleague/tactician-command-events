<?php

namespace spec\League\Tactician\Event;

use League\Tactician\CommandBus\Command;
use PhpSpec\ObjectBehavior;

class CommandFailedSpec extends ObjectBehavior
{
    function let(Command $command, \Exception $e)
    {
        $this->beConstructedWith($command, $e);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\Event\CommandFailed');
    }

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\Event\CommandEvent');
    }

    function it_has_an_exception(\Exception $e)
    {
        $this->getException()->shouldReturn($e);
    }

    function it_is_unhandled_by_default()
    {
        $this->isHandled()->shouldReturn(false);

        $this->handle();

        $this->isHandled()->shouldReturn(true);
    }
}
