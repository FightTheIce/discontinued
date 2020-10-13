<?php

namespace FightTheIce\Events\Console\Command;

class AskWithCompletion extends BaseInput
{
    protected $method = 'ASKWITHCOMPLETION';
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
