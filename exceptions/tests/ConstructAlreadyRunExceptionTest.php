<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\Programming\ConstructAlreadyRunException
    [1] => FightTheIce\Exceptions\BadMethodCallException
    [2] => BadMethodCallException
    [3] => BadFunctionCallException
    [4] => LogicException
    [5] => Exception
    [6] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class ConstructAlreadyRunExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_ConstructAlreadyRunException_FightTheIce_Exceptions_Programming_ConstructAlreadyRunException()
    {
        $this->expectException(\FightTheIce\Exceptions\Programming\ConstructAlreadyRunException::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("FightTheIce\Exceptions\Programming\ConstructAlreadyRunException->Exception");
    }

    public function test_ConstructAlreadyRunException_FightTheIce_Exceptions_BadMethodCallException()
    {
        $this->expectException(\FightTheIce\Exceptions\BadMethodCallException::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("FightTheIce\Exceptions\BadMethodCallException->Exception");
    }

    public function test_ConstructAlreadyRunException_BadMethodCallException()
    {
        $this->expectException(\BadMethodCallException::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("BadMethodCallException->Exception");
    }

    public function test_ConstructAlreadyRunException_BadFunctionCallException()
    {
        $this->expectException(\BadFunctionCallException::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("BadFunctionCallException->Exception");
    }

    public function test_ConstructAlreadyRunException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("LogicException->Exception");
    }

    public function test_ConstructAlreadyRunException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("Exception->Exception");
    }

    public function test_ConstructAlreadyRunException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_ConstructAlreadyRunException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_ConstructAlreadyRunException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\Programming\ConstructAlreadyRunException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException('Custom Message', 1);
    }

    public function test_ConstructAlreadyRunException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\Programming\ConstructAlreadyRunException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
