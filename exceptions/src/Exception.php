<?php

/**
 * Fight The Ice Exception Exception.
 *
 * Exception is the base class for all Exceptions in PHP 5, and the base class for all user exceptions in PHP 7.
 *
 * @see       https://www.php.net/manual/en/class.exception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use Exception as BaseException;

class Exception extends BaseException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
