<?php

namespace FightTheIce\Exceptions;

trait ComponentExceptionTrait
{
    /**
     * componentName
     *
     * @var string
     */
    protected string $componentName = 'UNKNOWN';

    public function getComponentName() : string
    {
        return $this->componentName;
    }

    /**
     * setComponentName
     *
     * @param   string  $component  
     *
     * @return  mixed
     */
    public function setComponentName(string $component)
    {
        $this->componentName = $component;
        
        return $this;
    }

    /**
     * raise
     * Throw the exception
     * @note - Don't use this... it will screw up backtrace
     *
     * @return  void
     */
    public function raise() {
        throw $this;
    }
}
