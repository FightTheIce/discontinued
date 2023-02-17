<?php
/*
Array
(
    [0] => FightTheIce\Exceptions\InvalidArgumentException
    [1] => InvalidArgumentException
    [2] => LogicException
    [3] => Exception
    [4] => FightTheIce\Exceptions\ExceptionsInterface
)
*/
namespace FightTheIce\Tests\Exceptions;

class InvalidArgumentExceptionTest extends \PHPUnit\Framework\TestCase
{
    public function test_InvalidArgumentException_FightTheIce_Exceptions_InvalidArgumentException()
    {
        $this->expectException(\FightTheIce\Exceptions\InvalidArgumentException::class);
        throw new \FightTheIce\Exceptions\InvalidArgumentException("FightTheIce\Exceptions\InvalidArgumentException->Exception");
    }

    public function test_InvalidArgumentException_InvalidArgumentException()
    {
        $this->expectException(\InvalidArgumentException::class);
        throw new \FightTheIce\Exceptions\InvalidArgumentException("InvalidArgumentException->Exception");
    }

    public function test_InvalidArgumentException_LogicException()
    {
        $this->expectException(\LogicException::class);
        throw new \FightTheIce\Exceptions\InvalidArgumentException("LogicException->Exception");
    }

    public function test_InvalidArgumentException_Exception()
    {
        $this->expectException(\Exception::class);
        throw new \FightTheIce\Exceptions\InvalidArgumentException("Exception->Exception");
    }

    public function test_InvalidArgumentException_FightTheIce_Exceptions_ExceptionsInterface()
    {
        $this->expectException(\FightTheIce\Exceptions\ExceptionsInterface::class);
        throw new \FightTheIce\Exceptions\InvalidArgumentException("FightTheIce\Exceptions\ExceptionsInterface->Exception");
    }

    public function test_InvalidArgumentException_getComponentName()
    {
        $exception = new \FightTheIce\Exceptions\InvalidArgumentException;
        $component = $exception->getComponentName();
        $this->assertIsString($component);
        $this->assertEquals($component, 'UNKNOWN');
    }

    public function test_InvalidArgumentException_BaseException()
    {
        $this->expectException(\FightTheIce\Exceptions\InvalidArgumentException::class, 'Custom Message', 1);
        throw new \FightTheIce\Exceptions\InvalidArgumentException('Custom Message', 1);
    }

    public function test_InvalidArgumentException_setComponentName()
    {
        $componentName = "PHPUNIT";
        $exception = new \FightTheIce\Exceptions\InvalidArgumentException;
        $exception->setComponentName($componentName);
        $nameCheck = $exception->getComponentName();

        $this->assertEquals($componentName, $nameCheck);
    }
}
