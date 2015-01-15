<?php

namespace spec\League\Tactician\CommandEvents;

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
        $this->shouldHaveType('League\Tactician\CommandEvents\CommandExecuted');
    }

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\CommandEvent');
    }
}
