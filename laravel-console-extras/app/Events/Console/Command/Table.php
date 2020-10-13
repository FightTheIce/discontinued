<?php

namespace FightTheIce\Events\Console\Command;

class Table extends BaseOutput
{
    protected $method = 'TABLE';

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($command, $headers, $rows)
    {
        $this->command = $command;
        $this->string  = json_encode(array(
            'headers' => $headers,
            'rows'    => $rows,
        ));
    }
}
