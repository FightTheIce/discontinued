<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\UnderflowException
    [1] => UnderflowException
    [2] => RuntimeException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class UnderflowExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_UnderflowException_FightTheIce_Exceptions_UnderflowException()
    {
        $this->expectException(\FightTheIce\Exceptions\UnderflowException::class);
        throw new \FightTheIce\Exceptions\UnderflowException("FightTheIce\Exceptions\UnderflowException->Exception");
    }

    public function test_UnderflowException_UnderflowException()
    {
        $this->expectException(\UnderflowException::class);
        throw new \FightTheIce\Exceptions\UnderflowException("UnderflowException->Exception");
    }

    public function test_UnderflowException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\UnderflowException("RuntimeException->Exception");
    }

    public function test_UnderflowException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\UnderflowException("Exception->Exception");
    }

    public function test_UnderflowException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\UnderflowException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_UnderflowException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\UnderflowException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_UnderflowException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\UnderflowException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\UnderflowException('Custom Message', 1);
    }

    public function test_UnderflowException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\UnderflowException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
