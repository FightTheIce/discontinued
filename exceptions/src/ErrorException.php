<?php

/**
 * Fight The Ice ErrorException Exception.
 *
 * An Error Exception.
 *
 * @see       https://www.php.net/manual/en/class.errorexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use ErrorException as BaseErrorException;

class ErrorException extends BaseErrorException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
