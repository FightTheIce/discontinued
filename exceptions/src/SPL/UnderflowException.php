<?php

/**
 * Fight The Ice UnderflowException Exception.
 *
 * Exception thrown when performing an invalid operation on an empty container, such as removing an element.
 *
 * @see       https://www.php.net/manual/en/class.underflowexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use UnderflowException as SPLUnderflowException;

class UnderflowException extends SPLUnderflowException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
