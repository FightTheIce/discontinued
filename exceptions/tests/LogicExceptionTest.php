<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\LogicException
    [1] => LogicException
    [2] => Exception
    [3] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class LogicExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_LogicException_FightTheIce_Exceptions_LogicException()
    {
        $this->expectException(\FightTheIce\Exceptions\LogicException::class);
        throw new \FightTheIce\Exceptions\LogicException("FightTheIce\Exceptions\LogicException->Exception");
    }

    public function test_LogicException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\LogicException("LogicException->Exception");
    }

    public function test_LogicException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\LogicException("Exception->Exception");
    }

    public function test_LogicException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\LogicException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_LogicException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\LogicException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_LogicException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\LogicException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\LogicException('Custom Message', 1);
    }

    public function test_LogicException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\LogicException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
