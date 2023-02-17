<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\OutOfBoundsException
    [1] => OutOfBoundsException
    [2] => RuntimeException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class OutOfBoundsExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_OutOfBoundsException_FightTheIce_Exceptions_OutOfBoundsException()
    {
        $this->expectException(\FightTheIce\Exceptions\OutOfBoundsException::class);
        throw new \FightTheIce\Exceptions\OutOfBoundsException("FightTheIce\Exceptions\OutOfBoundsException->Exception");
    }

    public function test_OutOfBoundsException_OutOfBoundsException()
    {
        $this->expectException(\OutOfBoundsException::class);
        throw new \FightTheIce\Exceptions\OutOfBoundsException("OutOfBoundsException->Exception");
    }

    public function test_OutOfBoundsException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\OutOfBoundsException("RuntimeException->Exception");
    }

    public function test_OutOfBoundsException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\OutOfBoundsException("Exception->Exception");
    }

    public function test_OutOfBoundsException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\OutOfBoundsException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_OutOfBoundsException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\OutOfBoundsException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_OutOfBoundsException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\OutOfBoundsException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\OutOfBoundsException('Custom Message', 1);
    }

    public function test_OutOfBoundsException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\OutOfBoundsException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
