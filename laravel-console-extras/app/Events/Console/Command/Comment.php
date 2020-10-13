<?php

namespace FightTheIce\Events\Console\Command;

class Comment extends BaseOutput
{
    protected $method = 'COMMENT';

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
