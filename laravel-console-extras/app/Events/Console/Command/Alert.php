<?php

namespace FightTheIce\Events\Console\Command;

class Alert extends BaseOutput
{
    protected $method = 'ALERT';

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
