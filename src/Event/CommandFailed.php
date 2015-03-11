<?php

namespace League\Tactician\CommandEvents\Event;

use League\Tactician\Command;

/**
 * Emitted when a command fails
 */
class CommandFailed extends Event
{
    use CommandEvent;

    /**
     * @var string
     */
    protected $name = 'command.failed';

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * Checks whether exception is caught
     *
     * @var boolean
     */
    protected $exceptionCaught = false;

    /**
     * @param Command    $command
     * @param \Exception $exception
     */
    public function __construct(Command $command, \Exception $exception)
    {
        $this->command = $command;
        $this->exception = $exception;
    }

    /**
     * Returns the exception
     *
     * @return \Exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * Indicates that exception is caught
     */
    public function catchException()
    {
        $this->exceptionCaught = true;
    }

    /**
     * Checks whether exception is caught
     *
     * @return boolean
     */
    public function isExceptionCaught()
    {
        return $this->exceptionCaught;
    }
}
