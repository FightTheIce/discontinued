<?php

namespace FightTheIce\Apache;

class Tribe
{
    protected $stack = array();

    public function newHost()
    {
        $this->stack[] = new VirtualHost($this);

        return end($this->stack);
    }

    public function generate()
    {
        $contents = array();

        foreach ($this->stack as $r) {
            $contents[] = $r->generate() . PHP_EOL;
        }

        return implode(PHP_EOL, $contents);
    }
}
