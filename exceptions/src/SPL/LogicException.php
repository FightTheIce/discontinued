<?php

/**
 * Fight The Ice LogicException Exception.
 *
 * Exception that represents error in the program logic. This kind of exception should lead directly to a fix in your code.
 *
 * @see       https://www.php.net/manual/en/class.logicexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use LogicException as SPLLogicException;

class LogicException extends SPLLogicException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
