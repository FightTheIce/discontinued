<?php

namespace FightTheIce\Parrot;

use Webmozart\Assert\Assert;

class Exec
{
    protected $command      = '';
    protected $executed     = false;
    protected $output       = '';
    protected $returnVar    = 0;
    protected $returnValues = array();

    public function __construct($command)
    {
        $this->setCommand($command);
    }

    public function setCommand($command)
    {
        if (!empty($this->command)) {
            throw new \ErrorException('The command has already been set.');
        }

        Assert::string($command);

        $this->command = $command;

        return $this;
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function execute()
    {
        $this->returnVar = PHP_INT_MAX;
        exec($this->getCommand(), $this->output, $this->returnVar);
        $this->executed = true;

        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function getReturnVar()
    {
        return $this->returnVar;
    }
}
