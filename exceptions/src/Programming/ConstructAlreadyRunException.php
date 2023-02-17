<?php

namespace FightTheIce\Exceptions\Programming;

use FightTheIce\Exceptions\BadMethodCallException;
use FightTheIce\Exceptions\ExceptionsInterface;
use FightTheIce\Exceptions\ComponentExceptionTrait;

class ConstructAlreadyRunException extends BadMethodCallException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
