<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\OutOfRangeException
    [1] => OutOfRangeException
    [2] => LogicException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class OutOfRangeExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_OutOfRangeException_FightTheIce_Exceptions_OutOfRangeException()
    {
        $this->expectException(\FightTheIce\Exceptions\OutOfRangeException::class);
        throw new \FightTheIce\Exceptions\OutOfRangeException("FightTheIce\Exceptions\OutOfRangeException->Exception");
    }

    public function test_OutOfRangeException_OutOfRangeException()
    {
        $this->expectException(\OutOfRangeException::class);
        throw new \FightTheIce\Exceptions\OutOfRangeException("OutOfRangeException->Exception");
    }

    public function test_OutOfRangeException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\OutOfRangeException("LogicException->Exception");
    }

    public function test_OutOfRangeException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\OutOfRangeException("Exception->Exception");
    }

    public function test_OutOfRangeException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\OutOfRangeException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_OutOfRangeException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\OutOfRangeException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_OutOfRangeException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\OutOfRangeException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\OutOfRangeException('Custom Message', 1);
    }

    public function test_OutOfRangeException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\OutOfRangeException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
