<?php

/**
 * Fight The Ice OverflowException Exception.
 *
 * Exception thrown when adding an element to a full container.
 *
 * @see       https://www.php.net/manual/en/class.overflowexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use OverflowException as SPLOverflowException;

class OverflowException extends SPLOverflowException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
