<?php

namespace FightTheIce\Events\Console\Command;

class Choice extends BaseInput
{
    protected $method = 'CHOICE';
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
