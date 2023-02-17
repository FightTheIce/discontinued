<?php

/**
 * Fight The Ice ParseError Exception.
 *
 * ParseError is thrown when an error occurs while parsing PHP code, such as when eval() is called.
 *
 * @see       https://www.php.net/manual/en/class.parseerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use ParseError as BaseParseError;

class ParseError extends BaseParseError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
