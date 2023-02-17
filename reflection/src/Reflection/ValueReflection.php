<?php

namespace FightTheIce\Coding;

class ValueReflection implements \Reflector {
    protected $ast = null;

    protected $type         = '';
    protected $deferredType = '';

    public function __construct($ast) {
        $this->ast = $ast;

        switch (get_class($ast)) {
        case \PhpParser\Node\Scalar\String_::class;
            $this->type = 'String';
            break;

        case \PhpParser\Node\Expr\Array_::class:
            $this->type = 'Array';
            break;

        case \PhpParser\Node\Scalar\LNumber::class:
            $this->type = 'LNumber';
            break;

        case \PhpParser\Node\Scalar\DNumber::class:
            $this->type = 'DNumber';
            break;

        case \PhpParser\Node\Expr\ClassConstFetch::class:
            $this->type = 'ClassConstFetch';
            break;

        case \PhpParser\Node\Expr\BinaryOp\Concat::class:
            $this->type = 'Concat';
            break;

        case \PhpParser\Node\Expr\ConstFetch::class:
            $this->type = 'ConstFetch';
            break;

        case \PhpParser\Node\Expr\UnaryMinus::class:
            $this->type = 'UnaryMinus';
            break;

        case \PhpParser\Node\Expr\UnaryPlus::class:
            $this->type = 'UnaryPlus';
            break;

        default:
            throw new \ErrorException(__CLASS__ . '::__construct X-1 [' . get_class($ast) . ']');
        }
    }

    public static function export() {

    }

    public function __toString() {

    }

    public function getValue() {
        switch ($this->getType(false)) {
        case 'String':
            return $this->ast->value;
            break;

        case 'Array':
            $return = array();
            foreach ($this->ast->items as $item) {
                $value = (new self($item->value))->getValue();
                if (!empty($item->key)) {
                    $key = (new self($item->key))->getValue();

                    $return[$key] = $value;
                } else {
                    array_push($return, $value);
                }
            }

            return $return;
            break;

        case 'LNumber':
            return (int) $this->ast->value;

            break;

        case 'DNumber':
            return (float) $this->ast->value;

            break;

        case 'ClassConstFetch':
            $class = $this->ast->class->__toString();
            $cname = $this->ast->name->__toString();

            return '{' . $class . '::' . $cname . '}';

            break;

        case 'Concat':
            $leftReflect  = new self($this->ast->left);
            $rightReflect = new self($this->ast->right);

            $left  = $leftReflect->getValue();
            $right = $rightReflect->getValue();
            return $left . '.' . $right;
            break;

        case 'ConstFetch':
            $value = $this->ast->name->__toString();
            if (strtoupper($value) == 'NULL') {
                $this->deferredType = 'CoreConstant';
                return '{NULL}';
            }

            $preDefinedConstants = get_defined_constants(true);
            $coreConstants       = $preDefinedConstants['Core'];
            if (in_array($value, array_keys($coreConstants))) {
                $this->deferredType = 'CoreConstant';
                //return '{' . $value . '}';
            } else {
                $this->deferredType = 'UnknownConstant';
            }

            return '{' . $value . '}';
            break;

        case 'UnaryMinus':
            $valueChecker = new Self($this->ast->expr);
            $this->type   = $valueChecker->getType();
            return $valueChecker->getValue();
            break;

        case 'UnaryPlus':
            $valueChecker = new Self($this->ast->expr);
            $this->type   = $valueChecker->getType();
            return $valueChecker->getValue();
            break;

        default:

            throw new \ErrorException(__CLASS__ . '::getValue X-1');
        }
    }

    public function getType(bool $deferredType = true) {
        if ($deferredType == true) {
            if (!empty($this->deferredType)) {
                return $this->deferredType;
            }
        }

        return $this->type;
    }
}