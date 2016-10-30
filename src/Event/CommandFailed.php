<?php

namespace League\Tactician\CommandEvents\Event;

use League\Event\Event;

/**
 * Emitted when a command is failed
 */
final class CommandFailed extends Event implements CommandEvent
{
    use HasCommand;

    /**
     * @var \Exception
     */
    protected $exception;

    /**
     * Checks whether exception is caught
     *
     * @var bool
     */
    protected $exceptionCaught = false;

    /**
     * @param object     $command
     * @param \Exception $exception
     */
    public function __construct($command, \Exception $exception)
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
     * @return bool
     */
    public function isExceptionCaught()
    {
        return $this->exceptionCaught;
    }
}
