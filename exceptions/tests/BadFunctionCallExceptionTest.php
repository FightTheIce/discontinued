<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\BadFunctionCallException
    [1] => BadFunctionCallException
    [2] => LogicException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class BadFunctionCallExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_BadFunctionCallException_FightTheIce_Exceptions_BadFunctionCallException()
    {
        $this->expectException(\FightTheIce\Exceptions\BadFunctionCallException::class);
        throw new \FightTheIce\Exceptions\BadFunctionCallException("FightTheIce\Exceptions\BadFunctionCallException->Exception");
    }

    public function test_BadFunctionCallException_BadFunctionCallException()
    {
        $this->expectException(\BadFunctionCallException::class);
        throw new \FightTheIce\Exceptions\BadFunctionCallException("BadFunctionCallException->Exception");
    }

    public function test_BadFunctionCallException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\BadFunctionCallException("LogicException->Exception");
    }

    public function test_BadFunctionCallException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\BadFunctionCallException("Exception->Exception");
    }

    public function test_BadFunctionCallException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\BadFunctionCallException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_BadFunctionCallException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\BadFunctionCallException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_BadFunctionCallException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\BadFunctionCallException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\BadFunctionCallException('Custom Message', 1);
    }

    public function test_BadFunctionCallException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\BadFunctionCallException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
