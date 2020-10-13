<?php

namespace FightTheIce\Events\Console\Command;

class Error extends BaseOutput
{
    protected $method = 'ERROR';

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
