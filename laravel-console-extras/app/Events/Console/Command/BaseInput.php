<?php

namespace FightTheIce\Events\Console\Command;

class BaseInput extends Base
{
    protected $ioType   = 'INPUT';
    protected $question = '';
    protected $answer   = '';

    public function getQuestion()
    {
        return $this->question;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}
