<?php
declare (strict_types = 1);

namespace FightTheIce\Primitives;

use Illuminate\Support\Traits\Macroable;

class Boolean_
{
    use Macroable;

    protected $value;

    public function __construct(bool $value = false)
    {
        $this->value = $value;
    }

    public function isTrue(bool $strict = false): bool
    {
        if ($strict === true) {
            if ($this->value === true) {
                return true;
            }

            return false;
        }

        if ($this->value == true) {
            return true;
        }

        return false;
    }

    public function isFalse(bool $strict = false): bool
    {
        return !$this->isTrue($strict);
    }
}
