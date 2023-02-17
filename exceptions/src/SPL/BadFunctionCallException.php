<?php

/**
 * Fight The Ice BadFunctionCallException Exception.
 *
 * Exception thrown if a callback refers to an undefined function or if some arguments are missing.
 *
 * @see       https://www.php.net/manual/en/class.badfunctioncallexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use BadFunctionCallException as SPLBadFunctionCallException;

class BadFunctionCallException extends SPLBadFunctionCallException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
