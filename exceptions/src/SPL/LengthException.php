<?php

/**
 * Fight The Ice LengthException Exception.
 *
 * Exception thrown if a length is invalid.
 *
 * @see       https://www.php.net/manual/en/class.lengthexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use LengthException as SPLLengthException;

class LengthException extends SPLLengthException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
