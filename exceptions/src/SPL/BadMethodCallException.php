<?php

/**
 * Fight The Ice BadMethodCallException Exception.
 *
 * Exception thrown if a callback refers to an undefined method or if some arguments are missing.
 *
 * @see       https://www.php.net/manual/en/class.badmethodcallexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use BadMethodCallException as SPLBadMethodCallException;

class BadMethodCallException extends SPLBadMethodCallException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
