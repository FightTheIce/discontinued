<?php

namespace FightTheIce\Events\Console\Command;

class BaseOutput extends Base
{
    protected $ioType = 'OUTPUT';
    protected $string = '';

    public function getString()
    {
        return $this->string;
    }
}
