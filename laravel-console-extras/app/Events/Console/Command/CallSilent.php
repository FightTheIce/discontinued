<?php

namespace FightTheIce\Events\Console\Command;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CallSilent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $currentSignature = '';
    protected $currentArguments = array();

    protected $calledSignature = '';
    protected $calledArguments = array();
    protected $returnedValue   = '';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($currentSignature, $currentArguments, $calledSignature, $calledArguments, $returnedValue)
    {
        $this->currentSignature = $currentSignature;
        $this->currentArguments = $currentArguments;

        $this->calledSignature = $calledSignature;
        $this->calledArguments = $calledArguments;
        $this->returnedValue   = $returnedValue;
    }

    public function getCurrentSignature()
    {
        return $this->currentSignature;
    }

    public function getCurrentArguments()
    {
        return $this->currentArguments;
    }

    public function getCalledSignature()
    {
        return $this->calledSignature;
    }

    public function getCalledArguments()
    {
        return $this->calledArguments;
    }

    public function getReturnedValue()
    {
        return $this->returnedValue;
    }
}
