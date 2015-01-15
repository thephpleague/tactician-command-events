<?php

/*
 * This file is part of the Tactician Command Events package.
 *
 * (c) Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\Tactician\Event;

/**
 * Emitted when a command is executed
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CommandExecuted extends CommandEvent
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'commandExecuted';
}
