<?php

namespace spec\League\Tactician\Event;

use League\Tactician\Command;
use PhpSpec\ObjectBehavior;

class CommandExecutedSpec extends ObjectBehavior
{
    function let(Command $command)
    {
        $this->beConstructedWith($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\Event\CommandExecuted');
    }

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\Event\CommandEvent');
    }
}
