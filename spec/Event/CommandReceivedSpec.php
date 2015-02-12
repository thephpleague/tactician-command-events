<?php

namespace spec\League\Tactician\CommandEvents\Event;

use League\Tactician\Command;
use PhpSpec\ObjectBehavior;

class CommandReceivedSpec extends ObjectBehavior
{
    function let(Command $command)
    {
        $this->beConstructedWith($command);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\Event\CommandReceived');
    }

    function it_is_a_command_event()
    {
        $this->shouldHaveType('League\Tactician\CommandEvents\Event\CommandEvent');
    }
}
