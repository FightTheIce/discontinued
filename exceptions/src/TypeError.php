<?php

/**
 * Fight The Ice TypeError Exception.
 *
 * There are three scenarios where a TypeError may be thrown. The first is where the argument type being passed to a function does not match its corresponding declared parameter type. The second is where a value being returned from a function does not match the declared function return type. The third is where an invalid number of arguments are passed to a built-in PHP function (strict mode only).
 *
 * @see       https://www.php.net/manual/en/class.typeerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use TypeError as BaseTypeError;

class TypeError extends BaseTypeError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
