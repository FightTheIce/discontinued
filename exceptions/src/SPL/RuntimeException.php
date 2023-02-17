<?php

/**
 * Fight The Ice RuntimeException Exception.
 *
 * Exception thrown if an error which can only be found on runtime occurs.
 *
 * @see       https://www.php.net/manual/en/class.runtimeexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use RuntimeException as SPLRuntimeException;

class RuntimeException extends SPLRuntimeException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
