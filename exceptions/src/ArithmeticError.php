<?php

/**
 * Fight The Ice ArithmeticError Exception.
 *
 * ArithmeticError is thrown when an error occurs while performing mathematical operations. In PHP 7.0, these errors include attempting to perform a bitshift by a negative amount, and any call to intdiv() that would result in a value outside the possible bounds of an integer.
 *
 * @see       https://www.php.net/manual/en/class.arithmeticerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use ArithmeticError as BaseArithmeticError;

class ArithmeticError extends BaseArithmeticError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
