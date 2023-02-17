<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\BadMethodCallException
    [1] => BadMethodCallException
    [2] => BadFunctionCallException
    [3] => LogicException
    [4] => Exception
    [5] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class BadMethodCallExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_BadMethodCallException_FightTheIce_Exceptions_BadMethodCallException()
    {
        $this->expectException(\FightTheIce\Exceptions\BadMethodCallException::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("FightTheIce\Exceptions\BadMethodCallException->Exception");
    }

    public function test_BadMethodCallException_BadMethodCallException()
    {
        $this->expectException(\BadMethodCallException::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("BadMethodCallException->Exception");
    }

    public function test_BadMethodCallException_BadFunctionCallException()
    {
        $this->expectException(\BadFunctionCallException::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("BadFunctionCallException->Exception");
    }

    public function test_BadMethodCallException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("LogicException->Exception");
    }

    public function test_BadMethodCallException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("Exception->Exception");
    }

    public function test_BadMethodCallException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\BadMethodCallException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_BadMethodCallException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\BadMethodCallException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_BadMethodCallException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\BadMethodCallException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\BadMethodCallException('Custom Message', 1);
    }

    public function test_BadMethodCallException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\BadMethodCallException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
