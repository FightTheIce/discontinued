<?php

namespace FightTheIce\Events\Console\Command;

class Question extends BaseOutput
{
    protected $method = 'QUESTION';

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
