<?php

/**
 * Fight The Ice DomainException Exception.
 *
 * Exception thrown if a value does not adhere to a defined valid data domain.
 *
 * @see       https://www.php.net/manual/en/class.domainexception.php
 *
 * @license   MIT
 */

namespace FightTheIce\Exceptions;

use DomainException as SPLDomainException;

class DomainException extends SPLDomainException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
