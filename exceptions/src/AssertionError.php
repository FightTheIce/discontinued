<?php

/**
 * Fight The Ice AssertionError Exception.
 *
 * AssertionError is thrown when an assertion made via assert() fails.
 *
 * @see       https://www.php.net/manual/en/class.assertionerror.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use AssertionError as BaseAssertionError;

class AssertionError extends BaseAssertionError implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
