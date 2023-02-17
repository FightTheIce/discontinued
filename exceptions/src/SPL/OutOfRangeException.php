<?php

/**
 * Fight The Ice OutOfRangeException Exception.
 *
 * Exception thrown when an illegal index was requested. This represents errors that should be detected at compile time.
 *
 * @see       https://www.php.net/manual/en/class.outofrangeexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use OutOfRangeException as SPLOutOfRangeException;

class OutOfRangeException extends SPLOutOfRangeException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
