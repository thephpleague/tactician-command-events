<?php

namespace League\Tactician\CommandEvents\Event;

use League\Event\Event;
use League\Tactician\Command;

/**
 * Emitted when a command is failed
 */
class CommandFailed extends Event implements CommandEvent
{
    use HasCommand;

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

        parent::__construct('command.failed');
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
