<?php

namespace FightTheIce\Events\Console\Command;

class Line extends BaseOutput
{
    protected $method = 'LINE';

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
