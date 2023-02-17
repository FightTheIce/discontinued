<?php

/**
 * Fight The Ice RangeException Exception.
 *
 * Exception thrown to indicate range errors during program execution. Normally this means there was an arithmetic error other than under/overflow. This is the runtime version of DomainException.
 *
 * @see       https://www.php.net/manual/en/class.rangeexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use RangeException as SPLRangeException;

class RangeException extends SPLRangeException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
