<?php

namespace spec\League\Tactician\CommandEvents\Event;

use League\Tactician\Command;
use PhpSpec\ObjectBehavior;

class CommandHandledSpec extends ObjectBehavior
{
    function let(Command $command)
    {
        $this->beConstructedWith($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\Event\CommandHandled');
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
        $this->getName()->shouldReturn('command.handled');
    }
}
