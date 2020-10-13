<?php

namespace FightTheIce\Code\Generator;

use Zend\Code\Generator\ClassGenerator as Z_ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\PropertyGenerator;

class ClassGenerator
{
    protected $generator = null;

    public function __construct()
    {
        $this->generator = new Z_ClassGenerator;
    }

    public function getClassGenerator()
    {
        return $this->generator;
    }

    public function setName($name)
    {
        $this->generator->setName($name);

        return $this;
    }

    public function setExtends($name)
    {
        //if the class name is more than one "space" then lets automaticly add a use statement
        $x = explode('\\', $name);
        if (count($x) > 1) {
            //add the class name to use
            $this->addUse($name);

            //$name = trim(end($x));
        }

        //now extend our class
        $this->generator->setExtendedClass($name);
    }

    public function addUse($use, $useAlias = null)
    {
        $this->generator->addUse($use, $useAlias);
        return $this;
    }

    public function addMethod($access, $name, $description, $tags = [])
    {
        //standarize
        $access = trim(strtolower($access));
        $flag   = null;

        return new MethodGenerator($this, $name, $access, $description, $tags);
    }

    public function addPublicProperty($name, $description, $defaultValue, $tags = [])
    {
        return $this->addProperty('public', $name, $description, $defaultValue, $tags);
    }

    public function addProtectedProperty($name, $description, $defaultValue, $tags = [])
    {
        return $this->addProperty('protected', $name, $description, $defaultValue, $tags);
    }

    public function addPrivateProperty($name, $description, $defaultValue, $tags = [])
    {
        return $this->addProperty('private', $name, $description, $defaultValue, $tags);
    }

    public function addProperty($access, $name, $description, $defaultValue, $tags = [])
    {
        //standarize
        $access = strtolower(trim($access));
        $flag   = null;

        $tagKeys = array_keys($tags);

        //make sure we have a var tag
        if (!in_array('var', $tagKeys)) {
            $tags['var'] = gettype($defaultValue);
        }

        //make sure we have an access tag
        if (!in_array('access', $tagKeys)) {
            $tags['access'] = $access;
        }

        //standarize our tags
        $tags = $this->_convertTags($tags, $defaultValue, $access);

        //setup our docblock
        $docblock = new DocBlockGenerator;
        $docblock->setShortDescription(ucfirst(trim($name)));
        $docblock->setLongDescription(trim($description));
        $docblock->setTags($tags);

        //setup our property
        $property = new PropertyGenerator;
        $property->setDocblock($docblock);
        $property->setName($name);
        $property->setDefaultValue($defaultValue);

        switch ($access) {
            case 'public':
                $flag = PropertyGenerator::FLAG_PUBLIC;
                break;

            case 'private':
                $flag = PropertyGenerator::FLAG_PRIVATE;
                break;

            case 'protected':
                $flag = PropertyGenerator::FLAG_PROTECTED;
                break;

            default:
                throw new \ErrorException('Public, Private, or Protected not specified! [' . $access . ']');
                break;
        }

        $property->setFlags($flag);

        //now add our property to the generated class
        $this->generator->addPropertyFromGenerator($property);

        return $this;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function save($path)
    {
        file_put_contents($path, '<?php' . PHP_EOL . PHP_EOL . $this->generator->generate());
    }

    protected function _convertTags($tags, $defaultValue, $access)
    {
        //placeholder array for standarized tags
        $newTags = [];

        //did we find our specified tags?
        $varFound = false;
        $varData  = [];

        $accessFound = false;
        $accessData  = [];

        foreach ($tags as $name => $description) {
            $name = trim(strtolower($name));

            switch ($name) {
                case 'var':
                    $varFound = true;
                    $varData  = ['name' => $name, 'description' => $description];
                    break;

                case 'access':
                    $accessFound = true;
                    $accessData  = ['name' => $name, 'description' => $description];
                    break;

                default:
                    $newTags[] = ['name' => $name, 'description' => $description];
                    break;
            }
        }

        if ($varFound == false) {
            $newTags[] = ['name' => 'var', 'description' => getType($defaultValue)];
        } else {
            $newTags[] = $varData;
        }

        if ($accessFound == false) {
            $newTags[] = ['name' => 'access', 'description' => $access];
        } else {
            $newTags[] = $accessData;
        }

        return $newTags;
    }
}
