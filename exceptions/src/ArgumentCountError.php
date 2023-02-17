<?php

/**
 * Fight The Ice ArgumentCountError Exception.
 *
 * ArgumentCountError is thrown when too few arguments are passed to a user-defined function or method.
 *
 * @see       https://www.php.net/manual/en/class.argumentcounterror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use ArgumentCountError as BaseArgumentCountError;

class ArgumentCountError extends BaseArgumentCountError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
