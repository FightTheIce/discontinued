<?php

namespace FightTheIce\Events\Console\Command;

class Info extends BaseOutput
{
    protected $method = 'INFO';

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
