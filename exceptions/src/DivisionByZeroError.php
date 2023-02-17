<?php

/**
 * Fight The Ice DivisionByZeroError Exception.
 *
 * DivisionByZeroError is thrown when an attempt is made to divide a number by zero.
 *
 * @see       https://www.php.net/manual/en/class.divisionbyzeroerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use DivisionByZeroError as BaseDivisionByZeroError;

class DivisionByZeroError extends BaseDivisionByZeroError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
