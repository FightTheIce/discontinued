<?php

namespace FightTheIce\Events\Console\Command;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Base
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $ioType  = null;
    protected $method  = null;
    protected $command = null;

    public function getCommand()
    {
        return $this->command;
    }

    public function getIoType()
    {
        return $this->ioType;
    }

    public function getMethod()
    {
        return $this->method;
    }
}
