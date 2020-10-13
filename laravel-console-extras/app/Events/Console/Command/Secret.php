<?php

namespace FightTheIce\Events\Console\Command;

class Secret extends BaseInput
{
    protected $method = 'SECRET';
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($command, $question, $answer)
    {
        $this->command  = $command;
        $this->question = $question;
        $this->answer   = $answer;
    }
}
