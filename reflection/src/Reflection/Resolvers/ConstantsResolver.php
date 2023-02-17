<?php

namespace FightTheIce\Code\Reflection\Resolvers;

class ConstantsResolver {
    protected $ast = null;

    protected $constants = array(
        'resolved'   => array(),
        'unresolved' => array(),
    );

    public function __construct($ast) {
        $this->ast = $ast;
    }

    public function resolve() {
        //lets rebuild the constants to be a bit more organized
        $constants = array();
        foreach ($this->ast as $constant) {
            foreach ($constant->consts as $consts) {
                $name       = $consts->name->__toString();
                $visibility = 'UNKNOWN';
                if ($constant->isPublic()) {
                    $visibility = 'public';
                } elseif ($constant->isPrivate()) {
                    $visibility = 'private';
                } elseif ($constant->isProtected()) {
                    $visibility = 'protected';
                }

                $valueReflection = new \FightTheIce\Coding\ValueReflection($consts->value);
                $value           = $valueReflection->getValue();
                $type            = $valueReflection->getType();

                $tmp = array(
                    'name'       => $name,
                    'value'      => $value,
                    'type'       => $type,
                    'visibility' => $visibility,
                );

                $this->constants['resolved'][$name] = $tmp;
            }
        }
    }

    public function getConstants() {
        return $this->constants['resolved'];
    }
}