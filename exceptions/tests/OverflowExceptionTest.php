<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\OverflowException
    [1] => OverflowException
    [2] => RuntimeException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class OverflowExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_OverflowException_FightTheIce_Exceptions_OverflowException()
    {
        $this->expectException(\FightTheIce\Exceptions\OverflowException::class);
        throw new \FightTheIce\Exceptions\OverflowException("FightTheIce\Exceptions\OverflowException->Exception");
    }

    public function test_OverflowException_OverflowException()
    {
        $this->expectException(\OverflowException::class);
        throw new \FightTheIce\Exceptions\OverflowException("OverflowException->Exception");
    }

    public function test_OverflowException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\OverflowException("RuntimeException->Exception");
    }

    public function test_OverflowException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\OverflowException("Exception->Exception");
    }

    public function test_OverflowException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\OverflowException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_OverflowException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\OverflowException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_OverflowException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\OverflowException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\OverflowException('Custom Message', 1);
    }

    public function test_OverflowException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\OverflowException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
