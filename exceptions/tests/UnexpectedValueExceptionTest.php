<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\UnexpectedValueException
    [1] => UnexpectedValueException
    [2] => RuntimeException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class UnexpectedValueExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_UnexpectedValueException_FightTheIce_Exceptions_UnexpectedValueException()
    {
        $this->expectException(\FightTheIce\Exceptions\UnexpectedValueException::class);
        throw new \FightTheIce\Exceptions\UnexpectedValueException("FightTheIce\Exceptions\UnexpectedValueException->Exception");
    }

    public function test_UnexpectedValueException_UnexpectedValueException()
    {
        $this->expectException(\UnexpectedValueException::class);
        throw new \FightTheIce\Exceptions\UnexpectedValueException("UnexpectedValueException->Exception");
    }

    public function test_UnexpectedValueException_RuntimeException()
    {
        $this->expectException(\RuntimeException::class);
        throw new \FightTheIce\Exceptions\UnexpectedValueException("RuntimeException->Exception");
    }

    public function test_UnexpectedValueException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\UnexpectedValueException("Exception->Exception");
    }

    public function test_UnexpectedValueException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\UnexpectedValueException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_UnexpectedValueException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\UnexpectedValueException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_UnexpectedValueException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\UnexpectedValueException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\UnexpectedValueException('Custom Message', 1);
    }

    public function test_UnexpectedValueException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\UnexpectedValueException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
