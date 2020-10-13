<?php

namespace FightTheIce\Illuminate;

use Illuminate\Container\Container as I_Container;
use Psr\Container\ContainerInterface;

class Container extends I_Container implements ContainerInterface
{
    /**
     *  {@inheritdoc}
     */
    public function has($id)
    {
        return $this->bound($id);
    }

    /**
     *  {@inheritdoc}
     */
    public function get($id)
    {
        if ($this->has($id)) {
            return $this->resolve($id);
        }
        throw new EntryNotFoundException;
    }
}
