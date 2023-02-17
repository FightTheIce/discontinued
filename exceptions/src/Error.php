<?php

/**
 * Fight The Ice Error Exception.
 *
 * Error is the base class for all internal PHP errors.
 *
 * @see       https://www.php.net/manual/en/class.error.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use Error as BaseError;

class Error extends BaseError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
