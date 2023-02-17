<?php

namespace FightTheIce\Exceptions;

interface ExceptionsInterface
{
    public function getComponentName(): string;

    /**
     * setComponentName
     *
     * @param   string  $component  
     *
     * @return  mixed
     */
    public function setComponentName(string $component);
}
