<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\RangeException
    [1] => RangeException
    [2] => RuntimeException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class RangeExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_RangeException_FightTheIce_Exceptions_RangeException()
    {
        $this->expectException(\FightTheIce\Exceptions\RangeException::class);
        throw new \FightTheIce\Exceptions\RangeException("FightTheIce\Exceptions\RangeException->Exception");
    }

    public function test_RangeException_RangeException()
    {
        $this->expectException(\RangeException::class);
        throw new \FightTheIce\Exceptions\RangeException("RangeException->Exception");
    }

    public function test_RangeException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\RangeException("RuntimeException->Exception");
    }

    public function test_RangeException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\RangeException("Exception->Exception");
    }

    public function test_RangeException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\RangeException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_RangeException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\RangeException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_RangeException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\RangeException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\RangeException('Custom Message', 1);
    }

    public function test_RangeException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\RangeException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
