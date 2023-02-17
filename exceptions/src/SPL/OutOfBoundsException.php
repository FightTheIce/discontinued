<?php

/**
 * Fight The Ice OutOfBoundsException Exception.
 *
 * Exception thrown if a value is not a valid key. This represents errors that cannot be detected at compile time.
 *
 * @see       https://www.php.net/manual/en/class.outofboundsexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use OutOfBoundsException as SPLOutOfBoundsException;

class OutOfBoundsException extends SPLOutOfBoundsException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
