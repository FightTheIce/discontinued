<?php

namespace FightTheIce\Coding;

use FightTheIce\Coding\Resolutions\Constants;
use PhpParser\Node;
use PhpParser\NodeFinder;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\Node\Stmt\Class_;
use PhpParser\ParserFactory;
use ReflectionClass;

class ClassReflection implements \Reflector {
    protected $internalReflection = null;

    protected $ast = array();

    protected $filename  = null;
    protected $name      = null;
    protected $classType = '';

    public static function export() {

    }

    public function __construct($argument) {
        $this->internalReflection = new ReflectionClass($argument);
        $this->name               = $this->internalReflection->getName();

        //we don't support internal classes
        if ($this->internalReflection->isInternal() == true) {
            throw new \ErrorException('X-1');
        }

        //we only want classes we can see in a file
        $this->filename = $this->internalReflection->getFileName();
        if (!$this->filename) {
            throw new \ErrorException('X-2');
        }

        //one more check to make sure the file exists
        if (!file_exists($this->filename)) {
            throw new \ErrorException('X-3');
        }

        //now lets get the AST
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $ast    = $parser->parse(file_get_contents($this->getFileName()));

        //name resolver allows us to see fully qualified namespaces
        $nameResolver = new NameResolver(null, [
            'preserveOriginalNames' => false,
            'replaceNodes'          => true,
        ]);

        $nodeTraverser = new NodeTraverser;
        $nodeTraverser->addVisitor($nameResolver);

        // Resolve names
        $ast = $nodeTraverser->traverse($ast);

        //now since some people write awful code and don't follow any standards (or maybe they do)
        //its entirely possible to have more than one class in a file
        //so we need to travel the nodes looking for classes
        $classes = $this->nodeFinder($ast, \PhpParser\Node\Stmt\Class_::class);
        foreach ($classes as $class) {
            $name = $class->namespacedName->__toString();
            if ($name == $this->getName()) {
                $this->ast       = $class;
                $this->classType = 'class';
                break;
            }
        }

        //maybe this is an interface?
        if (empty($this->ast)) {
            $interfaces = $this->nodeFinder($ast, \PhpParser\Node\Stmt\Interface_::class);
            foreach ($interfaces as $interface) {
                $name = $interface->namespacedName->__toString();
                if ($name == $this->getName()) {
                    $this->ast       = $interface;
                    $this->classType = 'interface';
                    break;
                }
            }
        }

        //maybe this is a trait?
        if (empty($this->ast)) {
            $traits = $this->nodeFinder($ast, \PhpParser\Node\Stmt\Trait_::class);
            foreach ($traits as $trait) {
                $name = $trait->namespacedName->__toString();
                if ($name == $this->getName()) {
                    $this->ast       = $trait;
                    $this->classType = 'trait';
                    break;
                }
            }
        }

        if (empty($this->ast)) {
            throw new \ErrorException('X-4');
        }

    }

    protected function nodeFinder($ast, string $class) {
        $nodeFinder = new NodeFinder();
        return $nodeFinder->findInstanceOf($ast, $class);
    }

    public function __toString() {

    }

    public function getName() {
        return $this->name;
    }

    public function isInternal() {
        return false;
    }

    public function isUserDefined() {
        return true;
    }

    public function isAnonymous() {
        if (method_exists($this->ast, 'isAnonymous')) {
            return $this->ast->isAnonymous();
        }

        return false;
    }

    public function isInstantiable() {
        #?
    }

    public function isCloneable() {
        #?
    }

    public function getFileName() {
        return $this->filename;
    }

    public function getStartLine() {
        return $this->ast->getStartLine();
    }

    public function getEndLine() {
        return $this->ast->getEndLine();
    }

    public function getDocComment() {
        return $this->ast->getDocComment();
    }

    public function getConstructor() {

    }

    public function hasMethod() {

    }

    public function getMethod() {

    }

    public function getMethods() {

    }

    public function hasProperty() {

    }

    public function getProperty() {

    }

    public function getProperties() {

    }

    public function hasConstant(string $name) {
        $constants = $this->getConstants();
        if (!$constants) {
            return false;
        }

        return in_array($name, array_keys($constants));
    }

    public function getConstants() {
        $constants = $this->ast->getConstants();

        if (empty($constants)) {
            return false;
        }

        $resolver = new \FightTheIce\Code\Reflection\Resolvers\ConstantsResolver($constants);
        $resolver->resolve();
        return $resolver->getConstants();
    }

    public function getReflectionConstants() {

    }

    public function getConstant(string $name) {
        $constants = $this->getConstants();
        if (!$constants) {
            return false;
        }

        if (!in_array($name, array_keys($constants))) {
            return false;
        }

        return $constants[$name]['value'];
    }

    public function getReflectionConstant() {

    }

    public function getInterfaces() {

    }

    public function getInterfaceNames() {
        $interfaceNames = array();

        if (property_exists($this->ast, 'implements')) {
            if (!empty($this->ast->implements)) {
                foreach ($this->ast->implements as $interface) {
                    $interfaceNames[] = $interface->__toString();
                }
            }
        }

        return $interfaceNames;
    }

    public function isInterface() {
        if ($this->classType == 'interface') {
            return true;
        }

        return false;
    }

    public function getTraits() {

    }

    public function getTraitNames() {

    }

    public function getTraitAliases() {

    }

    public function isTrait() {
        if ($this->classType == 'trait') {
            return true;
        }

        return false;
    }

    public function isAbstract() {
        if (method_exists($this->ast, 'isAbstract')) {
            return $this->ast->isAbstract();
        }

        return false;
    }

    public function isFinal() {
        if (method_exists($this->ast, 'isFinal')) {
            return $this->ast->isFinal();
        }

        return false;
    }

    public function getModifiers() {

    }

    public function isInstance() {

    }

    public function newInstance() {

    }

    public function newInstanceWithoutConstructor() {

    }

    public function newInstanceArgs() {

    }

    public function getParentClass() {

    }

    public function isSubclassOf($class) {
        //we can't do this one yet
        if (is_string($class)) {
            //yeap
        } elseif (is_subclass_of($class, \ReflectionClass::class) == true) {
            $class = $class->getName();
        } else {
            throw new \ErrorException('X-5');
        }

        print_r(get_class_methods($this->ast));
        print_r($this->ast->getSubNodeNames());

        return $this->internalReflection->isSubclassOf($class);
    }

    public function getStaticProperties() {

    }

    public function getStaticPropertyValue() {

    }

    public function setStaticPropertyValue() {

    }

    public function getDefaultProperties() {

    }

    public function isIterable() {

    }

    public function isIterateable() {

    }

    public function implementsInterface() {

    }

    public function getExtension() {

    }

    public function getExtensionName() {

    }

    public function inNamespace() {
        if (!empty($this->getNamespaceName())) {
            return true;
        }

        return false;
    }

    public function getNamespaceName() {
        $name      = $this->getName();
        $nameParts = explode('\\', $name);
        array_pop($nameParts);
        return implode('\\', $nameParts);
    }

    public function getShortName() {
        $name      = $this->getName();
        $nameParts = explode('\\', $name);
        return array_pop($nameParts);
    }

}