<?php

/**
 * Fight The Ice CompileError Exception.
 *
 * CompileError is thrown for some compilation errors, which formerly issued a fatal error.
 *
 * @see       https://www.php.net/manual/en/class.compileerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use CompileError as BaseCompileError;

class CompileError extends BaseCompileError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
