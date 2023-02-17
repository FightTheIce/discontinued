<?php

namespace FightTheIce\Exceptions\FileSystem;

use FightTheIce\Exceptions\ErrorException;
use FightTheIce\Exceptions\ExceptionsInterface;
use FightTheIce\Exceptions\ComponentExceptionTrait;

class FileNotFoundException extends ErrorException implements ExceptionsInterface
{
    use ComponentExceptionTrait;
}
