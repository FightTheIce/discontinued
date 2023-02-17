<?php

/**
 * Fight The Ice UnexpectedValueException Exception.
 *
 * Exception thrown if an error which can only be found on runtime occurs.
 *
 * @see       https://www.php.net/manual/en/class.runtimeexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use UnexpectedValueException as SPLUnexpectedValueException;

class UnexpectedValueException extends SPLUnexpectedValueException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
