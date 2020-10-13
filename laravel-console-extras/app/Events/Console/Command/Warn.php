<?php

namespace FightTheIce\Events\Console\Command;

class Warn extends BaseOutput
{
    protected $method = 'WARN';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($command, $string)
    {
        $this->command = $command;
        $this->string  = $string;
    }
}
