<?php

namespace FightTheIce\Code\Generator;

use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator as Z_MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;

class MethodGenerator
{
    protected $classGen     = null;
    protected $generator    = null;
    protected $name         = null;
    protected $description  = null;
    protected $tags         = null;
    protected $bodyContents = array();
    protected $access       = null;
    protected $params       = array();
    protected $parameters   = array();

    public function __construct($classGen, $name, $access, $description, $tags)
    {
        $access = trim(strtolower($access));
        $flag   = null;

        $this->classGen  = $classGen;
        $this->generator = new Z_MethodGenerator;
        $this->generator->setName($name);

        switch ($access) {
            case 'public':
                $flag = Z_MethodGenerator::FLAG_PUBLIC;
                break;

            case 'protected':
                $flag = Z_MethodGenerator::FLAG_PROTECTED;
                break;

            default:
                throw new \ErrorException('This is not valid!');
                break;
        }

        $this->generator->setFlags($flag);

        $this->name        = $name;
        $this->description = $description;
        $this->tags        = $tags;
        $this->access      = $access;
    }

    public function addLine($line)
    {
        $this->bodyContents[] = $line;
        return $this;
    }

    public function addComment($comment, $style = '#')
    {
        $comment = ltrim($comment, '#');
        $comment = ltrim($comment, '/');

        $this->bodyContents[] = $style . $comment;

        return $this;
    }

    public function addBlock($block)
    {
        $this->bodyContents[] = $block;

        return $this;
    }

    protected function setBody($body)
    {
        $this->generator->setBody($body);

        return $this;
    }

    public function disolve()
    {
        //setup our docblock
        $docblock = new DocBlockGenerator;
        $docblock->setShortDescription(ucfirst(trim($this->name)));
        $docblock->setLongDescription(trim($this->description));
        $docblock->setTags($this->_convertTags($this->tags, $this->access));

        $this->classGen->getClassGenerator()->addMethodFromGenerator($this->generator);
        $this->generator->setDocblock($docblock);
        $this->generator->setBody(implode(PHP_EOL, $this->bodyContents));
        return $this->classGen;
    }

    protected function _convertTags($tags, $access)
    {
        //place holder array for standardized tags
        $newTags = [];

        //did we find our specified tag?
        $accessFound = false;
        $accessData  = [];

        foreach ($tags as $name => $description) {
            $name = strtolower(trim($name));

            switch ($name) {
                case 'access':
                    $accessFound = true;
                    $accessData  = ['name' => $name, 'description' => $description];
                    break;

                default:
                    $newTags[] = ['name' => $name, 'description' => $description];
                    break;
            }
        }

        //now lets add our parameters stuff
        foreach ($this->parameters as $param) {
            if (empty($param['type'])) {
                $param['type'] = 'mixed';
            }

            $description = $param['type'] . ' $' . $param['name'];
            if (!is_null($param['comment'])) {
                $description = $description . ' - ' . $param['comment'];
            }
            $newTags[] = array('name' => 'param', 'description' => $description);
        }

        if ($accessFound == false) {
            $newTags[] = ['name' => 'access', 'description' => trim(strtolower($access))];
        } else {
            $newTags[] = $accessData;
        }

        return $newTags;
    }

    public function addParameter($name, $defaultValue = null, $type = null, $comment = null)
    {
        $parameter = new ParameterGenerator($name, null, $defaultValue);
        $this->generator->setParameter($parameter);
        $this->parameters[] = array('name' => $name, 'type' => $type, 'value' => $defaultValue, 'comment' => $comment);

        return $this;
    }
}
