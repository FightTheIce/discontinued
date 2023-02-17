<?php

/**
 * Fight The Ice InvalidArgumentException Exception.
 *
 * Exception thrown if an argument is not of the expected type.
 *
 * @see       https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use InvalidArgumentException as SPLInvalidArgumentException;

class InvalidArgumentException extends SPLInvalidArgumentException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
